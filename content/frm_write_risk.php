<?php 
function __autoload($class_name) {
    include '../class/' . $class_name . '.php';
}

set_time_limit(0);
$connDB = new TablePDO();
$read = "../connection/conn_DB.txt";
$connDB->para_read($read);
$conndb = $connDB->Read_Text();
$connDB->conn_PDO();
?>
<script type="text/javascript" lang="javascript">
    $(function () {
        $("#check").click(function () {
            if ($(this).prop('checked') == true) {
                $("#WRsubmit").removeAttr("disabled");
            } else {
                $("#WRsubmit").attr("disabled", "disabled");
            }
        });
    });
</script>
<script type="text/javascript" lang="javascript">
function loadFrm(content,page){
$("#"+content+"").load(page);
}
</script>
<script type="text/javascript" lang="javascript">
    function ClearForm(myForm) {
        var myForm = myForm;
        $("#"+myForm+"")[0].reset();
    }
</script>
<script type="text/javascript" lang="javascript">
    $(function () {
        $("#WRsubmit").click(function () {
            
           var subcate = $("#subcate").val();
            var take_place = $("#take_place").val();
            var res_dep = $("#res_dep").val();
            var take_detail = $("#take_detail").val();
            var level_risk='';
            if ($("#level_risk1").prop('checked') == true) {
                level_risk = $("#level_risk1").val();
            } else if ($("#level_risk2").prop('checked') == true) {
                level_risk = $("#level_risk2").val();
            } else if ($("#level_risk3").prop('checked') == true) {
                level_risk = $("#level_risk3").val();
            } else if ($("#level_risk4").prop('checked') == true) {
                level_risk = $("#level_risk4").val();
            } else if ($("#level_risk5").prop('checked') == true) {
                level_risk = $("#level_risk5").val();
            } else if ($("#level_risk6").prop('checked') == true) {
                level_risk = $("#level_risk6").val();
            } else if ($("#level_risk7").prop('checked') == true) {
                level_risk = $("#level_risk7").val();
            } else if ($("#level_risk8").prop('checked') == true) {
                level_risk = $("#level_risk8").val();
            } else if ($("#level_risk9").prop('checked') == true) {
                level_risk = $("#level_risk9").val();
            }
            if (subcate != '' && take_place != '' && res_dep != '' && take_detail != '' && level_risk != '') {
                $("#WRsubmit").click(sendpost('process/prcwriterisk.php', 'result'));
            } 
        });
    });
</script>
<div class="col-lg-12">
    <h2 style="color: blue">  ระบุรายละเอียดความเสี่ยง </h2> 
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i> หน้าหลัก</a></li>
        <li class="active"><i class="fa fa-edit"></i> เขียนความเสี่ยง</li>
    </ol>
    <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<?php
$method = isset($_GET['method']) ? $_GET['method'] : '';
//=================สำหรับจิตเวชเลยฯ
/* if($resultEdit['subcategory']!=''){$subcategory=$resultEdit['subcategory'];}else{$subcategory=$_GET['subcategory'];}                   
  $sqlGet=mysql_query("select  s1.subcategory,s1.name as sub_name,s1.category , c1.name as cate_name  from   subcategory s1
  LEFT OUTER JOIN category c1 ON s1.category=c1.category
  Where  s1.subcategory = '$subcategory' ");
  $resultGet=mysql_fetch_assoc($sqlGet);
  echo "<b>รายการ</b> ".$resultGet[sub_name]." <b>หมวดหมู่</b> "."$resultGet[cate_name]";
  $subcategory=$resultGet[subcategory];
  $category=$resultGet[category]; */
?>รายการความเสี่ยงที่เกี่ยวข้อง : เลือกความเสี่ยงที่เกี่ยวข้อง (ถ้าไม่พบให้เลือกรายการ "อื่นๆ")
    </div>
</div>


