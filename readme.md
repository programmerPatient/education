#项目的初始化
    
    (1)修改时区

        修改config/app.php文件下的timezone

    (2)下载语言包：laravel-lang

        命令：composer require caouecs/laravel-lang:~3.0

        将语言包文件zh-CN从vendor/caouecs/laravel-lang/src中复制到resources/lang目录下

        修改config/app.php下的locale改为zh-CN

    (3)配置数据库

        创建数据库education,选择字符集utf8_gengeral_ci

        配置数据库的连接：修改根目录下的.env文件修改DB_DATABASE为相应的数据库名称，其它配置根据需要修改

        推荐禁用mysql的严格模式,需要修改config/database.php下的mysql内的strict为false

    (4)删除系统自带的非必要的文件

        删除app/User.php

        删除app/Http/Controllers/Auth目录

        删除databas/migrations目录和database/seeds目录下的全部文件

        删除public下的js和css目录

        删除resources/views下的全部文件

    (5)(可选,开发时可用，线上不能用)安装debugbar工具条，要求php版本大于等于7.0

        命令：composer require barryvdh/laravel-debugbar --dev
