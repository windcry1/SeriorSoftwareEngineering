<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $file = $_POST['filename'];
    if ($file) {
        if (!is_dir($file)) {
            unlink($file);
            echo '1';
        } else {
            echo '0';
        }
    }
} else {
    //目录
    $path = './record/';
    //扫描目录下文件
    $files = scandir($path);
    //生成数组保存数据
    $data_result = array();
    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
            $filetime = date("Y-m-d H:i:s",filemtime($path.$file));
            $filesize = filesize($path.$file);
            //每一项数据
            $dictarray = array("filename"=>$file, "filetime" => $filetime, "filesize" => $filesize);
            //插入结果数组
            array_push($data_result, $dictarray);
        }
    }
    //formot
    $result = array("code" => 0, "data" => $data_result);
    $json = json_encode($result);
    echo ($json);
}
?>