  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ระบบบริหารความเสี่ยงโรงพยาบาล</title>
	<LINK REL="SHORTCUT ICON" HREF="./images/risk.png">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="css/morris-0.4.3.min.css">
     <link rel="stylesheet" href="css/stylelist.css">
 
</head>

<body  bgcolor="#FFFF99" topmargin="0">
<h1>แสดงข้อมูลระดับความรุนแรงของความเสี่ยง</h1>
<?php if($_GET[no]==1){?>
<h2 span class="btn-danger">ความคลาดเคลื่อนจากกระบวนการใช้ยา ได้ทั้ง  ADR และ  Medication Error 
</h2>
<table border="1" cellspacing="0" cellpadding="0" width="660"  >
  <tr>
    <td width="84" valign="middle" bgcolor="#CCCCFF"><p align="center"><strong>ระดับความรุนแรง</strong><strong> </strong></p></td>
    <td width="576" valign="middle" bgcolor="#CCCCFF"><p align="center">&nbsp;</p>
      <p align="center"><strong>ความหมาย</strong><strong> </strong></p></td>
  </tr>
  <tr>
    <td width="84" valign="middle" bgcolor="#CCCCFF"><p align="center"><strong>A</strong></p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><p>ไม่มีความคลาดเคลื่อนเกิดขึ้น    แต่มีเหตุการณ์ที่ทำให้เกิดความคลาดเคลื่อนได้ </p></td>
  </tr>
  <tr>
    <td width="84" valign="middle" bgcolor="#CCCCFF"><p align="center"><strong>B</strong></p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><p>มีความคลาดเคลื่อนเกิดขึ้นแต่ไม่เป็นอันตรายต่อผู้ป่วยเนื่องจากความคลาดเคลื่อนไม่ไปถึงผู้ป่วย </p></td>
  </tr>
  <tr>
    <td width="84" valign="middle" bgcolor="#CCCCFF"><p align="center"><strong>C</strong></p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><p>มีความคลาดเคลื่อนเกิดขึ้น    แต่ไม่เป็นผลอันตรายต่อผู้ป่วย ถึงแม้ว่าความคลาดเคลื่อนนั้นจะไปถึงผู้ป่วยแล้ว </p></td>
  </tr>
  <tr>
    <td width="84" valign="middle" bgcolor="#CCCCFF"><p align="center"><strong>D</strong></p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><p>มีความคลาดเคลื่อนเกิดขึ้น    แต่ไม่เป็นอันตรายต่อผู้ป่วย แต่ยังจำเป็นต้องมีการติดตามผู้ป่วยเพิ่มเติม </p></td>
  </tr>
  <tr>
    <td width="84" valign="middle" bgcolor="#CCCCFF"><p align="center"><strong>E</strong></p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><p>มีความคลาดเคลื่อนเกิดขึ้น    และเป็นอันตรายต่อผู้ป่วยเพียงชั่วคราว    รวมถึงความจำเป็นต้องได้รับการรักษาหรือแก้ไขเพิ่มเติม </p></td>
  </tr>
  <tr>
    <td width="84" valign="middle" bgcolor="#CCCCFF"><p align="center"><strong>F</strong></p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><p>มีความคลาดเคลื่อนเกิดขึ้น    และเป็นอันตรายต่อผู้ป่วยเพียงชั่วคราว    รวมถึงความจำเป็นต้องได้รับการรักษาในโรงพยาบาลหรือยืดระยะเวลาในการรักษาตัวในโรงพยาบาลออกไป </p></td>
  </tr>
  <tr>
    <td width="84" valign="middle" bgcolor="#CCCCFF"><p align="center"><strong>G</strong></p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><p>มีความคลาดเคลื่อนเกิดขึ้น    และเป็นอันตรายต่อผู้ป่วยถาวร </p></td>
  </tr>
  <tr>
    <td width="84" valign="middle" bgcolor="#CCCCFF"><p align="center"><strong>H</strong></p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><p>มีความคลาดเคลื่อนเกิดขึ้น    และเป็นอันตรายต่อผู้ป่วยจนเกือบถึงแก่ชีวิต (เช่น    แพ้ยาแบบ  anaphylaxis  และหัวใจหยุดเต้น)</p></td>
  </tr>
  <tr>
    <td width="84" valign="middle" bgcolor="#CCCCFF"><p align="center"><strong>I</strong></p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><p>มีความคลาดเคลื่อนเกิดขึ้น    และเป็นอันตรายต่อผู้ป่วยจนถึงแก่ชีวิต </p></td>
  </tr>
</table>
<p>
  <?php } ?>
</p>
<p>
  <?php if($_GET[no]==2){?>
</p>
   <h3 span class="btn-danger">ผู้ป่วยได้รับบาดเจ็บจากพฤติกรรมรุนแรง </span></h3>
<table border="1" cellspacing="0" cellpadding="0" width="660">
  <tr>
    <td width="84" valign="middle" bgcolor="#CCCCFF"><p align="center"><strong>ระดับความรุนแรง</strong><strong> </strong></p></td>
    <td width="576" valign="middle" bgcolor="#CCCCFF"><p align="center"><strong>&nbsp;</strong></p>
      <p align="center"><strong>ความหมาย</strong><strong> </strong></p></td>
  </tr>
  <tr>
    <td width="84" valign="middle" bgcolor="#CCCCFF"><p align="center"><strong>A</strong></p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยที่มีพฤติกรรมรุนแรง หรือมีประวัติพฤติกรรมรุนแรง    หรือมีพฤติกรรมรบกวนผู้อื่น หรือผู้ป่วยที่ช่วยเหลือตนเองได้น้อย เช่น ผู้ป่วยสูงอายุ    เด็ก ปัญญาอ่อน ผู้ป่วยมีอาการงง สับสน เชื่องช้า</p></td>
  </tr>
  <tr>
    <td width="84" valign="middle" bgcolor="#CCCCFF"><p align="center"><strong>B</strong></p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยกำลังจะถูกทำร้าย    แต่สามารถช่วยเหลือได้ทันท่วงที (โต้เถียง ทะเลาะกันด้วยวาจา)</p></td>
  </tr>
  <tr>
    <td width="84" valign="middle" bgcolor="#CCCCFF"><p align="center"><strong>C</strong></p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยถูกทำร้าย แต่ไม่เป็นอันตราย ไม่มีบาดแผล </p></td>
  </tr>
  <tr>
    <td width="84" valign="middle" bgcolor="#CCCCFF"><p align="center"><strong>D</strong></p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยถูกทำร้าย ได้รับบาดเจ็บ มีบาดแผลเล็กน้อยในอวัยวะที่ไม่สำคัญ    เช่น มีรอยขีดข่วน และต้องมีการติดตามเฝ้าระวังไม่ให้เกิดอันตราย</p></td>
  </tr>
  <tr>
    <td width="84" valign="middle" bgcolor="#CCCCFF"><p align="center"><strong>E</strong></p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยได้รับบาดเจ็บ มีบาดแผลไม่ต้องเย็บ    ถลอก บวม ช้ำในอวัยวะที่ไม่สำคัญ และได้รับการบำบัดรักษาหรือ Refer รพ.ฝ่ายกายได้รับการรักษา(ไม่รับไว้)</p></td>
  </tr>
  <tr>
    <td width="84" valign="middle" bgcolor="#CCCCFF"><p align="center"><strong>F</strong></p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยได้รับบาดเจ็บมีบาดแผลต้องเย็บ    อวัยวะสำคัญได้รับการกระทบกระเทือน ต้อง observe N/S , V/S 24 ชั่วโมง  หรืออวัยวะสูญเสียหน้าที่ชั่วคราว    Refer รพ.ฝ่ายกายรับไว้/ไม่รับไว้</p></td>
  </tr>
  <tr>
    <td width="84" valign="middle" bgcolor="#CCCCFF"><p align="center"><strong>G</strong></p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยได้รับบาดเจ็บทำให้อวัยวะอย่างใดอย่างหนึ่งมีความพิการถาวรจนไม่สามารถปฏิบัติหน้าที่ได้ตามปกติ    Refer    รพ.ฝ่ายกายรับไว้รักษา</p></td>
  </tr>
  <tr>
    <td width="84" valign="middle" bgcolor="#CCCCFF"><p align="center"><strong>H</strong></p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยได้รับบาดเจ็บรุนแรงจนต้องได้รับการช่วยฟื้นคืนชีพ(CPR)/Intubation    ก่อนส่งไปรับการรักษาที่โรงพยาบาลฝ่ายกาย หรือทำช่วยฟื้นคืนชีพ(CPR)/Intubation ก่อน admit ที่โรงพยาบาลฝ่ายกาย</p></td>
  </tr>
  <tr>
    <td width="84" valign="middle" bgcolor="#CCCCFF"><p align="center"><strong>I</strong></p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยได้รับบาดเจ็บรุนแรงเสียชีวิตในโรงพยาบาล    หรือ Refer    รพ.ฝ่ายกายรับไว้เสียชีวิตภายใน 24 ชั่วโมง</p></td>
  </tr>
</table>
<p>
  <?php } ?>
