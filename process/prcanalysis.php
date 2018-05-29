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
if ($method == 'add_analysis') {
    $topic = $_POST['topic'];
    $detail = $_POST['detail'];
    
    $data = array($topic,$detail);
    $table = "analysis";
    $add_analysis = $connDB->insert($table, $data);
    $connDB->close_PDO();
    if ($add_analysis == false) {
        echo "Insert not complete " .$add_analysis->errorInfo();
    } else {
        echo "บันทึกผลการวิเคราะห์เรียบร้อยครับ!!!!";
    }
}elseif ($method == 'edit_analysis') {
    $analysis_id = $_POST['analysis_id'];
    $topic = $_POST['topic'];
    $detail = $_POST['detail'];
    
    $table = "analysis";
    $where = "analysis_id=:analysis_id";
    $execute=array(':analysis_id' => $analysis_id);
    $data = array($topic,$detail);
    $field=array("topic","detail");
    $edit_analysis=$connDB->update($table, $data, $where, $field, $execute);    
    if ($edit_analysis == false) {
        echo "Update not complete " .$edit_analysis->errorInfo();
    } else {
        echo "แก้ไขผลการวิเคราะห์เรียบร้อยครับ!!!!";
    }
}
$connDB->close_PDO();