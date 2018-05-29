<?php
header('Content-type: text/json; charset=utf-8');

function __autoload($class_name) {
    include '../class/' . $class_name . '.php';
}
include_once '../template/plugins/function_date.php';
include_once '../template/plugins/funcDateThai.php';
$conn_DB = new EnDeCode();
$read = "../connection/conn_DB.txt";
$conn_DB->para_read($read);
$conn_db = $conn_DB->Read_Text();
$conn_DB->conn_PDO();
set_time_limit(0);
$rslt = array();
$series = array();
$sql="select u1.user_id,CONCAT(u1.user_fname,' ',u1.user_lname) AS fullname,d1.name AS dep
    ,CASE u1.admin
WHEN 'N' THEN 'ผู้ใช้งานทั่วไป'
WHEN 'A' THEN 'หัวหน้าฝ่าย'
WHEN 'Y' THEN 'คณะกรรมการ/ผู้ดูลระบบ'
ELSE 'ไม่ทราบ' END as status, u1.user_name
    from user u1 
    LEFT OUTER JOIN department d1 ON u1.dep_id=d1.dep_id 
    order by u1.user_fname";
$conn_DB->imp_sql($sql);
    $num_risk = $conn_DB->select();
    for($i=0;$i<count($num_risk);$i++){
    $series['ID'] = $num_risk[$i]['user_id'];
    $series['fullname'] = $num_risk[$i]['fullname'];
    $series['dep']= $num_risk[$i]['dep'];
    $series['status']= $num_risk[$i]['status'];
    $series['user_name']= $num_risk[$i]['user_name'];
    
    array_push($rslt, $series);    
    }
print json_encode($rslt);
$conn_DB->close_PDO();