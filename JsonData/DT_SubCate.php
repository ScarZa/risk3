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
$sql="SELECT s.subcategory,c.name as cate_name,s.name as subcate_name
FROM subcategory s
LEFT OUTER JOIN category c on c.category=s.category"; 
$conn_DB->imp_sql($sql);
    $num_risk = $conn_DB->select();
    for($i=0;$i<count($num_risk);$i++){
    $series['subcategory'] = $num_risk[$i]['subcategory'];
    $series['cate_name'] = $num_risk[$i]['cate_name'];
    $series['subcate_name']= $num_risk[$i]['subcate_name'];
    
    array_push($rslt, $series);    
    }
print json_encode($rslt);
$conn_DB->close_PDO();