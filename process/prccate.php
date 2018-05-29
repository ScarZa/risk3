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
if ($method == 'add_Cate') {
    $name = $_POST['name'];
    
    $data = array($name);
    $table = "category";
    $add_cate = $connDB->insert($table, $data);
    $connDB->close_PDO();
    if ($add_cate == false) {
        echo "Insert not complete " .$add_cate->errorInfo();
    } else {
        echo "บันทึกหมวดความเสี่ยงเรียบร้อยครับ!!!!";
    }
}elseif ($method == 'add_Subcate') {
    $category = $_POST['category'];
    $name = $_POST['name'];
    
    $data = array($name,$category);
    $table = "subcategory";
    $add_subcate = $connDB->insert($table, $data);
    $connDB->close_PDO();
    if ($add_subcate == false) {
        echo "Insert not complete " .$add_subcate->errorInfo();
    } else {
        echo "บันทึกรายการความเสี่ยงเรียบร้อยครับ!!!!";
    }
}elseif ($method == 'edit_Cate') {
    $category = $_POST['category'];
    $name = $_POST['name'];
    
    $table = "category";
    $where = "category=:category";
    $execute=array(':category' => $category);
    $data = array($name);
    $field=array("name");
    $edit_cate=$connDB->update($table, $data, $where, $field, $execute);    
    if ($edit_cate == false) {
        echo "Update not complete " .$edit_cate->errorInfo();
    } else {
        echo "แก้ไขหมวดเรียบร้อยครับ!!!!";
    }
}elseif ($method == 'edit_Subcate') {
    $category = $_POST['category'];
    $subcategory = $_POST['subcategory'];
    $name = $_POST['name'];
    
    $table = "subcategory";
    $where = "subcategory=:subcategory";
    $execute=array(':subcategory' => $subcategory);
    $data = array($category,$name);
    $field=array("category","name");
    $edit_Subcate=$connDB->update($table, $data, $where, $field, $execute);    
    if ($edit_Subcate == false) {
        echo "Update not complete " .$edit_Subcate->errorInfo();
    } else {
        echo "แก้ไขรายการความเสี่ยงเรียบร้อยครับ!!!!";
    }
}
$connDB->close_PDO();