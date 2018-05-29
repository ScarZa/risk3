function AddCategory (content,id=null) {
//        var cate_no ="";
//        var cate = "";
        $(content).empty().append("<h2 style='color: blue'>ตั้งค่าหมวด/รายการความเสี่ยง</h2>"+
                                    "<ol class='breadcrumb'>"+
                                    "<li><a href='index.html'><i class='fa fa-home'></i> หน้าหลัก</a></li>"+
                                    "<li class='active'><i class='fa fa-envelope'></i> ตั้งค่าหมวด/รายการความเสี่ยง</li>"+
                                    "</ol>"+
                                    "<div class='row'>"+
                                    "<div class='col-md-12'>"+
                                    "<div class='box box-primary box-solid'>"+
                                    "<div class='box-header with-border'>"+
                                    "<h4 class='box-title'> เพิ่ม/แก้ไข หมวด/รายการความเสี่ยง </h4></div>"+
                                    "<div class='box-body' id='add_user'><div class='col-md-12'><div class='col-md-5'>"+
                                    "<div class='box box-primary box-solid'><div class='box-header with-border'>"+
                                    "<h4 class='box-title'> ตั้งค่าหมวดความเสี่ยง </h4></div><div class='box-body'><form action='' name='frmaddmd' id='frmaddmd' method='post'>"+
                                    "<div class='col-md-12' id='MD_content'></div></form></div></div></div>"+
                                    "<div class='col-md-7'>"+
                                    "<div class='box box-primary box-solid'><div class='box-header with-border'>"+
                                    "<h4 class='box-title'> ตั้งค่ารายการความเสี่ยง </h4></div><div class='box-body'><form action='' name='frmaddd' id='frmaddd' method='post'>"+
                                    "<div class='col-md-12' id='D_content'></div></form></div></div></div>"+
                                    "<div class='col-md-12'><div class='box box-primary box-solid'><div class='box-header with-border'>"+
                                    "<h4 class='box-title'> หมวด/รายการความเสี่ยง </h4></div><div class='box-body'><div class='col-md-5' id='MDep_content'></div><div class='col-md-7' id='Dep_content'></div></div></div></div></div>"+
                                    "</div></div></div></div>");
                            $("h2").prepend("<img src='images/icon_set2/gear.ico' width='40'> ");
                            
                            if(id==null){
                                AddCate();AddSubCate();
                            }
                            
        }
        
function AddCate (id=null) {
     var column1 = ["id.","หมวดความเสี่ยง","แก้ไข","ลบ"];
              var CTb1 = new createTableAjax();
              CTb1.GetNewTableAjax('MDep_content','JsonData/DT_Cate.php','JsonData/tempSendData.php',column1
              ,'AddCategory?AddCate','category','category','content/add_category.html',true,false,null,false,null,false,null,null,null,null,null,'dbtb1');                    
                                
            $("#MD_content").append($("<div class='form-group'>หมวด : <INPUT TYPE='text' NAME='name' id='name' class='form-control' placeholder='ระบุหมวด' required></div>"));                   
            var idsymp = id;
            if(idsymp == null){
            $("div#MD_content").append("<input type='hidden' id='method' name='method' value='add_Cate'>");                
            $("div#MD_content").append("<div class='col-md-12' align='center'><button type='submit' class='btn btn-primary' id='MDsubmit'>บันทึก</button></div>");
            $("button#MDsubmit").click(function (e) { 
                                    if($("#name").val()==''){
                                            alert("กรุณาระบุหมวดด้วยครับ!!!");
                                            $("#name").focus();
                                            e.preventDefault();
                                        }else{
        				$.ajax({
					   type: "POST",
					   url: "process/prccate.php",
                                           data: $("#frmaddmd").serialize(),
					   success: function(result) {
						alert(result);
                                                $("#index_content").empty().load('content/add_category.html');
					   }
					 });e.preventDefault();
                                     }
        });
            }else{
                $.getJSON('JsonData/DT_Cate.php',{data: idsymp.data}, function (data) {
                    $("#name").val(data[0].name);
            $("div#MD_content").append($("<input type='hidden' id='method' name='method' value='edit_Cate'>")
                                        ,$("<input type='hidden' id='category' name='category' value='"+data[0].category+"'>"));                
            $("div#MD_content").append("<div class='col-md-12' align='center'><button type='submit' class='btn btn-warning' id='MDsubmit'>แก้ไข</button></div>");
            $("button#MDsubmit").click(function (e) { 
                                    if($("#dname").val()==''){
                                            alert("กรุณาระบุหมวดด้วยครับ!!!");
                                            $("#name").focus();
                                            e.preventDefault();
                                        }else{
        				$.ajax({
					   type: "POST",
					   url: "process/prccate.php",
                                           data: $("#frmaddmd").serialize(),
					   success: function(result) {
						alert(result);
                                                $("#index_content").empty().load('content/add_category.html');
					   }
					 });e.preventDefault();
                                     }
        });
            });
}
            }
