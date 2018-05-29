function WriteRisk (content,id=null) {
//        var cate_no ="";
//        var cate = "";
        $(content).empty().append("<div class='col-lg-12'><h2 style='color: blue'>  ระบุรายละเอียดความเสี่ยง </h2>" 
                                +"<ol class='breadcrumb'><li><a href='index.php'><i class='fa fa-home'></i> หน้าหลัก</a></li>"
                                +"<li class='active'><i class='fa fa-edit'></i> เขียนความเสี่ยง</li></ol>"
                                +"<div class='alert alert-info alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>"
                                +"รายการความเสี่ยงที่เกี่ยวข้อง : เลือกความเสี่ยงที่เกี่ยวข้อง (ถ้าไม่พบให้เลือกรายการ 'อื่นๆ')</div></div>"
                                +"<div class='row'><form class='navbar-form navbar-left' action='#' name='form1' id='form1' method='post'>"
                                +"<input type='hidden' name='method' value='insert_risk'>"
                                +"<div class='col-lg-6'><div class='box box-success box-solid'><div class='box-header with-border'>"
                                +"<h3 class='box-title'>ข้อมูลความเสี่ยง</h3><div class='box-tools pull-right'>"
                                +"<button type='button' class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button></div></div>"
                                +"<div id='detialRisk' class='box-body'></div></div></div>"
                                +"<div class='col-lg-6'><div class='box box-success box-solid'><div class='box-header with-border'>"
                                +"<h4 class='box-title'><b>ระบุเหตุการณ์ </b>โอกาสที่จะประสบกับความสูญเสีย หรือสิ่งไม่พึงประสงค์ โอกาสความน่าจะเป็นที่จะเกิดอุบัติการณ์</h4>"
                                +"<div class='box-tools pull-right'><button type='button' class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button></div></div>"
                                +"<div id='incidentRisk' class='box-body'></div></div></div>"
                                +"<div class='col-lg-12'><div class='box box-success box-solid'><div class='box-header with-border'>"
                                +"<h3 class='box-title'>ระดับความรุนแรง</h3><div class='box-tools pull-right'>"
                                +"<button type='button' class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button></div></div>"
                                +"<div id='levelRisk' class='box-body'></div></div></div><div class='col-lg-12' id='Rsubmit'></div></form>" 
                                +"<div id='result'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;สถานะการบันทึกความเสี่ยง</div></div>");
                            $("h2").prepend("<img src='images/icon_set2/dolly.ico' width='40'> ");
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
                        
                    $("div#incidentRisk").append($("<div class='form-group'><label>บรรยายเหตุการณ์ความเสี่ยง</label><textarea class='form-control' style='width: 100%' COLS='100%' rows='5' placeholder='บรรยายเหตุการณ์ความเสี่ยง' name='take_detail' id='take_detail' required></textarea></div><p>")
                                        ,("<div class='form-group'><label>การแก้ไขเบื้องต้น</label><textarea class='form-control' style='width: 100%' COLS='100%' rows='3' placeholder='การแก้ไขเบื้องต้น' name='take_first' id='take_first'></textarea></div><p>")
                                        ,("<div class='form-group'><label>ข้อเสนอแนะอื่นๆ เพื่อการแก้ไขป้องกัน</label><textarea class='form-control' style='width: 100%' COLS='100%' placeholder='ข้อเสนอแนะ' name='take_counsel' id='take_counsel'></textarea></div>"));

                    $("div#levelRisk").append($("<div class='form-group'><label>ระดับความเสี่ยง</label></div><p><div id='sel_LR'></div>")
                                    ,$("<div id='image_preview'><img id='previewing' src='images/icon_set2/image.ico' width='50' /></div>")
                                    ,$("<div class='form-group'>รูปภาพ : <input type='file' name='file' id='file' class='form-control' /></div></div><h4 id='loading' >loading..</h4><div id='message'></div>"));
                    
            var idRisk = id;
            if(idRisk == null){
                
                $("select#subcate").addClass("form-control").addClass("select2").append("<option value=''>ค้นหารายการความเสี่ยง</option>");
                $("select#take_place").addClass("form-control").addClass("select2").append("<option value=''>เลือกสถานที่</option>");
                $("select#res_dep").addClass("form-control").addClass("select2").append("<option value=''>หน่วยงานที่เกี่ยวข้อง</option>");
                $.getJSON('JsonData/subcateData.php', function (LR) {
                                    for (var key in LR) {
                                              $("select#subcate").append($("<option value='"+LR[key].subcategory+"'> "+LR[key].name+" </option>"));
                                    }$(".select2").select2();
                                });
                $.getJSON('JsonData/placeData.php', function (PR) {
                                    for (var key in PR) {
                                               $("select#take_place").append($("<option value='"+PR[key].place+"'> "+PR[key].name+" </option>"));
                                    }$(".select2").select2();
                                });      
                $.getJSON('JsonData/Dep_Data.php', function (DR) {
                                    for (var key in DR) {
                                              $("select#res_dep").append($("<option value='"+DR[key].dep_id+"'> "+DR[key].name+" </option>"));
                                    }$(".select2").select2();
                                });
                                                                
        var DP = new DatepickerThai();
        DP.GetDatepicker('#datepicker');  
        MakeHour("#take_hour");    
        MakeMinute("#take_minute");
        //////////////////////////////
        
        
        /////////////////////////////////
        
        $.getJSON('JsonData/LevelRisk.php', function (LR) {
                                    for (var key in LR) {
                                        $("div#sel_LR").append($("<input type='radio' name='level_risk' id='level_risk' style='width: 20px; height:20px;' value='"+LR[key].num+"' required><b>"+LR[key].level_risk+" &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> "));
                                    }
                                });
                                $("#Rsubmit").append($("<input type='hidden' name='method' value='insert_risk'>")
                                                    ,$("<input type='submit' class='btn btn-success btn-sm' id='WRedit' name='WRedit' value='บันทึก'> "
                                +"<button type='reset' class='btn btn-default'>Reset</button>"))
                                $('#loading').hide();
                                $("#form1").on('submit', (function (e) {
                                    $("#message").empty();
                                    $('#loading').show();
					$.ajax({
					   type: "POST",
					   url: "process/prcwriterisk.php",
					   data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                                            contentType: false, // The content type used when sending data to the server.
                                            cache: false, // To unable request pages to be cached
                                            processData: false,
                                                //,data0:'add_prods'},
					   success: function(result) {
						alert(result);
                                                $("#index_content").empty().load('content/info_index.html');
					   }
					 });e.preventDefault();
					 }));
                $(function () {
                $("#file").change(function () {
                    $("#message").empty(); // To remove the previous error message
                    var file = this.files[0];
                    var imagefile = file.type;
                    var match = ["image/jpeg", "image/png", "image/jpg"];
                    if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2])))
                    {
                        $('#previewing').attr('src', 'noimage.png');
                        $("#message").html("<p id='error'>Please Select A valid Image File</p>" + "<h4>Note</h4>" + "<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
                        return false;
                    } else
                    {
                        var reader = new FileReader();
                        reader.onload = imageIsLoaded;
                        reader.readAsDataURL(this.files[0]);
                    }
                });
            });
                            ////////////////////////////////////

            }else{ 
                $.getJSON('JsonData/detail_risk.php',{data: idRisk.data}, function (data) { 
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
                                
                                                                            
        $("#hn").val(data.detail.hn); 
        $("#an").val(data.detail.an);
        $("#take_other").val(data.detail.take_other);
        var DP = new DatepickerThai();
        DP.GetDatepicker('#datepicker');  
        $("#datepicker").datepicker("setDate",new Date("'"+data.detail.take_date+"'"));
        MakeHour("#take_hour",data.detail.take_time2);    
        MakeMinute("#take_minute",data.detail.take_time2);
        //////////////////////////////
        
        $("#take_detail").val(data.detail.take_detail);
        $("#take_first").val(data.detail.take_first);
        $("#take_counsel").val(data.detail.take_counsel);
        /////////////////////////////////
        
        $.getJSON('JsonData/LevelRisk.php', function (LR) {
                                    for (var key in LR) {
                                        if(LR[key].num == data.detail.LR_id){var checked='checked';}else{var checked='';}
                                              $("div#sel_LR").append($("<input type='radio' name='level_risk' id='level_risk' style='width: 20px; height:20px;' value='"+LR[key].num+"' "+checked+" required><b>"+LR[key].level_risk+" &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> "));
                                    }
                                });
                                
                                if(data.detail.take_file1 == '' || data.detail.take_file1 === null){
                $('#previewing').empty().attr('src', 'images/icon_set2/image.ico');
            }else{
                $('#previewing').empty().attr('src', 'myfile/'+data.detail.take_file1);
            }
                                $("#Rsubmit").append($("<input type='hidden' name='method' value='edit_risk'>")
                                                    ,$("<input type='hidden' name='takerisk_id' value='"+idRisk.data+"'>")
                                                    ,$("<input type='hidden' name='take_dep' value='"+data.detail.take_dep+"'>")
                                                    ,$("<input type='submit' class='btn btn-warning btn-sm' id='WRedit' name='WRedit' value='แก้ไข'> "
                                +"<button type='reset' class='btn btn-default'>Reset</button>"))
                                $('#loading').hide();
                                $("#form1").on('submit', (function (e) {
                                    $("#message").empty();
                                    $('#loading').show();
					$.ajax({
					   type: "POST",
					   url: "process/prcwriterisk.php",
					   data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                                            contentType: false, // The content type used when sending data to the server.
                                            cache: false, // To unable request pages to be cached
                                            processData: false,
                                                //,data0:'add_prods'},
					   success: function(result) {
						alert(result);
                                                $("#index_content").empty().load('content/check_risk.html');
					   }
					 });e.preventDefault();
					 }));
                $(function () {
                $("#file").change(function () {
                    $("#message").empty(); // To remove the previous error message
                    var file = this.files[0];
                    var imagefile = file.type;
                    var match = ["image/jpeg", "image/png", "image/jpg"];
                    if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2])))
                    {
                        $('#previewing').attr('src', 'noimage.png');
                        $("#message").html("<p id='error'>Please Select A valid Image File</p>" + "<h4>Note</h4>" + "<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
                        return false;
                    } else
                    {
                        var reader = new FileReader();
                        reader.onload = imageIsLoaded;
                        reader.readAsDataURL(this.files[0]);
                    }
            });
            
                });
                });
            }
            function imageIsLoaded(e) {
                $("#file").css("color", "green");
                $('#image_preview').css("display", "block");
                $('#previewing').attr('src', e.target.result);
                $('#previewing').attr('width', '150px');
                //$('#previewing').attr('height', '230px');
            }
        }
