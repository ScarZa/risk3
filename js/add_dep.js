function AddDepartment (content,id=null) {
//        var cate_no ="";
//        var cate = "";
        $(content).empty().append("<h2 style='color: blue'>ตั้งค่าฝ่าย/งาน</h2>"+
                                    "<ol class='breadcrumb'>"+
                                    "<li><a href='index.html'><i class='fa fa-home'></i> หน้าหลัก</a></li>"+
                                    "<li class='active'><i class='fa fa-envelope'></i> ตั้งค่าฝ่าย/งาน</li>"+
                                    "</ol>"+
                                    "<div class='row'>"+
                                    "<div class='col-md-12'>"+
                                    "<div class='box box-primary box-solid'>"+
                                    "<div class='box-header with-border'>"+
                                    "<h4 class='box-title'> เพิ่ม/แก้ไข ข้อมูลตั้งค่าฝ่าย/งาน </h4></div>"+
                                    "<div class='box-body' id='add_user'><div class='col-md-12'><div class='col-md-5'>"+
                                    "<div class='box box-primary box-solid'><div class='box-header with-border'>"+
                                    "<h4 class='box-title'> ตั้งค่าฝ่าย </h4></div><div class='box-body'><form action='' name='frmaddmd' id='frmaddmd' method='post'>"+
                                    "<div class='col-md-12' id='MD_content'></div></form></div></div></div>"+
                                    "<div class='col-md-7'>"+
                                    "<div class='box box-primary box-solid'><div class='box-header with-border'>"+
                                    "<h4 class='box-title'> ตั้งค่างาน </h4></div><div class='box-body'><form action='' name='frmaddd' id='frmaddd' method='post'>"+
                                    "<div class='col-md-12' id='D_content'></div></form></div></div></div>"+
                                    "<div class='col-md-12'><div class='box box-primary box-solid'><div class='box-header with-border'>"+
                                    "<h4 class='box-title'> ฝ่าย/งาน </h4></div><div class='box-body'><div class='col-md-5' id='MDep_content'></div><div class='col-md-7' id='Dep_content'></div></div></div></div></div>"+
                                    "</div></div></div></div>");
                            $("h2").prepend("<img src='images/icon_set2/gear.ico' width='40'> ");
                            
                            if(id==null){
                                AddMDep();AddDep();
                            }
                            
        }
        
function AddMDep (id=null) {
     var column1 = ["id.","ฝ่าย","แก้ไข","ลบ"];
              var CTb1 = new createTableAjax();
              CTb1.GetNewTableAjax('MDep_content','JsonData/DT_MDep.php','JsonData/tempSendData.php',column1
              ,'AddDepartment?AddMDep','department_group','main_dep','content/add_department.html',true,false,null,false,null,false,null,null,null,null,null,'dbtb1');                    
                                
            $("#MD_content").append($("<div class='form-group'>ฝ่าย : <INPUT TYPE='text' NAME='dep_name' id='dep_name' class='form-control' placeholder='ระบุฝ่าย' required></div>"));                   
            var idsymp = id;
            if(idsymp == null){
            $("div#MD_content").append("<input type='hidden' id='method' name='method' value='add_Mdep'>");                
            $("div#MD_content").append("<div class='col-md-12' align='center'><button type='submit' class='btn btn-primary' id='MDsubmit'>บันทึก</button></div>");
            $("button#MDsubmit").click(function (e) { 
                                    if($("#dep_name").val()==''){
                                            alert("กรุณาระบุฝ่ายด้วยครับ!!!");
                                            $("#dep_name").focus();
                                            e.preventDefault();
                                        }else{
        				$.ajax({
					   type: "POST",
					   url: "process/prcdep.php",
                                           data: $("#frmaddmd").serialize(),
					   success: function(result) {
						alert(result);
                                                $("#index_content").empty().load('content/add_department.html');
					   }
					 });e.preventDefault();
                                     }
        });
            }else{
                $.getJSON('JsonData/DT_MDep.php',{data: idsymp.data}, function (data) {
                    $("#dep_name").val(data[0].dep_name);
            $("div#MD_content").append($("<input type='hidden' id='method' name='method' value='edit_Mdep'>")
                                        ,$("<input type='hidden' id='main_dep' name='main_dep' value='"+data[0].main_dep+"'>"));                
            $("div#MD_content").append("<div class='col-md-12' align='center'><button type='submit' class='btn btn-warning' id='MDsubmit'>แก้ไข</button></div>");
            $("button#MDsubmit").click(function (e) { 
                                    if($("#dep_name").val()==''){
                                            alert("กรุณาระบุฝ่ายด้วยครับ!!!");
                                            $("#dep_name").focus();
                                            e.preventDefault();
                                        }else{
        				$.ajax({
					   type: "POST",
					   url: "process/prcdep.php",
                                           data: $("#frmaddmd").serialize(),
					   success: function(result) {
						alert(result);
                                                $("#index_content").empty().load('content/add_department.html');
					   }
					 });e.preventDefault();
                                     }
        });
            });
}
            }
