<?php
session_start();
if(empty($_SESSION['user'])){
    header('Location:login.html');
}?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>HLS直播系统</title>
    <link rel="stylesheet" href="./layui/css/layui.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="./image/ynu.jpg">
</head>
<body>

<div class="layui-layout layui-layout-admin" id="layui-layout">
    <!-- header -->
    <div class="layui-header my-header">
        <a href="index.html">
            <div class="my-header-logo">HLS直播系统</div>
        </a>
 
        <!-- 顶部右侧添加选项卡监听 -->
        <ul class="layui-nav my-header-user-nav" lay-filter="side-top-right">
            <li class="layui-nav-item">
                <a class="name" href="javascript:;"><i class="layui-icon"></i>主题</a>
                <dl class="layui-nav-child">
                    <dd data-skin="0"><a href="javascript:change_style_default();">默认</a></dd>
                    <dd data-skin="1"><a href="javascript:change_style_white();">纯白</a></dd>
                    <dd data-skin="2"><a href="javascript:change_style_blue();">蓝白</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item">
                <a class="name" href="javascript:;"><img src="./image/ynu.jpg" alt="logo"> <?php echo $_SESSION['user'] ?> </a>
                <dl class="layui-nav-child">
                    <dd><a href="logout.php"><i class="layui-icon">ဆ</i>登出</a></dd>
                </dl>
            </li>
        </ul>
 
    </div>
    <!-- side -->
    <div class="layui-side my-side">
        <div class="layui-side-scroll">
            <!-- 左侧主菜单添加选项卡监听 -->
            <ul class="layui-nav layui-nav-tree" lay-filter="side-main">
                <li class="layui-nav-item layui-nav-itemed"> 
                    <a href="javascript:;"><i class="layui-icon"></i>直播录播</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:switch_page('直播','live.php');" ><i class="layui-icon"></i>直播页</a></dd>
                        <dd><a href="javascript:switch_page('录播','record.html');"><i class="layui-icon"></i>录播页</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;"><i class="layui-icon"></i>其他页面</a>
                    <dl class="layui-nav-child" id="other_pages">
                    </dl>
                </li>
            </ul>
 
        </div>
    </div>
    <!-- body -->
    <div class="layui-body my-body">
        <div class="layui-tab layui-tab-card my-tab" lay-filter="card" lay-allowClose="true">
            <ul class="layui-tab-title">
                <li class="layui-this" lay-id="1"><span id="page_name"><i class="layui-icon"></i>欢迎页</span></li>
            </ul>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <iframe id="iframe" src="welcome.html" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->
    <div class="layui-footer my-footer">
        <p>HLS直播系统 云南大学软件学院 v2.0</p>
    </div>
</div>

<script type="text/javascript" src="./layui/layui.js"></script>
<script type="text/javascript" src="./js/index_functions.js"></script>
<script type="text/javascript">
    if (<?php if ($_SESSION['user'] == 'yuhao') echo '1';  else echo '0';?>) {
        layui.use('jquery',function (){
            var $ = layui.jquery;
            var dd = $('<dd></dd>');
            var a = $("<a href=\"javascript:switch_page('用户查询','user.php');\" ><i class='layui-icon'></i>用户查询</a>");
            $('#other_pages').append(dd.append(a));
        });
    }
</script>
</body>
</html>