<?php

session_save_path("../session/");
session_start();

function __autoload($class_name) {
    include '../class/' . $class_name . '.php';
}
include '../function/string_to_ascii.php';
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
if ($method == 'add_user') {
    $user_fname = $_POST['user_fname'];
    $user_lname = $_POST['user_lname'];
    $dep_id = $_POST['dep_id'];
    $admin = $_POST['admin'];
    $user_name = filter_input(INPUT_POST, 'user_account',FILTER_SANITIZE_STRING);
    $user_account = md5(string_to_ascii(trim($user_name)));
    $user_pwd = md5(string_to_ascii(trim(filter_input(INPUT_POST, 'user_pwd',FILTER_SANITIZE_STRING))));
    $sql = "SELECT main_dep FROM department WHERE dep_id=".$dep_id ;
    $connDB->imp_sql($sql);
    $result = $connDB->select_a();
    $main_dep = $result['main_dep'];
    $newname = new upload_resizeimage("file", "../USERimgs", "USimage".date("dmYHis"));
    $img = $newname->upload(); 
    if($img != FALSE){
        $photo = $img;
    } else {
        $photo = '';
    }
    $data = array($user_fname, $user_lname, $user_name, $user_account,$user_pwd, $dep_id,$main_dep,$admin,NULL,NULL,$photo);
    $table = "user";
    $add_user = $connDB->insert($table, $data);
    $connDB->close_PDO();
    if ($add_user == false) {
        echo "Insert not complete " .$add_user->errorInfo();
    } else {
        echo "เพิ่มผู้ใช้เรียบร้อยครับ!!!!";
    }
}elseif ($method == 'edit_user') {
    $user_id = $_POST['user_id'];
    $user_fname = $_POST['user_fname'];
    $user_lname = $_POST['user_lname'];
    $dep_id = isset($_POST['dep_id'])?$_POST['dep_id']:'';
    $admin = isset($_POST['admin'])?$_POST['admin']:'';
    $user_name = filter_input(INPUT_POST, 'user_account',FILTER_SANITIZE_STRING);
    $user_account = md5(string_to_ascii(trim($user_name)));
    $user_pwd = $_POST['user_pwd']!=''?md5(string_to_ascii(trim(filter_input(INPUT_POST, 'user_pwd',FILTER_SANITIZE_STRING)))):'';
    if(!empty($dep_id) && !empty($admin)){
    $sql = "SELECT main_dep FROM department WHERE dep_id=".$dep_id ;
    $connDB->imp_sql($sql);
    $result = $connDB->select_a();
    $main_dep = $result['main_dep'];
    }
    if(empty($user_pwd)){
    $data = array($user_fname, $user_lname, $user_name, $user_account);
    $field=array("user_fname", "user_lname", "user_name", "user_account");
    }else{
    $data = array($user_fname, $user_lname, $user_name, $user_account,$user_pwd);
    $field=array("user_fname", "user_lname", "user_name", "user_account","user_pwd");
    }
    if (!empty($_FILES["file"]["type"])) {
    $del_photo="select photo from user where user_id=:user_id";
                $connDB->imp_sql($del_photo);
                $execute=array(':user_id' => $user_id);
                $result=$connDB->select_a($execute);
                if(!empty($result['photo'])){
                $location="../USERimgs/".$result['photo'];
                include '../function/delet_file.php';
                fulldelete($location);}
                $newname = new upload_resizeimage("file", "../USERimgs", "USimage".date("dmYHis"));
                $img = $newname->upload(); 
                if($img != FALSE){
                    array_push($data,$img);
                    array_push($field,"photo");
                } 
}    
    if(!empty($dep_id) && !empty($admin)){
                    array_push($data,$dep_id,$main_dep,$admin);
                    array_push($field,"dep_id","main_dep","admin");
                } 
    $table = "user";
    $where="user_id=:user_id";
    $execute=array(':user_id' => $user_id);
    $edit_user=$connDB->update($table, $data, $where, $field, $execute);    
    if ($edit_user == false) {
        echo "Update not complete " .$edit_user->errorInfo();
    } else {
        echo "แก้ไขผู้ใช้สำเร็จครับ!!!!";
    }
}
$connDB->close_PDO();