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

##使用datatables插件实现列表的无刷新分页

    Datatables插件是一款基于jquery框架进行开发的无刷新分页插件，其除了分页还有排序搜索等功能

    官网：https://www.datatables.net/

    该分页插件有两种形式，客户端分页方式，服务端分页方式（limit）

    客户端分页，优点是当数据量很少的时候，其速度比较快的，其所有的操作都在客户端完成，但是如果数据量大的话，则加载会很慢。

    服务端分页，优点是数据量大的时候，由于每次都是通过limit限制输出记录，所以其速度基本不受影响，但是如果数据量少的时候则服务器的压力相对较大。