function AddSubCate (id=null) {
    var column1 = ["id.","หมวดความเสี่ยง","รายการความเสี่ยง","แก้ไข","ลบ"];
              var CTb2 = new createTableAjax();
              CTb2.GetNewTableAjax('Dep_content','JsonData/DT_SubCate.php','JsonData/tempSendData.php',column1
              ,'AddCategory?AddSubCate','subcategory','subcategory','content/add_category.html',true,false,null,false,null,false,null,null,null,null,null,'dbtb2');                    
                                
            $("#D_content").append($("<div class='form-group'>หมวด : <select name='category' class='form-control select2' id='category' required></select></div>")
                                        ,$("<div class='form-group'>รายการ : <INPUT TYPE='text' NAME='name' id='subname' class='form-control' placeholder='ระบุงาน' required></div>"));                    
            var idsymp = id;
            if(idsymp == null){
                 
                                $.getJSON('JsonData/DT_Cate.php', function (GD) {
                                     var option="<option value=''> เลือกหมวด </option>";
                                    for (var key in GD) {
                                              option += "$('<option value='"+GD[key].category+"'> "+GD[key].name+" </option>'),";
                                        }
                                        $("select#category").empty().append(option);
                                        $(".select2").select2();
                                }); 
            $("div#D_content").append("<input type='hidden' id='method' name='method' value='add_Subcate'>");                
            $("div#D_content").append("<div class='col-md-12' align='center'><button type='submit' class='btn btn-primary' id='Dsubmit'>บันทึก</button></div>");
            $("button#Dsubmit").click(function (e) { 
                                    if($("#category").val()==''){
                                            alert("กรุณาระบุหมวดความเสี่ยงด้วยครับ!!!");
                                            $("#category").focus();
                                            e.preventDefault();
                                        }else if($("#subname").val()==''){
                                            alert("กรุณาระบุรายการความเสี่ยงด้วยครับ!!!");
                                            $("#subname").focus();
                                            e.preventDefault();
                                        }else{
        				$.ajax({
					   type: "POST",
					   url: "process/prccate.php",
                                           data: $("#frmaddd").serialize(),
					   success: function(result) {
						alert(result);
                                                $("#index_content").empty().load('content/add_category.html');
					   }
					 });e.preventDefault();
                                     }
        });
            }else{
                $.getJSON('JsonData/DT_SubCate2.php',{data: idsymp.data}, function (data) {
                                $.getJSON('JsonData/DT_Cate.php', function (GD) {
                                      var option="<option value=''> เลือกหมวด </option>";
                                    for (var key in GD) {
                                        if(GD[key].category==data[0].category){var select='selected';}else{var select='';}
                                              option += "$('<option value='"+GD[key].category+"' "+select+"> "+GD[key].name+" </option>'),";
                                        }
                                        $("select#category").empty().append(option);
                                        $(".select2").select2();
                                }); 
                                $("#subname").val(data[0].name);
                                
            $("div#D_content").append($("<input type='hidden' id='method' name='method' value='edit_Subcate'>")
                                        ,$("<input type='hidden' id='subcategory' name='subcategory' value='"+data[0].subcategory+"'>"));                
            $("div#D_content").append("<div class='col-md-12' align='center'><button type='submit' class='btn btn-warning' id='Dsubmit'>แก้ไข</button></div>");
            $("button#Dsubmit").click(function (e) { 
                                    if($("#category").val()==''){
                                            alert("กรุณาระบุหมวดความเสี่ยงด้วยครับ!!!");
                                            $("#category").focus();
                                            e.preventDefault();
                                        }else if($("#subname").val()==''){
                                            alert("กรุณาระบุรายการความเสี่ยงด้วยครับ!!!");
                                            $("#subname").focus();
                                            e.preventDefault();
                                        }else{
        				$.ajax({
					   type: "POST",
					   url: "process/prccate.php",
                                           data: $("#frmaddd").serialize(),
					   success: function(result) {
						alert(result);
                                                $("#index_content").empty().load('content/add_category.html');
					   }
					 });e.preventDefault();
                                     }
        });
                });
                }
                            }

