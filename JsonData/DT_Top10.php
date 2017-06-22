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
$rslt = array();
$series = array();
if (empty($_POST['year'])) {
                    if($date >= $bdate and $date <= $edate){
                             $y= $Yy;
                             $Y= date("Y");
                            }else{
                            $y = date("Y");
                            $Y = date("Y") - 1;
                            }
                        } else {
                            $y = $_POST['year'] - 543;
                            $Y = $y - 1;
                        }
                        $date_start = "$Y-10-01";
                        $date_end = "$y-09-30";
$sql = "select count(t2.takerisk_id) as count_risk  ,concat(u1.user_fname,'  ',u1.user_lname) AS user
	from user  u1 
	LEFT OUTER JOIN takerisk t2 on u1.user_id = t2.user_id
        where  recycle='N' and subcategory!='' and subcategory!='' and t2.move_status='N' and t2.take_date between '$date_start' and '$date_end'
	group by u1.user_id order by count_risk desc limit 10";

    $conn_DB->imp_sql($sql);
    $num_risk = $conn_DB->select();
    for($i=0;$i<count($num_risk);$i++){
    $series['name'] = $num_risk[$i]['user'];
    $series['num_rm'] = (int) $num_risk[$i]['count_risk'];
    array_push($rslt, $series);
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