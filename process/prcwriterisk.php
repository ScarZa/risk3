<?php

session_save_path("../session/");
session_start();

function __autoload($class_name) {
    include '../class/' . $class_name . '.php';
}

set_time_limit(0);
$connDB = new EnDeCode();
$read = "../connection/conn_DB.txt";
$connDB->para_read($read);
$connDB->Read_Text();
$connDB->conn_PDO();

function insert_date($take_date_conv) {
    $take_date = explode("-", $take_date_conv);
    $take_date_year = @$take_date[2] - 543;
    $take_date = "$take_date_year-" . @$take_date[1] . "-" . @$take_date[0] . "";
    return $take_date;
}

$method = isset($_POST['method']) ? $_POST['method'] : $_GET['method'];
if ($method == 'insert_risk') {
    $check_dep = $_SESSION['rm_dep'];
    $take_rec_time = date("H:i:s");
    $subcategory = isset($_POST['subcate']) ? $_POST['subcate'] : '';
    $sql = "SELECT c.category FROM category c INNER JOIN subcategory s ON s.category=c.category WHERE s.subcategory=" . $subcategory . "";
    $connDB->imp_sql($sql);
    $result = $connDB->select_a();
    $hn = isset($_POST['hn']) ? $_POST['hn'] : '';
    $an = isset($_POST['an']) ? $_POST['an'] : '';
    $take_date = isset($_POST['take_date']) ? insert_date($_POST['take_date']) : '';
    $take_time = $_POST['take_hour'].":".$_POST['take_minute'];
    $take_place = isset($_POST['take_place']) ? $_POST['take_place'] : '';
    $res_dep = isset($_POST['res_dep']) ? $_POST['res_dep'] : '';
    $category = $result['category'];
    $take_other = isset($_POST['take_other']) ? $_POST['take_other'] : '';
    $num_risk = $_POST['level_risk'];
    $sql = "SELECT level_risk FROM level_risk WHERE num=".$num_risk;
    $connDB->imp_sql($sql);
    $level_risk = $connDB->select_a();
    $take_detail = isset($_POST['take_detail']) ? $_POST['take_detail'] : '';
    $take_user_rec = $_SESSION['rm_id'];
    $take_rec_date = date("Y-m-d");
    $take_first = isset($_POST['take_first']) ? $_POST['take_first'] : '';
    $take_counsel = isset($_POST['take_counsel']) ? $_POST['take_counsel'] : '';
    $user_id = $_SESSION['rm_id'];
    $newname = new upload_resizeimage("file", "../myfile", "Rimage".date("dmYHis"));
    $img = $newname->upload();
    if($img != FALSE){
        $take_file1=$img;
    } else {
        $take_file1 = '';
    }
    $take_file2 = '';
    $take_file3 = '';

    $data = array($category, $subcategory, $check_dep, $res_dep, $take_place, $level_risk['level_risk'],$num_risk, $hn, $an, $take_date, $take_time, $take_time, $take_detail
        , $take_other, $take_first, $take_counsel, $take_rec_date, $take_rec_time, $take_file1, $take_file2, $take_file3, 'Y', $user_id);
    $table = "takerisk";
    $add_risk = $connDB->insert($table, $data);
//    $data2 = array($add_risk);
//    $table2 = 'mngrisk';
//    $add_mngrisk = $connDB->insert($table2, $data2);
//    if ($add_risk and $add_mngrisk == false) {
//        echo "Insert not complete " . $add_risk->getMessage() . $add_mngrisk->getMessage();
        if ($add_risk == false) {
        echo "Insert not complete " . $add_risk->getMessage();
    } else { 
        echo "บันทึกใบความเสี่ยงสำเร็จครับ!!!!";
    }
} elseif ($method == 'edit_risk') {
    $takerisk_id = isset($_POST['takerisk_id'])?$_POST['takerisk_id']:'';
    $check_dep = isset($_POST['take_dep']) ? $_POST['take_dep'] : '';
    $take_rec_time = date("H:i:s");
    $subcategory = isset($_POST['subcate']) ? $_POST['subcate'] : '';
    $sql = "SELECT c.category FROM category c INNER JOIN subcategory s ON s.category=c.category WHERE s.subcategory=" . $subcategory . "";
    $connDB->imp_sql($sql);
    $result = $connDB->select_a();
    $hn = isset($_POST['hn']) ? $_POST['hn'] : '';
    $an = isset($_POST['an']) ? $_POST['an'] : '';
    $take_date = isset($_POST['take_date']) ? insert_date($_POST['take_date']) : '';
    $take_time = $_POST['take_hour'].":".$_POST['take_minute'];
    $take_place = isset($_POST['take_place']) ? $_POST['take_place'] : '';
    $res_dep = isset($_POST['res_dep']) ? $_POST['res_dep'] : '';
    $category = $result['category'];
    $take_other = isset($_POST['take_other']) ? $_POST['take_other'] : '';
    $num_risk = $_POST['level_risk'];
    $sql = "SELECT level_risk FROM level_risk WHERE num=".$num_risk;
    $connDB->imp_sql($sql);
    $level_risk = $connDB->select_a();
    $take_detail = isset($_POST['take_detail']) ? $_POST['take_detail'] : '';
    $take_user_rec = $_SESSION['rm_id'];
    $take_rec_date = date("Y-m-d");
    $take_first = isset($_POST['take_first']) ? $_POST['take_first'] : '';
    $take_counsel = isset($_POST['take_counsel']) ? $_POST['take_counsel'] : '';
    $user_id = $_SESSION['rm_id'];
    
    if (!empty($_FILES["file"]["type"])) { 
    $del_photo="select take_file1 from takerisk where takerisk_id=:takerisk_id";
                $connDB->imp_sql($del_photo);
                $execute=array(':takerisk_id' => $takerisk_id);
                $result=$connDB->select_a($execute);
                if(!empty($result['take_file1'])){
                $location="../myfile/".$result['take_file1'];
                include '../function/delet_file.php';
                fulldelete($location);}
}
    $newname = new upload_resizeimage("file", "../myfile", "Rimage".date("dmYHis"));
    $img = $newname->upload();
    if($img != FALSE){
        $take_file1=$img;
    } else {
        $take_file1 = '';
    }
    $take_file2 = '';
    $take_file3 = '';
    
if($img != FALSE){
    $data = array($category, $subcategory, $check_dep, $res_dep, $take_place, $level_risk['level_risk'],$num_risk, $hn, $an, $take_date, $take_time, $take_time, $take_detail
        , $take_other, $take_first, $take_counsel, $take_rec_date, $take_rec_time, $take_file1, $take_file2, $take_file3, 'Y', $user_id);
    //$field=array("pd_number","head_no","number","status","name","brand","size","com_id","price","montype_id"
        //,"yearbuy","mon_id","ct_number","group_id","category_id","date_stinsur","regis_date","nbmoth_insur","serial");
    } else {
    $data = array($category, $subcategory, $check_dep, $res_dep, $take_place, $level_risk['level_risk'],$num_risk, $hn, $an, $take_date, $take_time, $take_time, $take_detail
        , $take_other, $take_first, $take_counsel, $take_rec_date, $take_rec_time);
    }
    $table = "takerisk";
    $where="takerisk_id=:takerisk_id";
    $execute=array(':takerisk_id' => $takerisk_id);
    $edit_risk=$connDB->update($table, $data, $where, null, $execute);
    $connDB->close_PDO();
    if ($edit_risk == false) {
        echo "Update not complete " .$edit_risk->errorInfo();
    } else {
        echo "แก้ไขเรียบร้อยครับ!!!!";
    }

} else if ($method == 'warp_risk') {
    $num_risk = $_POST['level_risk'];
    $sql = "SELECT level_risk FROM level_risk WHERE num=".$num_risk;
    $connDB->imp_sql($sql);
    $level_risk = $connDB->select_a();
    $takerisk_id = $_POST['takerisk_id'];
    $date = date("Y-m-d");
    $time = date("H:i:s");
    $chkdate = date('Y-m-d', strtotime("+7 days "));
    
    $data = array($level_risk['level_risk'],$num_risk,'N');
    $field=array("level_risk","LR_id","move_status");
    $table = "takerisk";
    $where="takerisk_id=:takerisk_id";
    $execute=array(':takerisk_id' => $takerisk_id);
    $WarpR=$connDB->update($table, $data, $where, $field, $execute);
    
    $data2 = array($takerisk_id,$_SESSION['rm_id'],7,$date,$time,'Y',$date,$chkdate,1);
    $field2=array("takerisk_id","user_edit","evaluate","mmg_rec_date","mng_rec_time","mng_status","mng_date","check_date","chk_show");
    $table2 = "mngrisk";
//    $where2="takerisk_id=:takerisk_id";
//    $execute2=array(':takerisk_id' => $takerisk_id);
//    $WarpMR=$connDB->update($table2, $data2, $where2, $field2, $execute2);
    $WarpMR=$connDB->insert($table2, $data2, $field2);
    if (($WarpR == false)||($WarpMR == false)) {
    echo "Move not complete ".$WarpR->errorInfo().$WarpMR->errorInfo();
    } else {
        echo "ข้ามไปประเมินสำเร็จครับ!!!!";
    }
} elseif ($method == 'move_risk') {
    $return_date = date("Y-m-d");
    $return_user = $_SESSION['rm_id'];
    $takerisk_id = $_POST['takerisk_id'];
    
    $data = array('Y','Y',$return_user,$return_date);
    $field=array("move_status","return_risk","return_user","return_date");
    $table = "takerisk";
    $where="takerisk_id=:takerisk_id";
    $execute=array(':takerisk_id' => $takerisk_id);
    $MoveR=$connDB->update($table, $data, $where, $field, $execute);
    if ($MoveR == false) {
    echo "Move not complete ".$MoveR->errorInfo();
    } else {
        echo "ส่งคืนเรื่องเรียบร้อยครับ!!!!";
    }
} elseif ($method == 'recycle') {
    $takerisk_id = $_POST['takerisk_id'];
    $detail_recycle = $_POST['detail_recycle'];
    $data = array('Y',$detail_recycle);
    $field=array("recycle","detail_recycle");
    $table = "takerisk";
    $where="takerisk_id=:takerisk_id";
    $execute=array(':takerisk_id' => $takerisk_id);
    $recycleR=$connDB->update($table, $data, $where, $field, $execute);
    if ($recycleR == false) {
        echo "Move not complete ".$recycleR->errorInfo();
    } else {
        echo "ส่งเรื่องลงถังขยะเรียบร้อยครับ!!!!";
    }
} elseif ($method == 'change_risk') {

    $takerisk_id = $_POST['takerisk_id'];
    $res_dep = $_POST['take_dep'];
    $num_risk = $_POST['level_risk'];
    $sql = "SELECT level_risk FROM level_risk WHERE num=".$num_risk;
    $connDB->imp_sql($sql);
    $level_risk = $connDB->select_a();
    //$pct = $_POST[pct];
    //$ic = $_POST[ic];
    $rca = isset($_POST['rca'])?$_POST['rca']:'N';
    $receiver = $_SESSION['rm_id'];
    $receive_date = date('Y-m-d');
    $move_status = 'N';
    $data = array($move_status,$res_dep,$level_risk['level_risk'],$num_risk,$rca,$receiver,$receive_date);
    $field=array("move_status","res_dep","level_risk","LR_id","rca","receiver","receive_date");
    $table = "takerisk";
    $where="takerisk_id=:takerisk_id";
    $execute=array(':takerisk_id' => $takerisk_id);
    $change_risk=$connDB->update($table, $data, $where, $field, $execute);
    if ($change_risk == false) {
        echo "Move not complete ".$change_risk->errorInfo();
    } else {
        echo "ส่งเรื่องเรียบร้อยครับ!!!!";
    }
}elseif ($method == 'forward_risk') {

    $takerisk_id = $_POST['takerisk_id'];
    $res_dep = $_POST['res_dep'];
    $data = array($takerisk_id,$res_dep);
    $field=array("takerisk_id","res_dep");
    $table = "takerisk";
    $where="takerisk_id=:takerisk_id";
    $execute=array(':takerisk_id' => $takerisk_id);
    $change_risk=$connDB->update($table, $data, $where, $field, $execute);
    if ($change_risk == false) {
        echo "Forward not complete ".$change_risk->errorInfo();
    } else {
        echo "ส่งเรื่องต่องานที่เกี่ยวข้องเรียบร้อยครับ!!!!";
    }
}//-------------end process insert update delete
else if ($method == 'review') {
    $takerisk_id = $_POST['takerisk_id'];
    $mng_date = isset($_POST['mng_date']) ? insert_date($_POST['mng_date']) : '';
    $incident_old = $_POST['incident_old'];
                $analysis="select analysis_id from analysis";
                $connDB->imp_sql($analysis);
                $result=$connDB->select();
                $incident_differ='';
                $key='';
                for($i=0;$i<count($result);$i++){ 
                    $key = "check".$result[$i]['analysis_id'];
                    $incident_differ .= isset($_POST[$key])?$_POST[$key]:'';
                    $incident_differ .= ' ';
                }
    $edit_summary = $_POST['edit_summary'];
    $edit_process = $_POST['edit_process'];
    $evaluate = $_POST['evaluate'];
    $eval="select length from evaluate";
                $connDB->imp_sql($eval);
                $result=$connDB->select();
                $check_date='';
                $day = '';
                for($i=0;$i<count($result);$i++){ 
                    $day = $result[$i]['length'];
                    $timecode = "+".$day." days ";
                    if ($evaluate == $day) { $check_date = date('Y-m-d', strtotime($timecode)); }
                }
    $date = date("Y-m-d");
    $time = date("H:i:s");
    
    $data = array(0);
    $field=array("chk_show");
    $table = "mngrisk";
    $where="takerisk_id=:takerisk_id and chk_show=1";
    $execute=array(':takerisk_id' => $takerisk_id);
    $chk_show=$connDB->update($table, $data, $where, $field, $execute);
    
    $data2 = array($takerisk_id,$_SESSION['rm_id'],$incident_old,$incident_differ,$edit_summary,$edit_process,$evaluate,$date,$time,'Y',$date,$check_date,1);
    $field2=array("takerisk_id","user_edit","incident_old","incident_differ","edit_summary","edit_process","evaluate","mmg_rec_date","mng_rec_time","mng_status","mng_date","check_date","chk_show");
    $table2 = "mngrisk";
//    $where2="takerisk_id=:takerisk_id";
//    $execute2=array(':takerisk_id' => $takerisk_id);
    $review=$connDB->insert($table2, $data2, $field2);;
    if ($review == false) {
    echo "Move not complete ".$review->errorInfo();
    } else {
        echo "บันทึกการทบทวนสำเร็จครับ!!!!";
    }
}elseif ($method == 'assessment') {

    $mngrisk_id = $_POST['mngrisk_id'];
    $rs_id = $_POST['check'];
    $sql = "SELECT rs_value FROM results WHERE rs_id=".$rs_id ;
    $connDB->imp_sql($sql);
    $result = $connDB->select_a();
    $admin_check = $result['rs_value'];
    $data = array($admin_check,$rs_id);
    $field=array("admin_check","adminchk_id");
    $table = "mngrisk";
    $where="mngrisk_id=:mngrisk_id";
    $execute=array(':mngrisk_id' => $mngrisk_id);
    $assess_risk=$connDB->update($table, $data, $where, $field, $execute);
    if ($assess_risk == false) {
        echo "Forward not complete ".$assess_risk->errorInfo();
    } else {
        echo "บันทึกการประเมินเรียบร้อยครับ!!!!";
    }
}
?>	<?php $connDB->close_PDO(); ?>
	






