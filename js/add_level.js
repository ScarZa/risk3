function AddLevel (content,id=null) {
//        var cate_no ="";
//        var cate = "";
        $(content).empty().append("<h2 style='color: blue'>ตั้งค่าระดับความรุนแรง</h2>"+
                                    "<ol class='breadcrumb'>"+
                                    "<li><a href='index.html'><i class='fa fa-home'></i> หน้าหลัก</a></li>"+
                                    "<li class='active'><i class='fa fa-envelope'></i> ตั้งค่าระดับความรุนแรง</li>"+
                                    "</ol>"+
                                    "<div class='row'>"+
                                    "<div class='col-md-12'>"+
                                    "<div class='box box-primary box-solid'>"+
                                    "<div class='box-header with-border'>"+
                                    "<h4 class='box-title'> ตั้งค่าระดับความรุนแรง </h4></div>"+
                                    "<div class='box-body' id='add_user'><div class='col-md-12'>"+
                                    "<div class='col-md-6'>"+
                                    "<div class='box box-primary box-solid'><div class='box-header with-border'>"+
                                    "<h4 class='box-title'> เพิ่มรายการระดับความรุนแรง </h4></div><div class='box-body'><form action='' name='frmaddacc' id='frmaddacc' method='post'>"+
                                    "<div class='col-md-12' id='SC_content'></div></form></div></div></div>"+
                                    "<div class='col-md-12'><div class='box box-primary box-solid'><div class='box-header with-border'>"+
                                    "<h4 class='box-title'> สรุปรายการระดับความรุนแรง </h4></div><div class='box-body'><div id='SYMP_content'></div></div></div></div></div>"+
                                    "</div></div></div></div>");
                            $("h2").prepend("<img src='images/icon_set2/gear.ico' width='40'> ");
                            
                                    var column1 = ["id.","กลุ่มความรุนแรง","ค่าระดับความรุนแรง","ความหมาย","แก้ไข","ลบ"];
              var CTb = new createTableAjax();
              CTb.GetNewTableAjax('SYMP_content','JsonData/LevelData.php','JsonData/tempSendData.php',column1
              ,'AddLevel','level_risk','num','content/add_level.html',true,false,null,false,null,false,null,null,null,null,null,'dbtb');                    
                                
            $("#SC_content").append($("<div class='form-group'>กลุ่มความรุนแรง : <select name='group_LV' class='form-control select2' id='group_LV' required></select></div>")
                                    ,$("<div class='form-group'>ค่าระดับความรุนแรง : <INPUT TYPE='text' NAME='level_risk' id='level_risk' class='form-control' placeholder='ระบุค่าระดับความรุนแรง' required></div>")
                                    ,$("<div class='form-group'>ความหมาย : <INPUT TYPE='text' NAME='name' id='name' class='form-control' placeholder='ระบุความหมาย' required></div>"));                    
            var idsymp = id;
            if(idsymp == null){
            $("select#group_LV").append($("<option value=''> เลือกกลุ่มความรุนแรง </option>")
                                            ,$("<option value='1'> ความรุนแรงปรกติ </option>"));                                             
            $("div#SC_content").append("<input type='hidden' id='method' name='method' value='add_level'>");                
            $("div#SC_content").append("<div class='col-md-12' align='center'><button type='submit' class='btn btn-primary' id='SCsubmit'>บันทึก</button></div>");
            $("button#SCsubmit").click(function (e) { 
                                    if($("#group_LV").val()==''){
                                            alert("กรุณาเลือกกลุ่มความรุนแรงด้วยครับ!!!");
                                            $("#group_LV").focus();
                                            e.preventDefault();
                                        }else if($("#level_risk").val()==''){
                                            alert("กรุณาระบุค่าระดับความรุนแรงด้วยครับ!!!");
                                            $("#level_risk").focus();
                                            e.preventDefault();
                                        }else if($("#name").val()==''){
                                            alert("กรุณาระบุความหมายด้วยครับ!!!");
                                            $("#name").focus();
                                            e.preventDefault();
                                        }else{
        				$.ajax({
					   type: "POST",
					   url: "process/prclevel.php",
                                           data: $("#frmaddacc").serialize(),
					   success: function(result) {
						alert(result);
                                                $("#index_content").empty().load('content/add_level.html');
					   }
					 });e.preventDefault();
                                     }
        });

            }else{ 
                $.getJSON('JsonData/LevelData.php',{data: idsymp.data}, function (data) {
            $("select#group_LV").append($("<option value=''> เลือกกลุ่มความรุนแรง </option>")
                                            ,$("<option value='1'> ความรุนแรงปรกติ </option>"));      
                                            if(data[0].group_LV=='1'){
                                                $("option[value^=1]").attr("selected","selected");
                                            }        
            $("#level_risk").val(data[0].level_risk);
            $("#name").val(data[0].name);
                                
            $("div#SC_content").append($("<input type='hidden' id='method' name='method' value='edit_level'>")
                                        ,$("<input type='hidden' id='num' name='num' value='"+data[0].num+"'>"));                
            $("div#SC_content").append("<div class='col-md-12' align='center'><button type='submit' class='btn btn-warning' id='SCsubmit'>แก้ไข</button></div>");
            $("button#SCsubmit").click(function (e) { 
                                        if($("#group_LV").val()==''){
                                            alert("กรุณาเลือกกลุ่มความรุนแรงด้วยครับ!!!");
                                            $("#group_LV").focus();
                                            e.preventDefault();
                                        }else if($("#level_risk").val()==''){
                                            alert("กรุณาระบุค่าระดับความรุนแรงด้วยครับ!!!");
                                            $("#level_risk").focus();
                                            e.preventDefault();
                                        }else if($("#name").val()==''){
                                            alert("กรุณาระบุความหมายด้วยครับ!!!");
                                            $("#name").focus();
                                            e.preventDefault();
                                        }else{
        				$.ajax({
					   type: "POST",
					   url: "process/prclevel.php",
                                           data: $("#frmaddacc").serialize(),
					   success: function(result) {
						alert(result);
                                                $("#index_content").empty().load('content/add_level.html');
					   }
					 });e.preventDefault();
                                     }
        });
                });
            }
        }
