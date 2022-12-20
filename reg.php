<?php
 
#接收表单注册数据
$user = $_POST['user'];
$pwd = $_POST['pwd'];
$hash_pwd = hash("sha256",$pwd);
#连接数据库
$db = new mysqli('localhost','root','','live');
 
#设置查询数据格式
$db->query("SET NAMES UTF8");
 
#编辑sql语句
$sql = "insert into t_user values (null,\"$user\",\"$hash_pwd\")";
 
#执行sql 语句
try{
    $result = $db->query($sql);
    $db->close();
    #判断是否注册成功并返回数据
    if ($result) {
        echo "1";
    }else{
        echo "0";
    }
} catch (Exception $e) {
    $db->close();
    echo "0";
}
 
?>