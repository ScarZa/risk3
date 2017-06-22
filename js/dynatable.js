// ฟังก์ชันเพื่อทำให้ง่ายในการ getElementById
function ge(id){
 return document.getElementById(id);
}

function backToText(){
 //ตอนนี้ this คือ input box
 this.parentNode.onclick=edit;
 this.parentNode.innerHTML= this.value;
}

// เมื่อคลิกที่เซล์ของตาราง จะแสดง input box ให้กรอกข้อมูล
function edit(){
 var data = this.innerText;
 var inp = document.createElement("input");
 inp.value=data;
 inp.onblur=backToText;
 // ตอนนี้ this คือ td ตัวที่ถูกคลิก
 this.replaceChild(inp,this.firstChild);
 this.onclick="";
 inp.focus();
}

function addData(){
 // รับค่า value จาก input box
 var c1 = ge("c1").value;
 var c2 = ge("c2").value;
 // สร้าง Element tr, td ทั้ง 2 คอลัมน์
 var tr = document.createElement("tr");
 var col1 = document.createElement("td");
 var col2 = document.createElement("td");
 col1.innerHTML = c1;
 // ติดตั้งฟังก์ชัน edit ให้กับแต่ละคอลัมน์
 col1.onclick=edit;
 col2.innerHTML = c2;
 col2.onclick=edit;
 tr.appendChild(col1);
 tr.appendChild(col2);
 ge("tbd").appendChild(tr);
}

function init(){
 // เมื่อคลิกปุ่ม btnAdd ให้ไปเรียกใช้ฟังก์ชัน addData()
 ge("btnAdd").onclick=addData;
}
// กำหนดฟังก์ชันที่จะเรียกเมื่อเอกสารโหลดเสร็จหมดแล้ว
window.onload=init;