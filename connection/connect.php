<?php
require 'class/connPDO_db.php';
$connDB=new connPDO_db();
$read="connection/conn_DB.txt";
$connDB->para_read($read);
$db=$connDB->conn_PDO();
 