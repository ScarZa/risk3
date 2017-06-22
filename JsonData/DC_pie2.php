<?php

header('Content-type: text/json; charset=utf-8');

function __autoload($class_name) {
    include '../class/' . $class_name . '.php';
}

include '../template/plugins/function_date.php';

$conn_DB = new EnDeCode();
$read = "../connection/conn_DB.txt";
$conn_DB->para_read($read);
$conn_db = $conn_DB->Read_Text();
$conn_DB->conn_PDO();
set_time_limit(0);

$series = array();
$data = array();
if (empty($_POST['year'])) {
    if ($date >= $bdate and $date <= $edate) {
        $y = $Yy;
        $Y = date("Y");
    } else {
        $y = date("Y");
        $Y = date("Y") - 1;
    }
} else {
    $y = $_POST['year'] - 543;
    $Y = $y - 1;
}
$date_start = "$Y-10-01";
$date_end = "$y-09-30";
$sql = "SELECT COUNT( takerisk_id ) AS pp, level_risk AS dd
FROM takerisk 
WHERE recycle =  'N' and  level_risk!='' and take_date between '$date_start' and '$date_end' and move_status='N'
GROUP BY level_risk
ORDER BY dd ASC";
$conn_DB->imp_sql($sql);
$rs = $conn_DB->select();
for ($i = 0; $i < count($rs); $i++) {
    $series[$i] = array($rs[$i]['dd'], (int) $rs[$i]['pp']);
}
$jsonArray = array(
    array('name' => 'เกิดขึ้น',
        'data' => $series));
print json_encode($jsonArray);
$conn_DB->close_PDO();
