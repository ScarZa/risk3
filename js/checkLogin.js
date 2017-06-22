function Inint_AJAX () {
  var xmlhttp = false;
  try {
    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
  } catch(e) {
    try {
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    } catch(e) {
      xmlhttp = false;
    }
  }
  if(!xmlhttp && document.createElement){
    xmlhttp = new XMLHttpRequest();
  }
  return xmlhttp;
}
var StayAlive = 1; // เวลาเป็นวินาทีที่ต้องการให้ WIndows เปิดออก 
function KillMe()
{ 
setTimeout("self.close()",StayAlive * 1000); 
} 
function check_user(username, passwd, action) {
  var cancle=false;
  if (action=='login') {
    if (username.length==0) {
      alert('กรุณาป้อน Username ก่อน');
      document.login_form.user_account.focus(); 
      cancle=true;
    } else if (passwd.length==0) {
      alert('กรุณาป้อน Password ก่อน') ;
      document.login_form.user_pwd.focus(); 
      cancle=true;
    }
  }
  if (cancle==false) {
    var req = Inint_AJAX();
    req.onreadystatechange = function () { 
      if (req.readyState==4) {
        if (req.status==200) {
          var ret=req.responseText; //รับค่ากลับมา
          document.getElementById("showLogin").innerHTML=ret;
          // เขียนคำสั่ง Refresh หน้าหลัก ที่นี่ หาก login สำเร็จ
          // หรือ อาจเขียนคำสั่งอื่นๆ หลังจาก login แล้ว ที่นี่ (javascript)
           //var kill = KillMe(); 
           document.self.focus();
           document.window.opener.location.reload();
        } 
      } 
    };
    req.open("POST", "check_login.php"); //สร้าง connection
    req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //header
    req.send("user_account="+encodeURIComponent(username)+
      "&user_pwd="+encodeURIComponent(passwd)+
      "&action="+action); //ส่งค่า
  }
  return false;
}

//โหลดครั้งแรก
window.onload = function()
{
  check_user( '', '', '' );
};