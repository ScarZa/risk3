function AddUser (content,id=null) {
//        var cate_no ="";
//        var cate = "";
        $(content).empty().append("<h2 style='color: blue'>เพิ่มผู้ใช้งานระบบ</h2>"+
                                    "<ol class='breadcrumb'>"+
                                    "<li><a href='index.html'><i class='fa fa-home'></i> หน้าหลัก</a></li>"+
                                    "<li class='active'><i class='fa fa-envelope'></i> เพิ่มผู้ใช้งานระบบ</li>"+
                                    "</ol><form action='' name='frmadduser' id='frmadduser' method='post'>"+
                                    "<div class='row'>"+
                                    "<div class='col-md-12'>"+
                                    "<div class='box box-primary box-solid'>"+
                                    "<div class='box-header with-border'>"+
                                    "<h4 class='box-title'> เพิ่มข้อมูลผู้ใช้งานระบบ </h4></div>"+
                                    "<div class='box-body' id='add_user'><div class='col-md-12'><div class='col-md-6'>"+
                                    "<div class='box box-primary box-solid'><div class='box-header with-border'>"+
                                    "<h4 class='box-title'> ข้อมูลผู้ใช้งานระบบ </h4></div><div class='box-body'><div id='DU_content'></div>"+
                                    "<div class='col-md-12' id='DUS_content'></div></div></div></div></form>"+
                                    "<div class='col-md-12'><div class='box box-primary box-solid'><div class='box-header with-border'>"+
                                    "<h4 class='box-title'> ผู้ใช้งานระบบ </h4></div><div class='box-body'><div id='DSP_content'></div></div></div></div></div>"+
                                    "</div></div></div></div>");
                            $("h2").prepend("<img src='images/icon_set2/gear.ico' width='40'> ");
                            
                                    var column1 = ["id.","ชื่อ-นามสกุล","งาน","ระดับการใช้งาน","ชื่อผู้ใช้","แก้ไข","ลบ"];
              var CTb = new createTableAjax();
              CTb.GetNewTableAjax('DSP_content','JsonData/DT_US.php','JsonData/tempSendData.php',column1
              ,'AddUser','user','user_id','content/add_user.html',true,false,null,false,null,false,null,null,null,null,null,'dbtb');                    
                                
            $("#DUS_content").append($("<div class='form-group'>ชื่อผู้ใช้งาน : <INPUT TYPE='text' NAME='user_fname' id='user_fname' class='form-control' placeholder='ระบุชื่อ' required></div>")
                        ,$("<div class='form-group'>นามสกุล : <INPUT TYPE='text' NAME='user_lname' id='user_lname' class='form-control' placeholder='ระบุนามสกุล' required></div>")
                        ,$("<div class='form-group'>เลือกงาน : <select name='dep_id' class='form-control select2' id='dep_id' required></select></div>")
                        ,$("<div class='form-group'>ระดับการใช้งาน : <select name='admin' class='form-control select2' id='admin' required></select></div>")
                        ,$("<div class='form-group'>ชื่อผู้ใช้ : <INPUT TYPE='text' NAME='user_account' id='user_account' class='form-control' placeholder='ระบุชื่อผู้ใช้' required></div>")
                        ,$("<div class='form-group'>รหัสผ่าน : <INPUT TYPE='password' NAME='user_pwd' id='user_pwd' class='form-control' placeholder='ระบุรหัสผ่าน'></div>")
                        ,$("<div class='form-group' id='con_pass'>ยืนยันรหัสผ่าน : <INPUT TYPE='password' NAME='con_password' id='con_password' class='form-control' placeholder='ยืนยันรหัสผ่าน'></div>")
                        ,$("<div id='image_preview'><img id='previewing' src='images/icon_set2/image.ico' width='50' /></div>")
                        ,$("<div class='form-group'>รูปภาพ : <input type='file' name='file' id='file' class='form-control' /></div></div><h4 id='loading' >loading..</h4><div id='message'></div>"));

            var iduser = id;
            if(iduser == null){
        
                                $.getJSON('JsonData/Dep_Data.php', function (GD) {
                                     var option="<option value=''> เลือกงาน </option>";
                                    for (var key in GD) {
                                              option += "$('<option value='"+GD[key].dep_id+"'> "+GD[key].name+" </option>'),";
                                        }
                                        $("select#dep_id").empty().append(option);
                                        $(".select2").select2();
                                }); 
                $("select#admin").append($("<option value=''> เลือกระดับการใช้งาน </option>")
                                            ,$("<option value='N'> ผู้ใช้งานทั่วไป </option>")
                                            ,$("<option value='A'> หัวหน้าฝ่าย </option>")
                                            ,$("<option value='Y'> คณะกรรมการ/ผู้ดูลระบบ </option>"));
                                    
            $("div#DUS_content").append("<input type='hidden' id='method' name='method' value='add_user'>");                
            $("div#DUS_content").append("<div class='col-md-12' align='center'><button type='submit' class='btn btn-primary' id='USsubmit'>บันทึก</button></div>");
            $('#loading').hide();
            $("#frmadduser").on('submit', (function (e) {
                $("#message").empty();
                $('#loading').show();
                                    if($("#user_fname").val()==''){
                                            alert("กรุณาระบุชื่อครับ!!!");
                                            $("#user_fname").focus();
                                            e.preventDefault();
                                        }else if($("#user_lname").val()==''){
                                            alert("กรุณาระบุนามสกุลด้วยครับ!!!");
                                            $("#user_lname").focus();
                                            e.preventDefault();
                                        }else if($("#dep_id").val()==''){
                                            alert("กรุณาเลือกงานด้วยครับ!!!");
                                            $("#dep_id").focus();
                                            e.preventDefault();
                                        }else if($("#admin").val()==''){
                                            alert("กรุณาเลือกระดับการใช้งานด้วยครับ!!!");
                                            $("#admin").focus();
                                            e.preventDefault();
                                        }else if($("#user_account").val()==''){
                                            alert("กรุณาระบุชื่อผู้ใช้ด้วยครับ!!!");
                                            $("#user_account").focus();
                                            e.preventDefault();
                                        }else if($("#user_pwd").val()==''){
                                            alert("กรุณาระบุรหัสผ่านด้วยครับ!!!");
                                            $("#user_pwd").focus();
                                            e.preventDefault();
                                        }else if($("#user_pwd").val() != $("#con_password").val()){
                                            alert("รหัสผ่านไม่ตรงกันครับ กรุณายืนยันอีกครับ");
                                            $("#con_password").attr("value","").focus();
                                            e.preventDefault();
                                        }else{
        				$.ajax({
                                           type: "POST",
					   url: "process/prcuser.php",
                                           data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                                           contentType: false, // The content type used when sending data to the server.
                                           cache: false, // To unable request pages to be cached
                                           processData: false,
					   success: function(result) {
						alert(result);
                                                $("#index_content").empty().load('content/add_user.html');
					   }
					 });e.preventDefault();
                                     }
        }));
        
            }else{ 
                $.getJSON('JsonData/detail_user.php',{data: iduser.data}, function (data) { 
                                $.getJSON('JsonData/Dep_Data.php', function (GD) {
                                     var option="<option value=''> เลือกงาน </option>";
                                    for (var key in GD) {
                                        if(GD[key].dep_id==data.dep_id){var select='selected';}else{var select='';}
                                              option += "$('<option value='"+GD[key].dep_id+"' "+select+"> "+GD[key].name+" </option>'),";
                                        }
                                        $("select#dep_id").empty().append(option);
                                        $(".select2").select2();
                                }); 
                $("select#admin").append($("<option value=''> เลือกระดับการใช้งาน </option>")
                                            ,$("<option value='N'> ผู้ใช้งานทั่วไป </option>")
                                            ,$("<option value='A'> หัวหน้าฝ่าย </option>")
                                            ,$("<option value='Y'> คณะกรรมการ/ผู้ดูลระบบ </option>"));  
                                            if(data.admin=='N'){
                                                $("option[value^=N]").attr("selected","selected");
                                            }else if(data.admin=='A'){
                                                $("option[value^=A]").attr("selected","selected");
                                            }else if(data.admin=='Y'){
                                                $("option[value^=Y]").attr("selected","selected");
                                            }
                 $("input#user_fname").attr("value",data.user_fname);  
                 $("input#user_lname").attr("value",data.user_lname); 
                 $("input#user_account").attr("value",data.user_name); 
                 if(data.rm_status!='Y'){
                    $("input#user_fname").attr("readonly","readonly");  
                    $("input#user_lname").attr("readonly","readonly"); 
                    $("select#dep_id").attr("disabled","disabled"); 
                    $("select#admin").attr("disabled","disabled"); 
                    $("div.box:last").remove();
                 }
                 //$("input#user_account").attr("value",data.user_name); 
                 $("div#con_pass").append($("<b style='color:red'>*หากไม่เปลี่ยนรหัสผ่านไม่ต้องแก้ไข</b>"));
                 if(data.photo){$('#previewing').attr('src', 'USERimgs/'+data.photo).attr('width','100');}
                 
            $("div#DUS_content").append("<input type='hidden' id='method' name='method' value='edit_user'>");       
            $("div#DUS_content").append("<input type='hidden' id='user_id' name='user_id' value='"+data.user_id+"'>");   
            $("div#DUS_content").append("<div class='col-md-12' align='center'><button type='submit' class='btn btn-warning' id='USsubmit'>แก้ไข</button></div>");
            $('#loading').hide();
            $("#frmadduser").on('submit', (function (e) {
                $("#message").empty();
                $('#loading').show();
                                    if($("#user_fname").val()==''){
                                            alert("กรุณาระบุชื่อครับ!!!");
                                            $("#user_fname").focus();
                                            e.preventDefault();
                                        }else if($("#user_lname").val()==''){
                                            alert("กรุณาระบุนามสกุลด้วยครับ!!!");
                                            $("#user_lname").focus();
                                            e.preventDefault();
                                        }else if($("#dep_id").val()==''){
                                            alert("กรุณาเลือกงานด้วยครับ!!!");
                                            $("#dep_id").focus();
                                            e.preventDefault();
                                        }else if($("#admin").val()==''){
                                            alert("กรุณาเลือกระดับการใช้งานด้วยครับ!!!");
                                            $("#admin").focus();
                                            e.preventDefault();
                                        }else if($("#user_account").val()==''){
                                            alert("กรุณาระบุชื่อผู้ใช้ด้วยครับ!!!");
                                            $("#user_account").focus();
                                            e.preventDefault();
                                        }else if($("#user_pwd").val() != $("#con_password").val()){
                                            alert("รหัสผ่านไม่ตรงกันครับ กรุณายืนยันอีกครับ");
                                            $("#con_password").attr("value","").focus();
                                            e.preventDefault();
                                        }else{
        				$.ajax({
					   type: "POST",
					   url: "process/prcuser.php",
                                           data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                                           contentType: false, // The content type used when sending data to the server.
                                           cache: false, // To unable request pages to be cached
                                           processData: false,
					   success: function(result) {
						alert(result);
                                                if(data.rm_status=='Y'){
                                                    $("#index_content").empty().load('content/add_user.html');
                                                }else{
                                                    $("#index_content").empty().load('content/info_index.html');
                                            }
					   }
					 });e.preventDefault();
                                     }
        }));
                });
            }
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
            function imageIsLoaded(e) {
                $("#file").css("color", "green");
                $('#image_preview').css("display", "block");
                $('#previewing').attr('src', e.target.result);
                $('#previewing').attr('width', '150px');
                //$('#previewing').attr('height', '230px');
            }
        }
