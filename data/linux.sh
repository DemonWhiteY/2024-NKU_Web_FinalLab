#!/bin/bash

# 部署 Yii2 项目的自动化脚本
# 使用方法: ./deploy-yii2.sh <项目git仓库URL> <域名> <数据库名> <数据库用户名> <数据库密码>

# 错误处理
set -e
exec 2>&1

# 日志函数
log() {
    echo "[$(date '+%Y-%m-%d %H:%M:%S')] $1"
}

# 检查参数
if [ "$#" -ne 5 ]; then
    echo "使用方法: $0 <项目git仓库URL> <域名> <数据库名> <数据库用户名> <数据库密码>"
    exit 1
fi

REPO_URL=$1
DOMAIN=$2
DB_NAME=$3
DB_USER=$4
DB_PASS=$5
PROJECT_PATH="/var/www/${DOMAIN}"

# 1. 安装必要的包
log "开始安装必要的软件包..."
sudo pacman -Syu --noconfirm
sudo pacman -S --noconfirm php php-fpm nginx mariadb composer git

# 2. 启动并配置服务
log "配置并启动服务..."
sudo systemctl enable --now php-fpm nginx mariadb

# 3. 配置 MariaDB
log "配置数据库..."
sudo mysql -e "CREATE DATABASE IF NOT EXISTS ${DB_NAME} CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
sudo mysql -e "CREATE USER IF NOT EXISTS '${DB_USER}'@'localhost' IDENTIFIED BY '${DB_PASS}';"
sudo mysql -e "GRANT ALL PRIVILEGES ON ${DB_NAME}.* TO '${DB_USER}'@'localhost';"
sudo mysql -e "FLUSH PRIVILEGES;"

# 4. 克隆项目
log "克隆项目代码..."
sudo mkdir -p ${PROJECT_PATH}
sudo git clone ${REPO_URL} ${PROJECT_PATH}
sudo chown -R http:http ${PROJECT_PATH}

# 5. 安装依赖
log "安装项目依赖..."
cd ${PROJECT_PATH}
sudo -u http composer install --no-dev

# 6. 配置目录权限
log "设置目录权限..."
sudo chmod 777 ${PROJECT_PATH}/runtime/
sudo chmod 777 ${PROJECT_PATH}/web/assets/
sudo chmod 777 ${PROJECT_PATH}/web/uploads/ 2>/dev/null || true

# 7. 配置数据库连接
log "配置数据库连接..."
cat > ${PROJECT_PATH}/config/db.php << EOF
<?php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=${DB_NAME}',
    'username' => '${DB_USER}',
    'password' => '${DB_PASS}',
    'charset' => 'utf8',
];
EOF

# 8. 配置环境
log "配置环境变量..."
if [ -f "${PROJECT_PATH}/.env.example" ]; then
    sudo cp ${PROJECT_PATH}/.env.example ${PROJECT_PATH}/.env
    sudo sed -i 's/YII_DEBUG=true/YII_DEBUG=false/' ${PROJECT_PATH}/.env
    sudo sed -i 's/YII_ENV=dev/YII_ENV=prod/' ${PROJECT_PATH}/.env
fi

# 9. 配置 Nginx
log "配置 Nginx..."
sudo cat > /etc/nginx/sites-available/${DOMAIN}.conf << EOF
server {
    listen 80;
    server_name ${DOMAIN};
    root ${PROJECT_PATH}/web;
    index index.php;

    location / {
        try_files \$uri \$uri/ /index.php?\$args;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/run/php-fpm/php-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME \$document_root\$fastcgi_script_name;
        include fastcgi_params;
    }
}
EOF

sudo ln -sf /etc/nginx/sites-available/${DOMAIN}.conf /etc/nginx/sites-enabled/
sudo nginx -t && sudo systemctl restart nginx

# 10. 执行数据库迁移
log "执行数据库迁移..."
cd ${PROJECT_PATH}
sudo -u http ./yii migrate --interactive=0

# 11. 设置安全权限
log "配置安全权限..."
sudo chmod 600 ${PROJECT_PATH}/config/*.php
sudo chmod 600 ${PROJECT_PATH}/.env 2>/dev/null || true
sudo rm -rf ${PROJECT_PATH}/.git/
sudo rm -rf ${PROJECT_PATH}/tests/
sudo rm -f ${PROJECT_PATH}/composer.lock

log "部署完成！请访问 http://${DOMAIN} 检查站点."
