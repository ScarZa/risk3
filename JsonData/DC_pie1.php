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
$sql = "select count(t1.takerisk_id) as pp, c1.name as dd from takerisk t1
inner join category c1 on t1.category=c1.category
where t1.category=c1.category and t1.recycle='N' and   t1.take_date between '$date_start' and '$date_end' and t1.move_status='N' 
group by t1.category ORDER BY c1.category ASC";
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
