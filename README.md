# 基于Yii框架搭建的博客系统

### 环境搭建

- PHP
    1. 访问 [PHP官方网站](https://windows.php.net/download/) 下载适合的PHP版本（线程安全版，选择 Zip 压缩包）。
    2. 解压到一个文件夹（例如：`C:\php`）。
    3. 配置环境变量：
  - 在系统的“环境变量”中添加 PHP 的路径（例如：`C:\php`）。
    4. 配置 `php.ini` 文件：
  - 将 `php.ini-development` 文件复制为 `php.ini`，根据需要进行配置（例如，启用扩展、设置时区等）。

- Mysql
    使用 MySQL Installer
    1. 访问 [MySQL官方网站](https://dev.mysql.com/downloads/installer/) 下载 MySQL Installer。
    2. 选择 **Windows (x86, 32-bit), MSI Installer** 版本。
    3. 运行下载的安装程序。
    4. 在安装过程中，选择 **Developer Default** 或 **Server only**，然后继续。
    5. 按照提示完成安装，并设置 MySQL root 用户的密码。
    6. 安装完成后，启动 MySQL 服务。
    7. 打开命令行工具，输入以下命令连接 MySQL：

        ```bash
        mysql -u root -p
        ```

    输入密码后即可登录 MySQL。

- yii2
        确保你的环境已经安装了以下软件：
  - **PHP**：Yii2 需要 PHP 5.4 或更高版本。
  - **Composer**：用于管理 PHP 项目的依赖。

     在 Windows 上安装 Composer
    1. 访问 [Composer官网](https://getcomposer.org/)。
    2. 下载并运行 Composer-Setup.exe，它会自动安装 Composer。
    3. 安装完成后，打开命令行，输入以下命令验证安装：

        ```bash
        composer --version

创建yii2项目
    1. 使用以下命令通过 Composer 创建 Yii2 项目：

    ```bash
    composer create-project --prefer-dist yiisoft/yii2-app-basic basic
    ```

    这将会在当前目录下创建一个名为 `basic` 的 Yii2 项目。如果你希望自定义项目名称，可以替换 `basic` 为其他名称。

    2. 进入项目目录：

    ```bash
    cd basic
    ```

    3. 运行 PHP 内置的开发服务器：

    ```bash
    php yii serve
    ```

    默认情况下，Yii2 开发服务器将在 `http://localhost:8080` 上运行。
        ```

- **集成环境--XAMPP**
如果觉得上述安装方法泰国麻烦可以尝试XAMPP安装
    1. 访问 [XAMPP 官方网站](https://www.apachefriends.org/index.html)。
    2. 下载适用于 Windows 的安装包。
    3. 运行下载的 `.exe` 文件启动安装程序。
    4. 在安装过程中，选择你需要安装的组件（默认情况下，Apache、MySQL、PHP、phpMyAdmin 等会被选中）。
    5. 选择安装路径（默认安装路径是 `C:\xampp`），点击 **Next**。
    6. 按照安装向导完成安装。
    7. 安装完成后，启动 XAMPP 控制面板。
    8. 在 XAMPP 控制面板中，点击 **Start** 启动 Apache 和 MySQL 服务。

 验证安装

1. 打开浏览器，输入 `http://localhost/`，如果显示 XAMPP 欢迎页面，说明 XAMPP 安装成功。
2. 访问 `http://localhost/phpmyadmin/`，可以打开 phpMyAdmin，验证 MySQL 服务是否正常
