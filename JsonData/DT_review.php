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
$takerisk_id = $_GET['data'];
$sql="SELECT m.mngrisk_id,m.mng_date,CONCAT(u.user_fname,' ',u.user_lname)fullname,m.evaluate,m.check_date
    ,if(m.admin_check='','ยังไม่ได้ประเมิน','ประเมินแล้ว')ass
FROM mngrisk m
LEFT JOIN user u on u.user_id=m.user_edit
WHERE m.takerisk_id=$takerisk_id"; 
$conn_DB->imp_sql($sql);
    $num_risk = $conn_DB->select();
    for($i=0;$i<count($num_risk);$i++){
    $series['mngrisk_id'] = $num_risk[$i]['mngrisk_id'];
    $series['mng_date']= DateThai1($num_risk[$i]['mng_date']);
    $series['fullname']= $num_risk[$i]['fullname'];
    $series['evaluate']= $num_risk[$i]['evaluate'];
    $series['check_date']= DateThai1($num_risk[$i]['check_date']);
    $series['ass']= $num_risk[$i]['ass'];
    array_push($rslt, $series);    
    }
print json_encode($rslt);
$conn_DB->close_PDO();