</p>
<p>
  <?php if($_GET[no]==3){?>
</p>
<h2 class="btn-danger"> ผู้ป่วยพฤติกรรมก้าวร้าวรุนแรง   </h2>
<table border="1" cellspacing="0" cellpadding="0" width="809">
  <tr>
    <td width="124" valign="middle" bgcolor="#CCCCFF"><p align="center"><strong>ระดับความรุนแรง</strong><strong> </strong></p></td>
    <td width="585" valign="middle" bgcolor="#CCCCFF"><p align="center"><strong>&nbsp;</strong></p>
      <p align="center"><strong>ความหมาย</strong><strong> </strong></p></td>
  </tr>
  <tr>
    <td width="124" valign="middle" bgcolor="#CCCCFF"><p align="center"><strong>A</strong></p></td>
    <td width="585" valign="top" bgcolor="#CCCCFF"><p>มีประวัติพฤติกรรมรุนแรงหรือการกระทำที่รุนแรง    เช่น ทำร้ายผู้อื่น, ทำลายทรัพย์สิน </p></td>
  </tr>
  <tr>
    <td width="124" valign="middle" bgcolor="#CCCCFF"><p align="center"><strong>B</strong></p></td>
    <td width="585" valign="top" bgcolor="#CCCCFF"><p>มีท่าทางที่ดูไม่เป็นมิตร เช่น หงุดหงิด,    ตาขวาง หรือการกระทำด้วยคำพูดที่หยาบคาย หรือพูดบ่นคนเดียว </p></td>
  </tr>
  <tr>
    <td width="124" valign="middle" bgcolor="#CCCCFF"><p align="center"><strong>C</strong></p></td>
    <td width="585" valign="top" bgcolor="#CCCCFF"><p>มีการทำร้ายผู้อื่นแต่ไม่อันตรายหรือไม่มีบาดแผล </p></td>
  </tr>
  <tr>
    <td width="124" valign="middle" bgcolor="#CCCCFF"><p align="center"><strong>D</strong></p></td>
    <td width="585" valign="top" bgcolor="#CCCCFF"><p>มีการทำร้ายผู้ป่วยอื่นได้รับบาดเจ็บ    มีบาดแผลเล็กน้อยในอวัยวะที่ไม่สำคัญ เช่น มีรอยขีดข่วน    และต้องมีการติดตามเฝ้าระวังไม่ให้เกิดอันตราย </p></td>
  </tr>
  <tr>
    <td width="124" valign="middle" bgcolor="#CCCCFF"><p align="center"><strong>E</strong></p></td>
    <td width="585" valign="top" bgcolor="#CCCCFF"><p>มีการทำร้ายผู้ป่วยอื่น    มีบาดแผลไม่ต้องเย็บ ถลอก บวม ช้ำในอวัยวะที่ไม่สำคัญ และได้รับการบำบัดรักษา Refer รพ.ฝ่ายกายได้รับการรักษา(ไม่รับไว้)</p></td>
  </tr>
  <tr>
    <td width="124" valign="middle" bgcolor="#CCCCFF"><p align="center"><strong>F</strong></p></td>
    <td width="585" valign="top" bgcolor="#CCCCFF"><p>มีการกระทำที่ทำให้เกิดความเสียหายหรือรุนแรง    บาดเจ็บต่อร่างกายมากขึ้น เช่น บาดแผลหรือบาดเจ็บที่ต้องเย็บหรือใส่เฝือก อวัยวะสำคัญได้รับการกระทบกระเทือน    ต้อง observe    N/S , V/S 24 ชั่วโมง     หรืออวัยวะสูญเสียหน้าที่ชั่วคราว Refer รพ.ฝ่ายกายรับไว้/ไม่รับไว้</p></td>
  </tr>
  <tr>
    <td width="124" valign="middle" bgcolor="#CCCCFF"><p align="center"><strong>G</strong></p></td>
    <td width="585" valign="top" bgcolor="#CCCCFF"><p>มีการกระทำที่รุนแรงส่งผลทำให้ร่างกายได้รับบาดเจ็บหรือสูญเสีย,    พิการถาวร เช่นทำให้ ตาบอด, หูหนวก, หรือถูกตัดอวัยวะส่วนของร่างกายออกไป    หรือพิการและอัมพาตถาวร หรือ Refer ไปรับไว้รักษา    (มีการสูญเสียหน้าที่อวัยวะถาวร)</p></td>
  </tr>
  <tr>
    <td width="124" valign="middle" bgcolor="#CCCCFF"><p align="center"><strong>H</strong></p></td>
    <td width="585" valign="top" bgcolor="#CCCCFF"><p>มีการกระทำที่รุนแรง ส่งผลให้เกิดอันตราย    ได้รับการช่วยฟื้นคืนชีพ(CPR)/Intubation ก่อนส่งไปรับการรักษาที่โรงพยาบาลฝ่ายกาย    หรือทำช่วยฟื้นคืนชีพ(CPR)/Intubation ก่อน admit ที่โรงพยาบาลฝ่ายกาย</p></td>
  </tr>
  <tr>
    <td width="124" valign="middle" bgcolor="#CCCCFF"><p align="center"><strong>I</strong></p></td>
    <td width="585" valign="top" bgcolor="#CCCCFF"><p>มีการกระทำที่รุนแรง จนเป็นเหตุให้ผู้อื่นสูญเสียชีวิต    ภายใน 24 ชั่วโมง หรือเสียหายต่อทรัพย์สินของโรงพยาบาลอย่างรุนแรง</p></td>
  </tr>
</table>
<p><strong>&nbsp;</strong>
  <?php } ?>
</p>
<p>
  <?php if($_GET[no]==4){?>
</p>
<h2 class="btn-danger">ผู้ป่วยได้รับบาดเจ็บจากอุบัติเหตุ 
 </h2>
<table border="1" cellspacing="0" cellpadding="0" width="660">
  <tr>
    <td width="84" valign="middle" bgcolor="#CCCCFF"><p align="center"><strong>ระดับความรุนแรง </strong></p></td>
    <td width="576" valign="middle" bgcolor="#CCCCFF"><p align="center"><strong>&nbsp;</strong></p>
      <p align="center"><strong>ความหมาย </strong></p></td>
  </tr>
  <tr>
    <td width="84" valign="middle" bgcolor="#CCCCFF"><p align="center">A</p></td>
    <td width="576" valign="middle" bgcolor="#CCCCFF"><p>ผู้ป่วยมีพฤติกรรมรุนแรง    หรือมีประวัติได้รับอุบัติเหตุ หรือมีพฤติกรรมรบกวนผู้อื่น เช่น หงุดหงิด    ผู้ป่วย mania    ผู้ป่วยสูงอายุ เด็ก ปัญญาอ่อน ผู้ป่วยมีอาการงง สับสน เชื่องช้า</p></td>
  </tr>
  <tr>
    <td width="84" valign="middle" bgcolor="#CCCCFF"><p align="center">B</p></td>
    <td width="576" valign="middle" bgcolor="#CCCCFF"><p>ผู้ป่วยกำลังจะเกิดอุบัติเหตุ    แต่สามารถช่วยเหลือได้ทันท่วงที </p></td>
  </tr>
  <tr>
    <td width="84" valign="middle" bgcolor="#CCCCFF"><p align="center">C</p></td>
    <td width="576" valign="middle" bgcolor="#CCCCFF"><p>ผู้ป่วยได้รับอุบัติเหตุแต่ไม่มีบาดแผล    รอยฟกช้ำ </p></td>
  </tr>
  <tr>
    <td width="84" valign="middle" bgcolor="#CCCCFF"><p align="center">D</p></td>
    <td width="576" valign="middle" bgcolor="#CCCCFF"><p>ผู้ป่วยได้รับอุบัติเหตุมีบาดแผล    รอยฟกช้ำในอวัยวะที่ไม่สำคัญ มีการเฝ้าระวังไม่ให้เกิดอุบัติเหตุซ้ำ </p></td>
  </tr>
  <tr>
    <td width="84" valign="middle" bgcolor="#CCCCFF"><p align="center">E</p></td>
    <td width="576" valign="middle" bgcolor="#CCCCFF"><p>ผู้ป่วยได้รับอุบัติเหตุมีบาดแผล    ไม่ต้องเย็บ ถลอก บวม ช้ำในอวัยวะที่ไม่สำคัญ และได้รับการบำบัดรักษา Refer รพ.ฝ่ายกายได้รับรักษา(ไม่รับไว้)</p></td>
  </tr>
  <tr>
    <td width="84" valign="middle" bgcolor="#CCCCFF"><p align="center">F</p></td>
    <td width="576" valign="middle" bgcolor="#CCCCFF"><p>ผู้ป่วยได้รับบาดเจ็บมีบาดแผลต้องเย็บ    อวัยวะสำคัญได้รับการกระทบกระเทือน ต้อง observe N/S , V/S 24 ชั่วโมง  หรืออวัยวะสูญเสียหน้าที่ชั่วคราว    Refer รพ.ฝ่ายกายรับไว้/ไม่รับไว้</p></td>
  </tr>
  <tr>
    <td width="84" valign="middle" bgcolor="#CCCCFF"><p align="center">G</p></td>
    <td width="576" valign="middle" bgcolor="#CCCCFF"><p>ผู้ป่วยได้รับบาดเจ็บทำให้อวัยวะอย่างใดอย่างหนึ่งมีความพิการถาวรจนไม่สามารถปฏิบัติหน้าที่ได้ตามปกติ    Refer    รพ.ฝ่ายกายรับไว้รักษา</p></td>
  </tr>
  <tr>
    <td width="84" valign="middle" bgcolor="#CCCCFF"><p align="center">H</p></td>
    <td width="576" valign="middle" bgcolor="#CCCCFF"><p>ผู้ป่วยได้รับอุบัติเหตุรุนแรงจนต้องได้รับการช่วยฟื้นคืนชีพ(CPR)/Intubation    ก่อนส่งไปรับการรักษาที่โรงพยาบาลฝ่ายกาย หรือทำช่วยฟื้นคืนชีพ(CPR)/Intubation ก่อน admit ที่โรงพยาบาลฝ่ายกาย</p></td>
  </tr>
  <tr>
    <td width="84" valign="middle" bgcolor="#CCCCFF"><p align="center">I</p></td>
    <td width="576" valign="middle" bgcolor="#CCCCFF"><p>ผู้ป่วยได้รับอุบัติเหตุรุนแรงเสียชีวิตในโรงพยาบาล    หรือ Refer    รพ.ฝ่ายกายรับไว้เสียชีวิตภายใน 24 ชั่วโมง</p></td>
  </tr>
</table>
<strong><br clear="all">
</strong>
<p>
  <?php } ?>
