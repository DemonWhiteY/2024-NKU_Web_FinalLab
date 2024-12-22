# 部署 Yii2 项目的 Windows PowerShell 脚本
# deploy-yii2.ps1

param(
    [Parameter(Mandatory=$true)]
    [string]$RepoUrl,

    [Parameter(Mandatory=$true)]
    [string]$Domain,

    [Parameter(Mandatory=$true)]
    [string]$DbName,

    [Parameter(Mandatory=$true)]
    [string]$DbUser,

    [Parameter(Mandatory=$true)]
    [string]$DbPassword
)

# 错误处理
$ErrorActionPreference = "Stop"

# 日志函数
function Write-Log {
    param($Message)
    Write-Host "[$(Get-Date -Format 'yyyy-MM-dd HH:mm:ss')] $Message"
}

# 检查必要软件是否安装
function Check-Requirements {
    Write-Log "检查必要软件..."

    $requirements = @(
        @{Name="PHP"; Command="php -v"},
        @{Name="Composer"; Command="composer -V"},
        @{Name="Git"; Command="git --version"},
        @{Name="MySQL"; Command="mysql --version"}
    )

    foreach ($req in $requirements) {
        try {
            Invoke-Expression $req.Command | Out-Null
            Write-Log "$($req.Name) 已安装"
        }
        catch {
            throw "$($req.Name) 未安装或未添加到系统路径！"
        }
    }
}

# 配置项目路径
$ProjectPath = "C:\inetpub\wwwroot\$Domain"

try {
    # 检查必要软件
    Check-Requirements

    # 创建项目目录
    Write-Log "创建项目目录..."
    New-Item -ItemType Directory -Force -Path $ProjectPath | Out-Null

    # 克隆项目
    Write-Log "克隆项目代码..."
    Set-Location $ProjectPath
    git clone $RepoUrl .

    # 安装依赖
    Write-Log "安装项目依赖..."
    composer install --no-dev

    # 创建并配置数据库
    Write-Log "配置数据库..."
    $MySQLCommand = @"
CREATE DATABASE IF NOT EXISTS $DbName CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER IF NOT EXISTS '$DbUser'@'localhost' IDENTIFIED BY '$DbPassword';
GRANT ALL PRIVILEGES ON $DbName.* TO '$DbUser'@'localhost';
FLUSH PRIVILEGES;
"@
    $MySQLCommand | mysql -u root

    # 配置数据库连接
    Write-Log "配置数据库连接..."
    $DbConfig = @"
<?php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=$DbName',
    'username' => '$DbUser',
    'password' => '$DbPassword',
    'charset' => 'utf8',
];
"@
    Set-Content -Path "$ProjectPath\config\db.php" -Value $DbConfig

    # 设置目录权限
    Write-Log "设置目录权限..."
    $acl = Get-Acl "$ProjectPath\runtime"
    $accessRule = New-Object System.Security.AccessControl.FileSystemAccessRule("IUSR","FullControl","Allow")
    $acl.SetAccessRule($accessRule)
    Set-Acl "$ProjectPath\runtime" $acl
    Set-Acl "$ProjectPath\web\assets" $acl

    if (Test-Path "$ProjectPath\web\uploads") {
        Set-Acl "$ProjectPath\web\uploads" $acl
    }

    # 配置环境
    Write-Log "配置环境..."
    if (Test-Path "$ProjectPath\.env.example") {
        Copy-Item "$ProjectPath\.env.example" "$ProjectPath\.env"
        (Get-Content "$ProjectPath\.env") `
            -replace "YII_DEBUG=true", "YII_DEBUG=false" `
            -replace "YII_ENV=dev", "YII_ENV=prod" |
        Set-Content "$ProjectPath\.env"
    }

    # 配置 IIS
    Write-Log "配置 IIS..."
    Import-Module WebAdministration
    if (!(Test-Path "IIS:\Sites\$Domain")) {
        New-WebSite -Name $Domain -PhysicalPath $ProjectPath -Force
        New-WebBinding -Name $Domain -Protocol http -Port 80
    }

    # 配置 PHP Handler
    $HandlerPath = "IIS:\Sites\$Domain"
    Set-WebConfigurationProperty -PSPath $HandlerPath -Filter "system.webServer/handlers" -Name "." -Value @{
        name="PHP_via_FastCGI"
        path="*.php"
        verb="*"
        modules="FastCgiModule"
        scriptProcessor="C:\Program Files\PHP\php-cgi.exe"
        resourceType="Either"
    }

    # 执行数据库迁移
    Write-Log "执行数据库迁移..."
    Set-Location $ProjectPath
    php yii migrate --interactive=0

    # 清理敏感文件
    Write-Log "清理敏感文件..."
    Remove-Item -Recurse -Force -ErrorAction SilentlyContinue "$ProjectPath\.git"
    Remove-Item -Recurse -Force -ErrorAction SilentlyContinue "$ProjectPath\tests"
    Remove-Item -Force -ErrorAction SilentlyContinue "$ProjectPath\composer.lock"

    Write-Log "部署完成！请访问 http://$Domain 检查站点."
}
catch {
    Write-Error "部署过程中发生错误: $_"
    exit 1
}