<?php
if ($method == "edit") {
    $takerisk_id = $_GET[takerisk_id];
    $sqlEdit = mysql_query("select * from takerisk t1
  inner join  category c1 on t1.category=c1.category
  where takerisk_id='$takerisk_id'");
    $resultEdit = mysql_fetch_assoc($sqlEdit);
    $category_name = $resultEdit['category'];

    $sqlEdit2 = mysql_query("select * from takerisk t1
  inner join  subcategory s1 on t1.subcategory=s1.subcategory
  where takerisk_id='$takerisk_id'");
    $resultEdit2 = mysql_fetch_assoc($sqlEdit2);
    $subcategory_name = $resultEdit2['subcategory'];
}
?>
<div class="row">  
    <form class="navbar-form navbar-left" action="process/prcupload_file.php" name="form1" id="form1" method="post" enctype="multipart/form-data" target="iframe_target" onSubmit="return ChkSubmit();">
        <iframe id="iframe_target" name="iframe_target" src="#" style="display:none"></iframe>
        <input type='hidden' name='method' value="insert_risk">
        <input type='hidden' name='data' value="insert_risk">
        <div class="col-lg-6">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">ข้อมูลความเสี่ยง</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group"> 
                        <label>หมวดความเสี่ยง &nbsp;</label>  
                        <select name="data" id="subcate" class="form-control select2" required>
<?php
$sql = "SELECT * FROM subcategory ORDER BY category ASC";
echo "<option value=''>ค้นหารายการความเสี่ยง</option>";
$connDB->imp_sql($sql);
$result = $connDB->select(); //เรียกใช้ค่าจาก function ต้องใช้ตัวแปรรับ
for ($i = 0; $i < count($result); $i++) {
    if ($result[$i]['subcategory'] == $resultGet[0]['subcategory']) {
        $selected = 'selected';
    } else {
        $selected = '';
    }
    echo "<option value='" . $result[$i]['subcategory'] . "' $selected>" . $result[$i]['name'] . " </option>";
}
?>
                        </select>                     
                    </div><br><br>
                    <div class="form-group"> 
                        <script type="text/javascript" lang="javascript">
                            var DP = new DatepickerThai();
                            DP.GetDatepicker('#datepicker');
                        </script>
                        <label>วันที่เกิดเหตุ &nbsp;</label>
                        <input type="text" name="data" id="datepicker" class="form-control" readonly required>
                    </div><br><br>
                    <div class="form-group">    
                        <label>เวลาที่เกิดเหตุ &nbsp;</label>
                        <div class="form-group"> 
                            <select name="data" id="take_hour" class="form-control select2">
                                <option value="">ชั่วโมง</option>
<?php
for ($i = 0; $i <= 23; $i++) {
    if ($i == substr($resultEdit['take_time'], 0, 2)) {
        $selected = 'selected';
    } else {
        $selected = '';
    }
    if ($i < 10) {
        echo "<option value='0" . $i . "' $selected>0" . $i . "</option>";
    } else {
        echo "<option value='" . $i . "' $selected>" . $i . "</option>";
    }
}
?>
                            </select>
                        </div> <b>:</b>
                        <div class="form-group"> 
                            <select name="data" id="take_minute" class="form-control select2">
                                <option value="">นาที</option>
<?php
for ($i = 0; $i <= 59; $i++) {
    if ($i == substr($resultEdit['take_time'], 3, 2)) {
        $selected = 'selected';
    } else {
        $selected = '';
    }
    if ($i < 10) {
        echo "<option value='0" . $i . "' $selected>0" . $i . "</option>";
    } else {
        echo "<option value='" . $i . "' $selected>" . $i . "</option>";
    }
}
?>
                            </select>
                        </div> <b>นาที</b>
                    </div><br><br>
                    <div class="form-group">
                        <label>สถานที่เกิดเหตุ &nbsp;</label>
                        <select name="data" id="take_place" required  class="form-control select2"> 
<?php
$sql = "SELECT *  FROM place order by name";
echo "<option value=''></option>";
$connDB->imp_sql($sql);
$result = $connDB->select(); //เรียกใช้ค่าจาก function ต้องใช้ตัวแปรรับ
for ($i = 0; $i < count($result); $i++) {
    if ($result[$i]['place'] == $resultGet[0]['take_place']) {
        $selected = 'selected';
    } else {
        $selected = '';
    }
    echo "<option value='" . $result[$i]['place'] . "' $selected>" . $result[$i]['name'] . " </option>";
}
?>
                        </select>
                    </div><br><br>
                    <div class="form-group">
                        <label>HN &nbsp;</label>
                        <input type="text" id='hn' class="form-control" placeholder="HN" name='data' value="<?= isset($resultEdit['hn']) ? $resultEdit['hn'] : '' ?>">           	 
                    </div>
                    <div class="form-group"> 
                        <label>AN &nbsp;</label>
                        <input type="text" id='an' class="form-control" placeholder="AN" size='' name='data' value="<?= isset($resultEdit['an']) ? $resultEdit['an'] : '' ?>">
                    </div><br><br>		
                    <div class="form-group">
                        <label>ชื่อบุคลากรที่ประสบเหตุการณ์ </label>
                        <input type="text" placeholder="ชื่อบุคลากร" id='take_other' class="form-control" name='data' value="<?= isset($resultEdit['take_other']) ? $resultEdit['take_other'] : '' ?>"/>
                    </div><br><br>
                    <div class="form-group">
                        <label>หน่วยงานที่เกี่ยวข้อง </label>
                        <select name="data" id="res_dep" class="form-control select2" required> 
<?php
$sql = "SELECT *  FROM department";
echo "<option value=''></option>";
$connDB->imp_sql($sql);
$result = $connDB->select(); //เรียกใช้ค่าจาก function ต้องใช้ตัวแปรรับ
for ($i = 0; $i < count($result); $i++) {
    if ($result[$i]['dep_id'] == $resultGet[0]['take_dep']) {
        $selected = 'selected';
    } else {
        $selected = '';
    }
    echo "<option value='" . $result[$i]['dep_id'] . "' $selected>" . $result[$i]['name'] . " </option>";
}
?>
                        </select>	
                    </div>
                </div></div></div>
        <div class="col-lg-6">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h4 class="box-title"><b>ระบุเหตุการณ์ </b>โอกาสที่จะประสบกับความสูญเสีย หรือสิ่งไม่พึงประสงค์ โอกาสความน่าจะเป็นที่จะเกิดอุบัติการณ์</h4>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <label>บรรยายเหตุการณ์ความเสี่ยง</label>
                        <textarea class="form-control" style="width: 100%" COLS="100%" rows="5" placeholder="บรรยายเหตุการณ์ความเสี่ยง" name="data" id='take_detail' required><?= isset($resultEdit['take_detail']) ? $resultEdit['take_detail'] : '' ?></textarea>
                    </div><p>
                    <div class="form-group">
                        <label>การแก้ไขเบื้องต้น</label>
                        <textarea class="form-control" style="width: 100%" COLS="100%" rows="3" placeholder='การแก้ไขเบื้องต้น' name='data' id='take_first'><?= isset($resultEdit['take_first']) ? $resultEdit['take_first'] : '' ?></textarea>
                    </div><p>
                    <div class="form-group">
                        <label>ข้อเสนอแนะอื่นๆ เพื่อการแก้ไขป้องกัน</label>
                        <textarea class="form-control" style="width: 100%" COLS="100%" placeholder='ข้อเสนอแนะ' name='data' id='take_counsel'><?= isset($resultEdit['take_counsel']) ? $resultEdit['take_counsel'] : '' ?></textarea>
                    </div>
                </div></div></div>
        <div class="col-lg-12">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">ระดับความรุนแรง</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <label>ระดับความเสี่ยง</label><p>
<?php
$sql = "SELECT * FROM level_risk";
$I = 1;
$connDB->imp_sql($sql);
$result = $connDB->select(); //เรียกใช้ค่าจาก function ต้องใช้ตัวแปรรับ
for ($i = 0; $i < count($result); $i++) {
    if ($result[$i]['level_risk'] == isset($resultGet) ? $resultGet[0]['level_risk'] : '') {
        $selected = 'checked';
    } else {
        $selected = '';
    }
    ?>
                                <input type="radio" name="data" id="level_risk<?= $I ?>" style="width: 20px; height:20px;" value="<?= $result[$i]['level_risk'] ?>" required <?= $selected ?>><b><?= $result[$i]['level_risk'] ?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php $I++;
                            } ?>
                    </div><p>
                    <div class="col-lg-12">
                        <li class="dropdown alerts-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> ดูระดับความเสี่ยงในด้านต่าง ๆ  <b class="caret"></b></a>
                            <ul class="dropdown-menu" style="overflow: auto;height: 300px;">
                                <strong><i class="fa fa-comments-o"></i>ระดับความเสี่ยง ด้านคลินิก</strong>
                                <li><a href="javascript:popup('knowledge_level_risk.php?no=1','',800,600)"><i class="fa fa-arrow-circle-right"></i> ความคลาดเคลื่อนจากกระบวนการใช้ยา ได้ทั้ง ADR และ  Medication Error</a></li> 
                                <li><a href="javascript:popup('knowledge_level_risk.php?no=2','',800,600)"><i class="fa fa-arrow-circle-right"></i> ผู้ป่วยได้รับบาดเจ็บจากพฤติกรรมรุนแรง</a></li>
                                <li><a href="javascript:popup('knowledge_level_risk.php?no=3','',800,600)"><i class="fa fa-arrow-circle-right"></i> ผู้ป่วยพฤติกรรมก้าวร้าวรุนแรง</a></li>
                                <li><a href="javascript:popup('knowledge_level_risk.php?no=4','',800,600)"><i class="fa fa-arrow-circle-right"></i> ผู้ป่วยได้รับบาดเจ็บจากอุบัติเหตุ</a></li>
                                <li><a href="javascript:popup('knowledge_level_risk.php?no=5','',800,600)"><i class="fa fa-arrow-circle-right"></i> การเกิดภาวะแทรกซ้อนจากการจำกัดพฤติกรรม</a></li>
                                <li><a href="javascript:popup('knowledge_level_risk.php?no=6','',800,600)"><i class="fa fa-arrow-circle-right"></i> การเกิดภาวะแทรกซ้อนจากการการรักษาด้วยไฟฟ้า</a></li>
                                <li><a href="javascript:popup('knowledge_level_risk.php?no=7','',800,600)"><i class="fa fa-arrow-circle-right"></i> ผู้ป่วยมีภาวะแทรกซ้อนทางกาย</a></li>
                                <li><a href="javascript:popup('knowledge_level_risk.php?no=8','',800,600)"><i class="fa fa-arrow-circle-right"></i> ผู้ป่วยฆ่าตัวตาย</a></li>
                                <li><a href="javascript:popup('knowledge_level_risk.php?no=9','',800,600)"><i class="fa fa-arrow-circle-right"></i> ผู้ป่วยหลบหนี</a></li>
                                <li><a href="javascript:popup('knowledge_level_risk.php?no=10','',800,600)"><i class="fa fa-arrow-circle-right"></i> เจ้าหน้าที่ได้รับบาดเจ็บจากการปฏิบัติงาน </a></li>
                                <li><a href="javascript:popup('knowledge_level_risk.php?no=11','',800,600)"><i class="fa fa-arrow-circle-right"></i> ผู้ป่วยติดเชื้อในโรงพยาบาล (NI) และในชุมชน(CI) </a></li>
                                <li class="divider"></li>
                                <strong><i class="fa fa-comments-o"></i>  ระดับความเสี่ยง ระบบสนับสนุนบริการ</strong>
                                <li><a href="javascript:popup('knowledge_level_risk.php?no=12','',800,600)"><i class="fa fa-arrow-circle-right"></i> ด้านข้อมูล : การให้บริการข้อมูลข่าวสารคลาดเคลื่อน</a></li>
                                <li><a href="javascript:popup('knowledge_level_risk.php?no=13','',800,600)"><i class="fa fa-arrow-circle-right"></i> ด้านข้อมูล : การบันทึกข้อมูลคลาดเคลื่อน</a></li>
                                <li><a href="javascript:popup('knowledge_level_risk.php?no=14','',800,600)"><i class="fa fa-arrow-circle-right"></i> ด้านการเงิน :  เอกสารทางด้านการเงินคลาดเคลื่อนหรือไม่ครบถ้วน  </a></li>
                                <li><a href="javascript:popup('knowledge_level_risk.php?no=15','',800,600)"><i class="fa fa-arrow-circle-right"></i> ด้านการเงิน : ส่งเรียกเก็บค่ารักษาพยาบาลไม่ทันภายในเวลาที่กำหนด </a></li>
                                <li><a href="javascript:popup('knowledge_level_risk.php?no=16','',800,600)"><i class="fa fa-arrow-circle-right"></i> ด้านเครื่องมือ : การใช้ Internet, Intranet และอุปกรณ์คอมพิวเตอร์ไม่พร้อมใช้</a></li>
                                <li><a href="javascript:popup('knowledge_level_risk.php?no=17','',800,600)"><i class="fa fa-arrow-circle-right"></i> ด้านเครื่องมือ : ความพร้อมใช้ของระบบสำรองไฟ</a></li>
                                <li><a href="javascript:popup('knowledge_level_risk.php?no=18','',800,600)"><i class="fa fa-arrow-circle-right"></i> ด้านความปลอดภัย : ความปลอดภัยทางด้านทรัพย์สิน</a></li>
                                <li><a href="javascript:popup('knowledge_level_risk.php?no=19','',800,600)"><i class="fa fa-arrow-circle-right"></i> ด้านความปลอดภัย : สิ่งแวดล้อมไม่ปลอดภัย(ด้านระบบบำบัดน้ำเสีย) </a></li>
                                <li><a href="javascript:popup('knowledge_level_risk.php?no=20','',800,600)"><i class="fa fa-arrow-circle-right"></i> อื่น ๆ : การทิ้งขยะไม่ถูกประเภท</a></li>
                                <li><a href="javascript:popup('knowledge_level_risk.php?no=21','',800,600)"><i class="fa fa-arrow-circle-right"></i> อื่น ๆ : การถ่ายรูปผู้ป่วยคลาดเคลื่อน </a></li>
                                <li><a href="javascript:popup('knowledge_level_risk.php?no=22','',800,600)"><i class="fa fa-arrow-circle-right"></i> อื่น ๆ : การจัดอาหารไม่ถูกต้อง</a></li>
                            </ul></li>
                    </div><br><p>
                    <div class="form-group">
                        <label>ไฟล์ที่เกี่ยวข้อง เช่น รูปภาพ เอกสาร หลักฐานต่างๆ (หากมี)</label>
                        <?php
                        if ($method == "edit") {
                            echo "<input type='hidden' name='method' value='update'>";
                            echo "<input type='hidden' name='takerisk_id' value='$takerisk_id'>";
                            $disabled = 'disabled';
                            echo"<br><small>ไม่อนุญาตให้ upload ไฟล์ สามารถแก้ไขข้อความและรายเอียดความเสี่ยงอย่างเดียว</small>";
                        } else {
                            $disabled = '';
                        }
                        ?>   
                        <script language="JavaScript">
                            function ChkSubmit(result)
                            {
                                if (document.getElementById("filUpload").value == "")
                                {
                                return true;
                                }
                                document.getElementById("progress").style.visibility = "visible";
                                document.getElementById("divresult").innerHTML = "Uploading....";
                                return true;
                            }
                            function showResult(result)
                            {
                                document.getElementById("progress").style.visibility = "hidden";
                                if (result == 1)
                                {
                                    document.getElementById("divresult").innerHTML = "<font color=green> Save successfully! </font>  <br>";
                                } else
                                {
                                    document.getElementById("divresult").innerHTML = "<font color=red> Error!! Cannot upload data </font> <br>";
                                }
                            }
                        </script>
                        <div id="divresult"></div>
                        <div id="progress" style="visibility:hidden"><img src="images/progress.gif" height="50px"></div>
                        <input type="file" name="filUpload" id="filUpload" <?= $disabled ?>><br>
                    </div><p>
                    <div>
                        <input type="checkbox" name="check" id="check" style='width:15px; height:15px;'>&nbsp;&nbsp; <b style="color: red">ยืนยันการรายงานความเสี่ยง</b>
                    </div>
                </div></div></div>
<?php if ($method == "edit" and $_GET['check'] != "1") { ?>
            <input type='hidden' name='subcategory' value="<?= $subcategory_name ?>">
            <input type='hidden' name='category' value="<?= $category_name ?>">
<?php } ?>
        <div class="col-lg-12">
            <!--<button id="btn_reset">reset</button>-->
            <button class="btn btn-success btn-sm" id="WRsubmit" name="WRsubmit" onclick="" disabled="disabled">บันทึก</button>
            <button type="reset" class="btn btn-default">Reset  </button> 
        </div>
    </form> 
    <div id="result"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;สถานะการบันทึกความเสี่ยง</div>
</div>
<script>
$(function () {
        $(".select2").select2();
});
    </script>
