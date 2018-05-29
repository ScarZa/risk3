function AddResult (content,id=null) {
//        var cate_no ="";
//        var cate = "";
        $(content).empty().append("<h2 style='color: blue'>ตั้งค่าผลการประเมินความเสี่ยง</h2>"+
                                    "<ol class='breadcrumb'>"+
                                    "<li><a href='index.html'><i class='fa fa-home'></i> หน้าหลัก</a></li>"+
                                    "<li class='active'><i class='fa fa-envelope'></i> ตั้งค่าผลการประเมิน</li>"+
                                    "</ol>"+
                                    "<div class='row'>"+
                                    "<div class='col-md-12'>"+
                                    "<div class='box box-primary box-solid'>"+
                                    "<div class='box-header with-border'>"+
                                    "<h4 class='box-title'> ตั้งค่าตั้งค่าผลการประเมิน </h4></div>"+
                                    "<div class='box-body' id='add_user'><div class='col-md-12'>"+
                                    "<div class='col-md-6'>"+
                                    "<div class='box box-primary box-solid'><div class='box-header with-border'>"+
                                    "<h4 class='box-title'> เพิ่มรายการผลการประเมิน </h4></div><div class='box-body'><form action='' name='frmaddacc' id='frmaddacc' method='post'>"+
                                    "<div class='col-md-12' id='SC_content'></div></form></div></div></div>"+
                                    "<div class='col-md-12'><div class='box box-primary box-solid'><div class='box-header with-border'>"+
                                    "<h4 class='box-title'> สรุปรายการตั้งค่าผลการประเมิน </h4></div><div class='box-body'><div id='SYMP_content'></div></div></div></div></div>"+
                                    "</div></div></div></div>");
                            $("h2").prepend("<img src='images/icon_set2/gear.ico' width='40'> ");
                            
                                    var column1 = ["id.","กลุ่ม","ค่าการประเมิน","ความหมาย","แก้ไข","ลบ"];
              var CTb = new createTableAjax();
              CTb.GetNewTableAjax('SYMP_content','JsonData/ResData.php','JsonData/tempSendData.php',column1
              ,'AddResult','results','rs_id','content/add_result.html',true,false,null,false,null,false,null,null,null,null,null,'dbtb');                    
                                
            $("#SC_content").append($("<div class='form-group'>กลุ่มการประเมิน : <select name='rs_group' class='form-control select2' id='rs_group' required></select></div>")
                                    ,$("<div class='form-group'>ค่าการประเมิน : <INPUT TYPE='text' NAME='rs_value' id='rs_value' class='form-control' placeholder='ระบุค่าการประเมิน' required></div>")
                                    ,$("<div class='form-group'>ความหมาย : <INPUT TYPE='text' NAME='rs_wards' id='rs_wards' class='form-control' placeholder='ระบุความหมาย' required></div>"));                    
            var idsymp = id;
            if(idsymp == null){
            $("select#rs_group").append($("<option value=''> เลือกกลุ่มการประเมิน </option>")
                                            ,$("<option value='1'> ประเมินปรกติ </option>"));                                             
            $("div#SC_content").append("<input type='hidden' id='method' name='method' value='add_result'>");                
            $("div#SC_content").append("<div class='col-md-12' align='center'><button type='submit' class='btn btn-primary' id='SCsubmit'>บันทึก</button></div>");
            $("button#SCsubmit").click(function (e) { 
                                    if($("#rs_group").val()==''){
                                            alert("กรุณาเลือกกลุ่มด้วยครับ!!!");
                                            $("#rs_group").focus();
                                            e.preventDefault();
                                        }else if($("#rs_value").val()==''){
                                            alert("กรุณาระบุค่าด้วยครับ!!!");
                                            $("#rs_value").focus();
                                            e.preventDefault();
                                        }else if($("#rs_wards").val()==''){
                                            alert("กรุณาระบุความหมายด้วยครับ!!!");
                                            $("#rs_wards").focus();
                                            e.preventDefault();
                                        }else{
        				$.ajax({
					   type: "POST",
					   url: "process/prcres.php",
                                           data: $("#frmaddacc").serialize(),
					   success: function(result) {
						alert(result);
                                                $("#index_content").empty().load('content/add_result.html');
					   }
					 });e.preventDefault();
                                     }
        });

            }else{ 
                $.getJSON('JsonData/ResData.php',{data: idsymp.data}, function (data) { 
            $("select#rs_group").append($("<option value=''> เลือกกลุ่มการประเมิน </option>")
                                            ,$("<option value='1'> ประเมินปรกติ </option>"));     
                                            if(data[0].rs_group=='1'){
                                                $("option[value^=1]").attr("selected","selected");
                                            }        
            $("#rs_value").val(data[0].rs_value);
            $("#rs_wards").val(data[0].rs_wards);
                                
            $("div#SC_content").append($("<input type='hidden' id='method' name='method' value='edit_result'>")
                                        ,$("<input type='hidden' id='rs_id' name='rs_id' value='"+data[0].rs_id+"'>"));                
            $("div#SC_content").append("<div class='col-md-12' align='center'><button type='submit' class='btn btn-warning' id='SCsubmit'>แก้ไข</button></div>");
            $("button#SCsubmit").click(function (e) { 
                                        if($("#rs_group").val()==''){
                                            alert("กรุณาเลือกกลุ่มด้วยครับ!!!");
                                            $("#rs_group").focus();
                                            e.preventDefault();
                                        }else if($("#rs_value").val()==''){
                                            alert("กรุณาระบุค่าด้วยครับ!!!");
                                            $("#rs_value").focus();
                                            e.preventDefault();
                                        }else if($("#rs_wards").val()==''){
                                            alert("กรุณาระบุความหมายด้วยครับ!!!");
                                            $("#rs_wards").focus();
                                            e.preventDefault();
                                        }else{
        				$.ajax({
					   type: "POST",
					   url: "process/prcres.php",
                                           data: $("#frmaddacc").serialize(),
					   success: function(result) {
						alert(result);
                                                $("#index_content").empty().load('content/add_result.html');
					   }
					 });e.preventDefault();
                                     }
        });
                });
            }
        }
