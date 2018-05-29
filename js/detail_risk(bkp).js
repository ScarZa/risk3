function DetailRisk (content,id=null) {
//        var cate_no ="";
//        var cate = "";
        $(content).empty().append("<h2 style='color: blue'>รายละเอียด/ดำเนินการความเสี่ยง</h2>"
                                +"<ol class='breadcrumb'><li><a href='index.html'><i class='fa fa-home'></i> หน้าหลัก</a></li>"
                                +"<li id='bc'></li><li class='active'><i class='fa fa-envelope'></i> รายละเอียด/ดำเนินการความเสี่ยง</li></ol>"
                                +"<div class='row'><div class='col-md-12'>"
                                +"<div class='box box-primary box-solid'><div class='box-header with-border'>"
                                +"<h4 class='box-title'> รายละเอียดความเสี่ยง โอกาสที่จะประสบกับความสูญเสีย หรือสิ่งไม่พึงประสงค์ โอกาสความน่าจะเป็นที่จะเกิดอุบัติการณ์ </h4>"
                                +"<div class='box-tools pull-right'><a id='print' href='#' title='ปริ้นท์หน้านี้'><input type='image' src='images/printer.png' onclick='' align='right' title='ปริ้นท์หน้านี้'></a></div></div>"
                                +"<div class='box-body'>"
                                +"<table width='auto'><thead>"
                                +"<tr><th width='30%' valign='top'>HN : </th><td id='hn' width='70%'></td></tr>"    
                                +"<tr><th valign='top'>AN : </th> <td id='an'></td></tr>"
                                +"<tr><th valign='top'>บุคลากรที่ประสบเหตุการณ์ : </th> <td id='take_other'></td></tr>"  
                                +"<tr><th valign='top'>วันที่เกิดเหตุ : </th> <td id='take_date'></td></tr>" 
                                +"<tr><th valign='top'>เวลา : </th> <td id='take_time'></td></tr>"
                                +"<tr><th valign='top'>วันที่บันทึกความเสี่ยง : </th> <td id='take_rec_date'></td></tr>"
                                +"<tr><th valign='top'>สถานที่เกิดเหตุ : </th> <td id='place_name'></td></tr>" 
                                +"<tr><th valign='top'>หน่วยงานที่เกี่ยวข้อง : </th> <td id='department_name'></td></tr>" 
                                +"<tr><th valign='top'>หมวดความเสี่ยง : </th> <td id='category_name'></td></tr>"
                                +"<tr><th valign='top'>รายการความเสี่ยง : </th> <td id='subcategory_name'></td></tr>"
                                +"<tr><th valign='top'>ระดับ : </th> <td id='level_risk'></td></tr>"  
                                +"<tr><th valign='top'>รายละเอียดเหตุการณ์ความเสี่ยง : </th> <td id='take_detail'></td></tr>" 
                                +"<tr><th valign='top'>การแก้ไขเบื้องต้น : </th> <td id='take_first'></td></tr>" 
                                +"<tr><th valign='top'>ข้อเสนอแนะ : </th> <td id='take_counsel'></td></tr>"
                                +"<tr><th valign='top'>ไฟล์แนบ : </th> <td id='take_file1'></td></tr>" 
                                +"</thead><div class='text-right' style='float: right;width: auto'></div>"
                                +"</table></div></div></div><div class='col-md-12' id='DR_content'></div></div>");
            var idRisk = id;

        $.getJSON('JsonData/detail_risk.php',{data: idRisk.data}, function (data) {
            if(data.rm_status == 'Y' || data.rm_status == 'A'){
                $("ol li#bc").append("<a href='#'><i class='fa fa-envelope'></i></a>");
                if(data.detail.move_status=='Y'){
                $("ol li#bc>a").text(" รายการแจ้งย้ายความเสี่ยง").attr("onclick","loadPage('#index_content','content/check_risk.html');");
            }else if(data.detail.move_status=='N'){
                $("ol li#bc>a").text(" ติดตาม/ประเมินผล").attr("onclick","loadPage('#index_content','content/total_risk.html');");
            }
            }
            $("#print").attr("onclick","window.open('detailRiskInBox_PDF.php?takerisk_id="+data.detail.takerisk_id+"', '', 'width=700,height=900'); return false;")
            $("#hn").text(data.detail.hn);
            $("#an").text(data.detail.an);
            $("#take_other").text(data.detail.take_other);
            $("#take_date").text(data.detail.take_date);
            $("#take_time").text(data.detail.take_time+" น.");
            $("#take_rec_date").text(data.detail.take_rec_date);
            $("#place_name").text(data.detail.place_name);
            $("#department_name").text(data.detail.department_name);
            $("#category_name").text(data.detail.category_name);
            $("#subcategory_name").text(data.detail.subcategory_name);
            $("#level_risk").text(data.detail.level_risk);
            $("#take_detail").text(data.detail.take_detail);
            $("#take_first").text(data.detail.take_first);
            $("#take_counsel").text(data.detail.take_counsel);
            if(data.detail.take_file1 !=''){
                $("#take_file1").append("<a href='myfile/"+data.detail.take_file1+"' target='_blank'><span class='fa fa-download'></span> Download File </a><br />");
            }
            if(data.rm_status == 'Y'){
                $("table").append($("<tr><th>ผู้เขียน : </th><td> " +data.detail.user_write_name+" <font color='red'>(ดูได้เฉพาะคณะกรรมการบริหารความเสี่ยง)</font></td></tr>"));
                if(data.detail.user_receiver){
                        $("table").append($("<tr><th>ผู้แจ้งย้าย : </th><td id='user_receiver'> "+data.detail.user_receiver+"  &nbsp;&nbsp;<b>วันที่ :</b> "+data.detail.receive_date+"<font color='red'>(ดูได้เฉพาะคณะกรรมการบริหารความเสี่ยง)</font></td></tr>"));
                    }
                if(data.detail.return_risk == 'Y'){
                    $("table").append($("<tr><th>ผู้ส่งคืน : </th><td> "+data.detail.return_user+"  &nbsp;&nbsp;<b>วันที่ :</b> "+data.detail.return_date+"<font color='red'>(ดูได้เฉพาะคณะกรรมการบริหารความเสี่ยง)</font></td></tr>"));
                }    
            }
            if(data.detail.recycle == 'Y'){
                    $("table").append($("<tr><th valign='top'>เหตุผลที่ย้ายลงถังขยะ : </th> <td>"+data.detail.detail_recycle+"</td></tr>"));
            }
            if((data.detail.mng_status == 'N' && data.detail.res_dep == data.rm_dep) || data.rm_status == 'A'){
                    $("div.text-right").append($("<a href='#' id='return_risk'>ส่งคืนความเสี่ยง <i class='fa fa-arrow-circle-left'></i></a><br><br>"));
                    $("a#return_risk").click(function (e) {
                                     e.preventDefault();
					$.ajax({
					   type: "POST",
					   url: "process/prcwriterisk.php",
                                           data: {method:'move_risk'
                                                  ,takerisk_id:data.detail.takerisk_id
                                                },
					   success: function(result) {
						alert(result);
                                                $("#index_content").empty().load('content/check_risk.html');
					   }
					 });
        });
            }
            if((data.rm_status == 'Y' || data.rm_status == 'A') && data.detail.recycle == 'N'){
                    $("div.text-right").append($("<a id='forword_rm' href='#' data-toggle='modal' data-target='#forwardModal' data-whatever='"+data.detail.takerisk_id+"'>ส่งต่อความเสี่ยง <i class='fa fa-arrow-circle-right'></i></a>"));
                        $("#forword_rm").attr("onclick","forwardModal ()");
            }
            if(data.rm_status == 'Y' && data.detail.recycle == 'N'){
                /////////////////// right menu ///////////////////////
                $("div.text-right").append($("<br><br><a id='editRisk' href='#'>แก้ไขรายละเอียด <i class='fa fa-edit'></i></a>"+
                            "<br><br><a href='#' id='recycle' data-toggle='modal' data-target='#recycleModal' data-whatever='"+data.detail.takerisk_id+"'>ย้ายเข้าถังขยะ <i class='fa fa-trash-o'></i></a>"+
                            "<br><br><a href='#' id='warp_risk'>ย้ายไปประเมิน <i class='fa fa-bolt'></i></a>"));
                                $("#editRisk").attr("onclick","loadAjax('#index_content','JsonData/tempSendData.php',"+data.detail.takerisk_id+",'WriteRisk');");
                                    $("#recycle").attr("onclick","recycleModal ()");
                                    $("a#warp_risk").click(function (e) {
                                     
                                     confirm("คุณแน่ใจว่าต้องการย้ายความเสี่ยงลำดับที่ :"+data.detail.takerisk_id+" ไปประเมินทันทีเลยใช่มั้ยครับ!!!!");
                                     if(confirm("คุณแน่ใจนะครับ!!!!")){
                                     e.preventDefault();
					$.ajax({
					   type: "POST",
					   url: "process/prcwriterisk.php",
                                           data: {method:'warp_risk'
                                                  ,level_risk:$("#combobox2").val()
                                                  ,takerisk_id:data.detail.takerisk_id
                                                },
					   success: function(result) {
						alert(result);
                                                $("#index_content").empty().load('content/check_risk.html');
					   }
					 });
                                     }
        }); 
                /////////////////// End right menu ///////////////////////     
            }
            if(data.detail.move_status=='Y' && data.detail.recycle=='N' && data.rm_status=='Y'){
                $("div#DR_content").append($("<h1><small>เลือกหน่วยงานที่ต้องการย้ายความเสี่ยงไป</small></h1>")
                        ,$("<form id='frmchange'><div class='form-group' id='dep'></div></form>"));
                        $("div#dep").append($("<label>หน่วยงานที่เกี่ยวข้อง &nbsp;</label>")
                                ,$("<select name='take_dep' class='form-control select2' id='combobox1' required></select>")
                                ,$("<label>ระดับ &nbsp;</label>")
                                ,$("<select name='level_risk' id='combobox2' class='form-control select2' required></select>")
                                ,$("<label>ทำRCA&nbsp;</label>")
                                ,$("<INPUT TYPE='checkbox' NAME='rca' style='width:20px; height:20px;' VALUE='Y' id='rca'> RCA <br><br>")
                                ,$("<button type='submit' class='btn btn-primary' id='DRsubmit'>บันทึก  </button>")
                                ,$("<input type='hidden' class='form-control' id='method' name='method' value='change_risk'>")
                                ,$("<input type='hidden' class='form-control' id='takerisk_id' name='takerisk_id' value='"+data.detail.takerisk_id+"'>"));
                                           
                                $("select#combobox1").append($("<option value=''> เลือกหน่วยงาน </option>"));
                                $.getJSON('JsonData/Dep_Data.php', function (dep) {
                                    for (var key in dep) {
                                        if(dep[key].dep_id==data.detail.res_dep){var select='selected';}else{var select='';}
                                              $("select#combobox1").append($("<option value='"+dep[key].dep_id+"' "+select+"> "+dep[key].name+" </option>"));
                                    }$(".select2").select2();
                                });
                                $("select#combobox2").append($("<option value=''> เลือกระดับความรุนแรง </option>"));
                                $.getJSON('JsonData/LevelRisk.php', function (LR) {
                                    for (var key in LR) {
                                        if(LR[key].level_risk==data.detail.level_risk){var select='selected';}else{var select='';}
                                              $("select#combobox2").append($("<option value='"+LR[key].level_risk+"' "+select+"> "+LR[key].level_risk+" </option>"));
                                    }$(".select2").select2();
                                });
                                               
                                 $("button#DRsubmit").click(function (e) {
                                     e.preventDefault();
					$.ajax({
					   type: "POST",
					   url: "process/prcwriterisk.php",
                                           data: $("#frmchange").serialize(),
					   success: function(result) {
						alert(result);
                                                $("#index_content").empty().load('content/check_risk.html');
					   }
					 });
        });
            }
            else if(data.detail.move_status=='N' && (data.rm_status=='Y' || (data.rm_status=='A' && data.detail.main_dep==data.rm_main_dep)
        || data.detail.res_dep==data.rm_dep) && data.detail.recycle=='N'){
                $("div#DR_content").append($("<H1><small><font color='#0000ff'>การทบทวนความเสี่ยง</font></small></H1><form role='form' id='analysis'></form>"));
                            if(data.detail.mng_status=='N'){
                    $("form#analysis").append($("<div class='form-group'><label>วันที่วิเคราะห์ความเสี่ยง &nbsp;</label><input type='text' name='mng_date' id='mng_date' class='form-control' readonly required></div>")
                                            ,$("<div class='form-group'><label>เหตุการณ์ที่เกิดขึ้นมีผลกระทบต่อบริการหรือหน่วยงาน ใดบ้าง</label><textarea class='form-control' style='width: 100%' COLS='100%' rows='2' placeholder='บรรยายเหตุการณ์ที่เกิดขึ้นมีผลกระทบ' name='incident_old' id='incident_old' required></textarea></div>")
                                            ,$("<div class='form-group'><label>วิเคราะห์สาเหตุที่เกิด</label><div id='sel_analysis'></div></div>")
                                            ,$("<div class='form-group'><label>สาเหตุของปัญหา</label><textarea class='form-control' style='width: 100%' COLS='100%' rows='2' placeholder='บรรยายสาเหตุของปัญหา' name='edit_summary' id='edit_summary' required></textarea></div>")
                                            ,$("<div class='form-group'><label>มาตรการหรือแนวทางแก้ไข</label><textarea class='form-control' style='width: 100%' COLS='100%' rows='2' placeholder='บรรยายมาตรการหรือแนวทางแก้ไข' name='edit_process' id='edit_process' required></textarea></div>")
                                            ,$("<div class='form-group'><label>ระยะเวลาในการดำเนินการเพื่อให้กรรมการความเสี่ยงติดตามประเมินผล</label><select class='form-control' name='evaluate' id='evaluate' required></select></div>")
                                            ,$("<input type='hidden' name='takerisk_id' value='"+idRisk.data+"'>")
                                            ,$("<input type='hidden' name='method' value='review'>")
                                            ,$("<div class='col-md-12' align='center'><input id='analyzesubmit' type='submit' value='บันทึก' class='btn btn-primary' /></div>"));
                                            $.getJSON('JsonData/analysis.php', function (LR) {
                                    for (var key in LR) { 
                                        $("div#sel_analysis").append($("<input type='checkbox' name='check"+LR[key].analysis_id+"' id='check"+LR[key].analysis_id+"' value='"+LR[key].topic+"'>&nbsp;&nbsp;&nbsp;&nbsp;<b>"+LR[key].topic+" : </b>"+LR[key].detail+"<br>"));
                                    }
                                });
                                $.getJSON('JsonData/evaluate.php', function (LR) {
                                    var option="$('<option value=''> ...เลือกระยะเวลา... </option>'),";
                                    for (var key in LR) {
                                              option += "$('<option value='"+LR[key].length+"'> "+LR[key].words+" </option>'),";
                                        }
                                        $("select#evaluate").empty().append(option);
                                        }); 
        var DP = new DatepickerThai();
        DP.GetDatepicker('#mng_date');  
                        $("#analysis").on('submit', (function (e) {
                                        if($("#incident_old").val()==''){
                                            alert("กรุณาระบุหตุการณ์ที่เกิดขึ้นมีผลกระทบด้วยครับ!!!");
                                            $("#incident_old").focus();
                                            e.preventDefault();
                                        }else if($("#edit_summary").val()==''){
                                            alert("กรุณาระบุสาเหตุของปัญหาด้วยครับ!!!");
                                            $("#edit_summary").focus();
                                            e.preventDefault();
                                        }else if($("#edit_process").val()==''){
                                            alert("กรุณาระบุมาตรการหรือแนวทางแก้ไขด้วยครับ!!!");
                                            $("#edit_process").focus();
                                            e.preventDefault();
                                        }else if($("#evaluate").val()==''){
                                            alert("กรุณาเลือกระยะเวลาในการดำเนินการด้วยครับ");
                                            $("#evaluate").focus();
                                            e.preventDefault();
                                        }else{
        				$.ajax({
                                            type: "POST",
                                            url: "process/prcwriterisk.php",
                                            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                                            contentType: false, // The content type used when sending data to the server.
                                            cache: false, // To unable request pages to be cached
                                            processData: false,
					   success: function(result) {
						alert(result);
                                                $("#index_content").empty().load('content/total_risk.html');
					   }
					 });e.preventDefault();
                                     }
                        }));
                    }else if(data.detail.mng_status=='Y'){
                    $("form#analysis").append($("<div class='form-group'><label>ผู้บันทึกการแก้ไข &nbsp;</label><p><span style='color: #0000ff;' id='user_edit'></span></div>")
                                            ,$("<div class='form-group'><label>วันที่วิเคราะห์ความเสี่ยง &nbsp;</label><p><span style='color: #0000ff;' id='mng_date'></span></div>")
                                            ,$("<div class='form-group'><label>เหตุการณ์ที่เกิดขึ้นมีผลกระทบต่อบริการหรือหน่วยงาน ใดบ้าง</label><p><span style='color: #0000ff;' id='incident_old'></span></div>")
                                            ,$("<div class='form-group'><label>วิเคราะห์สาเหตุที่เกิด</label><p><span style='color: #0000ff;' id='incident_differ'></span></div>")
                                            ,$("<div class='form-group'><label>สาเหตุของปัญหา</label><p><span style='color: #0000ff;' id='edit_summary'></span></div>")
                                            ,$("<div class='form-group'><label>มาตรการหรือแนวทางแก้ไข</label><p><span style='color: #0000ff;' id='edit_process'></span></div>")
                                            ,$("<div class='form-group'><label>ระยะเวลาในการดำเนินการเพื่อให้กรรมการความเสี่ยงติดตามประเมินผล</label><p><span style='color: #ff0000;' id='evaluate'></span></div>")
                                            ,$("<div class='form-group' id='result'></div>"));
                    if(data.rm_status=='Y'){
                            $("#result").append("<label>การประเมินผลของคณะกรรมการ</label><BR>");console.log(data.detail.admin_check);
                        if(data.detail.admin_check=='G'){ 
                            $("#result").append("<b style='color:blue'>ผ่าน</b>");
                        }else{
                            $.getJSON('JsonData/result.php', function (LR) { console.log(LR);
                                    for (var key in LR) {
                                        if(LR[key].rs_value == data.detail.admin_check){var checked='checked';}else{var checked='';}
                                              $("div#result").append($("<input type='radio' name='check' id='check' value='"+LR[key].rs_value+"' "+checked+" required>&nbsp;&nbsp;&nbsp;<b>"+LR[key].rs_wards+"</b><br>"));
                                    }
                                });
                    $("form#analysis").append($("<input type='hidden' name='method' value='assessment'>")
                                            ,$("<input type='hidden' name='takerisk_id' value='"+idRisk.data+"'>")
                                            ,$("<div class='col-md-12' align='center'><input id='analyzesubmit' type='submit' value='บันทึก' class='btn btn-primary' /></div>"));
                                $("#analysis").on('submit', (function (e) {
                                        if($("#check").val()==''){
                                            alert("กรุณาประเมินด้วยครับ");
                                            $("#check").focus();
                                            e.preventDefault();
                                        }else{
        				$.ajax({
                                            type: "POST",
                                            url: "process/prcwriterisk.php",
                                            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                                            contentType: false, // The content type used when sending data to the server.
                                            cache: false, // To unable request pages to be cached
                                            processData: false,
					   success: function(result) {
						alert(result);
                                                $("#index_content").empty().load('content/total_risk.html');
					   }
					 });e.preventDefault();
                                     }
                                 }));
                        }
                }                    
                                            $.getJSON('JsonData/detail_mngrisk.php',{data: idRisk.data}, function (data) {
                                                $("#user_edit").text(data.user_edit);
                                                $("#mng_date").text(data.mngdate);
                                                $("#incident_old").text(data.incident_old);
                                                $("#incident_differ").text(data.incident_differ);
                                                $("#edit_summary").text(data.edit_summary);
                                                $("#edit_process").text(data.edit_process);
                                                $("#evaluate").text("***ระยะเวลา "+data.evaluate+" วัน *** สามารถให้กรรมการตรวจได้ในวันที่ "+data.chkdate);
                                            });
                    }
            }
        });
        }
