<?php session_save_path("../session/");
session_start(); 
header('Content-type: text/json; charset=utf-8');
function __autoload($class_name) {
    include '../class/' . $class_name . '.php';
}
include_once ('../template/plugins/funcDateThai.php');
set_time_limit(0);
$conn_DB= new EnDeCode();
$read="../connection/conn_DB.txt";
$conn_DB->para_read($read);
$conn_DB->Read_Text();
$conn_DB->conn_PDO();
//$rslt=array();
$result=array();
$data = isset($_GET['data'])?$_GET['data']:$_POST['data'];
$sql="SELECT user_id,user_fname,user_lname,user_name,dep_id,admin,photo FROM user WHERE user_id= :user_id";
$conn_DB->imp_sql($sql);
$execute=array(':user_id' => $data);
$result=$conn_DB->select_a($execute);
$result['rm_status'] = $_SESSION['rm_status'];
print json_encode($result);
$conn_DB->close_PDO();
?>