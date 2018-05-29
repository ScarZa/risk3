function AddAnalysis (content,id=null) {
//        var cate_no ="";
//        var cate = "";
        $(content).empty().append("<h2 style='color: blue'>ตั้งค่าการวิเคาระห์ความเสี่ยง</h2>"+
                                    "<ol class='breadcrumb'>"+
                                    "<li><a href='index.html'><i class='fa fa-home'></i> หน้าหลัก</a></li>"+
                                    "<li class='active'><i class='fa fa-envelope'></i> ตั้งค่าผลการวิเคาระห์</li>"+
                                    "</ol>"+
                                    "<div class='row'>"+
                                    "<div class='col-md-12'>"+
                                    "<div class='box box-primary box-solid'>"+
                                    "<div class='box-header with-border'>"+
                                    "<h4 class='box-title'> ตั้งค่าตั้งค่าผลการวิเคาระห์ </h4></div>"+
                                    "<div class='box-body' id='add_user'><div class='col-md-12'>"+
                                    "<div class='col-md-6'>"+
                                    "<div class='box box-primary box-solid'><div class='box-header with-border'>"+
                                    "<h4 class='box-title'> เพิ่มรายการผลการวิเคาระห์ </h4></div><div class='box-body'><form action='' name='frmaddacc' id='frmaddacc' method='post'>"+
                                    "<div class='col-md-12' id='SC_content'></div></form></div></div></div>"+
                                    "<div class='col-md-12'><div class='box box-primary box-solid'><div class='box-header with-border'>"+
                                    "<h4 class='box-title'> สรุปรายการตั้งค่าผลการวิเคาระห์ </h4></div><div class='box-body'><div id='SYMP_content'></div></div></div></div></div>"+
                                    "</div></div></div></div>");
                            $("h2").prepend("<img src='images/icon_set2/gear.ico' width='40'> ");
                            
                                    var column1 = ["id.","ค่าการวิเคราะห์","รายละเอียด","แก้ไข","ลบ"];
              var CTb = new createTableAjax();
              CTb.GetNewTableAjax('SYMP_content','JsonData/AnalyData.php','JsonData/tempSendData.php',column1
              ,'AddAnalysis','analysis','analysis_id','content/add_analysis.html',true,false,null,false,null,false,null,null,null,null,null,'dbtb');                    
                                
            $("#SC_content").append($("<div class='form-group'>ค่าการวิเคราะห์ : <INPUT TYPE='text' NAME='topic' id='topic' class='form-control' placeholder='ระบุค่าการวิเคราะห์' required></div>")
                                    ,$("<div class='form-group'>รายละเอียด : <INPUT TYPE='text' NAME='detail' id='detail' class='form-control' placeholder='ระบุรายละเอียด' required></div>"));                    
            var idsymp = id;
            if(idsymp == null){
            $("div#SC_content").append("<input type='hidden' id='method' name='method' value='add_analysis'>");                
            $("div#SC_content").append("<div class='col-md-12' align='center'><button type='submit' class='btn btn-primary' id='SCsubmit'>บันทึก</button></div>");
            $("button#SCsubmit").click(function (e) { 
                                    if($("#topic").val()==''){
                                            alert("กรุณาค่าค่าการวิเคราะห์ด้วยครับ!!!");
                                            $("#topic").focus();
                                            e.preventDefault();
                                        }else if($("#detail").val()==''){
                                            alert("กรุณาระบุรายละเอียดด้วยครับ!!!");
                                            $("#detail").focus();
                                            e.preventDefault();
                                        }else{
        				$.ajax({
					   type: "POST",
					   url: "process/prcanalysis.php",
                                           data: $("#frmaddacc").serialize(),
					   success: function(result) {
						alert(result);
                                                $("#index_content").empty().load('content/add_analysis.html');
					   }
					 });e.preventDefault();
                                     }
        });

            }else{ 
                $.getJSON('JsonData/AnalyData.php',{data: idsymp.data}, function (data) {
            $("#topic").val(data[0].topic);
            $("#detail").val(data[0].detail);
                                
            $("div#SC_content").append($("<input type='hidden' id='method' name='method' value='edit_analysis'>")
                                        ,$("<input type='hidden' id='analysis_id' name='analysis_id' value='"+data[0].analysis_id+"'>"));                
            $("div#SC_content").append("<div class='col-md-12' align='center'><button type='submit' class='btn btn-warning' id='SCsubmit'>แก้ไข</button></div>");
            $("button#SCsubmit").click(function (e) { 
                                        if($("#topic").val()==''){
                                            alert("กรุณาค่าค่าการวิเคราะห์ด้วยครับ!!!");
                                            $("#topic").focus();
                                            e.preventDefault();
                                        }else if($("#detail").val()==''){
                                            alert("กรุณาระบุรายละเอียดด้วยครับ!!!");
                                            $("#detail").focus();
                                            e.preventDefault();
                                        }else{
        				$.ajax({
					   type: "POST",
					   url: "process/prcanalysis.php",
                                           data: $("#frmaddacc").serialize(),
					   success: function(result) {
						alert(result);
                                                $("#index_content").empty().load('content/add_analysis.html');
					   }
					 });e.preventDefault();
                                     }
        });
                });
            }
        }
