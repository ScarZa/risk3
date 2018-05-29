function DepRisk (content,id=null) {
        $(content).empty().append("<h2 style='color: blue'>ความเสี่ยงที่งานได้รับ</h2>"+
                                    "<ol class='breadcrumb'>"+
                                    "<li><a href='index.html'><i class='fa fa-home'></i> หน้าหลัก</a></li>"+
                                    "<li class='active'><i class='fa fa-envelope'></i> ความเสี่ยงที่งานได้รับ</li>"+
                                    "</ol>"+
                                    "<div class='col-md-3 col-md-offset-9 form-group'><select name='yearS' class='form-control' id='yearS'></select></div>"+
                                    "<div class='row'>"+
                                    "<div class='col-md-12'>"+
                                    "<div class='box box-primary box-solid'>"+
                                    "<div class='box-header with-border'>"+
                                    "<h4 class='box-title'><i class='fa fa-star'></i> ความเสี่ยงที่เกี่ยวข้องกับงานของเรา </h4></div>"+
                                    "<div class='box-body' id='add_user'>"+
                                    "<div align='center' id='Budget'></div><div id='contentTB'></div>"+
                                    "</div></div></div></div>");
                            $("h2").prepend("<img src='images/icon_set2/gear.ico' width='40'> ");
                            
    var BY = new Date();
    $("#Budget").empty().append("ปีงบประมาณ : "+(BY.getFullYear()+543));
    var option = "$('<option value=''> เลือกปีงบประมาณ </option>')";
    for (var i=2557;i<2566;i++) { 
                                            option += "$('<option value='"+i+"'> "+i+" </option>'),";
                                        }
                                        $("select#yearS").empty().append(option);
    //var column1 = '{"รายการความเสี่ยงที่รอ RM man มาตรวจสอบ":["เลขที่","รายการ","เกิดขึ้นเมื่อ","ได้รับเมื่อ"]}';
              var column1 = ["เลขที่","รายการ","เกิดขึ้นเมื่อ","ได้รับเมื่อ","สถานะ","รายละเอียด"];
              var idsymp = id;
            if(idsymp == null){
              var CTb = new createTableAjax();
                  CTb.GetNewTableAjax('contentTB','JsonData/DT_depR.php?'+$("#yearS").val(),'JsonData/tempSendData.php',column1
              ,null,null,null,null,false,true,'DetailRisk',false,null,false,null,'ไม่ผ่าน',null,'กำลังดำเนินการ','ผ่านการทบทวน','dbtb');
              $("select#yearS").change(function () {
                  $("#Budget").empty().append("ปีงบประมาณ : "+$("#yearS").val());
                  CTb.GetNewTableAjax('contentTB','JsonData/DT_depR.php?'+$("#yearS").val(),'JsonData/tempSendData.php',column1
              ,null,null,null,null,false,true,'DetailRisk',false,null,false,null,'ไม่ผ่าน',null,'กำลังดำเนินการ','ผ่านการทบทวน','dbtb');
              });
          }else{
              $.getJSON('JsonData/Dep_Data2.php',{data: idsymp.data}, function (data) {
                  $("h4.box-title").append(" : "+data[0].name);
              });
             for (var i=2557;i<2566;i++) { if(i==$.cookie('year')){var selected = 'selected';}else{var selected = '';}
                                            option += "$('<option value='"+i+"' "+selected+"> "+i+" </option>'),";
                                        }
                                        $("select#yearS").empty().append(option); 
                                        $("#Budget").empty().append("ปีงบประมาณ : "+$.cookie('year'));
             var CTb = new createTableAjax();
                  CTb.GetNewTableAjax('contentTB','JsonData/DT_depR.php?'+$.cookie('year')+'?'+idsymp.data,'JsonData/tempSendData.php',column1
              ,null,null,null,null,false,true,'DetailRisk',false,null,false,null,'ไม่ผ่าน',null,'กำลังดำเนินการ','ผ่านการทบทวน','dbtb');
              $("select#yearS").change(function () {
                  $("#Budget").empty().append("ปีงบประมาณ : "+$("#yearS").val());
                  CTb.GetNewTableAjax('contentTB','JsonData/DT_depR.php?'+$("#yearS").val()+'?'+idsymp.data,'JsonData/tempSendData.php',column1
              ,null,null,null,null,false,true,'DetailRisk',false,null,false,null,'ไม่ผ่าน',null,'กำลังดำเนินการ','ผ่านการทบทวน','dbtb');
              }); 
          }
        }
