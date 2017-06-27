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

$method = isset($_POST['data0']) ? $_POST['data0'] : $_GET['method'];
if ($method == 'insert_risk') {
    $check_dep = $_SESSION['rm_dep'];
    $take_rec_time = date("H:i:s");
    $subcategory = isset($_POST['data1']) ? $_POST['data1'] : '';
    $sql = "SELECT c.category FROM category c INNER JOIN subcategory s ON s.category=c.category WHERE s.subcategory=" . $subcategory . "";
    $connDB->imp_sql($sql);
    $result = $connDB->select_a();
    $hn = isset($_POST['data6']) ? $_POST['data6'] : '';
    $an = isset($_POST['data7']) ? $_POST['data7'] : '';
    $take_date = isset($_POST['data2']) ? insert_date($_POST['data2']) : '';
    $take_hour = isset($_POST['data3']) ? $_POST['data3'] : '';
    $take_minute = isset($_POST['data4']) ? $_POST['data4'] : '';
    $take_time = $take_hour . ":" . $take_minute;
    $take_place = isset($_POST['data5']) ? $_POST['data5'] : '';
    $take_dep = isset($_POST['data9']) ? $_POST['data9'] : '';
    $category = $result['category'];
    $take_other = isset($_POST['data8']) ? $_POST['data8'] : '';
    if(isset($_POST['data13'])){
        $level_risk = $_POST['data13'];
    }elseif(isset($_POST['data14'])){
        $level_risk = $_POST['data14'];
    }elseif(isset($_POST['data15'])){
        $level_risk = $_POST['data15'];
    }elseif(isset($_POST['data16'])){
        $level_risk = $_POST['data16'];
    }if(isset($_POST['data17'])){
        $level_risk = $_POST['data17'];
    }elseif(isset($_POST['data18'])){
        $level_risk = $_POST['data18'];
    }if(isset($_POST['data19'])){
        $level_risk = $_POST['data19'];
    }elseif(isset($_POST['data20'])){
        $level_risk = $_POST['data20'];
    }if(isset($_POST['data21'])){
        $level_risk = $_POST['data21'];
    }    
    $take_detail = isset($_POST['data10']) ? $_POST['data10'] : '';
    $take_user_rec = $_SESSION['rm_id'];
    $take_rec_date = date("Y-m-d");
    $take_first = isset($_POST['data11']) ? $_POST['data11'] : '';
    $take_counsel = isset($_POST['data12']) ? $_POST['data12'] : '';
    $user_id = $_SESSION['rm_id'];
    $take_file1 = '';
    $take_file2 = '';
    $take_file3 = '';

    $data = array($category, $subcategory, $check_dep, $take_dep, $take_place, $level_risk, $hn, $an, $take_date, $take_time, $take_time, $take_detail
        , $take_other, $take_first, $take_counsel, $take_rec_date, $take_rec_time, $take_file1, $take_file2, $take_file3, 'Y', $user_id);
    $table = "takerisk";
    $add_risk = $connDB->insert($table, $data);
    $data2 = array($add_risk);
    $table2 = 'mngrisk';
    $add_mngrisk = $connDB->insert($table2, $data2);
    if ($add_risk and $add_mngrisk == false) {
        echo "Insert not complete " . $add_risk->getMessage() . $add_mngrisk->getMessage();
    } else { 
        echo " &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style='color: red;'>Insert complete!!!!</b>";
    }
} elseif ($method == 'update') {
    $takerisk_id = $_POST[takerisk_id];

    $sqlUpdate = mysql_query("update takerisk   SET  take_first='$take_first', take_counsel='$take_counsel',hn='$hn',an='$an',take_date='$take_date',take_time='$take_time',take_time2='$take_time',
		level_risk='$level_risk',take_dep='$take_dep',category='$category',subcategory='$subcategory',take_place='$take_place',
		take_other='$take_other',take_detail='$take_detail' where  takerisk_id='$takerisk_id'");
    if ($sqlUpdate == false) {
        echo "<p>";
        echo "Update not complete" . mysql_error();
        echo "<br />";
        echo "<br />";

        echo "<a href='changeRisk.php' data-role='button' data-icon='back'>กลับ</a>";
    } else {
        echo "<p>&nbsp;</p>	";
        echo "<p>&nbsp;</p>	";
        echo " <div class='bs-example'>
									              <div class='progress progress-striped active'>
									                <div class='progress-bar' style='width: 100%'></div>
									              </div>";
        echo "<div class='alert alert-info alert-dismissable'>
								              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
								               <a class='alert-link' target='_blank' href='#'><center>แก้ไขข้อมูลเรียบร้อย</center></a> 
								            </div>";
        echo" <META HTTP-EQUIV='Refresh' CONTENT='1;URL=changeRisk.php?unset=1'>";
    }
} else if ($method == 'delete') {
    $takerisk_id = $_GET[takerisk_id];
    $sqlDelete = mysql_query("delete FROM  takerisk where  takerisk_id='$takerisk_id'");
    if ($sqlDelete == false) {
        echo "<p>";
        echo "Delete not complete" . mysql_error();
        echo "<br />";
        echo "<br />";

        echo "<a href='index.php' data-role='button' data-icon='back'>กลับ</a>";
    } else {
        echo "<H3>ลบข้อมูลเรียบร้อย</H3>";
        echo "<br />";
        echo "<br />";
        echo" <META HTTP-EQUIV='Refresh' CONTENT='1;URL=index.php'>";
    }
} elseif ($method == 'move_risk') {
    $return_date = date("Y-m-d");
    $return_user = $_SESSION['user_id'];

    $takerisk_id = $_GET[takerisk_id];
    $sqlMove = mysql_query("update takerisk set move_status='Y', return_risk='Y', return_user='$return_user', return_date='$return_date'  where takerisk_id='$takerisk_id' ");
    if ($sqlMove == false) {
        echo "<p>";
        echo "Move not complete" . mysql_error();
        echo "<br />";
        echo "<br />";

        echo "<a href='listRiskInBox.php' data-role='button' data-icon='back'>กลับ</a>";
    } else {
        echo "<p>&nbsp;</p>	";
        echo "<p>&nbsp;</p>	";
        echo " <div class='bs-example'>
									              <div class='progress progress-striped active'>
									                <div class='progress-bar' style='width: 100%'></div>
									              </div>";
        echo "<div class='alert alert-info alert-dismissable'>
								              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
								               <a class='alert-link' target='_blank' href='#'><center>แจ้งย้ายความเสี่ยงเรียบร้อย</center></a> 
								            </div>";
        echo" <META HTTP-EQUIV='Refresh' CONTENT='2;URL=listRiskInBox.php'>";
    }
} elseif ($method == 'recycle') {
    $takerisk_id = $_GET[takerisk_id];
    $detail_recycle = $_GET[detail_recycle];
    $sqlMove = mysql_query("update takerisk set recycle='Y', detail_recycle='$detail_recycle' where takerisk_id='$takerisk_id' ");
    if ($sqlMove == false) {
        echo "<p>";
        echo "Move not complete" . mysql_error();
        echo "<br />";
        echo "<br />";

        echo "<a href='changeRisk.php' data-role='button' data-icon='back'>กลับ</a>";
    } else {
        echo "<p>&nbsp;</p>	";
        echo "<p>&nbsp;</p>	";
        echo " <div class='bs-example'>
									              <div class='progress progress-striped active'>
									                <div class='progress-bar' style='width: 100%'></div>
									              </div>";
        echo "<div class='alert alert-info alert-dismissable'>
								              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
								               <a class='alert-link' target='_blank' href='#'><center>ย้ายความเสี่ยงลงถังขยะเรียบร้อย</center></a> 
								            </div>";
        echo" <META HTTP-EQUIV='Refresh' CONTENT='2;URL=changeRisk.php'>";
    }
} elseif ($method == 'change_risk') {

    $takerisk_id = $_POST['takerisk_id'];
    $res_dep = $_POST['take_dep'];
    $level_risk = $_POST['level_risk'];
    //$pct = $_POST[pct];
    //$ic = $_POST[ic];
    $rca = isset($_POST['rca'])?$_POST['rca']:'N';
    $receiver = $_SESSION['rm_id'];
    $receive_date = date('Y-m-d');
    $move_status = 'N';
    $data = array($move_status,$res_dep,$level_risk,$rca,$receiver,$receive_date);
    $field=array(" move_status","res_dep","level_risk","rca","receiver","receive_date");
    $table = "takerisk";
    $where="takerisk_id=:takerisk_id";
    $execute=array(':takerisk_id' => $takerisk_id);
    $change_risk=$connDB->update($table, $data, $where, $field, $execute);
    if ($change_risk == false) {
        echo "Move not complete ".$change_risk->errorInfo();
    } else {
        echo "Insert complete!!!!";
    }
}//-------------end process insert update delete
?>	<?php $connDB->close_PDO(); ?>
	