</p>
<p>
  <?php if($_GET[no]==5){?>
</p>
<h2 class="btn-danger"><strong>การเกิดภาวะแทรกซ้อนจากการจำกัดพฤติกรรม </strong> </h2>
<table border="1" cellspacing="0" cellpadding="0" width="660">
  <tr>
    <td width="84" valign="middle" bgcolor="#CCCCFF"><p align="center"><strong>ระดับความรุนแรง</strong><strong> </strong></p></td>
    <td width="576" valign="middle" bgcolor="#CCCCFF"><p align="center"><strong>&nbsp;</strong></p>
    <p align="center"><strong>ความหมาย</strong><strong> </strong></p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">A</p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยได้รับการจำกัดพฤติกรรม,    ผู้ป่วยที่มีประวัติเสี่ยงในการจำกัดพฤติกรรม เช่น ไหล่หลุด, กระดูกผิดรูป,    มีแผลกดทับ</p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">B</p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><p>เจ้าหน้าที่ไม่ปฏิบัติตามระเบียบปฏิบัติการดูแลผู้ป่วยได้รับการจำกัดพฤติกรรม    เช่น จำกัดพฤติกรรมผิดวิธี, ไม่ตรวจเยี่ยม, ไม่เปลี่ยนผ้าผู้ป่วยตามกำหนดเวลา,  ผู้ป่วย Bladder full  อุจจาระ/ ปัสสาวะราดบนที่นอน ไม่ลงบันทึกการตรวจเยี่ยม </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">C</p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยได้รับการจำกัดพฤติกรรมแล้วเกิดภาวะแทรกซ้อนจากการจำกัดพฤติกรรมเล็กน้อยไม่จำเป็นต้องได้รับการรักษา    เช่น มีรอยแดงบริเวณจำกัดพฤติกรรม  coccix แดง  มือ/เท้าบวม  </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">D</p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยเกิดภาวะแทรกซ้อนจากการจำกัดพฤติกรรม    ส่งผลให้ต้องมีการเฝ้าระวังการเกิดอันตรายต่อผู้ป่วยโดยไม่จำเป็นต้องได้รับการรักษา    เช่น มี bleb    ที่บริเวณผูกมัดหรือก้นกบ</p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">E</p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยเกิดภาวะแทรกซ้อนจากการจำกัดพฤติกรรมที่รุนแรงขึ้น    จำเป็นต้องได้รับการรักษาหรือส่งไปรักษารพ.ฝ่ายกาย    ได้รับการรักษาแบบไม่รับไว้ เช่น มีไข้ มีแผลบริเวณที่ถูกจำกัดพฤติกรรม มี bed    sore</p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">F</p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยเกิดภาวะแทรกซ้อนจากการจำกัดพฤติกรรมส่งผลให้เกิดอันตรายชั่วคราว    หรือส่งไปรักษารพ.ฝ่ายกาย แล้วรับไว้รักษาจนหาย เช่น แขนขาอ่อนแรงชั่วคราว  Brachial plexus injury</p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">G</p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยเกิดภาวะแทรกซ้อนจากการจำกัดพฤติกรรมส่งผลให้เกิดความพิการของอวัยวะแบบถาวร </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">H</p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยเกิดภาวะแทรกซ้อนจากการจำกัดพฤติกรรมที่ได้รับการช่วยฟื้นคืนชีพ(CPR)/Intubation    ก่อนส่งไปรับการรักษาที่โรงพยาบาลฝ่ายกาย หรือทำช่วยฟื้นคืนชีพ(CPR)/Intubation ก่อน admit ที่โรงพยาบาลฝ่ายกาย</p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">I</p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยเกิดภาวะแทรกซ้อนจากการจำกัดพฤติกรรมแล้วเสียชีวิตในโรงพยาบาล    หรือต้อง Refer    รพ.ฝ่ายกายแล้วเสียชีวิตภายใน 24 ชั่วโมง</p></td>
  </tr>
</table>
<p>
  <?php } ?>
</p>
<p>
  <?php if($_GET[no]==6){?>
</p>
<h2 class="btn-danger"><strong>การเกิดภาวะแทรกซ้อนจากการการรักษาด้วยไฟฟ้า </strong> </h2>
<table border="1" cellspacing="0" cellpadding="0" width="660">
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center"><strong>ระดับความรุนแรง</strong><strong> </strong></p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><p align="center"><strong>&nbsp;</strong></p>
    <p align="center"><strong>ความหมาย</strong></p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">A</p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><p>  -    ผู้ป่วยได้รับการรักษาด้วยไฟฟ้า,    ผู้ป่วยมีความเสี่ยงที่ต้องเฝ้าระวังในการรักษาด้วยไฟฟ้า    ผู้ป่วยที่มีข้อบ่งชี้ห้ามรักษาด้วยไฟฟ้า </p>
      <ul>
        <li>ผู้ป่วยที่ต้องได้รับการเฝ้าระวัง    จากการได้รับยาหรืองดยาบางชนิดก่อนรักษาด้วยไฟฟ้า </li>
    </ul></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">B</p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><ul>
      <li>เจ้าหน้าที่ไม่ปฏิบัติตามระเบียบปฏิบัติการเตรียมผู้ป่วยรักษาด้วยไฟฟ้า </li>
      <li>ผู้ป่วยที่พบปัญหาก่อนรักษาด้วยไฟฟ้า    ทำให้ไม่ได้รับการรักษาด้วยไฟฟ้า เช่น Contraindication</li>
    </ul></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">C</p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยเกิดภาวะแทรกซ้อนขณะรักษาด้วยไฟฟ้าแต่ไม่ทำให้เกิดอันตราย    เช่น  ปัสสาวะราดขณะรักษาด้วยไฟฟ้า</p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">D</p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยเกิดภาวะแทรกซ้อนภายหลังรักษาด้วยไฟฟ้า    แต่ไม่จำเป็นต้องได้รับการรักษา เช่น ปวดหลัง/กล้ามเนื้อเล็กน้อย,    มีแผลในช่องปาก, มีแผล burn    เล็กน้อย, มีภาวะสับสนที่ดีขึ้นภายใน 24 ชั่วโมง</p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">E</p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><ul>
      <li>ผู้ป่วยเกิดภาวะแทรกซ้อนจากการรักษาด้วยไฟฟ้าและจำเป็นต้องได้รับการบำบัดรักษาหรือส่งไปรักษารพ.ฝ่ายกาย    ได้รับการรักษาแบบไม่รับไว้ เช่น ปวดหลัง/กล้ามเนื้อรุนแรง มีแผล burn, ฟันบิ่น/โยกมากขึ้น, กรามค้าง</li>
      <li>ผู้ป่วยที่มีระยะต่าง ๆ    ขณะรักษาด้วยไฟฟ้าผิดปกติ เช่น ระยะชักนานมากกว่า 1 นาที    ระยะชักน้อยกว่า 15 วินาที</li>
    </ul></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">F</p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยเกิดภาวะแทรกซ้อนจากการรักษาด้วยไฟฟ้า    จนต้องยุติการรักษาด้วยไฟฟ้าเป็นผลให้ต้องนอนโรงพยาบาลนานขึ้น หรือส่งไปรักษารพ.ฝ่ายกาย    แล้วรับไว้รักษาจนหาย เช่น มีภาวะ Apnea ที่ไม่จำเป็นต้องช่วยฟื้นคืนชีพ(CPR), หลังรักษาด้วยไฟฟ้าครบ cause มีภาวะสับสนนานเกิน    7 วัน</p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">G</p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยเกิดภาวะแทรกซ้อนขณะ/หลังรักษาด้วยไฟฟ้าจนมีความพิการของอวัยวะอย่างถาวร    ต้องส่งไปรักษาที่รพ.ฝ่ายกายแล้วรับไว้รักษาจนหาย เช่น ฟันหลุด/ฟันหัก, Fracture,    Dislocation, Rupture bladder</p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">H</p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยเกิดภาวะแทรกซ้อนจากการรักษาด้วยไฟฟ้าที่ได้รับการช่วยฟื้นคืนชีพ(CPR)/Intubation    ก่อนส่งไปรับการรักษาที่โรงพยาบาลฝ่ายกาย หรือทำช่วยฟื้นคืนชีพ(CPR)/Intubation ก่อน admit ที่โรงพยาบาลฝ่ายกาย</p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">I</p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยเกิดภาวะแทรกซ้อนจากการรักษาด้วยไฟฟ้าแล้วเสียชีวิตในโรงพยาบาล    หรือ Refer    รพ.ฝ่ายกายแล้วเสียชีวิตภายใน 24 ชั่วโมง</p></td>
  </tr>
</table>
<p>
  <?php } ?>
