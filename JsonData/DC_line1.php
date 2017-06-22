<?php

header('Content-type: text/json; charset=utf-8');

function __autoload($class_name) {
    include '../class/' . $class_name . '.php';
}
include '../template/plugins/function_date.php';
if (empty($_POST['year'])) {
                        if($date >= $bdate and $date <= $edate){
                          $year = $Yy;
                        $years = $year + 543;      
                            }else{
                        $year = date('Y');
                        $years = $year + 543;
                        
                            }
                    } else {
                        $year = $_POST['year'] - 543;
                        $years = $year + 543;
                    }
$conn_DB = new EnDeCode();
$read = "../connection/conn_DB.txt";
$conn_DB->para_read($read);
$conn_db = $conn_DB->Read_Text();
$conn_DB->conn_PDO();
set_time_limit(0);
$num_category = "select count(category) as count_cate from category";
$conn_DB->imp_sql($num_category);
$count_cate = $conn_DB->select_a();
$count_categ = $count_cate['count_cate'];
$rslt = array();
$series = array();

$I = 10;
for ($c = 1; $c <= $count_categ; $c++) {
    $sql_name = "select name from category where category='$c'";
    $conn_DB->imp_sql($sql_name);
    $cat_name = $conn_DB->select_a();
$countnum = array();
$cc=0;
    for ($i = -2; $i <= 9; $i++) {
        if($I>12){ $I=10;}
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
            $sql = "select count(takerisk_id) as number_risk from takerisk t1  
                    LEFT OUTER JOIN category c1 on c1.category = t1.category
                    where  t1.category='$c' and t1.take_date between '$month_start' and '$month_end' 
                    and t1.move_status='N' order by number_risk DESC";
            $conn_DB->imp_sql($sql);
            $rs = $conn_DB->select_a();
            $countnum[$cc]= (int) $rs['number_risk'];
        $I++;$cc++;
    }
    $series['name'] = $cat_name['name'];
    $series['data'] = $countnum;
    
array_push($rslt, $series);
}
print json_encode($rslt);
$conn_DB->close_PDO();