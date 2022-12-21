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
        <script src="./layui/layui.js"></script>
    </head>
    <body>

        <div id="inlinecontainer">

        </div>

        <script type="text/javascript">
            layui.use(['layer','jquery'], function () {
                var $ = layui.jquery;
                var layer = layui.layer;

                var path = './hls/';
                var video_data = 
                    <?php 
                        $path = './hls/';
                        //扫描目录下文件
                        $files = scandir($path);
                        //生成数组保存数据
                        $video_data = array();
                        foreach ($files as $file) {
                            $ext = pathinfo($path.$file)['extension'];
                            if ($ext === 'm3u8') {
                                array_push($video_data, $file);
                            }
                        }
                        echo json_encode($video_data);
                    ?>;
                if (video_data.length == 0) {
                    layer.msg('当前没有直播，请稍后再来！');
                }
                for (let idx = 0; idx < video_data.length; idx++) {
                    var filename = video_data[idx];
                    var url = path + filename;
                    var inlinecontainer = $('#inlinecontainer');

                    var container = $('<div class="container"></div>');

                    inlinecontainer.append(container);

                    var my_video = document.createElement('video');
                    my_video.setAttribute('id', filename);
                    my_video.className = "video video-js vjs-default-skin vjs-big-play-centered";
                    container.append(my_video);

                    var player = videojs(my_video, {
                        controls: true,
                        preload: 'auto',
                        language: 'zh-CN',
                        muted: false,
                        sources: [
                            {
                                src: url,
                                type: "application/x-mpegURL",
                            }
                        ]
                    },function(){
                        console.log('load success');
                    });
                }
            });
        </script>
    </body>
</html>