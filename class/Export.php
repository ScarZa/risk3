<?php
class Export {
    public $filName;
    public $symbol;
    public $query1;
    public $query2;
    public function __construct($filName,$symbol,$query1,$query2=null){
        $this->filName=$filName;
        $this->symbol=$symbol;
        $this->query1=$query1;
        $this->query2=$query2;
        date_default_timezone_set('Asia/Bangkok');
}
public function Export_TXT(){
$objWrite = fopen("$this->filName.txt", "w");
 
while($objResult = $this->query1->fetch(PDO::FETCH_NUM))
{
    $count_field= $this->query1->columnCount();
    for ($i = 0; $i < ($count_field); $i++) {
        if($i==$count_field-1){
fwrite($objWrite,"$objResult[$i]" );           
        } else {
fwrite($objWrite,"$objResult[$i]$this->symbol" );            
        }
    } 
fwrite($objWrite,"\r\n");
}
fclose($objWrite);
}
public function Export_TXT_billdisp(){
$objWrite = fopen("$this->filName.txt", "w");
try {
    
fwrite($objWrite,"<?xml version=\"1.0\" encoding=\"windows-874\"?>\r\n");
fwrite($objWrite,"<ClaimRec System=\"OP\" PayPlan=\"CS\" Version=\"0.91\">\r\n");
fwrite($objWrite,"<Header>\r\n");
fwrite($objWrite,"<HCODE>14644</HCODE>\r\n");
fwrite($objWrite,"<HNAME>โรงพยาบาล จิตเวชเลยราชนครินทร์</HNAME>\r\n");
fwrite($objWrite,"<DATETIME>".date("Y-m-d H:i:s")."</DATETIME>\r\n");
fwrite($objWrite,"<SESSNO>0028</SESSNO>\r\n");
$num_row=$this->query1->rowCount();
fwrite($objWrite,"<RECCOUNT>$num_row</RECCOUNT>\r\n");
fwrite($objWrite,"</Header>\r\n");
fwrite($objWrite,"<Dispensing>\r\n");
while($objResult = $this->query1->fetch(PDO::FETCH_NUM))
{
    $count_field= $this->query1->columnCount();
    for ($i = 0; $i < ($count_field); $i++) {
        if($i==$count_field-1){
fwrite($objWrite,"$objResult[$i]" );           
        } else {
fwrite($objWrite,"$objResult[$i]$this->symbol" );            
        }
    } 
fwrite($objWrite,"\r\n");
}
fwrite($objWrite,"</Dispensing>\r\n");
fwrite($objWrite,"<DispensedItems>\r\n");
while($objResult2 = $this->query2->fetch(PDO::FETCH_NUM))
{
    $count_field= $this->query2->columnCount();
    for ($i = 0; $i < ($count_field); $i++) {
        if($i==$count_field-1){
fwrite($objWrite,"$objResult2[$i]" );           
        } else {
fwrite($objWrite,"$objResult2[$i]$this->symbol" );            
        }
    } 
fwrite($objWrite,"\r\n");
}
fwrite($objWrite,"</DispensedItems>\r\n");
fwrite($objWrite,"</ClaimRec>\r\n");
fclose($objWrite);
} catch (Exception $e) {
     echo 'ERROR: ' . $e->getMessage();
     return FALSE;
}

}
public function Export_TXT_billtran(){
$objWrite = fopen("$this->filName.txt", "w");
try {
    
fwrite($objWrite,"<ClaimRec System=\"OP\" PayPlan=\"CS\" Version=\"0.9\"></ClaimRec>\r\n");
fwrite($objWrite,"<HCODE>14644</HCODE>\r\n");
fwrite($objWrite,"<HNAME>โรงพยาบาล จิตเวชเลยราชนครินทร์</HNAME>\r\n");
fwrite($objWrite,"<DATETIME>".date("Y-m-d H:i:s")."</DATETIME>\r\n");
fwrite($objWrite,"<SESSNO>0028</SESSNO>\r\n");
$num_row=$this->query1->rowCount();
fwrite($objWrite,"<RECCOUNT>$num_row</RECCOUNT>\r\n");
fwrite($objWrite,"<BILLTRAN>\r\n");
while($objResult = $this->query1->fetch(PDO::FETCH_NUM))
{
    $count_field= $this->query1->columnCount();
    for ($i = 0; $i < ($count_field); $i++) {
        if($i==$count_field-1){
fwrite($objWrite,"$objResult[$i]" );           
        } else {
fwrite($objWrite,"$objResult[$i]$this->symbol" );            
        }
    } 
fwrite($objWrite,"\r\n");
}
fwrite($objWrite,"</BILLTRAN>\r\n");
$num_row2=$this->query2->rowCount();
fwrite($objWrite,"<OPBills invcount=\"$num_row\" lines=\"$num_row2\">\r\n");
while($objResult2 = $this->query2->fetch(PDO::FETCH_NUM))
{
    $count_field= $this->query2->columnCount();
    for ($i = 0; $i < ($count_field); $i++) {
        if($i==$count_field-1){
fwrite($objWrite,"$objResult2[$i]" );           
        } else {
fwrite($objWrite,"$objResult2[$i]$this->symbol" );            
        }
    } 
fwrite($objWrite,"\r\n");
}
fwrite($objWrite,"</OPBills>\r\n");
fclose($objWrite);
} catch (Exception $e) {
     echo 'ERROR: ' . $e->getMessage();
     return FALSE;
}

}
}
