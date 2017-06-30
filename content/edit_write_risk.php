<?php $data = $_POST['data'];?>
<script type="text/javascript">
    $(function () {
        var data = "<?= $data?>";
        $.getJSON('JsonData/detail_risk.php',{data: data}, function (data) {
            
            $("div#detialRisk").append($("<div class='form-group'><label>หมวดความเสี่ยง &nbsp;</label>"+  
                        "<select name='data' id='subcate' required></select></div><br><br>")
                        ,("<div class='form-group'><label>วันที่เกิดเหตุ &nbsp;</label><input type='text' name='data' id='datepicker' class='form-control' readonly required></div><br><br>")
                        ,("<div class='form-group'><label>เวลาที่เกิดเหตุ &nbsp;</label><div class='form-group'><select name='data' id='take_hour' class='form-control select2'></select>"+
                        "</div> <b>:</b> <div class='form-group'><select name='data' id='take_minute' class='form-control select2'></select></div> <b>นาที</b></div><br><br>"));
                $("select#subcate").addClass("form-control").addClass("select2").append("<option value=''>ค้นหารายการความเสี่ยง</option>");
                $.getJSON('JsonData/subcateData.php', function (LR) {
                                    for (var key in LR) {
                                        if(LR[key].subcategory == data.detail.subcategory){var select='selected';}else{var select='';}
                                              $("select#subcate").append($("<option value='"+LR[key].subcategory+"' "+select+"> "+LR[key].name+" </option>"));
                                    }$(".select2").select2();
                                });
                                for (var i = 0; i <= 23; i++) {
                                    if (i < 10) {
        $("select#take_hour").append($("<option value='0"+i+"'>0"+i+"</option>"));
    } else {
        $("select#take_hour").append($("<option value='"+i+"'>"+i+"</option>"));
    }
                                }
                                for (var i = 0; i <= 59; i++) {
                                    if (i < 10) {
        $("select#take_minute").append($("<option value='0"+i+"'>0"+i+"</option>"));
    } else {
        $("select#take_minute").append($("<option value='"+i+"'>"+i+"</option>"));
    }
                                }
        //$("#datepicker").val(data.detail.take_date); 
        var DP = new DatepickerThai();
        DP.GetDatepicker('#datepicker');  
        $("#datepicker").datepicker("setDate",new Date("'"+data.detail.take_date+"'"));
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
        รายการความเสี่ยงที่เกี่ยวข้อง : เลือกความเสี่ยงที่เกี่ยวข้อง (ถ้าไม่พบให้เลือกรายการ "อื่นๆ")
    </div>
</div>
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
                <div id="detialRisk" class="box-body"></div>
            </div></div>
        <div class="col-lg-6">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h4 class="box-title"><b>ระบุเหตุการณ์ </b>โอกาสที่จะประสบกับความสูญเสีย หรือสิ่งไม่พึงประสงค์ โอกาสความน่าจะเป็นที่จะเกิดอุบัติการณ์</h4>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div id="incidentRisk" class="box-body"></div>
            </div></div>
        <div class="col-lg-12">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">ระดับความรุนแรง</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div id="levelRisk" class="box-body"></div>
            </div></div>
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