</p>
<p>
  <?php if($_GET[no]==7){?>
</p>
<h2 class="btn-danger"><strong>ผู้ป่วยมีภาวะแทรกซ้อนทางกาย </strong> </h2>
<table border="1" cellspacing="0" cellpadding="0" width="700">
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center"><strong>ระดับความรุนแรง</strong><strong> </strong></p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><p align="center"><strong>&nbsp;</strong></p>
    <p align="center"><strong>ความหมาย</strong><strong> </strong></p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">A</p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยที่มีภาวะ/โรคทางกายและโรงเพยาบาลจิตเวชทราบข้อมูลของโรคที่เป็นและยาที่ใช้</p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">B</p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยไม่ทราบประวัติภาวะ/โรคทางกายของตนเองมาก่อน    และได้รับการวินิจฉัยใหม่ในโรงพยาบาลจิตเวชแต่ไม่จำเป็นต้องได้รับการรักษาด้วยยา    เช่น โรคไขมันในเลือดสูง , น้ำตาลในเลือดสูง ,ไวรัสตับอักเสบชนิด B ,ภาวะตั้งครรภ์</p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">C</p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยมีภาวะ/โรคทางกายเกิดขึ้น    แต่ไม่เป็นอันตรายต่อผู้ป่วย และได้รับการรักษา</p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">D</p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยที่มีภาวะ/โรคทางกายที่ต้องได้รับการเฝ้าระวัง    Vital    sign , Neuro sign หรือได้รับการรักษาด้วยยา ( prn ) หรือผลการตรวจทางห้องปฏิบัติการ เป็นครั้งคราวเพื่อควบคุมอาการ เช่น    ผู้ป่วย DTS มี HT และได้ยา Antihypertensive    drug เป็นครั้งคราว </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">E</p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยที่มีภาวะ/โรคทางกายที่ส่งไปรับการรักษาที่โรงพยาบาลฝ่ายกายแล้วได้รับการรักษาแบบไม่รับไว้</p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">F</p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยที่มีภาวะ/โรคทางกายที่ส่งไปรับการรักษาที่โรงพยาบาลฝ่ายกายแล้วรับไว้รักษา</p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">G</p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยที่มีภาวะ/โรคทางกายที่ส่งไปรับการรักษาที่โรงพยาบาลฝ่ายกายแล้วเกิดความพิการของอวัยวะ    หรือโรคเรื้อรังที่ต้องการการรักษาไปตลอดชีวิต เช่น stroke , แพ้ยาแบบ steven-johnson , Lithium induced nephropathy , organ failure    , metabolic syndrome</p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">H</p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยที่มีภาวะ/โรคทางกายที่ได้รับการช่วยฟื้นคืนชีพ    (CPR)/ Intubation ก่อนส่งไปรับการรักษาที่โรงพยาบาลฝ่ายกาย    หรือทำการช่วยฟื้นคืนชีพ(CPR)/ Intubation ก่อน admit ที่โรงพยาบาลฝ่ายกาย</p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">I</p></td>
    <td width="576" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยที่มีภาวะ/โรคทางกายที่เสียชีวิตในโรงพยาบาล,    Refer    รับไว้รักษาแล้วเสียชีวิต(ภายใน 24 ชั่วโมง    ) </p></td>
  </tr>
</table>
<p>
  <?php } ?>
</p>
<p>
  <?php if($_GET[no]==8){?>
</p>
<h2 class="btn-danger"><strong>ผู้ป่วยฆ่าตัวตาย </strong> </h2>
<table border="1" cellspacing="0" cellpadding="0" width="700">
  <tr>
    <td width="84" valign="middle" bgcolor="#CCCCFF"><p align="center"><strong>ระดับความรุนแรง</strong> </p></td>
    <td width="564" valign="middle" bgcolor="#CCCCFF"><p align="center"><strong>&nbsp;</strong></p>
      <p align="center"><strong>ความหมาย</strong> </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">A</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยที่เคยมีประวัติทำร้ายตนเอง/ฆ่าตัวตาย/มีประวัติคนในครอบครัวฆ่าตัวตาย/มีปัจจัยเสี่ยงทางสังคม จิตวิทยา เช่นสูญเสียอวัยวะ อกหัก ตกงาน    โรคร้ายแรง ผิดหวัง ถูกล่วงละเมิดทางเพศ สูญเสียบุคคลอันเป็นที่รัก ผู้ที่เคยประสบเหตุการณ์รุนแรงหรือมีภาวะวิกฤติในชีวิต    เช่น ปัญหาครอบครัว ภัยธรรมชาติ ฯลฯ/ผู้ป่วยที่มีภาวะซึมเศร้า</p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">B</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยมีความคิด/    มีแผนแต่ยังไม่เคยลงมือกระทำขณะมารับการรักษาภายใน 3 เดือน</p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">C</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>ขณะมารับการรักษาพยายามลงมือทำร้ายตนเอง เช่น    บีบคอตัวเอง หยิกหรือตีตนเอง </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">D</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยทำร้ายตนเอง เช่น    เอาศีรษะโขกหรือใช้อุปกรณ์ในการทำร้ายตนเอง    แต่ยังไม่มีการได้รับบาดเจ็บถึงขั้นรักษาแต่ต้องเฝ้าระวังเพื่อไม่ให้เกิดซ้ำ </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">E</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p> ผู้ป่วยทำร้ายตนเอง ได้รับบาดเจ็บเล็กน้อยและ    ต้องให้การบำบัดรักษาและดูแลใกล้ชิด </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">F</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยทำร้ายตนเอง ได้รับบาดเจ็บรุนแรง เช่นขาหัก    แขนหัก กระดูกแตก มีบาดแผลหรือบาดเจ็บที่ต้องเย็บหรือใส่เฝือก, ศีรษะบวมโน, observe N/S หรือ Refer ไปรับไว้รักษา    (มีการสูญเสียหน้าที่อวัยวะชั่วคราว)</p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">G</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยมีการกระทำที่รุนแรงส่งผลทำให้ร่างกายได้รับบาดเจ็บหรือสูญเสีย,    พิการถาวร เช่นทำให้ ตาบอด, หูหนวก, หรือถูกตัดอวัยวะส่วนของร่างกายออกไป    หรือพิการและอัมพาตถาวร หรือ Refer ไปรับไว้รักษา    (มีการสูญเสียหน้าที่อวัยวะถาวร)</p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">H</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยมีการกระทำที่รุนแรง ส่งผลให้เกิดอันตรายได้รับการช่วยฟื้นคืนชีพ(CPR)/Intubation    ก่อนส่งไปรับการรักษาที่โรงพยาบาลฝ่ายกาย หรือทำช่วยฟื้นคืนชีพ(CPR)/Intubation ก่อน admit ที่โรงพยาบาลฝ่ายกาย</p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">I</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยฆ่าตัวตายสำเร็จ </p></td>
  </tr>
</table>
<p>
  <?php } ?>
</p>
<p>
  <?php if($_GET[no]==9){?>
</p>
<h2 class="btn-danger"><strong>ผู้ป่วยหลบหนี </strong> </h2>
<table border="1" cellspacing="0" cellpadding="0" width="700">
  <tr>
    <td width="125" valign="middle" bgcolor="#CCCCFF"><p align="center"><strong>ระดับความรุนแรง</strong><strong> </strong></p></td>
    <td width="608" valign="middle" bgcolor="#CCCCFF"><p align="center"><strong>&nbsp;</strong></p>
    <p align="center"><strong>ความหมาย</strong><strong> </strong></p></td>
  </tr>
  <tr>
    <td width="125" valign="top" bgcolor="#CCCCFF"><p align="center">A</p></td>
    <td width="608" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยที่ได้รับการประเมินการเฝ้าระวัง    &ldquo;หลบหนี&rdquo; ผู้ป่วยที่มีประวัติการหลบหนี<br>
      ผู้ป่วยกลุ่มยาเสพติด และผู้ป่วยคดี </p></td>
  </tr>
  <tr>
    <td width="125" valign="top" bgcolor="#CCCCFF"><p align="center">B</p></td>
    <td width="608" valign="top" bgcolor="#CCCCFF"><p>มีคำพูดเรื่องอยากหนี    ไม่อยากอยู่โรงพยาบาล แต่ยังไม่มีพฤติกรรมพยายามหลบหนีเช่น ยืนที่ประตู    ท่าทีสอดส่อง หาช่องทาง เขย่าประตู </p></td>
  </tr>
  <tr>
    <td width="125" valign="top" bgcolor="#CCCCFF"><p align="center">C</p></td>
    <td width="608" valign="top" bgcolor="#CCCCFF"><p>มีพฤติกรรมพยายามหลบหนี    แต่ยังอยู่ในบริเวณหอผู้ป่วย เช่น ถอดบานเกร็ด ปีนหน้าต่าง    ที่ไม่ได้เกิดจากอาการมึนงง สับสน </p></td>
  </tr>
  <tr>
    <td width="125" valign="top" bgcolor="#CCCCFF"><p align="center">D</p></td>
    <td width="608" valign="top" bgcolor="#CCCCFF"><p>มีพฤติกรรมหลบหนีชัดเจน เช่น    พยายามวิ่งสวนออกมา แต่ยังอยู่ในบริเวณรั้วหอผู้ป่วย </p></td>
  </tr>
  <tr>
    <td width="125" valign="top" bgcolor="#CCCCFF"><p align="center">E</p></td>
    <td width="608" valign="top" bgcolor="#CCCCFF"><p>สามารถหลบหนีได้จากหอผู้ป่วย โดยยังอยู่ในบริเวณรั้วโรงพยาบาล </p></td>
  </tr>
  <tr>
    <td width="125" valign="top" bgcolor="#CCCCFF"><p align="center">F</p></td>
    <td width="608" valign="top" bgcolor="#CCCCFF"><p>หลบหนีออกจากโรงพยาบาลได้    แต่สามารถตามกลับมาได้ ทันที </p></td>
  </tr>
  <tr>
    <td width="125" valign="top" bgcolor="#CCCCFF"><p align="center">G</p></td>
    <td width="608" valign="top" bgcolor="#CCCCFF"><p>หลบหนีออกจากโรงพยาบาลได้ และสามารถตามกลับได้    ภายในเวรนั้น </p></td>
  </tr>
  <tr>
    <td width="125" valign="top" bgcolor="#CCCCFF"><p align="center">H</p></td>
    <td width="608" valign="top" bgcolor="#CCCCFF"><p>หลบหนีได้สำเร็จ และติดตามได้    ในเวรต่อไป โดยยังไม่มีการสั่งจำหน่าย </p></td>
  </tr>
  <tr>
    <td width="125" valign="top" bgcolor="#CCCCFF"><p align="center">I</p></td>
    <td width="608" valign="top" bgcolor="#CCCCFF"><p>สามารถหลบหนีได้สำเร็จหรือไม่สามารถตามกลับมาได้    และมีคำสั่งจำหน่าย </p></td>
  </tr>
</table>
<p>
  <?php } ?>
