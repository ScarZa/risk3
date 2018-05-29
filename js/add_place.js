function AddPlace (content,id=null) {
//        var cate_no ="";
//        var cate = "";
        $(content).empty().append("<h2 style='color: blue'>ตั้งค่าสถานที่/กระบวนการ</h2>"+
                                    "<ol class='breadcrumb'>"+
                                    "<li><a href='index.html'><i class='fa fa-home'></i> หน้าหลัก</a></li>"+
                                    "<li class='active'><i class='fa fa-envelope'></i> ตั้งค่าสถานที่/กระบวนการ</li>"+
                                    "</ol>"+
                                    "<div class='row'>"+
                                    "<div class='col-md-12'>"+
                                    "<div class='box box-primary box-solid'>"+
                                    "<div class='box-header with-border'>"+
                                    "<h4 class='box-title'> ตั้งค่าสถานที่/กระบวนการ </h4></div>"+
                                    "<div class='box-body' id='add_user'><div class='col-md-12'>"+
                                    "<div class='col-md-6'>"+
                                    "<div class='box box-primary box-solid'><div class='box-header with-border'>"+
                                    "<h4 class='box-title'> รายการสถานที่/กระบวนการ </h4></div><div class='box-body'><form action='' name='frmaddacc' id='frmaddacc' method='post'>"+
                                    "<div class='col-md-12' id='SC_content'></div></form></div></div></div>"+
                                    "<div class='col-md-12'><div class='box box-primary box-solid'><div class='box-header with-border'>"+
                                    "<h4 class='box-title'> สรุปรายการตั้งค่าสถานที่/กระบวนการ </h4></div><div class='box-body'><div id='SYMP_content'></div></div></div></div></div>"+
                                    "</div></div></div></div>");
                            $("h2").prepend("<img src='images/icon_set2/gear.ico' width='40'> ");
                            
                                    var column1 = ["id.","ชื่อสถานที่/กระบวนการ","แก้ไข","ลบ"];
              var CTb = new createTableAjax();
              CTb.GetNewTableAjax('SYMP_content','JsonData/placeData.php','JsonData/tempSendData.php',column1
              ,'AddPlace','place','place','content/add_place.html',true,false,null,false,null,false,null,null,null,null,null,'dbtb');                    
                                
            $("#SC_content").append($("<div class='form-group'>ชื่อสถานที่/กระบวนการ : <INPUT TYPE='text' NAME='name' id='name' class='form-control' placeholder='ระบุชื่อสถานที่/กระบวนการ' required></div>"));                    
            var idsymp = id;
            if(idsymp == null){
                                                         
            $("div#SC_content").append("<input type='hidden' id='method' name='method' value='add_place'>");                
            $("div#SC_content").append("<div class='col-md-12' align='center'><button type='submit' class='btn btn-primary' id='SCsubmit'>บันทึก</button></div>");
            $("button#SCsubmit").click(function (e) { 
                                    if($("#name").val()==''){
                                            alert("กรุณาระบุชื่อสถานที่/กระบวนการด้วยครับ!!!");
                                            $("#name").focus();
                                            e.preventDefault();
                                        }else{
        				$.ajax({
					   type: "POST",
					   url: "process/prcplace.php",
                                           data: $("#frmaddacc").serialize(),
					   success: function(result) {
						alert(result);
                                                $("#index_content").empty().load('content/add_place.html');
					   }
					 });e.preventDefault();
                                     }
        });

            }else{ 
                $.getJSON('JsonData/placeData.php',{data: idsymp.data}, function (data) { 
        
                                            $("#name").val(data[0].name);
                                
            $("div#SC_content").append($("<input type='hidden' id='method' name='method' value='edit_place'>")
                                        ,$("<input type='hidden' id='place' name='place' value='"+data[0].place+"'>"));                
            $("div#SC_content").append("<div class='col-md-12' align='center'><button type='submit' class='btn btn-warning' id='SCsubmit'>แก้ไข</button></div>");
            $("button#SCsubmit").click(function (e) { 
                                        if($("#accp_name").val()==''){
                                            alert("กรุณาระบุชื่ออุปกรณ์ด้วยครับ!!!");
                                            $("#accp_name").focus();
                                            e.preventDefault();
                                        }else{
        				$.ajax({
					   type: "POST",
					   url: "process/prcplace.php",
                                           data: $("#frmaddacc").serialize(),
					   success: function(result) {
						alert(result);
                                                $("#index_content").empty().load('content/add_place.html');
					   }
					 });e.preventDefault();
                                     }
        });
                });
            }
        }
