nginx配置

``````
server {
    server_name swoole.aaa.com;
    root /home/yangyi/swoole;

    location / {
        try_files $uri /client.html$is_args$args;
    }
    location ~ ^/client\.php(/|$) {
        fastcgi_pass 127.0.0.1:9000;
        fastcgi_split_path_info ^(.+\.php)(/.*)$;
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        fastcgi_param DOCUMENT_ROOT $realpath_root;
    }

    location ~ \.php$ {
        return 404;
    }

    error_log /var/log/nginx/project_error.log;
    access_log /var/log/nginx/project_access.log;
}
``````

fpm配置

``````
cd /etc/php/7.1/fpm/pool.d
vi www.conf
修改listen = 9000
修改listen.allowed_clients = 127.0.0.1
``````

swoole安装

``````
git clone https://github.com/swoole/swoole-src.git
cd swoole-src/
sudo vi config.m4
找到HAVE_SIGNALFD 的行删除
phpize
./configure
make 
sudo make install
配置php.ini加入
/php_shmop
extension=swoole.so
``````

以下可能用到
``````
//查看端口占用
lsof -i
//修改owner
pecl config-get php_dir
sudo chown <username> <php_dir>

pecl install swoole
echo 'extension=swoole.so' >> /etc/php/7.0/mods-available/swoole.ini
cd /etc/php/7.0/cli/conf.d/ && ln -s ../../mods-available/swoole.ini 20-swoole.ini
cd /etc/php/7.0/fpm/conf.d/ && ln -s ../../mods-available/swoole.ini 20-swoole.ini
``````

phpstorm自动提示
``````
git clone https://github.com/eaglewu/swoole-ide-helper.git
右键External Libraries，选择Configure PHP Include Path 
添加swoole-ide-helper目录
``````