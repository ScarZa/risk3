<?php
function doSelectRecords()
{
    $strSql = "SELECT * FROM tbl_employee";
    $strResult = SelectQry($strSql);
    return $strResult;
}


function SelectQry($Qry) {
    $result = mysql_query($Qry) or die ("QUERY Error:".$Qry."<br>".mysql_error());      
    $numrows = mysql_num_rows($result); 
    if ($numrows == 0) {            
        return;
    } else {
       $row = array(); 
       $record = array();
       while ($row = mysql_fetch_array($result)) { 
            $record[] = $row; 
       }        
    }   
    return MakeStripSlashes($record);
}

function doGetExportSchema($objArray,$export_schema)
{

    if ($objArray["frmDownload"] =="XML") {
        $output.= '';
        $output.= '<employee>';
    } else {
        $output.= $export_schema;
    }
    return $output;
}

function doGetDelimeterForTextFile($objArray)
{
    if($objArray["frmDownload"] =="TEXT") {
        $delimeter = '\t';
    } else {
        $delimeter = '';
    }
    return $delimeter;
}

function doExportData($objArray,$strDatas,$field_terminated,$line_terminated,$delimeter = NULL)
{

    for ($k=0; $k<count($strDatas); $k++) {
        $strData = $strDatas[$k];
        if ($objArray["frmDownload"] == "XML") {
            $output.= $line_terminated;
            $output.= '<row>';
            $output.= $line_terminated;
            $output.= '<name>'.$strData['1'].'</name>'.$field_terminated;
            $output.= '<code>'.$strData['2'].'</code>'.$field_terminated;
            $output.= '<email>'.$strData['3'].'</email>'.$field_terminated;
            $output.= '<designation>'.$strData['4'].'</designation>'.$field_terminated;
            $output.= '<number>'.$strData['5'].'</number>'.$field_terminated;
            $output.= '<salary>'.$strData['6'].'</salary>'.$field_terminated;
            $output.= '<age>'.$strData['7'].'</age>'.$field_terminated;
            $output.= '</row>'.$field_terminated;
        } else {
            $output.= $line_terminated;
            $output.= $strData['1'].$field_terminated;
            $output.= $strData['2'].$field_terminated;
            $output.= $strData['3'].$field_terminated;
            $output.= $strData['4'].$field_terminated;
            $output.= $strData['5'].$field_terminated;
            $output.= $strData['6'].$field_terminated;
            $output.= $strData['7'].$delimeter;
        }
    }
    return $output;
}


function doGetFieldDelimeter($objArray) 
{

    switch ($objArray["frmDownload"]) {
        case "CSV":
            echo $field_terminated= ",";
            break;
        case "Excel":
            echo $field_terminated="\t";
            break;
        case "TEXT":
            echo $field_terminated="|";
            break;
        case "XML":
            echo $field_terminated="\r\n";
            break;
    }
    return $field_terminated;
}

function doGetXmlTitle($objArray)
{
    if ($objArray["frmDownload"] == "XML") {
        $output.= '</employee>';
    }
    return $output;
}

function doGetHeader($objArray,$output,$objPHPExcel = NULL)
{
    header("Content-Description: File Transfer");
    switch ($objArray["frmDownload"]) {
        case "CSV":
            header("Content-Type: application/csv");
            header("Content-Disposition: attachment; filename=employee_details.csv");
            break;
        case "Excel":
            header("Pragma: public");
            header("Expires: 0");
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header("Content-Type: application/force-download");
            header("Content-Type: application/octet-stream");
            header("Content-Type: application/download");;
            header("Content-Disposition: attachment;filename=Report.xls");
            header("Content-Transfer-Encoding: binary ");
            break;
        case "TEXT":
            header("Content-Type: application/txt");
            header("Content-Disposition: attachment; filename=employee_details.txt");
            break;
        case "XML":
            header("Content-Type: application/xml");
            header("Content-Disposition: attachment; filename=employee_details.xml");
            break;
    }
    header("Content-Transfer-Encoding: binary");
    header("Expires: 0");
    header("Cache-Control: must-revalidate");
    header("Pragma: public");
    header("Content-Length: ".strlen($output));
    ob_clean();
    flush();
}