</p>
<p>
  <?php if($_GET[no]==10){?>
</p>
<h2 class="btn-danger"><strong>เจ้าหน้าที่ได้รับบาดเจ็บจากการปฏิบัติงาน </strong> </h2>
<table border="1" cellspacing="0" cellpadding="0" width="700">
  <tr>
    <td width="84" valign="middle" bgcolor="#CCCCFF"><p align="center"><strong>ระดับความรุนแรง</strong><strong> </strong></p></td>
    <td width="564" valign="middle" bgcolor="#CCCCFF"><p align="center"><strong>&nbsp;</strong></p>
      <p align="center"><strong>ความหมาย</strong><strong> </strong></p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">A</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>มีปัจจัยที่ทำให้ได้รับบาดเจ็บเนื่องจากความไม่พร้อมทางร่างกาย    จิตใจของเจ้าหน้าที่ สถานที่ อุปกรณ์ </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">B</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>เสี่ยงต่อการได้รับบาดเจ็บเนื่องจากไม่ได้ปฏิบัติตามระเบียบปฏิบัติ(QP)    หรือเกือบถูกผู้ป่วยทำร้าย แต่สามารถป้องกันได้</p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">C</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>เจ้าหน้าที่ได้รับบาดเจ็บจากถูกผู้ป่วยทำร้าย    แต่ไม่มีบาดแผล รอยฟกช้ำ หรือได้รับบาดเจ็บจากอุปกรณ์ เครื่องมือที่ปฏิบัติงาน    เช่น เข็มฉีดยาทิ่มแทง ปลายกรรไกรบาด </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">D</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>เจ้าหน้าที่ได้รับบาดเจ็บมีบาดแผลเล็กน้อย    ถลอก บวมช้ำ    ที่อวัยวะไม่สำคัญแต่ต้องเฝ้าระวังเพื่อให้มั่นใจว่าไม่ให้เกิดอันตราย </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">E</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>เจ้าหน้าที่ได้รับบาดเจ็บมีบาดแผลไม่ต้องเย็บ    ถลอก บวมช้ำ ในอวัยวะที่ไม่สำคัญ และได้รับการบำบัดรักษา Refer รพ.ฝ่ายกายได้รับรักษา(ไม่รับไว้)</p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">F</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>เจ้าหน้าที่ได้รับบาดเจ็บมีบาดแผลต้องเย็บ    อวัยวะสำคัญได้รับการกระทบกระเทือน ต้อง observe N/S , V/S 24 ชั่วโมง  หรืออวัยวะสูญเสียหน้าที่ชั่วคราว    Refer รพ.ฝ่ายกายรับไว้/ไม่รับไว้</p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">G</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>เจ้าหน้าที่ได้รับบาดเจ็บทำให้อวัยวะอย่างใดอย่างหนึ่งมีความพิการถาวรจนไม่สามารถปฏิบัติหน้าที่ได้ตามปกติ    Refer    รพ.ฝ่ายกายรับไว้</p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">H</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>เจ้าหน้าที่ได้รับบาดเจ็บรุนแรงได้รับการช่วยฟื้นคืนชีพ(CPR)/Intubation    ก่อนส่งไปรับการรักษาที่โรงพยาบาลฝ่ายกาย หรือทำช่วยฟื้นคืนชีพ(CPR)/Intubation ก่อน admit ที่โรงพยาบาลฝ่ายกาย</p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">I</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>เจ้าหน้าที่ได้รับบาดเจ็บรุนแรงเสียชีวิตในโรงพยาบาล    หรือ Refer    รพ.ฝ่ายกายรับไว้เสียชีวิตภายใน 24 ชั่วโมง</p></td>
  </tr>
</table>
<p>
  <?php } ?>
</p>
<p>
  <?php if($_GET[no]==11){?>
</p>
<h2 class="btn-danger"><strong>ผู้ป่วยติดเชื้อในโรงพยาบาล (NI) และในชุมชน(CI) </strong></h2>
<p>NI  : ผู้ป่วยที่วินิจฉัยว่าติดเชื้อเมื่อ admit อยู่ใน  ward ตั้งแต่ 48 ชั่วโมงขึ้นไป<br>
CI  : ผู้ป่วยที่วินิจฉัยว่าติดเชื้อเมื่อ admit อยู่ใน  ward น้อยกว่า 48 ชั่วโมง </p>
<table border="1" cellspacing="0" cellpadding="0" width="700">
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><br>
      <strong>ระดับความรุนแรง</strong></td>
    <td width="586" valign="top" bgcolor="#CCCCFF"><p align="center"><strong>ความหมาย</strong><strong> </strong></p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">A</p></td>
    <td width="586" valign="top" bgcolor="#CCCCFF"><ol>
      <li>มีการรายงานสถานการณ์โรคระบาดนอกโรงพยาบาล </li>
      <li>ผลการสุ่มตรวจ Spore test ผลเป็น positive ในเครื่องมือ sterile</li>
      <li>ผลการสุ่มตรวจน้ำดื่มพบเชื้อ Coliform bacteria</li>
      <li>ผลการสุ่มตรวจน้ำยาฆ่าเชื้อ น้ำเกลือล้างแผล    พบเชื้อ </li>
      <li>พบน้ำยาฆ่าเชื้อ น้ำเกลือล้างแผล    หมดอายุหรือเสื่อมสภาพ</li>
    </ol></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">B</p></td>
    <td width="586" valign="top" bgcolor="#CCCCFF"><ol>
      <li>ผู้ป่วยและเจ้าหน้าที่ที่เสี่ยงต่อการติดเชื้อ </li>
      <ol>
        <li>1.1 ANC &lt; 1,500 cell / mm3</li>
        <li>1.2 สูงอายุ ( มากกว่า 60 ปี    ) / เด็ก ( น้อยกว่า 15 ปี )</li>
        <li>1.3 ได้รับยากดภูมิคุ้มกัน เช่น Steroid , Chemo,    Methotrexate , Azathioprine</li>
        <li>1.4 ภูมิคุ้มกันบกพร่อง เช่น HIV , SLE , Cancer</li>
        <li>1.5 ได้รับยากดไขกระดูก เช่น Clozapine</li>
        <li>1.6 ขาดสารอาหาร ( Malnutrition )</li>
        <li>1.7 ผู้ป่วย Alcohol , ติดยาเสพติด</li>
        <li>1.8 ผู้ป่วยที่ไม่ค่อยได้เคลื่อนไหว เช่น    ผู้ป่วยที่ได้รับยา Over    sedation , MR ที่ต้องมัดไว้ หรือผู้ป่วย</li>
        <li> พิการเคลื่อนไหวไม่สะดวก </li>
        <li>1.9 มีบาดแผล </li>
        <li>1.10 มีโรคเรื้อรัง เช่น ไตวายเรื้อรัง    ตับแข็ง โรคปอดเรื้อรัง และผู้ป่วยโรคเบาหวาน </li>
        <li>1.11 ผู้ป่วยที่ใส่สาย Device ต่าง ๆ เช่น IV Fluid/ NG tube/ Foley ,s Catheter เป็นต้น</li>
      </ol>
    </ol>
      <p> 2.   บุคลากรไม่ปฏิบัติตาม Aseptic    technique ก่อนทำหัตถการ<br>
        3.   ผู้ป่วย หรือบุคลากรไม่ปฏิบัติตาม WI การป้องกันการแพร่กระจายเชื้อ</p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">C</p></td>
    <td width="586" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยติดเชื้อที่ไม่จำเป็นต้องได้รับการรักษาด้วย    Antibiotic    เช่น common cold , diarrhea</p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">D</p></td>
    <td width="586" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยติดเชื้อที่ได้รับการรักษาด้วย    Antibiotic    ชนิดรับประทาน (รักษาที่รพ.จิตเวช)</p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">E</p></td>
    <td width="586" valign="top" bgcolor="#CCCCFF"><p>      1.      ผู้ป่วยที่ติดเชื้อที่ได้รับการรักษาด้วย Antibiotic ชนิดฉีด (รักษาที่รพ.จิตเวช) หรือ Refer ไปแล้ว<br>
      ได้รับยามารักษาต่อที่รพ.จ.นม. </p>
      <ol>
        <li>มีโรคที่มีแนวโน้มการระบาดเกิดขึ้นในโรงพยาบาล    เช่น ตาแดง ไข้หวัดใหญ่ </li>
        <li>ผู้ป่วย TB ในระยะแพร่กระจาย Refer    รพ.ฝ่ายกายแล้วได้ยารับประทาน</li>
      </ol></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">F</p></td>
    <td width="586" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยติดเชื้อที่ส่งไปรักษาที่โรงพยาบาลฝ่ายกาย    รับไว้รักษา</p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">G</p></td>
    <td width="586" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยติดเชื้อที่ได้รับการรักษาและเมื่อหายแล้วเกิดความพิการของอวัยวะของผู้ป่วยแบบถาวร    เช่น Septic    Arthritis , Meningitis , Encephalitis</p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">H</p></td>
    <td width="586" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยติดเชื้อได้รับการช่วยฟื้นคืนชีพ(CPR)/Intubation    ก่อนส่งไปรับการรักษาที่โรงพยาบาลฝ่ายกาย หรือทำช่วยฟื้นคืนชีพ(CPR)/Intubation ก่อน admit ที่โรงพยาบาลฝ่ายกาย</p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">I</p></td>
    <td width="586" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยติดเชื้อแล้วเสียชีวิตในโรงพยาบาล    หรือ Refer    ไปโรงพยาบาลฝ่ายกายแล้วเสียชีวิตภายใน 24 ชั่วโมง</p></td>
  </tr>
</table>
<p>
  <?php } ?>
