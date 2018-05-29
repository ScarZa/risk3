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

$category = isset($_GET['data2'])?$_GET['data2']:''; 
$dep = isset($_GET['data3'])?$_GET['data3']:''; 
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
$sql="select count(takerisk_id) as number_risk,r1.level_risk ,r1.num
				 from takerisk t1 
				 LEFT OUTER JOIN level_risk r1 on r1.num = t1.LR_id
				 where  t1.res_dep='$dep' and (t1.take_date between '$date_start' and '$date_end') and t1.category='$category' and t1.move_status='N'
                                group by t1.LR_id order by r1.num desc";
 $conn_DB->imp_sql($sql);
    $num_risk = $conn_DB->select();
    for($i=0;$i<count($num_risk);$i++){
    $series['num'] = $num_risk[$i]['num'];
    $series['level_risk']= $num_risk[$i]['level_risk'];
    $series['number_risk']= $num_risk[$i]['number_risk'];
    array_push($rslt, $series);    
    }
print json_encode($rslt);
$conn_DB->close_PDO();