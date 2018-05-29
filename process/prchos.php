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
if ($method == 'edit_hos') {
    $name = $_POST['name'];
    $name2 = $_POST['name2'];
    $manager = $_POST['manager'];
    $url = $_POST['url'];

    $data = array($name,$name2, $manager, $url,);
    $field=array("name","name2", "manager", "url",);
    if (!empty($_FILES["file"]["type"])) {
    $del_photo="select logo from hospital where hospital=:hospital";
                $connDB->imp_sql($del_photo);
                $execute=array(':hospital' => 1);
                $result=$connDB->select_a($execute);
                if(!empty($result['logo'])){
                $location="../logo/".$result['logo'];
                include '../function/delet_file.php';
                fulldelete($location);}
                $newname = new upload_resizeimage("file", "../logo", "logo".date("dmYHis"));
                $img = $newname->upload(); 
                if($img != FALSE){
                    array_push($data,$img);
                    array_push($field,"logo");
                } 
}    
    $table = "hospital";
    $where="hospital=:hospital";
    $execute=array(':hospital' => 1);
    $edit_user=$connDB->update($table, $data, $where, $field, $execute);    
    if ($edit_user == false) {
        echo "Update not complete " .$edit_user->errorInfo();
    } else {
        echo "แก้ไของค์กรสำเร็จครับ!!!!";
    }
}
$connDB->close_PDO();