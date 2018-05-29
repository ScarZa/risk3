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
$sql="select * from takerisk t1
     inner join subcategory s1 on t1.subcategory=s1.subcategory
     Where  t1.move_status='Y' and t1.recycle='N' ORDER BY t1.takerisk_id DESC "; 
$conn_DB->imp_sql($sql);
    $num_risk = $conn_DB->select();
    for($i=0;$i<count($num_risk);$i++){
    $series['risk_id'] = $num_risk[$i]['takerisk_id'];
    $series['risk_name']= substr($num_risk[$i]['name'],0,300);
    $series['take_date']= DateThai1($num_risk[$i]['take_date']);
    $series['rec_date']= DateThai1($num_risk[$i]['take_rec_date']);
    //$series['detail_id'] = $conn_DB->sslEnc($num_risk[$i]['takerisk_id']);
    //$series['detail_id'] = $num_risk[$i]['takerisk_id'];
    array_push($rslt, $series);    
    }
print json_encode($rslt);
$conn_DB->close_PDO();