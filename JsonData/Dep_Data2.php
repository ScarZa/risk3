<?php
session_save_path("../session/");
session_start(); 
header('Content-type: text/json; charset=utf-8');

function __autoload($class_name) {
    include '../class/' . $class_name . '.php';
}
$conn_DB = new EnDeCode();
$read = "../connection/conn_DB.txt";
$conn_DB->para_read($read);
$conn_db = $conn_DB->Read_Text();
$conn_DB->conn_PDO();
$data = isset($_GET['data'])?$_GET['data']:'';
if(empty($data)){
    $code='';
} else {
    $code="WHERE dep_id=".$data;
}
$sql = "SELECT dep_id,name,main_dep FROM department ".$code;

    $conn_DB->imp_sql($sql);
    $dep = $conn_DB->select();
    print json_encode($dep);
$conn_DB->close_PDO();
?>