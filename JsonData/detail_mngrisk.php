<?php session_save_path("../session/");
session_start(); 
header('Content-type: text/json; charset=utf-8');
function __autoload($class_name) {
    include '../class/' . $class_name . '.php';
}
include_once ('../template/plugins/funcDateThai.php');
set_time_limit(0);
$conn_DB= new EnDeCode();
$read="../connection/conn_DB.txt";
$conn_DB->para_read($read);
$conn_DB->Read_Text();
$conn_DB->conn_PDO();
$rslt=array();
$result=array();
$data = isset($_GET['data'])?$_GET['data']:'';
$mngrisk_id = $data;
//echo $takerisk_id = $conn_DB->sslDec($data);
//$takerisk_id = '10839';
$sql="select concat(u.user_fname,' ',u.user_lname)user_edit, m.mng_date,m.incident_old,m.incident_differ,m.edit_summary,m.edit_process,m.evaluate,m.check_date,m.admin_check
    ,if(ISNULL(r.rs_wards),'ยังไม่ได้ประเมิน',r.rs_wards)rs_wards
    from mngrisk m
    inner join takerisk t on m.takerisk_id=t.takerisk_id
    left join results r on r.rs_id=m.adminchk_id
    inner join department d on t.res_dep=d.dep_id
    left join user u on m.user_edit=u.user_id
where  m.mngrisk_id=:mngrisk_id";
$conn_DB->imp_sql($sql);
$execute=array(':mngrisk_id' => $mngrisk_id);
$result=$conn_DB->select_a($execute);
$result['mngdate']= DateThai2($result['mng_date']);
$result['chkdate']= DateThai2($result['check_date']);
$result['rm_status'] = $_SESSION['rm_status'];
print json_encode($result);
$conn_DB->close_PDO();
?>