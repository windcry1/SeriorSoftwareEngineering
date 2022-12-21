<?php
#连接数据库
$db = new mysqli('localhost','root','','live');
 
#设置查询数据格式
$db->query("SET NAMES UTF8");
 
#编辑sql语句
$sql = "select * from t_user";

#执行sql 语句
try{
    $result = $db->query($sql);
    $db->close();
    #判断是否注册成功并返回数据
    if ($result) {
        $data_result = array();
        while($row = $result->fetch_assoc()){
            $dictarray = array("uid"=>$row["uid"], "username" => $row["user"]);
            array_push($data_result, $dictarray);
        }
        echo json_encode(array('code' => 0, 'data' => $data_result));
    } else {
        echo "{code:-1}";
    }
} catch (Exception $e) {
    $db->close();
    echo "{code:-1}";
}
 
?>