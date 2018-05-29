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

    $series['month']=$month;
    print json_encode($series);
    $conn_DB->close_PDO();
                    ?>