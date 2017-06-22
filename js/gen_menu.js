            $.getJSON('JsonData/up_header.php',function (data) {
              $("head").prepend($("<title></title>").text("ระบบบริหารความเสี่ยง")
                                ,$("<link rel='SHORTCUT ICON' href='"+data.logo+"'>"));  
              if(data.rm_status == 'Y'){
                  var onload="bodyOnload();";
              }else{
                var onload="";
            }
        $("body").attr("Onload",onload);
                                    $("#gear_side").empty().load("content/inbox.php");//โหลด inbox.php เข้ามา
                        $(".sidebar").append($("<ul class='sidebar-menu'></ul>"));
                                $(".image").append("<img src='"+data.logo+"' class='img-circle' alt='User Image'>");
                                $(".info").append($("<p>โรงพยาบาลจิตเวชเลยฯ</p>"),$("<a href='#'><i class='fa fa-circle text-success'></i> ระบบบริหารความเสี่ยง</a>"));
                                $(".sidebar-menu").append($("<li class='header'>เมนูหลัก</li>")
                                                        ,$("<li id='home'><a href='#'><img src='images/gohome.ico' width='20'> <span>หน้าหลัก</span></a></li>"));
                                                $("#home > a").attr("onclick","loadPage('#index_content','content/info_index.html');");        
                                    $(".content-wrapper").append("<section class='content' id='sec_content'></section>");   
                                            $("#sec_content").append("<div id='index_content'>No Login.</div>");
                                        
                    $(".main-footer").append("<div id='version' class='pull-right hidden-xs'></div>").append("<strong>Copyright &copy; 2017 <a href='http://rploei.go.th'>โรงพยาบาลจิตเวชเลยราชนครินทร์</a>.</strong> All rights reserved.");       
                                $("#version").append("<b>Version</b> 3.0");
                    $(".control-sidebar").empty().load("menu_footer.php");                                                               
                                              if(data.rm_status == 'Y'){
                                            $(".sidebar-menu").append($("<li id='ad_treeview1' class='treeview'></li>"),$("<li id='ad_treeview2' class='treeview'></li>")
                                                                    ,$("<li id='ad_manual'></li>"));
                                                        $("#ad_treeview1").append($("<a href='#'><img src='images/menu_items_options.ico' width='20'> <span>เมนูคณะกรรมการ</span><i class='fa fa-angle-left pull-right'></i></a>")
                                                                                ,$("<ul id='ad_treeview-menu1' class='treeview-menu'></ul>"));
                                                                $("#ad_treeview-menu1").append($("<li class=''> <a id='checkRM' href='#'>&nbsp;&nbsp;<img src='images/Transfer.ico' width='20'> <span>รายการแจ้งย้ายความเสี่ยง</span></a></li>")
                                                                                            ,$("<li class=''> <a href='#'>&nbsp;&nbsp;<img src='images/icon_set2/eye.ico' width='20'> <span>ติดตาม/ประเมินผล</span></a></li>")
                                                                                            ,$("<li class=''> <a href='#'>&nbsp;&nbsp;<img src='images/bin1.png' width='20'> <span>รายการความเสี่ยงในถังขยะ</span></a></li>")
                                                                                            ,$("<li id='ad_report'><a href='#'>&nbsp;&nbsp;<img src='images/icon_set2/piechart.ico' width='20'> รายงานคณะกรรมการ <i class='fa fa-angle-left pull-right'></i></a></li>"));
                                                                                    $("#checkRM").attr("onclick","loadPage('#index_content','content/check_risk.html');");        
                                                                            $("#ad_report").append("<ul id='ulad_report' class='treeview-menu'></ul>");  
                                                                                $("#ulad_report").append($("<li><a href='#'><i class='fa fa-circle-o text-aqua'></i> รายงานที่ 1 </a></li>")
                                                                                                        ,$("<li><a href='#'><i class='fa fa-circle-o text-aqua'></i> รายงานที่ 2 </a></li>"));
                                                        $("#ad_treeview2").append($("<a href='#'><img src='images/menu_items_options.ico' width='20'> <span>เมนูผู้ใช้ทั่วไป</span><i class='fa fa-angle-left pull-right'></i></a>")
                                                                                ,$("<ul id='ad_treeview-menu2' class='treeview-menu'></ul>"));
                                                                $("#ad_treeview-menu2").append($("<li class=''> <a id='writeRM' href='#'>&nbsp;&nbsp;<img src='images/icon_set2/compose.ico' width='20'> <span>เขียนความเสี่ยง</span></a></li>")
                                                                                            ,$("<li class=''> <a href='#'>&nbsp;&nbsp;<img src='images/icon_set2/clipboard.ico' width='20'> <span>ความเสี่ยงที่ได้รับ</span></a></li>")
                                                                                            ,$("<li class=''> <a href='#'>&nbsp;&nbsp;<img src='images/icon_set2/folder.ico' width='20'> <span>ประวัติการรายงานความเสี่ยง</span></a></li>")
                                                                                            ,$("<li id='us_report'><a href='#'>&nbsp;&nbsp;<img src='images/icon_set2/piechart.ico' width='20'> รายงานหน่วยงาน <i class='fa fa-angle-left pull-right'></i></a></li>"));
                                                                                    $("#writeRM").attr("onclick","loadPage('#index_content','content/frm_write_risk.php');");        
                                                                            $("#us_report").append("<ul id='ulus_report' class='treeview-menu'></ul>");  
                                                                                $("#ulus_report").append($("<li><a href='#'><i class='fa fa-circle-o text-aqua'></i> รายงานที่ 1 </a></li>")
                                                                                                        ,$("<li><a href='#'><i class='fa fa-circle-o text-aqua'></i> รายงานที่ 2 </a></li>"));                                 
                                                        $("#ad_manual").append("<a href='#'><img src='images/icon_set2/booklet.ico' width='20'> <span>คู่มือโปรแกรมความเสี่ยง</span></a>");
                                                        $("#ad_manual > a").attr("onclick","window.open('form-format/manual_risk(admin).pdf','','width=750,height=1000'); return false");
                                        
        var page = getURL("page");
        var data = getURL("data");
if(page!=''){
    $("#index_content").empty().load(page,{data: data}, function(responseTxt, statusTxt, xhr){
        if(statusTxt == "success")
            /*$(function(){
                $.ajax({
  dataType: "json",
  type: "post",
  url: 'JsonData/detail_risk.php',
  data: {data:data},
  success: success
});
});*/
        if(statusTxt == "error")
            alert("Error: " + xhr.status + ": " + xhr.statusText);
    });
    }else{
    $("#index_content").empty().load("content/info_index.html");    
    }
    //loadPage('#index_content',page,data);  
                                    }else if(data.rm_status == 'N'){
                                        $("#gear_side1").remove();//ไม่ให้แสดง gear    
                                    }else if(data.rm_status == ''){
                                            $(".sidebar-menu").append($("<li class=''><a href='#' id='knowledge'>\n\
                                <img src='images/icon_set2/bookshelf.ico' width='20'> <span>ความรู้เกี่ยวกับความเสี่ยง</span></a></li>")
                                                                    ,$("<li id='treeview1' class='treeview'></li>")
                                                                    ,$("<li class=''><a href='#' id='manual_risk'>\n\
                                <img src='images/icon_set2/booklet.ico' width='20'> <span>คู่มือโปรแกรมความเสี่ยง</span></a></li>"));
                                                $("#treeview1").append($("<a href='#'><img src='images/Import.ico' width='20'> <span>ดาวน์โหลดแบบฟอร์ม</span>\n\
                                <i class='fa fa-angle-left pull-right'></i></a>")
                                                                    ,$("<ul id='treeview-menu1' class='treeview-menu'></ul>"));
                                                    $("#treeview-menu1").append($("<li><a href='form-format/RM 1.doc' title='แบบรายงานอุบัติการณ์ความเสี่ยง'><i class='fa fa-circle-o text-aqua'></i> แบบรายงานความเสี่ยง </a></li>")
                                                                               ,$("<li><a href='form-format/RCA.doc' title='แบบฟอร์ม RCA'><i class='fa fa-circle-o text-aqua'></i> แบบฟอร์ม RCA </a></li>"));
                                                    $("#knowledge").attr("onclick","sendget('content/knowledge.html','index_content')");
                                                    $("#manual_risk").attr("onclick","window.open('form-format/manual_risk.pdf','','width=750,height=1000'); return false");
                                            $("#gear_side").append("<li class='dropdown messages-menu'><a id='login' href='#' title='เข้าสู่ระบบบริหารความเสี่ยง'><img src='images/key-y.ico' width='18'> เข้าสู่ระบบ</a></li>");
                                                            $("#login").attr("onclick","return popup('login_page.html', popup, 300, 330);");
                                            $("#gear_side1").remove();//ไม่ให้แสดง gear         
                                        }
                                $(".sidebar-menu").append("<li class=''><a id='about' href='#'><img src='images/Paper Mario.ico' width='20'> <span>เกี่ยวกับ</span></a></li>");
                                            $("#about").attr("onclick","loadPage('#index_content','content/about.html')");        
    });                     