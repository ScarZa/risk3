<?php

function __autoload($class_name) {
    include 'class/' . $class_name . '.php';
}
include 'function/string_to_ascii.php';
set_time_limit(0);
$connDB = new EnDeCode();
$read = "connection/conn_DB.txt";
$connDB->para_read($read);
$connDB->Read_Text();
$connDB->conn_PDO();

$sql = "SELECT user_name FROM user";
    $connDB->imp_sql($sql);
    $result = $connDB->select();
    //print_r($result);
    foreach ($result as $key => $value) {
        
        $ss_user_name = md5(string_to_ascii(trim($value['user_name'])));
        $ss_Password = md5(string_to_ascii(trim(1234)));
    $data = array($ss_user_name,$ss_Password);
    $field=array("user_account", "user_pwd");
    $table = "user";
    $where="user_name=:user_name";
    $execute=array(':user_name' => $value['user_name']);
    $edit_user=$connDB->update($table, $data, $where , $field, $execute); 
}

if ($edit_user == false) {
        echo "Update not complete " .$edit_user->errorInfo();
    } else {
        echo "แก้ไขผู้ใช้สำเร็จครับ!!!!";
    }
    $connDB->close_PDO();