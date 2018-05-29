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
$sql="SELECT d.dep_id,dg.dep_name,d.name
FROM department d
LEFT OUTER JOIN department_group dg on dg.main_dep=d.main_dep
ORDER BY dg.main_dep"; 
$conn_DB->imp_sql($sql);
    $num_risk = $conn_DB->select();
    for($i=0;$i<count($num_risk);$i++){
    $series['dep_id'] = $num_risk[$i]['dep_id'];
    $series['dep_name'] = $num_risk[$i]['dep_name'];
    $series['name']= $num_risk[$i]['name'];
    
    array_push($rslt, $series);    
    }
print json_encode($rslt);
$conn_DB->close_PDO();