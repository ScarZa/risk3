<?php
function __autoload($class_name) {
    include '../class/' . $class_name . '.php';
}

echo $subcate=$_POST['subcate'];
echo "<BR>";
echo $takeDate=$_POST['take_date'];echo '<BR>';
echo $takeTime=$_POST['take_hour'].":".$_POST['take_minute'];echo '<BR>';
echo $take_place=$_POST['take_place'];echo '<BR>';
echo $hn=$_POST['hn'];echo '<BR>';
echo $an=$_POST['an'];echo '<BR>';
echo $take_other=$_POST['take_other'];echo '<BR>';
echo $res_dep=$_POST['res_dep'];echo '<BR>';
echo $take_detail=$_POST['take_detail'];echo '<BR>';
echo $take_first=$_POST['take_first'];echo '<BR>';
echo $take_counsel=$_POST['take_counsel'];echo '<BR>';
echo $level_risk=$_POST['level_risk'];echo '<BR>';
$newname = new upload_resizeimage("file", "../myfile", "PDimage".date("dmYHis"));
echo $img = $newname->upload();