</p>
<p>
  <?php if($_GET[no]==12){?>
</p>
<h2 class="btn-danger"> ด้านข้อมูล <br>
  การให้บริการข้อมูลข่าวสารคลาดเคลื่อน </h2>
<table border="1" cellspacing="0" cellpadding="0" width="700">
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center"><strong>ระดับความรุนแรง</strong><strong> </strong></p></td>
    <td width="700" valign="top" bgcolor="#CCCCFF"><p align="center"><strong>ความหมาย</strong><strong> </strong></p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">A</p></td>
    <td width="700" valign="top" bgcolor="#CCCCFF"><p>ปัจจัยที่อาจจะก่อให้เกิดความคลาดเคลื่อนของข้อมูล    ได้แก่ ข้อมูลไม่ชัดเจน ข้อมูลไม่เป็นปัจจุบัน    ความไม่พร้อมของผู้ให้และผู้รับข้อมูล     วิธีการสื่อสาร และอุปกรณ์หรือสื่อในการนำเสนอ </p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">B</p></td>
    <td width="700" valign="top" bgcolor="#CCCCFF"><p>มีการตรวจสอบพบความผิดพลาด    ก่อนที่จะมีการให้ข้อมูล ไม่ปฏิบัติตามวิธีปฏิบัติ </p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">C</p></td>
    <td width="700" valign="top" bgcolor="#CCCCFF"><p>เกิดความผิดพลาดในการให้ข้อมูลแก่ผู้รับบริการ    แต่ไม่ทำให้เกิดความเสียหาย ตามจุดประสงค์ของผู้รับบริการ </p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">D</p></td>
    <td width="700" valign="top" bgcolor="#CCCCFF"><p>เกิดความผิดพลาดในการให้ข้อมูลแก่ผู้รับบริการส่งผลให้เกิดความเสียหาย  ไม่เป็นไปตามจุดประสงค์ของผู้รับบริการ เช่น    เกิดความไม่พึงพอใจ ล่าช้า ไม่มีการร้องเรียน</p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">E</p></td>
    <td width="700" valign="top" bgcolor="#CCCCFF"><p>เกิดความผิดพลาดในการให้ข้อมูลแก่ผู้รับบริการส่งผลให้ก่อความเสียหายต่อความรู้สึก    หรือทรัพย์สิน ทำให้มีการร้องเรียนโดยวาจา และต้องมีการเจรจาทำความเข้าใจ </p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">F</p></td>
    <td width="700" valign="top" bgcolor="#CCCCFF"><p>เกิดความผิดพลาดในการให้ข้อมูลจนทำให้มีการร้องเรียนเป็นลายลักษณ์อักษรในโรงพยาบาล    และต้องมีการเจรจาต่อรอง </p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">G</p></td>
    <td width="700" valign="top" bgcolor="#CCCCFF"><p>เกิดการร้องเรียนถึงหน่วยงานระดับสูงกว่าโรงพยาบาล    เช่น จังหวัด กรม หรือกระทรวง หรือสื่อมวลชน </p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">H</p></td>
    <td width="700" valign="top" bgcolor="#CCCCFF"><p>มีการร้องเรียนจนต้องตั้งคณะกรรมการสอบ </p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">I</p></td>
    <td width="700" valign="top" bgcolor="#CCCCFF"><p>เกิดการฟ้องร้อง เป็นคดีความ </p></td>
  </tr>
</table>
<p>
  <?php } ?>
</p>
<h2>
  <?php if($_GET[no]==13){?>
  <h2 span class="btn-danger">ด้านข้อมูล<br>
การบันทึกข้อมูลคลาดเคลื่อน </span></h2>
<table border="1" cellspacing="0" cellpadding="0" width="700">
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center"><strong>ระดับความรุนแรง</strong><strong> </strong></p></td>
    <td width="600" valign="top" bgcolor="#CCCCFF"><p align="center"><strong>ความหมาย</strong><strong> </strong></p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">A</p></td>
    <td width="600" valign="top" bgcolor="#CCCCFF"><p>มีปัจจัยที่ทำให้เกิดการบันทึกข้อมูลผิดพลาด    เช่น บุคลากรไม่พร้อม เครื่องมือไม่พร้อม </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">B</p></td>
    <td width="600" valign="top" bgcolor="#CCCCFF"><p>เจ้าหน้าที่ไม่ปฏิบัติตามวิธีปฏิบัติ     ตรวจสอบพบความผิดพลาดก่อนดำเนินการบันทึก </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">C</p></td>
    <td width="600" valign="top" bgcolor="#CCCCFF"><p>บันทึกข้อมูลผิดพลาดแล้วตรวจพบความผิดพลาดโดยผู้บันทึกหรือหัวหน้า    และดำเนินการ <br>
      แก้ไข ก่อนออกจากหน่วยงาน </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">D</p></td>
    <td width="600" valign="top" bgcolor="#CCCCFF"><p>ส่งข้อมูลบันทึกผิดพลาดไปนอกหน่วยงาน    แล้วหน่วยงานอื่นพบความผิดพลาด ประสาน <br>
      หน่วยงานที่บันทึกข้อมูลดำเนินการแก้ไข </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">E</p></td>
    <td width="600" valign="top" bgcolor="#CCCCFF"><p>บันทึกข้อมูลผิดพลาดแล้วส่งต่อข้อมูลไปนอกหน่วยงาน    ไม่สามารถแก้ไขเองได้ ต้อง <br>
      ประสานเพื่อแก้ไขข้อมูล </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">F</p></td>
    <td width="600" valign="top" bgcolor="#CCCCFF"><p>บันทึกข้อมูลผิดพลาดแล้วส่งต่อข้อมูลไปนอกหน่วยงาน    ไม่สามารถแก้ไขเองได้ ต้อง <br>
      ประสานเพื่อแก้ไขข้อมูล    และทำให้ข้อมูลล่าช้า </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">G</p></td>
    <td width="600" valign="top" bgcolor="#CCCCFF"><p>บันทึกข้อมูลผิดพลาดแล้วส่งต่อข้อมูลไปนอกหน่วยงาน    ไม่สามารถแก้ไขได้ ทำให้เกิด <br>
      ความเสียหายต่อโรงพยาบาล </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">H</p></td>
    <td width="600" valign="top" bgcolor="#CCCCFF"><p>เกิดความผิดพลาดในการบันทึกข้อมูลทำให้เกิดความเสียหายต่อโรงพยาบาล    ต้องตั้งคณะ <br>
      กรรมการตรวจสอบ </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">I</p></td>
    <td width="600" valign="top" bgcolor="#CCCCFF"><p>เกิดความผิดพลาดในการบันทึกข้อมูลทำให้เกิดความเสียหายต่อโรงพยาบาล    และตั้งคณะ <br>
      กรรมการตรวจสอบ ถูกลงโทษทางวินัย </p></td>
  </tr>
</table>
<p>
  <?php } ?>
  <br>
  <?php if($_GET[no]==14){?>
</p>
<h2 class="btn-danger"><strong>ด้านการเงิน <br>
  เอกสารทางด้านการเงินคลาดเคลื่อนหรือไม่ครบถ้วน   </strong></h2>
<table border="1" cellspacing="0" cellpadding="0" width="700">
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center"><strong>ระดับความรุนแรง</strong><strong> </strong></p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p align="center"><strong>ความหมาย</strong><strong> </strong></p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">A</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>ปัจจัยที่มีโอกาสจะทำให้เกิดความผิดพลาด    เช่น บุคลากรไม่พร้อม ระบบการจัดเก็บเอกสาร     อุปกรณ์ไม่เอื้อต่อการปฏิบัติงาน </p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">B</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>เจ้าหน้าที่ไม่ปฏิบัติตามวิธีปฏิบัติ    ตรวจสอบพบความผิดพลาดก่อนดำเนินการ </p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">C</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>เอกสารทางการเงินมีความคลาดเคลื่อน    ตรวจพบโดยผู้ตรวจสอบหรือผู้อื่น แล้วแก้ไขได้ เช่น นำเสนอต่อหัวหน้าฝ่าย    รองผู้อำนวยการ </p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">D</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>เอกสารทางการเงินคลาดเคลื่อน    แต่สามารถระงับการดำเนินการเอกสารด้านการเงินได้ทัน </p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">E</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>เอกสารทางการเงินคลาดเคลื่อน    ไม่สามารถระงับการดำเนินการเอกสารด้านการเงินได้ทัน ต้องมีการดำเนินการเพิ่มเติม    ทำให้เกิดความล่าช้าแต่ไม่เกิดความเสียหายต่อโรงพยาบาล</p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">F</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>เกิดความเสียหายต่อประโยชน์ของโรงพยาบาล </p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">G</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>ตรวจสอบพบความผิดพลาดโดยผู้ตรวจสอบภายในหรือภายนอก </p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">H</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>ตั้งคณะกรรมการสอบ </p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">I</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>ถูกฟ้องร้อง เป็นคดีความ    ถูกลงโทษทางวินัย </p></td>
  </tr>
</table>
<p>
  <?php } ?>
