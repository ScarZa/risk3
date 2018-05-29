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
if ($method == 'add_place') {
    $name = $_POST['name'];
    
    $data = array($name);
    $table = "place";
    $add_place = $connDB->insert($table, $data);
    $connDB->close_PDO();
    if ($add_place == false) {
        echo "Insert not complete " .$add_place->errorInfo();
    } else {
        echo "บันทึกสถานที่/กระบวนการเรียบร้อยครับ!!!!";
    }
}elseif ($method == 'edit_place') {
    $place = $_POST['place'];
    $name = $_POST['name'];
    
    $table = "place";
    $where = "place=:place";
    $execute=array(':place' => $place);
    $data = array($name);
    $field=array("name");
    $edit_place=$connDB->update($table, $data, $where, $field, $execute);    
    if ($edit_place == false) {
        echo "Update not complete " .$edit_place->errorInfo();
    } else {
        echo "แก้ไขสถานที่/กระบวนการเรียบร้อยครับ!!!!";
    }
}
$connDB->close_PDO();