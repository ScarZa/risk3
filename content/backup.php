<?php
include_once '../class/connPDO_db.php';
include_once '../class/BackupPDO.php';
////////////อ่าน text
$connDB_backup=new connPDO_db();
$read="../connection/conn_DB.txt";
$connDB_backup->para_read($read);
$connDB_backup->Read_Text();
////////////connect database

$conn=$connDB_backup->conn_PDO();
//////////backup
$backup=new BackupPDO();
$backup->backup_tables($conn,'RISK');
$connDB_backup->close_PDO();
echo "<script>alert('การสำรองข้อมูลสำเสร็จแล้วจ้า!')</script>";
echo "<meta http-equiv='refresh' content='0;url=index.html'/>";
//include_once '../footer.php';
?>
