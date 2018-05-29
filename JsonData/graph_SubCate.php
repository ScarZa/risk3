<?php 
header('Content-type: text/json; charset=utf-8');
function __autoload($class_name) {
    include '../class/'.$class_name.'.php';
}
set_time_limit(0);
$conn_DB= new EnDeCode();
$read="../connection/conn_DB.txt";
$conn_DB->para_read($read);
$conn_db=$conn_DB->Read_Text();
$conn_DB->conn_PDO();
include '../template/plugins/function_date.php';
$rslt = array();
$series = array();
$Subcate= array();
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
$category = isset($_GET['data2'])?$_GET['data2']:''; 
$dep = isset($_GET['data3'])?$_GET['data3']:''; 
$level = isset($_GET['data4'])?$_GET['data4']:''; 
//$dep = 42;
//$level = 3;
$sql="select count(takerisk_id) as number_risk,s1.name as sub_name
				 from takerisk t1
				 LEFT OUTER JOIN subcategory s1 on s1.subcategory = t1.subcategory
				 where t1.LR_id='$level' and t1.res_dep='$dep' and t1.category='$category' and t1.move_status='N' and t1.recycle='N'
				 and (t1.take_date between '$date_start' and '$date_end')
				 group by t1.subcategory order by number_risk DESC,s1.subcategory ASC";
                        $conn_DB->imp_sql($sql);
                        $data=$conn_DB->select();
                        
    for($i=0;$i<count($data);$i++){
    $Subcate[$i] = $data[$i]['sub_name'];
       
    }  
    $series['sub_name'] = $Subcate;
    
    //array_push($rslt, $series); 
    print json_encode($series);
    $conn_DB->close_PDO();
                    ?>