</p>
<p>
  <?php if($_GET[no]==15){?>
</p>
<h2 class="btn-danger"><strong>ด้านการเงิน<br>
</strong><strong>ส่งเรียกเก็บค่ารักษาพยาบาลไม่ทันภายในเวลาที่กำหนด </strong> </h2>
<table border="1" cellspacing="0" cellpadding="0" width="700">
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center"><strong>ระดับความรุนแรง</strong><strong> </strong></p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p align="center"><strong>ความหมาย</strong><strong> </strong></p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">A</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>ข้อมูลที่ส่งเรียกเก็บมีโอกาสก่อให้เกิดความคลาดเคลื่อน    เช่น ข้อมูลไม่ชัดเจน คอมพิวเตอร์ขัดข้อง Internet ขัดข้อง  เจ้าหน้าที่ไม่พร้อม</p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">B</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>ข้อมูลที่เรียกเก็บค่ารักษาพยาบาลมีความคลาดเคลื่อน    ตรวจพบและแก้ไขโดยผู้ปฏิบัติ เช่น HN., วัน/เดือน/ปี ผิด</p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">C</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>ข้อมูลที่เรียกเก็บค่ารักษาพยาบาลมีความคลาดเคลื่อน    ตรวจพบโดยผู้ตรวจสอบหรือผู้อื่น แล้วแก้ไขได้ เช่น นำเสนอต่อหัวหน้าฝ่าย    รองผู้อำนวยการ </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">D</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>ส่งข้อมูลผิดพลาด    แต่สามารถระงับการเรียกเก็บทัน เช่น โทรศัพท์ไประงับ ทำหนังสือไประงับ </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">E</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>ส่งข้อมูลเรียกเก็บผิดพลาดและแก้ไขไม่ทัน    หรือระงับการเรียกเก็บไม่ทัน เช่นจำนวนเงิน 1,000 เป็น 100 ทำให้โรงพยาบาลขาดรายได้</p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">F</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>ส่งข้อมูลเรียกเก็บค่ารักษาไม่ทันภายในกำหนดเวลา    ส่งผลให้ถูกหักรายได้ 5-15%</p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">G</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>มีการตรวจสอบพบภายหลังว่าไม่มีการส่งข้อมูล    ทำให้โรงพยาบาลขาดรายได้ในงวดส่งนั้น ๆ 100%</p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">H</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>ตรวจสอบพบความผิดพลาดของข้อมูลโดยผู้ตรวจสอบภายในหรือภายนอก </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">I</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>เกิดความผิดพลาดทำให้โรงพยาบาลได้รับความเสียหาย    จนต้องตั้งคณะกรรมการสอบสวน / ถูกลงโทษทางวินัย </p></td>
  </tr>
</table>
<p>
  <?php } ?>
</p>
<p>
  <?php if($_GET[no]==16){?>
</p>
<h2 class="btn-danger"><strong>ด้านเครื่องมือ</strong> <br>
  <strong>การใช้ Internet, Intranet และอุปกรณ์คอมพิวเตอร์ไม่พร้อมใช้</strong></h2>
<table border="1" cellspacing="0" cellpadding="0" width="700">
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center"><strong>ระดับความรุนแรง</strong><strong> </strong></p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p align="center"><strong>ความหมาย</strong><strong> </strong></p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">A</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>ปัจจัยที่อาจจะก่อให้เกิดความไม่พร้อมใช้ของระบบ    เช่นอุปกรณ์ต่อพ่วง Network    หมดอายุการใช้งาน หรือใช้งานมานานแล้ว แต่ยังสามารถใช้งานได้อยู่    ขาดการบำรุงรักษาตามโปรแกรม ผู้ใช้ขาดทักษะการใช้งาน</p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">B</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>อุปกรณ์เกิดความชำรุดหรือเสื่อมสภาพแล้ว    แต่มีการตรวจพบโดยผู้รับผิดชอบแล้วแก้ไขได้ </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">C</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>อุปกรณ์เกิดความชำรุดหรือเสื่อมสภาพแล้ว    ได้รับการรายงานจากผู้ใช้บริการ สามารถแก้ไขได้ทันทีโดยผู้รับผิดชอบ </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">D</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>ระบบไม่สามารถให้บริการได้    สามารถแก้ไขได้ทันทีโดยผู้รับผิดชอบ </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">E</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>ระบบไม่สามารถให้บริการได้ภายใน 15 นาที    ส่งผลให้การดำเนินงานล่าช้าขึ้น เช่นการส่ง E-mail </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">F</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>ระบบไม่สามารถให้บริการภายใน 30 นาทีส่งผลให้เจ้าหน้าที่หน่วยงานอื่นไม่สามารถทำงานได้ชั่วคราว</p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">G</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>ระบบไม่สามารถให้บริการได้    และไม่สามารถปรับปรุงให้ใช้งานได้ภายใน 1 วัน</p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">H</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>ระบบไม่สามารถให้บริการได้มากกว่า 1 วัน    ส่งผลกระทบต่อการดำเนินงานของหน่วยงาน ข้อมูลในระบบเสียหายบางส่วน</p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">I</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>ระบบไม่สามารถให้บริการได้มากกว่า 1 วัน    ส่งผลกระทบต่อการดำเนินงานของหน่วยงาน ข้อมูลในระบบเสียหายทั้งหมด</p></td>
  </tr>
</table>
<p>
  <?php } ?>
</p>
<p>
  <?php if($_GET[no]==17){?>
</p>
<h2 class="btn-danger"><strong>ด้านเครื่องมือ<br>
  ความพร้อมใช้ของระบบสำรองไฟ</strong></h2>
<table border="1" cellspacing="0" cellpadding="0" width="700">
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center"><strong>ระดับความรุนแรง</strong><strong> </strong></p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p align="center"><strong>ความหมาย</strong><strong> </strong></p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">A</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>มีการตรวจสอบโดยผู้ปฏิบัติ  ไม่พบความคลาดเคลื่อน แต่มีปัจจัยทำให้เกิดความเสี่ยง เช่น    หม้อน้ำรั่ว หนูกัดสายไฟ </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">B</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>ผู้ตรวจสอบตรวจพบปัจจัยเสี่ยงแต่ยังไม่เกิดความคลาดเคลื่อน    เช่น ตรวจสอบพบแบตเตอรี่อ่อน ระบบอัตโนมัติไม่ทำงาน </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">C</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p> เกิดความคลาดเคลื่อน เนื่องจากระบบอัตโนมัติไม่ทำงาน    ต้องใช้ระบบ Manual สามารถใช้ระบบ  สำรองไฟได้ภายใน 5 นาที   </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">D</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>เกิดความคลาดเคลื่อน เนื่องจากระบบอัตโนมัติไม่ทำงาน    ต้องใช้ระบบ Manual    สามารถใช้ระบบสำรองไฟได้ภายใน 15 นาที   </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">E</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p> เกิดความคลาดเคลื่อนของระบบขึ้น ทำให้ต้องหยุดการใช้งานและซ่อมเปลี่ยนอะไหล่ภายใน    2   ชั่วโมง </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">F</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>ระบบและอุปกรณ์ชำรุด    ต้องใช้เวลาในการซ่อมบำรุงมากกว่า 1 วัน</p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">G</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>ระบบและอุปกรณ์ชำรุด    ต้องใช้เวลาในการซ่อมบำรุง 2-5 วัน และเสียค่าใช้จ่ายไม่เกิน <br>
    50,000 บาท</p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">H</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p> ระบบและอุปกรณ์ชำรุด ต้องใช้เวลาในการซ่อมบำรุงมากกว่า    5  วัน และเสียค่าใช้จ่าย 50,000 –    100,000  บาท </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">I</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>ระบบและอุปกรณ์ชำรุด    ต้องเปลี่ยนทั้งระบบ เสียค่าใช้จ่าย &gt;    100,000 บาท </p></td>
  </tr>
</table>
<p>
  
<?php } ?>
</p>
<p>
  <?php if($_GET[no]==18){?>
</p>
<h2 class="btn-danger"><strong>ด้านความปลอดภัย </strong> <br>
  <strong>ความปลอดภัยทางด้านทรัพย์สิน</strong> </h2>
<table border="1" cellspacing="0" cellpadding="0" width="700">
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center"><strong>ระดับความรุนแรง</strong><strong> </strong></p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p align="center"><strong>ความหมาย</strong><strong> </strong></p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">A</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>มีปัจจัยเสี่ยงที่ทำให้เกิดความไม่ปลอดภัย    เช่น รั้วชำรุด ไฟรั้วดับ ไม่ปิดประตูตามเวลา </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">B</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>ตรวจสอบพบปัจจัยเสี่ยง    เช่นมีผู้ที่ไม่เกี่ยวข้องเข้ามาในโรงพยาบาลอาจจะก่อให้เกิดความไม่ปลอดภัย </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">C</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>เกิดความไม่ปลอดภัย    แต่ไม่เกิดความเสียหายต่อบุคคลและทรัพย์สิน </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">D</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>มีทรัพย์สินเสียหายเล็กน้อย </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">E</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>ทรัพย์สินเสียหายหรือโดนทำลาย    ติดตามหาผู้รับผิดชอบ </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">F</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>ทรัพย์สินเสียหายหรือโดนทำลายติดตามไม่ได้  ตั้งคณะกรรมการสอบ เพื่อติดตาม </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">G</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>ทรัพย์สินเสียหายหรือโดนทำลายติดตามไม่ได้   มีการแจ้งความดำเนินคดี </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">H</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>ทรัพย์สินเสียหายหรือโดนทำลายติดตามไม่ได้   มีการแจ้งความดำเนินคดี และชดใช้ค่าเสียหาย </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">I</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>ทรัพย์สินเสียหายรุนแรง    เช่น ไฟไหม้รุนแรง ถูกวางระเบิด </p></td>
  </tr>
</table>
<p>
  <?php } ?>
</p>
<p>
  <?php if($_GET[no]==19){?>
</p>
<h2 span class="btn-danger"><strong>ด้านความปลอดภัย<br>
  สิ่งแวดล้อมไม่ปลอดภัย(ด้านระบบบำบัดน้ำเสีย)</strong> </span> </h2>
<table border="1" cellspacing="0" cellpadding="0" width="700">
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center"><strong>ระดับความรุนแรง</strong><strong> </strong></p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p align="center"><strong>ความหมาย</strong><strong> </strong></p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">A</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>มีปัจจัยเสี่ยงที่ทำให้เกิดความไม่สะอาดแต่ไม่มีใครแจ้งเจ้าหน้าที่ดูแลระบบบำบัดน้ำเสีย </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">B</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>ตรวจสอบพบน้ำยาทำความสะอาดเข้าสู่ระบบบำบัดน้ำเสีย    แต่แก้ไขได้ </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">C</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>ระบบบำบัดน้ำเสียถูกรบกวน    แต่ไม่ส่งผลกระทบเสียหาย </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">D</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>เกิดความเสียหายต่อระบบบำบัดน้ำเสีย    มีการเฝ้าระวังโดย นวก สาธารณสุขและเจ้าหน้าที่ดูแลระบบบำบัดน้ำเสีย </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">E</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>  เกิดความเสียหายต่อระบบบำบัดน้ำเสีย    ต้องปิดระบบ 1-7 วัน </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">F</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>เกิดความเสียหายต่อระบบบำบัดน้ำเสีย    ต้องปิดระบบ 7-15 วัน </p></td>
  </tr>
  <tr>
    <td width="84" valign="top" bgcolor="#CCCCFF"><p align="center">G</p></td>
    <td width="564" valign="top" bgcolor="#CCCCFF"><p>เกิดความเสียหายต่อระบบบำบัดน้ำเสียทั้งระบบ    ต้องปิดทำการบำรุงรักษา &gt; 15 วัน </p></td>
  </tr>
</table>
<p>
  <?php } ?>
