function Inint_AJAX() {
   try { return new ActiveXObject("Msxml2.XMLHTTP"); } catch(e) {} //IE
   try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
   try { return new XMLHttpRequest(); } catch(e) {} //Native Javascript
   alert("XMLHttpRequest not supported")
   return null
}
function sendget(page,content,value,name='value') {
     var req = Inint_AJAX(); //สร้าง Object
     req.open('GET', page+'?'+name+'='+value, true); //กำหนด สถานะการทำงานของ AJAX แบบ GET และส่งข้อมูลผ่านทาง URL
     req.onreadystatechange = function() { //เหตุการณ์เมื่อมีการตอบกลับ
          if (req.readyState==4) {
               if (req.status==200) { //ได้รับการตอบกลับเรียบร้อย
                    var data=req.responseText; //ข้อความที่ได้มาจากการทำงานของ test3.php
                    document.getElementById(content).innerHTML=data; //แสดงผล
               }
          }
     };
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ที่ส่งไป
     req.send(null); //ทำการส่ง
};
    function sendpost(page,content) {
     var req = Inint_AJAX(); //สร้าง Object
     req.open('POST', page, true); //กำหนด สถานะการทำงานของ AJAX แบบ POST
     req.onreadystatechange = function() { //เหตุการณ์เมื่อมีการตอบกลับ
          if (req.readyState==4) {
               if (req.status==200) { //ได้รับการตอบกลับเรียบร้อย
                    var data=req.responseText; //ข้อความที่ได้มาจากการทำงานของ test3.php
                    document.getElementById(content).innerHTML=data; //แสดงผล
               }
          }
     };
     var values;
     
     for(var i=0;i< document.form1.elements["data"].length;i++){
         if(document.form1.elements["data"][i].tagName == "INPUT"){
             if(document.form1.elements["data"][i].type == "checkbox"){
                 if(document.form1.elements["data"][i].checked == true){
                values+="&data"+i+"="+document.form1.elements["data"][i].value; 
                 }
             }else
             if(document.form1.elements["data"][i].type == "radio"){
                 if(document.form1.elements["data"][i].checked == true){
                values+="&data"+i+"="+document.form1.elements["data"][i].value; 
                 }
             }else{
             values+="&data"+i+"="+document.form1.elements["data"][i].value;
     }
     }else if(document.form1.elements["data"][i].tagName == "TEXTAREA"){
         values+="&data"+i+"="+document.form1.elements["data"][i].value;
     }else if(document.form1.elements["data"][i].tagName == "SELECT"){
         values+="&data"+i+"="+document.form1.elements["data"][i].value;
     }
     }
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ที่ส่งไป
     req.send(values); //ทำการส่งข้อมูลผ่านคำสั่ง SEND   
};
function sendpostArray(page,content) {
     var req = Inint_AJAX(); //สร้าง Object
     req.open('POST', page, true); //กำหนด สถานะการทำงานของ AJAX แบบ POST
     req.onreadystatechange = function() { //เหตุการณ์เมื่อมีการตอบกลับ
          if (req.readyState==4) {
               if (req.status==200) { //ได้รับการตอบกลับเรียบร้อย
                    var data=req.responseText; //ข้อความที่ได้มาจากการทำงานของ test3.php
                    document.getElementById(content).innerHTML=data; //แสดงผล
               }
          }
     };
     var values;
     
     for(var i=0;i< document.form1.elements["data"].length;i++){
         if(document.form1.elements["data"][i].tagName == "INPUT"){
             if(document.form1.elements["data"][i].type == "checkbox"){
                 if(document.form1.elements["data"][i].checked == true){
                values+="&data[]="+document.form1.elements["data"][i].value; 
                 }
             }else
             if(document.form1.elements["data"][i].type == "radio"){
                 if(document.form1.elements["data"][i].checked == true){
                values+="&data[]="+document.form1.elements["data"][i].value; 
                 }
             }else{
             values+="&data[]="+document.form1.elements["data"][i].value;
     }
     }else if(document.form1.elements["data"][i].tagName == "TEXTAREA"){
         values+="&data[]="+document.form1.elements["data"][i].value;
     }else if(document.form1.elements["data"][i].tagName == "SELECT"){
         values+="&data[]="+document.form1.elements["data"][i].value;
     }
     }
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ที่ส่งไป
     req.send(values); //ทำการส่งข้อมูลผ่านคำสั่ง SEND   
};