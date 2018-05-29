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
if (empty($_GET['data'])) {
                    if($date >= $bdate and $date <= $edate){
                             $y= $Yy;
                             $Y= date("Y");
                            }else{
                            $y = date("Y");
                            $Y = date("Y") - 1;
                            }
                        } else {
                            $y = $_GET['data'] - 543;
                            $Y = $y - 1;
                        }
                        $date_start = "$Y-10-01";
                        $date_end = "$y-09-30";
$sql="select count(t1.takerisk_id) as number_risk,d1.dep_id,d1.name as dep_name 
from takerisk t1
LEFT OUTER JOIN department d1 on t1.take_dep = d1.dep_id
where t1.move_status='N' and t1.recycle='N' and (t1.take_date between '$date_start' and '$date_end')
group by d1.dep_id order by number_risk DESC,dep_id ASC"; 
$conn_DB->imp_sql($sql);
    $num_risk = $conn_DB->select();
    for($i=0;$i<count($num_risk);$i++){
    $series['dep_id'] = $num_risk[$i]['dep_id'];
    $series['dep_name']= $num_risk[$i]['dep_name'];
    $series['number_risk']= $num_risk[$i]['number_risk'];
    array_push($rslt, $series);    
    }
print json_encode($rslt);
$conn_DB->close_PDO();