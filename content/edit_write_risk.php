<?php $data = $_POST['data'];?>
<script type="text/javascript">
    $(function () {
        var data = "<?= $data?>";
        $.getJSON('JsonData/detail_risk.php',{data: data}, function (data) {
            
            $("div#detialRisk").append($("<div class='form-group'><label>หมวดความเสี่ยง &nbsp;</label>"+  
                        "<select name='subcate' id='subcate' required></select></div><br><br>")
                        ,("<div class='form-group'><label>วันที่เกิดเหตุ &nbsp;</label><input type='text' name='take_date' id='datepicker' class='form-control' readonly required></div><br><br>")
                        ,("<div class='form-group'><label>เวลาที่เกิดเหตุ &nbsp;</label><div class='form-group'><select name='take_hour' id='take_hour' class='form-control select2'></select>"+
                        "</div> <b>:</b> <div class='form-group'><select name='take_minute' id='take_minute' class='form-control select2'></select></div> <b>นาที</b></div><br><br>")
                        ,("<div class='form-group'><label>สถานที่เกิดเหตุ &nbsp;</label><select name='take_place' id='take_place' required></select></div><br><br>")
                        ,("<div class='form-group'><label>HN &nbsp;</label><input type='text' id='hn' class='form-control' placeholder='HN' name='hn'></div>")
                        ,("<div class='form-group'> <label> &nbsp; AN &nbsp;</label><input type='text' id='an' class='form-control' placeholder='AN' name='an'></div><br><br>")
                        ,("<div class='form-group'><label>ชื่อบุคลากรที่ประสบเหตุการณ์  &nbsp;</label> <input type='text' placeholder='ชื่อบุคลากร' id='take_other' class='form-control' name='take_other'/></div><br><br>")
                        ,("<div class='form-group'><label>หน่วยงานที่เกี่ยวข้อง  &nbsp;</label><select name='res_dep' id='res_dep' required></select></div>"));
                $("select#subcate").addClass("form-control").addClass("select2").append("<option value=''>ค้นหารายการความเสี่ยง</option>");
                $("select#take_place").addClass("form-control").addClass("select2").append("<option value=''>เลือกสถานที่</option>");
                $("select#res_dep").addClass("form-control").addClass("select2").append("<option value=''>หน่วยงานที่เกี่ยวข้อง</option>");
                $.getJSON('JsonData/subcateData.php', function (LR) {
                                    for (var key in LR) {
                                        if(LR[key].subcategory == data.detail.subcategory){var select='selected';}else{var select='';}
                                              $("select#subcate").append($("<option value='"+LR[key].subcategory+"' "+select+"> "+LR[key].name+" </option>"));
                                    }$(".select2").select2();
                                });
                $.getJSON('JsonData/placeData.php', function (PR) {
                                    for (var key in PR) {
                                        if(PR[key].place == data.detail.take_place){var select='selected';}else{var select='';}
                                              $("select#take_place").append($("<option value='"+PR[key].place+"' "+select+"> "+PR[key].name+" </option>"));
                                    }$(".select2").select2();
                                });      
                $.getJSON('JsonData/Dep_Data.php', function (DR) {
                                    for (var key in DR) {
                                        if(DR[key].dep_id == data.detail.res_dep){var select='selected';}else{var select='';}
                                              $("select#res_dep").append($("<option value='"+DR[key].dep_id+"' "+select+"> "+DR[key].name+" </option>"));
                                    }$(".select2").select2();
                                });
                                var takeTime = data.detail.take_time;
                                for (var i = 0; i <= 23; i++) {
                                    if (i == takeTime.substring (0, 2)) {
        var selected = 'selected';
    } else {
        var selected = '';
    }
                                    if (i < 10) {
        $("select#take_hour").append($("<option value='0"+i+"' "+selected+">0"+i+"</option>"));
    } else {
        $("select#take_hour").append($("<option value='"+i+"' "+selected+">"+i+"</option>"));
    }
                                }
                                for (var i = 0; i <= 59; i++) {
                                    if (i == takeTime.substring (3, 5)) {
        var selected = 'selected';
    } else {
        var selected = '';
    }
                                    if (i < 10) {
        $("select#take_minute").append($("<option value='0"+i+"' "+selected+">0"+i+"</option>"));
    } else {
        $("select#take_minute").append($("<option value='"+i+"' "+selected+">"+i+"</option>"));
    }
                                }
        $("#hn").val(data.detail.hn); 
        $("#an").val(data.detail.an);
        $("#take_other").val(data.detail.take_other);
        var DP = new DatepickerThai();
        DP.GetDatepicker('#datepicker');  
        $("#datepicker").datepicker("setDate",new Date("'"+data.detail.take_date+"'"));
        //////////////////////////////
        
        $("div#incidentRisk").append($("<div class='form-group'><label>บรรยายเหตุการณ์ความเสี่ยง</label><textarea class='form-control' style='width: 100%' COLS='100%' rows='5' placeholder='บรรยายเหตุการณ์ความเสี่ยง' name='take_detail' id='take_detail' required></textarea></div><p>")
                                        ,("<div class='form-group'><label>การแก้ไขเบื้องต้น</label><textarea class='form-control' style='width: 100%' COLS='100%' rows='3' placeholder='การแก้ไขเบื้องต้น' name='take_first' id='take_first'></textarea></div><p>")
                                        ,("<div class='form-group'><label>ข้อเสนอแนะอื่นๆ เพื่อการแก้ไขป้องกัน</label><textarea class='form-control' style='width: 100%' COLS='100%' placeholder='ข้อเสนอแนะ' name='take_counsel' id='take_counsel'></textarea></div>"));
        
        $("#take_detail").val(data.detail.take_detail);
        $("#take_first").val(data.detail.take_first);
        $("#take_counsel").val(data.detail.take_counsel);
        /////////////////////////////////
        
        $("div#levelRisk").append($("<div class='form-group'><label>ระดับความเสี่ยง</label></div><p><div id='sel_LR'></div>"));
        $.getJSON('JsonData/LevelRisk.php', function (LR) {
                                    for (var key in LR) {
                                        if(LR[key].level_risk == data.detail.level_risk){var checked='checked';}else{var checked='';}
                                              $("div#sel_LR").append($("<input type='radio' name='level_risk' id='level_risk' style='width: 20px; height:20px;' value='"+LR[key].level_risk+"' "+checked+" required><b>"+LR[key].level_risk+" &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> "));
                                    }
                                });
                                $("button#WRedit").click(function () {
					$.ajax({
					   type: "POST",
					   url: "process/test_post.php",
					   data: {subcate:$("#subcate").val()
                                                 ,takeDate:$("#datepicker").val()
                                                ,takerisk_id:data.detail.takerisk_id
                                                ,takeTime:$("#take_hour").val()+":"+$("#take_minute").val()
                                                ,take_place:$("#take_place").val()
                                                ,hn:$("#hn").val()
                                                ,an:$("#an").val()
                                                ,take_other:$("#take_other").val()
                                                ,res_dep:$("#res_dep").val()
                                                ,take_detail:$("#take_detail").val()
                                                ,take_first:$("#take_first").val()
                                                ,take_counsel:$("#take_counsel").val()
                                                ,level_risk:$('input[name=level_risk]:checked').val()
                                                ,data0:'update'},
					   success: function(result) {
						alert(result);
                                                //$("#index_content").empty().load('content/check_risk.html');
					   }
					 });
                                         });
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
    <form class="navbar-form navbar-left" action="#" name="form1" id="form1" method="post" enctype="multipart/form-data" target="iframe_target" onSubmit="return ChkSubmit();">
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
            <button class="btn btn-warning btn-sm" id="WRedit" name="WRedit">แก้ไข</button>
            <button type="reset" class="btn btn-default">Reset  </button> 
        </div>
    </form> 
    <div id="result"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;สถานะการบันทึกความเสี่ยง</div>
</div>
