function AddEvaluate (content,id=null) {
//        var cate_no ="";
//        var cate = "";
        $(content).empty().append("<h2 style='color: blue'>ตั้งค่าระยะเวลาดำเนินการ</h2>"+
                                    "<ol class='breadcrumb'>"+
                                    "<li><a href='index.html'><i class='fa fa-home'></i> หน้าหลัก</a></li>"+
                                    "<li class='active'><i class='fa fa-envelope'></i> ตั้งค่าระยะเวลาดำเนินการ</li>"+
                                    "</ol>"+
                                    "<div class='row'>"+
                                    "<div class='col-md-12'>"+
                                    "<div class='box box-primary box-solid'>"+
                                    "<div class='box-header with-border'>"+
                                    "<h4 class='box-title'> ตั้งค่าระยะเวลาดำเนินการ </h4></div>"+
                                    "<div class='box-body' id='add_user'><div class='col-md-12'>"+
                                    "<div class='col-md-6'>"+
                                    "<div class='box box-primary box-solid'><div class='box-header with-border'>"+
                                    "<h4 class='box-title'> เพิ่มระยะเวลาดำเนินการ </h4></div><div class='box-body'><form action='' name='frmaddacc' id='frmaddacc' method='post'>"+
                                    "<div class='col-md-12' id='SC_content'></div></form></div></div></div>"+
                                    "<div class='col-md-12'><div class='box box-primary box-solid'><div class='box-header with-border'>"+
                                    "<h4 class='box-title'> สรุปรายการระยะเวลาดำเนินการ </h4></div><div class='box-body'><div id='SYMP_content'></div></div></div></div></div>"+
                                    "</div></div></div></div>");
                            $("h2").prepend("<img src='images/icon_set2/gear.ico' width='40'> ");
                            
                                    var column1 = ["id.","ระยะเวลา/วัน","รายละเอียด","แก้ไข","ลบ"];
              var CTb = new createTableAjax();
              CTb.GetNewTableAjax('SYMP_content','JsonData/EvalData.php','JsonData/tempSendData.php',column1
              ,'AddEvaluate','evaluate','eval_id','content/add_evaluate.html',true,false,null,false,null,false,null,null,null,null,null,'dbtb');                    
                                
            $("#SC_content").append($("<div class='form-group'>ระยะเวลา/วัน : <INPUT TYPE='text' NAME='length' id='length' class='form-control' placeholder='ระยะเวลา/วัน' required></div>")
                                    ,$("<div class='form-group'>รายละเอียด : <INPUT TYPE='text' NAME='words' id='words' class='form-control' placeholder='เช่น 1 วัน' required></div>"));                    
            var idsymp = id;
            if(idsymp == null){
            $("div#SC_content").append("<input type='hidden' id='method' name='method' value='add_evaluate'>");                
            $("div#SC_content").append("<div class='col-md-12' align='center'><button type='submit' class='btn btn-primary' id='SCsubmit'>บันทึก</button></div>");
            $("button#SCsubmit").click(function (e) { 
                                    if($("#length").val()==''){
                                            alert("กรุณาระบุระยะเวลาด้วยครับ!!!");
                                            $("#length").focus();
                                            e.preventDefault();
                                        }else if($("#words").val()==''){
                                            alert("กรุณาระบุรายละเอียดด้วยครับ!!!");
                                            $("#words").focus();
                                            e.preventDefault();
                                        }else{
        				$.ajax({
					   type: "POST",
					   url: "process/prceval.php",
                                           data: $("#frmaddacc").serialize(),
					   success: function(result) {
						alert(result);
                                                $("#index_content").empty().load('content/add_evaluate.html');
					   }
					 });e.preventDefault();
                                     }
        });

            }else{ 
                $.getJSON('JsonData/EvalData.php',{data: idsymp.data}, function (data) {
            $("#length").val(data[0].length);
            $("#words").val(data[0].words);
                                
            $("div#SC_content").append($("<input type='hidden' id='method' name='method' value='edit_evaluate'>")
                                        ,$("<input type='hidden' id='eval_id' name='eval_id' value='"+data[0].eval_id+"'>"));                
            $("div#SC_content").append("<div class='col-md-12' align='center'><button type='submit' class='btn btn-warning' id='SCsubmit'>แก้ไข</button></div>");
            $("button#SCsubmit").click(function (e) { 
                                        if($("#length").val()==''){
                                            alert("กรุณาระบุระยะเวลาด้วยครับ!!!");
                                            $("#length").focus();
                                            e.preventDefault();
                                        }else if($("#words").val()==''){
                                            alert("กรุณาระบุรายละเอียดด้วยครับ!!!");
                                            $("#words").focus();
                                            e.preventDefault();
                                        }else{
        				$.ajax({
					   type: "POST",
					   url: "process/prceval.php",
                                           data: $("#frmaddacc").serialize(),
					   success: function(result) {
						alert(result);
                                                $("#index_content").empty().load('content/add_evaluate.html');
					   }
					 });e.preventDefault();
                                     }
        });
                });
            }
        }
