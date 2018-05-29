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
if ($method == 'add_level') {
    $group_LV = $_POST['group_LV'];
    $level_risk = $_POST['level_risk'];
    $name = $_POST['name'];
    
    $data = array($group_LV,$level_risk,$name);
    $field=array("group_LV","level_risk","name");
    $table = "level_risk";
    $add_level = $connDB->insert($table, $data, $field);
    $connDB->close_PDO();
    if ($add_level == false) {
        echo "Insert not complete " .$add_level->errorInfo();
    } else {
        echo "บันทึกระดับความรุนแรงเรียบร้อยครับ!!!!";
    }
}elseif ($method == 'edit_level') {
    $num = $_POST['num'];
    $group_LV = $_POST['group_LV'];
    $level_risk = $_POST['level_risk'];
    $name = $_POST['name'];
    
    $table = "level_risk";
    $where = "num=:num";
    $execute=array(':num' => $num);
    $data = array($group_LV,$level_risk,$name);
    $field=array("group_LV","level_risk","name");
    $edit_level=$connDB->update($table, $data, $where, $field, $execute);    
    if ($edit_level == false) {
        echo "Update not complete " .$edit_level->errorInfo();
    } else {
        echo "แก้ไขระดับความรุนแรงเรียบร้อยครับ!!!!";
    }
}
$connDB->close_PDO();