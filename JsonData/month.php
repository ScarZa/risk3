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
$rslt = array();
$series = array();
$month= array();
    for ($i = -2; $i <= 9; $i++) {

                        $sqlMonth = "select * from month where m_id='$i'";
                        $conn_DB->imp_sql($sqlMonth);
                        $monthdata=$conn_DB->select_a();
    $month[]=$monthdata['month_short'];
    }
    
    include_once '../template/plugins/function_date.php';
    include_once '../template/plugins/funcDateThai.php';
    if (empty($_GET['year'])) {
     if($date >= $bdate and $date <= $edate){
                             $y= $Yy;
                             $Y= date("Y");
                             $year = $Yy;
                             $years = $year + 543;
                            }else{
                            $y = date("Y");
                            $Y = date("Y") - 1;
                            $year = date('Y');
                            $years = $year + 543;
                            }
                        } else {
                            $YeaR=$_GET['year'];
                            $y = $_GET['year'] - 543;
                            $Y = $y - 1;
                            $year = $_POST['year'] - 543;
                            $years = $year + 543;
                        }
    $series['year']=$years;
    $series['month']=$month;
    print json_encode($series);
    $conn_DB->close_PDO();
                    ?>