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
$sql = "SELECT rs_id,rs_value,rs_wards FROM results where rs_group=1";

    $conn_DB->imp_sql($sql);
    $LevelRisk = $conn_DB->select();
    print json_encode($LevelRisk);
$conn_DB->close_PDO();
?>