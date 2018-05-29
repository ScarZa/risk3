function AddHos (content) {
//        var cate_no ="";
//        var cate = "";
        $(content).empty().append("<h2 style='color: blue'>ตั้งค่าองค์กร</h2>"+
                                    "<ol class='breadcrumb'>"+
                                    "<li><a href='index.html'><i class='fa fa-home'></i> หน้าหลัก</a></li>"+
                                    "<li class='active'><i class='fa fa-envelope'></i> ตั้งค่าองค์กร</li>"+
                                    "</ol><form action='' name='frmadduser' id='frmadduser' method='post'>"+
                                    "<div class='row'>"+
                                    "<div class='col-md-12'>"+
                                    "<div class='box box-primary box-solid'>"+
                                    "<div class='box-header with-border'>"+
                                    "<h4 class='box-title'> ตั้งค่าองค์กร </h4></div>"+
                                    "<div class='box-body' id='add_user'><div class='col-md-12'><div class='col-md-6'>"+
                                    "<div class='box box-primary box-solid'><div class='box-header with-border'>"+
                                    "<h4 class='box-title'> ข้อมูลองค์กร </h4></div><div class='box-body'><div id='DU_content'></div>"+
                                    "<div class='col-md-12' id='DUS_content'></div></div></div></div></form>"+
                                    "<div class='col-md-12'></div></div>"+
                                    "</div></div></div></div>");
                            $("h2").prepend("<img src='images/icon_set2/gear.ico' width='40'> ");
                            
                               
            $("#DUS_content").append($("<div class='form-group'>ชื่อองค์กร : <INPUT TYPE='text' NAME='name' id='name' class='form-control' placeholder='ระบุชื่อ' required></div>")
                        ,$("<div class='form-group'>ชื่อย่อองค์กร : <INPUT TYPE='text' NAME='name2' id='name2' class='form-control' placeholder='ระบุชื่อย่อ' required></div>")
                        ,$("<div class='form-group'>ผู้บริหาร : <select name='manager' class='form-control select2' id='manager' required></select></div>")
                        ,$("<div class='form-group'>URL : <INPUT TYPE='text' NAME='url' id='url' class='form-control' placeholder='เช่น http://sample.go.th/'></div>")
                        ,$("<div id='image_preview'><img id='previewing' src='images/icon_set2/image.ico' width='50' /></div>")
                        ,$("<div class='form-group'>สัญลักษณ์องค์กร : <input type='file' name='file' id='file' class='form-control' /></div></div><h4 id='loading' >loading..</h4><div id='message'></div>"));


                $.getJSON('JsonData/detail_hos.php', function (data) {
                                $.getJSON('JsonData/User_Data.php', function (GD) {
                                     var option="<option value=''> เลือกบุคลากร </option>";
                                    for (var key in GD) {
                                        if(GD[key].user_id==data.manager){var select='selected';}else{var select='';}
                                              option += "$('<option value='"+GD[key].user_id+"' "+select+"> "+GD[key].fullname+" </option>'),";
                                        }
                                        $("select#manager").empty().append(option);
                                        $(".select2").select2();
                                }); 

                 $("input#name").attr("value",data.name);
                 $("input#name2").attr("value",data.name2);
                 $("input#url").attr("value",data.url); 

                 if(data.logo){$('#previewing').attr('src', 'logo/'+data.logo).attr('width','100');}
                 
            $("div#DUS_content").append("<input type='hidden' id='method' name='method' value='edit_hos'>");       
            $("div#DUS_content").append("<div class='col-md-12' align='center'><button type='submit' class='btn btn-warning' id='USsubmit'>แก้ไข</button></div>");
            $('#loading').hide();
            $("#frmadduser").on('submit', (function (e) {
                $("#message").empty();
                $('#loading').show();
                                    if($("#name").val()==''){
                                            alert("กรุณาระบุชื่อองค์กรด้วยครับ!!!");
                                            $("#name").focus();
                                            e.preventDefault();
                                        }else if($("#manager").val()==''){
                                            alert("กรุณาเลือกผู้บริหารด้วยครับ!!!");
                                            $("#manager").focus();
                                            e.preventDefault();
                                        }else{
        				$.ajax({
					   type: "POST",
					   url: "process/prchos.php",
                                           data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                                           contentType: false, // The content type used when sending data to the server.
                                           cache: false, // To unable request pages to be cached
                                           processData: false,
					   success: function(result) {
						alert(result);
                                                    $("#index_content").empty().load('content/add_hos.html');
					   }
					 });e.preventDefault();
                                     }
        }));
                });

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
