function LevelRisk (content,id=null) {
        $(content).empty().append("<h2 style='color: blue'>ระดับความเสี่ยงที่แต่ละงานได้รับในหมวด</h2>"+
                                    "<ol class='breadcrumb'>"+
                                    "<li><a href='index.html'><i class='fa fa-home'></i> หน้าหลัก</a></li>"+
                                    "<li class='active'><i class='fa fa-envelope'></i> ระดับความเสี่ยงที่งานได้รับ</li>"+
                                    "</ol>"+
                                    "<div class='row'>"+
                                    "<div class='col-md-12'>"+
                                    "<div class='box box-primary box-solid'>"+
                                    "<div class='box-header with-border'>"+
                                    "<h4 class='box-title'><i class='fa fa-star'></i> ความเสี่ยงที่เกี่ยวข้องกับงานในหมวด </h4></div>"+
                                    "<div class='box-body' id='add_user'>"+
                                    "<div align='center' id='Budget'></div><div id='contentGr'></div><div id='contentTB'></div>"+
                                    "</div></div></div></div>");
                            $("h2").prepend("<img src='images/icon_set2/gear.ico' width='40'> ");
                            
    var BY = new Date();
    $("#Budget").empty().append("ปีงบประมาณ : "+(BY.getFullYear()+543));
    var title1 = "จำนวนความเสี่ยงที่ได้รับ แยกระดับ";
    var subtitle = "รายเดือน";
    var unit = "ครั้ง";                                   
                                              
    //var column1 = '{"รายการความเสี่ยงที่รอ RM man มาตรวจสอบ":["เลขที่","รายการ","เกิดขึ้นเมื่อ","ได้รับเมื่อ"]}';
              var column1 = ["เลขที่","ระดับความรุนแรงของความเสี่ยง","จำนวนเรื่อง","รายละเอียด"];
              var idsymp = id;
            if(idsymp == null){ 
              var CTb = new createTableAjax();
                  CTb.GetNewTableAjax('contentTB','JsonData/DT_CateR_Dep.php?'+$("#yearS").val(),'JsonData/tempSendData.php',column1
              ,null,null,null,null,false,true,'DetailRisk',false,null,false,null,'ไม่ผ่าน',null,'กำลังดำเนินการ','ผ่านการทบทวน','dbtb');
              $("select#yearS").change(function () {
                  $("#Budget").empty().append("ปีงบประมาณ : "+$("#yearS").val());
                  CTb.GetNewTableAjax('contentTB','JsonData/DT_CateR_Dep.php?'+$("#yearS").val(),'JsonData/tempSendData.php',column1
              ,null,null,null,null,false,true,'DetailRisk',false,null,false,null,'ไม่ผ่าน',null,'กำลังดำเนินการ','ผ่านการทบทวน','dbtb');
              });
          }else{ 
                GetjQueryCookie('dep',idsymp.data);
              $.getJSON('JsonData/Cate_Data.php',{data: $.cookie('category')}, function (data) {
                  $("h4.box-title").append(" : "+data[0].name);
                  $("h2").append(" : "+data[0].name);
              });
              $.getJSON('JsonData/Dep_Data2.php',{data: idsymp.data}, function (data) {
                  $("h4.box-title").append(" : "+data[0].name);
                  $("h2").append(" : "+data[0].name);
              });
              
            $.getJSON('JsonData/graph_level.php', {data:$.cookie('year'),data2:$.cookie('category'),data3:idsymp.data},function (data) {
    var level_risk = data.level_risk;console.log(data);
    
    var CCharts =  new AJAXCharts('contentGr','column',title1,unit,level_risk,'JsonData/DC_columnLevelRep.php?'+$.cookie('year')+'?'+$.cookie('category')+'?'+idsymp.data,subtitle);
    $(CCharts.GetCL());
    });                            
                                        $("#Budget").empty().append("ปีงบประมาณ : "+$.cookie('year'));
             var CTb = new createTableAjax();
                  CTb.GetNewTableAjax('contentTB','JsonData/DT_CateR_Dep_Level.php?'+$.cookie('year')+'?'+$.cookie('category')+'?'+idsymp.data,'JsonData/tempSendData.php',column1
              ,null,null,null,null,false,true,'SubCateRisk',false,null,false,null,null,null,null,null);
          }
        }