</p>
<p>
  <?php if($_GET[no]==20){?>
</p>
<h2 class="btn-danger"><strong>ด้านอื่น ๆ</strong> <br>
  <strong>การทิ้งขยะไม่ถูกประเภท</strong> </h2>
<table border="1" cellspacing="0" cellpadding="0" width="700">
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center"><strong>ระดับความรุนแรง</strong><strong> </strong></p></td>
    <td width="556" valign="top" bgcolor="#CCCCFF"><p align="center"><strong>ความหมาย</strong><strong> </strong></p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">A</p></td>
    <td width="556" valign="top" bgcolor="#CCCCFF"><p>ผู้ปฏิบัติตรวจสอบไม่พบการทิ้งขยะผิดประเภท </p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">B</p></td>
    <td width="556" valign="top" bgcolor="#CCCCFF"><p>เกิดการทิ้งขยะผิดประเภท    ซึ่งตรวจพบโดย ผู้ปฏิบัติ </p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">C</p></td>
    <td width="556" valign="top" bgcolor="#CCCCFF"><p>เกิดการทิ้งขยะผิดประเภท    ซึ่งตรวจพบโดย  นวก สาธารณสุข    แต่ไม่ส่งผลกระทบ </p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">D</p></td>
    <td width="556" valign="top" bgcolor="#CCCCFF"><p>เกิดการทิ้งขยะผิดประเภท    ทำการแจ้งไปยังหน่วยงานที่เกี่ยวข้อง และเฝ้าระวังไม่ให้เกิน 1 ครั้ง/เดือน </p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">E</p></td>
    <td width="556" valign="top" bgcolor="#CCCCFF"><p>เกิดการทิ้งขยะผิดประเภทซ้ำ     ทำให้ต้องมีการนิเทศแลให้ความรู้หน่วยงานที่เกี่ยวข้อง </p></td>
  </tr>
</table>
<p>
  <?php } ?>
</p>
<p>
  <?php if($_GET[no]==21){?>
</p>
<h2 class="btn-danger"><strong>ด้านอื่น ๆ <br>
  การถ่ายรูปผู้ป่วยคลาดเคลื่อน</strong> </h2>
<table border="1" cellspacing="0" cellpadding="0" width="700">
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center"><strong>ระดับความรุนแรง</strong><strong> </strong></p></td>
    <td width="550" valign="top" bgcolor="#CCCCFF"><p align="center"><strong>ความหมาย</strong><strong> </strong></p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">A</p></td>
    <td width="550" valign="top" bgcolor="#CCCCFF"><p>มีโอกาสที่จะเกิดความคลาดเคลื่อน เช่น อุปกรณ์ไม่พร้อม    การเตรียมผู้ป่วยไม่พร้อม </p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">B</p></td>
    <td width="550" valign="top" bgcolor="#CCCCFF"><p>เกิดความคลาดเคลื่อน    แต่ตรวจพบแก้ไขโดยเจ้าหน้าที่ผู้ปฏิบัติ เช่น    ถ่ายรูปผิดแล้วถ่ายใหม่ทันที</p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">C</p></td>
    <td width="550" valign="top" bgcolor="#CCCCFF"><p>เกิดความคลาดเคลื่อนแต่ตรวจพบแก้ไขโดยผู้เกี่ยวข้อง เช่น เรียงรูปผิด , ส่งรูปผิด ,    ชื่อผู้ป่วยไม่ตรงกับรูป</p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">D</p></td>
    <td width="550" valign="top" bgcolor="#CCCCFF"><p>เกิดความคลาดเคลื่อน    แต่ไม่ส่งผลกระทบต่อการรักษา เช่น ติดรูปผิด    แต่ผู้ป่วยยังได้รับการรักษาอย่างถูกต้อง</p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">E</p></td>
    <td width="550" valign="top" bgcolor="#CCCCFF"><p>เกิดความคลาดเคลื่อน    ส่งผลต่อการรักษา แต่ไม่ทำให้ผู้ป่วยได้รับอันตราย เช่น ติดรูปผิด    แต่ผู้ป่วยยังได้รับการรักษาตามอาการ</p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">F</p></td>
    <td width="550" valign="top" bgcolor="#CCCCFF"><p>เกิดความคลาดเคลื่อน    ส่งผลให้เกิดความผิดพลาดในการรักษาผู้ป่วยผิดคน เช่น ติดรูปผิด    ทำให้รักษาผู้ป่วยผิดคน</p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">G</p></td>
    <td width="550" valign="top" bgcolor="#CCCCFF"><p>เกิดความคลาดเคลื่อน    ส่งผลให้เกิดความผิดพลาดในการรักษาผู้ป่วยผิดคน    แต่ผู้ป่วยไม่ได้รับอันตรายร้ายแรง    เช่น    ติดรูปผิด ทำให้รักษาผู้ป่วยผิดคน แต่ผู้ป่วยไม่ได้รับอันตรายจากการรักษา </p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">H</p></td>
    <td width="550" valign="top" bgcolor="#CCCCFF"><p>เกิดความคลาดเคลื่อน    ส่งผลให้เกิดความผิดพลาดในการรักษาผู้ป่วยผิดคน    ทำให้ผู้ป่วยต้องได้รับการรักษาพยาบาลเพิ่มเติม เช่น ติดรูปผิด ทำให้รักษาผู้ป่วยผิดคน ทำให้เกิดอาการอื่นแทรกซ้อน    ทำให้ต้องได้รับการรักษาเพิ่มเติม </p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">I</p></td>
    <td width="550" valign="top" bgcolor="#CCCCFF"><p>เกิดความคลาดเคลื่อน    ส่งผลให้เกิดความผิดพลาดในการรักษาผู้ป่วยผิดคน ซึ่งอาจเป็นสาเหตุให้ผู้ป่วยเป็นอันตรายถึงขั้นเสียชีวิต    เช่น  ติดรูปผิด ทำให้รักษาผู้ป่วยผิดคน    ฉีดยาผิดจนผู้ป่วยเสียชีวิต</p></td>
  </tr>
</table>
<p>
  <?php } ?>
</p>
<p>
  <?php if($_GET[no]==22){?>
</p>
<h2 class="btn-danger"><strong>อื่น ๆ <br>
  การจัดอาหารไม่ถูกต้อง</strong> </h2>
<table border="1" cellspacing="0" cellpadding="0" width="700">
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center"><strong>ระดับความรุนแรง</strong><strong> </strong></p></td>
    <td width="548" valign="top" bgcolor="#CCCCFF"><p align="center"><strong>ความหมาย</strong><strong> </strong></p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">A</p></td>
    <td width="548" valign="top" bgcolor="#CCCCFF"><ul>
      <li>คำสั่งการเบิกอาหารรายละเอียดไม่ชัดเจน </li>
      <li>ผู้ให้ข้อมูลไม่พร้อมจะให้ข้อมูล </li>
      <li>ผู้รับคำสั่งไม่เข้าใจคำสั่ง </li>
    </ul></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">B</p></td>
    <td width="548" valign="top" bgcolor="#CCCCFF"><ul>
      <li>มีการตรวจสอบพบคำสั่งอาหารไม่ชัดเจน    แต่สามารถแก้ไขได้ </li>
      <li>ผู้ปฏิบัติไม่ชำนาญ    ทำให้เกิดความผิดพลาดในการจัดเตรียมอาหาร </li>
    </ul></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">C</p></td>
    <td width="548" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยได้รับอาหารไม่ถูกต้อง    แต่ไม่ส่งผลต่อการรักษา </p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">D</p></td>
    <td width="548" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยได้รับอาหารไม่ถูกต้อง    ส่งผลต่อการรักษาและต้องมีการเฝ้าระวัง</p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">E</p></td>
    <td width="548" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยได้รับอาหารไม่ถูกต้อง  มีผลกระทบต่อการเจ็บป่วยและมีการบำบัดรักษา</p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">F</p></td>
    <td width="548" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยได้รับอาหารไม่ถูกต้อง ส่งผลต่อการบำบัดรักษานานขึ้น</p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">G</p></td>
    <td width="548" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยได้รับอาหารไม่ถูกต้อง ส่งผลทำให้เกิดอาการพิการ    เช่น ผู้ป่วยโรคไตวาย</p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">H</p></td>
    <td width="548" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยได้รับอาหารไม่ถูกต้อง    ต้องทำการช่วยชีวิตและส่งต่อไปรักษา รพ.ฝ่ายกาย </p></td>
  </tr>
  <tr>
    <td width="124" valign="top" bgcolor="#CCCCFF"><p align="center">I</p></td>
    <td width="548" valign="top" bgcolor="#CCCCFF"><p>ผู้ป่วยได้รับอาหารไม่ถูกต้อง ส่งต่อไปรักษา    รพ.ฝ่ายกายและเสียชีวิต </p></td>
  </tr>
</table>
<p>
  <?php } ?>
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</center>
</body>
</html>
