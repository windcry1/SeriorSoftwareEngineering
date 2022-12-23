# 介绍 <span style="float:right">![php](https://github.com/windcry1/SeriorSoftwareEngineering/actions/workflows/php.yml/badge.svg)</span>
该系统是HLS直播系统，高级软件工程大作业，初步实现了登录、注册、直播、看播、直播间、用户管理等功能。

## 运行环境
mysql 8.0.30

php 8.1.10

nginx 1.19.10

## 模块说明

### 文件夹

css文件夹：保存文件样式表，其中live.css为live.php对应的样式表，style.css为index.php对应的样式表

image文件夹：保存图片文件

js文件夹：保存该项目中使用到的js脚本，其中flv.min.js, video.min.js, videojs-contrib-hls.js是开源组件，functions.js与index_functions.js为该项目中用到的js脚本

layui文件夹：layui框架

### 网页文件

checkUser.php: 用于验证用户是否已经存在

config.php: php的配置文件

getUser.php: 获取数据库表中的用户信息

index.php: 网页主页

live.php: 直播点播页面

login.html: 登录页面

login.php: 登录操作对应的后端php

logout.php: 登出操作对应的后端php

nginx.conf: nginx的配置文件

playvideo.html: 播放录播文件对应的播放器

record.html: 录播页面对应的html

record.php: 执行录播页面操作的对应后端文件

reg.php: 执行注册操作对应的后端文件

register.html: 执行注册操作对应的页面文件

user.php: 查询用户对应的php

welcome.html: 登录进系统时可见的欢迎页