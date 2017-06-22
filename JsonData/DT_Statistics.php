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
if (empty($_POST['year'])) {
    if ($date >= $bdate and $date <= $edate) {
        $year = $Yy;
        $years = $year + 543;
    } else {
        $year = date('Y');
        $years = $year + 543;
    }
} else {
    $year = $_POST['year'] - 543;
    $years = $year + 543;
}
$rslt = array();
$series = array();
$c = 1;
$cc = 0;
$I = 10;
for ($i = -2; $i <= 9; $i++) {
    $sqlMonth = "select * from month where m_id='$i' order by m_id desc";
    $conn_DB->imp_sql($sqlMonth);
    $month = $conn_DB->select_a();

    if ($i <= 0) {
        $month_start = "$Y-$I-01";
        $month_end = "$Y-$I-31";
    } elseif ($i >= 1 and $i <= 9) {
        $month_start = "$year-0$i-01";
        $month_end = "$year-0$i-31";
    } else {
        $month_start = "$year-$i-01";
        $month_end = "$year-$i-31";
    }
    if (!empty($year)) {
        $sql = "select count(takerisk_id) as number_risk
		from takerisk t1  
		LEFT OUTER JOIN category c1 on c1.category = t1.category
		where t1.take_date between '$month_start' and '$month_end' and t1.move_status='N' order by number_risk DESC";
    } else {
        $sql = "select count(takerisk_id) as number_risk from takerisk t1  
		LEFT OUTER JOIN category c1 on c1.category = t1.category
		where t1.take_date between '$month_start' and '$month_end' and t1.move_status='N' order by number_risk DESC";
    }
    $conn_DB->imp_sql($sql);
    $num_risk = $conn_DB->select_a();
    $series['month_name'] = $month['month_name'];
    $series['num_rm'] = (int) $num_risk['number_risk'];
    //print_r($series);
    array_push($rslt, $series);
    $c++;$cc++;$I++;
}
print json_encode($rslt);
$conn_DB->close_PDO();
/*$datajson = array(
    array('month_name' => 'ตุลาคม', 'เรื่อง' => 123),
    array('month_name' => 'พฤศจิกายน', 'เรื่อง' => 231),
    array('month_name' => 'ธันวาคม', 'เรื่อง' => 312),
    array('month_name' => 'มกราคม', 'เรื่อง' => 312),
    array('month_name' => 'กุมภาพันธ์', 'เรื่อง' => 312),
    array('month_name' => 'มีนาคม', 'เรื่อง' => 312),
    array('month_name' => 'เมษายน', 'เรื่อง' => 312),
    array('month_name' => 'พฤษภาคม', 'เรื่อง' => 312),
    array('month_name' => 'มิถุนายน', 'เรื่อง' => 312),
    array('month_name' => 'กรกฎาคม', 'เรื่อง' => 312),
    array('month_name' => 'สิงหาคม', 'เรื่อง' => 312),
    array('month_name' => 'กันยายน', 'เรื่อง' => 312)
);
print json_encode($datajson);*/
?>

