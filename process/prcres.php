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
if ($method == 'add_result') {
    $rs_group = $_POST['rs_group'];
    $rs_value = $_POST['rs_value'];
    $rs_wards = $_POST['rs_wards'];
    
    $data = array($rs_group,$rs_value,$rs_wards);
    $table = "results";
    $add_result = $connDB->insert($table, $data);
    $connDB->close_PDO();
    if ($add_result == false) {
        echo "Insert not complete " .$add_result->errorInfo();
    } else {
        echo "บันทึกผลการประเมินเรียบร้อยครับ!!!!";
    }
}elseif ($method == 'edit_result') {
    $rs_id = $_POST['rs_id'];
    $rs_group = $_POST['rs_group'];
    $rs_value = $_POST['rs_value'];
    $rs_wards = $_POST['rs_wards'];
    
    $table = "results";
    $where = "rs_id=:rs_id";
    $execute=array(':rs_id' => $rs_id);
    $data = array($rs_group,$rs_value,$rs_wards);
    $field=array("rs_group","rs_value","rs_wards");
    $edit_result=$connDB->update($table, $data, $where, $field, $execute);    
    if ($edit_result == false) {
        echo "Update not complete " .$edit_result->errorInfo();
    } else {
        echo "แก้ไขผลการประเมินเรียบร้อยครับ!!!!";
    }
}
$connDB->close_PDO();