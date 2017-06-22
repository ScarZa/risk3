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
$rslt=array();
$result=array();
$data = isset($_GET['data'])?$_GET['data']:'';
$takerisk_id = $data;
//echo $takerisk_id = $conn_DB->sslDec($data);
//$takerisk_id = '7093';
$sql="select concat(u1.user_fname,' ',u1.user_lname) as user_write_name,t1.*,d1.name as department_name ,p1.name as place_name  ,c1.name as category_name ,s1.name as subcategory_name,t1.detail_recycle,t1.recycle 
,t1.move_status,t1.receive_date,
(select concat(u1.user_fname,' ',u1.user_lname) from takerisk t1 LEFT OUTER JOIN user u1 ON u1.user_id=t1.receiver where t1.takerisk_id='$takerisk_id') user_receiver,
(select concat(u1.user_fname,' ',u1.user_lname) from takerisk t1 LEFT OUTER JOIN user u1 ON u1.user_id=t1.return_user where t1.takerisk_id='$takerisk_id') return_user,
(select mng_status from mngrisk where takerisk_id='$takerisk_id') mng_status    
from takerisk t1
LEFT OUTER JOIN department d1 ON d1.dep_id=t1.res_dep
LEFT OUTER JOIN place p1 ON p1.place=t1.take_place
LEFT OUTER JOIN category c1 ON c1.category=t1.category
LEFT OUTER JOIN user u1 ON u1.user_id=t1.user_id
LEFT OUTER JOIN subcategory s1 ON s1.subcategory=t1.subcategory
where t1.takerisk_id= :takerisk_id";
$conn_DB->imp_sql($sql);
$execute=array(':takerisk_id' => $takerisk_id);
$result['detail']=$conn_DB->select_a($execute);
$result['rm_status'] = isset($_SESSION['rm_status'])?$_SESSION['rm_status']:''; 
$result['rm_dep'] = isset($_SESSION['rm_dep'])?$_SESSION['rm_dep']:''; 
//array_push($rslt, $result);
print json_encode($result);
$conn_DB->close_PDO();
?>