<?php
session_start();
$httpStatusCode = 400;
$httpStatusMsg = 'BAD REQUEST';
if ($_SESSION['user'] != 'yuhao') {
    $phpSapiName = substr(php_sapi_name(), 0, 3);
    if ($phpSapiName == 'cgi' || $phpSapiName == 'fpm') {
        header('Status: ' . $httpStatusCode . ' ' . $httpStatusMsg);
    } else {
        $protocol = isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0';
        header($protocol . ' ' . $httpStatusCode . ' ' . $httpStatusMsg);
    }
} else {
    echo '
    <!DOCTYPE html>
    <html lang="zh">
    <head>
      <meta charset="utf-8">
      <title>用户查询页面</title>
      <meta name="renderer" content="webkit">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <link rel="stylesheet" href="./layui/css/layui.css"  media="all">
    </head>
    <body>
        <script src="./layui/layui.js" charset="utf-8"></script>
    
        <table class="layui-hide" id="user" lay-filter="record"></table>
        
        <script>
            layui.use(["table","jquery"],function(){
                var table = layui.table;
                var $ = layui.jquery;
                table.render({
                    elem:"#user"
                    ,url:"./getUser.php"
                    ,cellMinWidth: 150 //全局定义常规单元格的最小宽度
                    ,cols: [[
                        {field:"uid", align:"center", minwidth:150, title: "用户id"},
                        {field:"username", align:"center", minwidth:150,title:"用户名"},
                    ]]
                });
            });
            
        </script>
    
    </body>
    </html>';
}

?>