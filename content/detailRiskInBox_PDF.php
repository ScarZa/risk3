<?php session_save_path("../session/");
session_start(); ?>
<?php if(empty($_SESSION['rm_id'])){echo "<meta http-equiv='refresh' content='0;url=index.php'/>";exit();} ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<title>ระบบบริหารความเสี่ยง</title>
<LINK REL="SHORTCUT ICON" HREF="../images/logo.png">
<!-- Bootstrap core CSS -->
<link href="../template/plugins/css/bootstrap.css" rel="stylesheet">
<!--<link href="option/css2/templatemo_style.css" rel="stylesheet">-->
<!-- Add custom CSS here -->
<link href="../template/plugins/css/sb-admin.css" rel="stylesheet">
<link rel="stylesheet" href="../template/plugins/font-awesome/css/font-awesome.min.css">
<!-- Page Specific CSS -->
<link rel="stylesheet" href="../template/plugins/css/morris-0.4.3.min.css">
<link rel="stylesheet" href="../template/plugins/css/stylelist.css">
<!--<script src="../template/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="../template/plugins/DataTables/jquery.dataTables.min.js"></script>
<script src="../template/plugins/DataTables/dataTables.bootstrap.min.js"></script>-->
<style type="text/css">
body {
	margin-top: 50px;
}
</style>
    <body>
<?php
function __autoload($class_name) {
    include '../class/' . $class_name . '.php';
}
include_once '../template/plugins/funcDateThai.php';
$conn_DB = new EnDeCode();
$read = "../connection/conn_DB.txt";
$conn_DB->para_read($read);
$conn_db = $conn_DB->Read_Text();
$conn_DB->conn_PDO();
set_time_limit(0);
$user_edit=$_SESSION['rm_id'];
$takerisk_id=$_GET['takerisk_id'];
$sql="select concat(u1.user_fname,' ',u1.user_lname) as user_write_name,t1.*,d1.name as department_name ,p1.name as place_name  ,c1.name as category_name ,s1.name as subcategory_name,t1.detail_recycle,t1.recycle 
,t1.move_status,t1.receive_date,
(select concat(u1.user_fname,' ',u1.user_lname) from takerisk t1 LEFT OUTER JOIN user u1 ON u1.user_id=t1.receiver where t1.takerisk_id=:takerisk_id) user_receiver,
(select concat(u1.user_fname,' ',u1.user_lname) from takerisk t1 LEFT OUTER JOIN user u1 ON u1.user_id=t1.return_user where t1.takerisk_id=:takerisk_id) return_user    
from takerisk t1
LEFT OUTER JOIN department d1 ON d1.dep_id=t1.res_dep
LEFT OUTER JOIN place p1 ON p1.place=t1.take_place
LEFT OUTER JOIN category c1 ON c1.category=t1.category
LEFT OUTER JOIN user u1 ON u1.user_id=t1.user_id
LEFT OUTER JOIN subcategory s1 ON s1.subcategory=t1.subcategory
where t1.takerisk_id=:takerisk_id";
$execute=array(':takerisk_id' => $takerisk_id);
$conn_DB->imp_sql($sql);
$detailRM = $conn_DB->select_a($execute);
?>
        <?php
require_once('../template/plugins/library/mpdf60/mpdf.php'); //ที่อยู่ของไฟล์ mpdf.php ในเครื่องเรานะครับ
ob_start(); // ทำการเก็บค่า html นะครับ*/
?>
    <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><span class="fa fa-envelope"></span> รายละเอียด</h3>
              </div>
              <div class="panel-body">
              <table width='100%'>
              <thead>
              <tr><th width='40%' align="right" valign="top">HN : </th><td  width='60%'><?php echo $detailRM['hn'];?></td></tr>    
              <tr><th align="right" valign="top">AN : </th> <td><?php echo $detailRM['an'];?></td></tr>
              <tr><th align="right" valign="top">บุคลากรที่ประสบเหตุการณ์ : </th> <td><?php echo $detailRM['take_other'];?></td></tr>  
              <tr><th align="right" valign="top">วันที่เกิดเหตุ : </th> <td><?php echo DateThai1($detailRM['take_date']);?></td></tr> 
               <tr><th align="right" valign="top">เวลา : </th> <td><?php echo $detailRM['take_time'];?></td></tr>
               <tr><th align="right" valign="top">วันที่บันทึกความเสี่ยง : </th> <td><?php echo DateThai1($detailRM['take_rec_date']);?></td></tr>
               <tr><th align="right" valign="top">สถานที่เกิดเหตุ : </th> <td><?php echo $detailRM['place_name'];?></td></tr> 
               <tr><th align="right" valign="top">หน่วยงานที่เกี่ยวข้อง : </th> <td><?php echo $detailRM['department_name']; $take_dep=$detailRM['res_dep'];?></td></tr> 
               <tr><th align="right" valign="top">หมวดความเสี่ยง : </th> <td><?php echo $detailRM['category_name'];?></td></tr>
               <tr><th align="right" valign="top">รายการความเสี่ยง : </th> <td><?php echo $detailRM['subcategory_name'];?></td></tr>
               <tr><th align="right" valign="top">ระดับ : </th> <td><?php echo $level_risk=$detailRM['level_risk'];?></td></tr>  
               <tr><th align="right" valign="top">รายละเอียดเหตุการณ์ความเสี่ยง : </th> <td><?php echo $detailRM['take_detail'];?></td></tr> 
	       <tr><th align="right" valign="top">การแก้ไขเบื้องต้น : </th> <td><?php echo $detailRM['take_first'];?></td></tr> 
               <tr><th align="right" valign="top">ข้อเสนอแนะ : </th> <td><?php echo $detailRM['take_counsel'];?></td></tr>
               <tr><th align="right" valign="top">เหตุผลที่ย้ายลงถังขยะ : </th> <td><?php echo $detailRM['detail_recycle'];?></td></tr>
              </thead>
              </table>
            	  		</div>
             		 </div>

              *** เอกสารสำหรับคณะกรรมการความเสี่ยง ห้ามเผยแพร่ ***
          </div>
    </div>
<?php
$html = ob_get_contents();
ob_clean();
$pdf = new mPDF('tha2','A4','11','');
$pdf->autoScriptToLang = true;
$pdf->autoLangToFont = true;
$pdf->SetDisplayMode('fullpage');

$pdf->WriteHTML($html, 2);
//$pdf->AddPage();
//$pdf->WriteHTML($html2,2);
$pdf->Output("../MyPDF/risk$takerisk_id.pdf");
echo "<meta http-equiv='refresh' content='0;url=../MyPDF/risk$takerisk_id.pdf' />";
?>
<script src="../template/plugins/jquery-ui-1.11.4.custom/jquery-ui-1.11.4.custom.js"></script>
</body>
</html>