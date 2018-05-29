<?php

session_save_path("../session/");
session_start();

function __autoload($class_name) {
    include '../class/' . $class_name . '.php';
}

set_time_limit(0);
$connDB = new EnDeCode();
$read = "../connection/conn_DB.txt";
$connDB->para_read($read);
$connDB->Read_Text();
$connDB->conn_PDO();

function insert_date($take_date_conv) {
    $take_date = explode("-", $take_date_conv);
    $take_date_year = @$take_date[2] - 543;
    $take_date = "$take_date_year-" . @$take_date[1] . "-" . @$take_date[0] . "";
    return $take_date;
}

$method = isset($_POST['method']) ? $_POST['method'] : $_GET['method'];
if ($method == 'add_evaluate') {
    $length = $_POST['length'];
    $words = $_POST['words'];
    
    $data = array($length,$words);
    $table = "evaluate";
    $add_evaluate = $connDB->insert($table, $data);
    $connDB->close_PDO();
    if ($add_evaluate == false) {
        echo "Insert not complete " .$add_evaluate->errorInfo();
    } else {
        echo "บันทึกระยะเวลาเรียบร้อยครับ!!!!";
    }
}elseif ($method == 'edit_evaluate') {
    $eval_id = $_POST['eval_id'];
    $length = $_POST['length'];
    $words = $_POST['words'];
    
    $table = "evaluate";
    $where = "eval_id=:eval_id";
    $execute=array(':eval_id' => $eval_id);
    $data = array($length,$words);
    $field=array("length","words");
    $edit_evaluate=$connDB->update($table, $data, $where, $field, $execute);    
    if ($edit_evaluate == false) {
        echo "Update not complete " .$edit_evaluate->errorInfo();
    } else {
        echo "แก้ไขระยะเวลาเรียบร้อยครับ!!!!";
    }
}
$connDB->close_PDO();