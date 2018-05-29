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
if ($method == 'add_Mdep') {
    $dep_name = $_POST['dep_name'];
    
    $data = array($dep_name);
    $table = "department_group";
    $add_Mdep = $connDB->insert($table, $data);
    $connDB->close_PDO();
    if ($add_Mdep == false) {
        echo "Insert not complete " .$add_Mdep->errorInfo();
    } else {
        echo "บันทึกฝ่ายเรียบร้อยครับ!!!!";
    }
}elseif ($method == 'add_dep') {
    $main_dep = $_POST['main_dep'];
    $name = $_POST['name'];
    
    $data = array($name,$main_dep);
    $table = "department";
    $add_dep = $connDB->insert($table, $data);
    $connDB->close_PDO();
    if ($add_dep == false) {
        echo "Insert not complete " .$add_dep->errorInfo();
    } else {
        echo "บันทึกงานเรียบร้อยครับ!!!!";
    }
}elseif ($method == 'edit_Mdep') {
    $main_dep = $_POST['main_dep'];
    $dep_name = $_POST['dep_name'];
    
    $table = "department_group";
    $where = "main_dep=:main_dep";
    $execute=array(':main_dep' => $main_dep);
    $data = array($dep_name);
    $field=array("dep_name");
    $edit_Mdep=$connDB->update($table, $data, $where, $field, $execute);    
    if ($edit_Mdep == false) {
        echo "Update not complete " .$edit_Mdep->errorInfo();
    } else {
        echo "แก้ไขฝ่ายเรียบร้อยครับ!!!!";
    }
}elseif ($method == 'edit_dep') {
    $dep_id = $_POST['dep_id'];
    $main_dep = $_POST['main_dep'];
    $name = $_POST['name'];
    
    $table = "department";
    $where = "dep_id=:dep_id";
    $execute=array(':dep_id' => $dep_id);
    $data = array($main_dep,$name);
    $field=array("main_dep","name");
    $edit_dep=$connDB->update($table, $data, $where, $field, $execute);    
    if ($edit_dep == false) {
        echo "Update not complete " .$edit_dep->errorInfo();
    } else {
        echo "แก้ไขงานเรียบร้อยครับ!!!!";
    }
}
$connDB->close_PDO();