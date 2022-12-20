<?php
session_start();
header("Last-Modified:".gmdate( "D,d M Y H:i:s")."GMT");
header("Cache-Control:no-cache,must-revalidate");
?>
<html lang="zh">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <head>
        <title>HLS直播演示</title>
        <link href="./css/live.css" rel="stylesheet">
        <link href="./css/video-js.min.css" rel="stylesheet">
        <script src="./js/video.min.js"></script>
        <script src="./js/videojs-contrib-hls.js"></script>
    </head>
    <body>

        <div id="inlinecontainer">

            <div class="container">
                <video id="video1" class="video-js vjs-default-skin vjs-big-play-centered" preload="auto" controls>
                    <source src="http://localhost/hls/user1.m3u8" type="application/x-mpegURL">
                </video>
                <div class="text">
                    <br />
                    用户1的直播
                </div>
            </div>

            <div class="container">
                <video id="video2" class="video-js vjs-default-skin vjs-big-play-centered" preload="auto" controls>
                    <source src="http://localhost/hls/user2.m3u8" type="application/x-mpegURL">
                </video>
                <div class="text">
                    <br />
                    用户2的直播
                </div>
            </div>

        </div>

        <script type="text/javascript">
            var player1 = videojs('video1');
            var player2 = videojs('video2');
        </script>
    </body>
</html>