function DetailRisk (content,id=null) {
//        var cate_no ="";
//        var cate = "";
        $(content).empty().append("<h2 style='color: blue'>รายละเอียด/ดำเนินการความเสี่ยง</h2>"
                                +"<ol class='breadcrumb'><li><a href='index.html'><i class='fa fa-home'></i> หน้าหลัก</a></li>"
                                +"<li id='bc'></li><li class='active'><i class='fa fa-envelope'></i> รายละเอียด/ดำเนินการความเสี่ยง</li></ol>"
                                +"<div class='row'><div class='col-md-12'>"
                                +"<div class='box box-primary box-solid'><div class='box-header with-border'>"
                                +"<h4 class='box-title'> รายละเอียดความเสี่ยง โอกาสที่จะประสบกับความสูญเสีย หรือสิ่งไม่พึงประสงค์ โอกาสความน่าจะเป็นที่จะเกิดอุบัติการณ์ </h4>"
                                +"<div class='box-tools pull-right'></div></div>"
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
                                +"</table></div></div></div><div class='col-md-12' id='Follow'></div><div class='col-md-12' id='DR_content'></div></div>");
            var idRisk = id;

        $.getJSON('JsonData/detail_risk.php',{data: idRisk.data}, function (data) {
            if(data.rm_status == 'Y'){
                $("ol li#bc").append("<a href='#'><i class='fa fa-envelope'></i></a>");
                if(data.detail.recycle=='Y'){
                $("ol li#bc>a").text(" ความเสี่ยงในถังขยะ").attr("onclick","loadPage('#index_content','content/recycle_risk.html');");
            }else if(data.detail.move_status=='Y'){
                $("ol li#bc>a").text(" รายการแจ้งย้ายความเสี่ยง").attr("onclick","loadPage('#index_content','content/check_risk.html');");
            }else if(data.detail.move_status=='N'){
                $("ol li#bc>a").text(" ติดตาม/ประเมินผล").attr("onclick","loadPage('#index_content','content/total_risk.html');");
            }
            }
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
                $("div.box-tools").append($("<a id='print' href='#' title='ปริ้นท์หน้านี้'><input type='image' src='images/printer.png' align='right' title='ปริ้นท์หน้านี้'></a>"));
                $("#print").attr("onclick","window.open('content/detailRiskInBox_PDF.php?takerisk_id="+data.detail.takerisk_id+"', '', 'width=700,height=900'); return false;")
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
            if(data.detail.mng_status != 'Y' && (data.detail.res_dep == data.rm_dep || data.rm_status == 'A')){
                    $("div.text-right").append($("<a href='#' id='return_risk'>ส่งคืนความเสี่ยง <i class='fa fa-arrow-circle-left'></i></a><br><br>"));
                    $("a#return_risk").click(function (e) {
                                     e.preventDefault();
                                     if (confirm('กรุณายืนยันการส่งคืนอีกครั้ง !!!')) {
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
                                     }
        });
            }
            if((data.rm_status == 'Y' || data.rm_status == 'A') && data.detail.recycle == 'N' && (data.detail.mng_status == 'N')){
                    $("div.text-right").append($("<a id='forword_rm' href='#' data-toggle='modal' data-target='#forwardModal' data-whatever='"+data.detail.takerisk_id+"'>ส่งต่อความเสี่ยง <i class='fa fa-arrow-circle-right'></i></a><br><br>"));
                        $("#forword_rm").attr("onclick","forwardModal ()");
            }
            if(data.rm_status == 'Y' && data.detail.recycle == 'N' && data.detail.move_status == 'Y'){
                /////////////////// right menu ///////////////////////
                $("div.text-right").append($("<a id='editRisk' href='#'>แก้ไขรายละเอียด <i class='fa fa-edit'></i></a><br><br>"+
                            "<a href='#' id='recycle' data-toggle='modal' data-target='#recycleModal' data-whatever='"+data.detail.takerisk_id+"'>ย้ายเข้าถังขยะ <i class='fa fa-trash-o'></i></a><br><br>"+
                            "<a href='#' id='warp_risk'>ย้ายไปประเมิน <i class='fa fa-bolt'></i></a>"));
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
                                        if(LR[key].num==data.detail.LR_id){var select='selected';}else{var select='';}
                                              $("select#combobox2").append($("<option value='"+LR[key].num+"' "+select+"> "+LR[key].level_risk+" </option>"));
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
            }else if(data.detail.move_status=='N' && (data.rm_status=='Y' || (data.rm_status=='A' && data.detail.main_dep==data.rm_main_dep)
        || data.detail.res_dep==data.rm_dep) && data.detail.recycle=='N'){
                
                           if(data.detail.mng_status=='N' || data.detail.admin_check!='G'){
                $("div#Follow").append($("<a id='Follow_rm' href='#' data-toggle='modal' data-target='#reviewModal' data-whatever='"+data.detail.takerisk_id+"' class='btn btn-warning'>ทบทวนความเสี่ยง <i class='fa fa-arrow-circle-right'></i></a>"));
                        $("#Follow_rm").attr("onclick","reviewModal ()");
                    }
                   if(data.detail.mng_status=='Y'){
                       $("div#DR_content").append($("<H3><font color='#0000ff'>การทบทวนความเสี่ยง</font></H3><form role='form' id='analysis'></form>"));
                       var column1 = ["เลขที่","วันที่ทบทวน","ผู้ทบทวน","ระยะเวลา/วัน","วันที่ประเมิน","สถานะ","ประเมิน"];
              var CTb = new createTableAjax();
              CTb.GetNewTableAjax('contentTB','JsonData/DT_review.php?'+idRisk.data,'JsonData/tempSendData.php',column1
              ,null,null,null,null,false,false,null,true,'assModal',false,null,null,null,null,null,null,'dbtb');

                                     $("form#analysis").append($("<div class='form-group' id='contentTB'></div>"));
                    }
            }
        });
        }
