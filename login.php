<?php
session_start();
//获取post的数据
$account = $_POST['account'];
$pwd = $_POST['password'];
$hash_pwd = hash("sha256",$pwd);
//连接数据库
$db = new mysqli('localhost','root','','live');
$db->query("SET NAMES UTF8");
$sql = "select * from t_user where user = \"{$account}\"";

try {
    $result = $db->query($sql);
    $user = $result->fetch_row();

    $db->close();

    if(!empty($user)&&$hash_pwd == $user[2]){
        $_SESSION['user'] = $account;
        echo '1';
    }else{
        echo '0';
    }
} catch (Exception $e) {
    $db->close();
    echo "0";
}
?>