function AddDep (id=null) {
    var column1 = ["id.","ฝ่าย","งาน","แก้ไข","ลบ"];
              var CTb2 = new createTableAjax();
              CTb2.GetNewTableAjax('Dep_content','JsonData/DT_Dep.php','JsonData/tempSendData.php',column1
              ,'AddDepartment?AddDep','department','dep_id','content/add_department.html',true,false,null,false,null,false,null,null,null,null,null,'dbtb2');                    
                                
            $("#D_content").append($("<div class='form-group'>ฝ่าย : <select name='main_dep' class='form-control select2' id='main_dep' required></select></div>")
                                        ,$("<div class='form-group'>งาน : <INPUT TYPE='text' NAME='name' id='name' class='form-control' placeholder='ระบุงาน' required></div>"));                    
            var idsymp = id;
            if(idsymp == null){
                 
                                $.getJSON('JsonData/MDep_Data.php', function (GD) {
                                     var option="<option value=''> เลือกฝ่าย </option>";
                                    for (var key in GD) {
                                              option += "$('<option value='"+GD[key].main_dep+"'> "+GD[key].dep_name+" </option>'),";
                                        }
                                        $("select#main_dep").empty().append(option);
                                        $(".select2").select2();
                                }); 
            $("div#D_content").append("<input type='hidden' id='method' name='method' value='add_dep'>");                
            $("div#D_content").append("<div class='col-md-12' align='center'><button type='submit' class='btn btn-primary' id='Dsubmit'>บันทึก</button></div>");
            $("button#Dsubmit").click(function (e) { 
                                    if($("#main_dep").val()==''){
                                            alert("กรุณาระบุฝ่ายด้วยครับ!!!");
                                            $("#main_dep").focus();
                                            e.preventDefault();
                                        }else if($("#name").val()==''){
                                            alert("กรุณาระบุงานด้วยครับ!!!");
                                            $("#name").focus();
                                            e.preventDefault();
                                        }else{
        				$.ajax({
					   type: "POST",
					   url: "process/prcdep.php",
                                           data: $("#frmaddd").serialize(),
					   success: function(result) {
						alert(result);
                                                $("#index_content").empty().load('content/add_department.html');
					   }
					 });e.preventDefault();
                                     }
        });
            }else{
                $.getJSON('JsonData/Dep_Data2.php',{data: idsymp.data}, function (data) {
                                $.getJSON('JsonData/MDep_Data.php', function (GD) {
                                      var option="<option value=''> เลือกฝ่าย </option>";
                                    for (var key in GD) {
                                        if(GD[key].main_dep==data[0].main_dep){var select='selected';}else{var select='';}
                                              option += "$('<option value='"+GD[key].main_dep+"' "+select+"> "+GD[key].dep_name+" </option>'),";
                                        }
                                        $("select#main_dep").empty().append(option);
                                        $(".select2").select2();
                                }); 
                                $("#name").val(data[0].name);
                                
            $("div#D_content").append($("<input type='hidden' id='method' name='method' value='edit_dep'>")
                                        ,$("<input type='hidden' id='dep_id' name='dep_id' value='"+data[0].dep_id+"'>"));                
            $("div#D_content").append("<div class='col-md-12' align='center'><button type='submit' class='btn btn-warning' id='Dsubmit'>แก้ไข</button></div>");
            $("button#Dsubmit").click(function (e) { 
                                    if($("#main_dep").val()==''){
                                            alert("กรุณาระบุฝ่ายด้วยครับ!!!");
                                            $("#main_dep").focus();
                                            e.preventDefault();
                                        }else if($("#name").val()==''){
                                            alert("กรุณาระบุงานด้วยครับ!!!");
                                            $("#name").focus();
                                            e.preventDefault();
                                        }else{
        				$.ajax({
					   type: "POST",
					   url: "process/prcdep.php",
                                           data: $("#frmaddd").serialize(),
					   success: function(result) {
						alert(result);
                                                $("#index_content").empty().load('content/add_department.html');
					   }
					 });e.preventDefault();
                                     }
        });
                });
                }
                            }

