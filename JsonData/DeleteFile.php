<?php
header('Content-type: text/json; charset=utf-8');

function __autoload($class_name) {
    include '../class/' . $class_name . '.php';
}
$conn_DB = new EnDeCode();
$read = "../connection/conn_DB.txt";
$conn_DB->para_read($read);
$conn_db = $conn_DB->Read_Text();
$conn_DB->conn_PDO();
$table=$_POST['table'];
$field=$_POST['field'];
$id=$_POST['id'];
$where=$field."=:".$field;
$execute=  array(':'.$field => $id);
$del=$conn_DB->delete($table, $where , $execute);
if($del==true){
    echo 'ลบสำเร็จครับ';
}
$conn_DB->close_PDO();
?>