<?php

require 'EnDeCode.php';

class Detial extends EnDeCode {
    
    public function create_Detial($title) {
        $this->title = $title;

        $query = $this->select('');
        $field = $this->listfield('');
        echo "<div class='table-responsive'>";
        echo "<table class='table' width='100%' border='0' cellspacing='0' cellpadding='0'>";
        $i = 0;
        foreach ($this->title as $key => $val) {
            $title_detial = $val;
            echo "<tr>";
            echo "<td align='right' valign='middle'>" . $title_detial . "</td>";
            echo "<td align='center' valign='middle'>&nbsp;:&nbsp;</td>";
            if($this->validateDate($query[0][$field[$i]],'Y-m-d')){
                $detial=DateThai1($query[0][$field[$i]]);
            }  else {
            $detial=$query[0][$field[$i]];
             }
            echo "<td align='left' valign='middle'><b>" . $detial . "</b></td>";
            echo "</tr>";
            $i++;
        }
        echo "</table></div>";
    }
public function create_Detial_photo($title,$fol) {
        $this->title = $title;
        $this->fol = $fol;

        $query = $this->select('');
        $field = $this->listfield('');
        $photo_person=  $this->fol.$query[0][$field[0]];
        echo "<div class='table-responsive'>";
        echo "<table class='table' width='100%' border='0' cellspacing='0' cellpadding='0'>";
        echo "<tr><td colspan='3' align='center' valign='middle'><img src='$photo_person' height='150'></td></tr>";
        echo "<tr><td colspan='3' align='center' valign='middle'>&nbsp;</td></tr>";
        $i = 0;
        array_shift($query[0]);
        array_shift($field);
        foreach ($this->title as $key => $val) {
            $title_detial = $val;
            echo "<tr>";
            echo "<td align='right' valign='middle' width='49%'>" . $title_detial . "</td>";
            echo "<td align='center' valign='middle' width='2%'>&nbsp;:&nbsp;</td>";
            if($this->validateDate($query[0][$field[$i]],'Y-m-d')){
                $detial=DateThai1($query[0][$field[$i]]);
            }  else {
            $detial=$query[0][$field[$i]];
             }
            echo "<td align='left' valign='middle' width='49%'><b>" . $detial . "</b></td>";
            echo "</tr>";
            $i++;
        }
        echo "</table></div>";
    }
    public function create_Detial_photoLeft($title,$fol) {
        $this->title = $title;
        $this->fol = $fol;

        $query = $this->select('');
        $field = $this->listfield('');
        $photo_person=  $this->fol.$query[0][$field[0]]; 
        $row=  count($this->title)+1;
        echo "<div class='table-responsive'>";
        echo "<table class='table' width='100%' border='0' cellspacing='0' cellpadding='0'>";
        echo "<tr><td rowspan='$row' align='center' valign='top'><img src='$photo_person' height='150'></td></tr>";
        $i = 0;
        array_shift($query[0]);
        array_shift($field);
        foreach ($this->title as $key => $val) {
            $title_detial = $val;
            echo "<tr>";
            echo "<td align='left' valign='middle' width='49%'>" . $title_detial . "</td>";
            echo "<td align='center' valign='middle' width='2%'>&nbsp;:&nbsp;</td>";
            if($this->validateDate($query[0][$field[$i]],'Y-m-d')){
                $detial=DateThai1($query[0][$field[$i]]);
            }  else {
            $detial=$query[0][$field[$i]];
             }
            echo "<td align='left' valign='middle' width='49%'><b>" . $detial . "</b></td>";
            echo "</tr>";
            $i++;
        }
        echo "</table></div>";
    }
                public function create_DetialList_PDF($title,$process) {
                $this->title=$title;
                $this->process = $process;
                $query = $this->select('');
                $field = $this->listfield('');
                $code_color = array("0" => "default", "1" => "success", "2" => "warning", "3" => "danger", "4" => "info");
                echo "<div class='table-responsive'>";
                echo "<table class='table table-hover'>";
                echo "<thead><tr align='center'>";
                echo "<th align='center' width='5%'>ลำดับ</th>";
                foreach ($this->title as $key => $value) {
                    echo "<th align='center'>$value</th>";
                }
                echo "</tr></thead><tbody>";
                $c = 0;
                $C = 1;
                $ii=0;
                $count_qr=count($query);
                for ($I = 0; $I < $count_qr; $I++) {
                    $num_field = $this->count_field();
                    if($ii>=5){
                        $ii=0;
                    }
                    echo "<tr class='" . $code_color[$ii] . "'>";
                    echo "<td align='center'>" . $C . "</td>";
                    for ($i = 0; $i < ($num_field); $i++) {
                        if ($i < ($num_field - 1)) {
                            if ($this->validateDate($query[$c][$field[$i]], 'Y-m-d')) {
                                echo "<td align='center'>" . DateThai1($query[$c][$field[$i]]) . "</td>";
                            } else {
                                echo "<td align='center'>" . $query[$c][$field[$i]] . "</td>";
                            }
                        } else {
                                    if ($i = ($num_field - 1)) {
                                        echo "<td align='center'>";
                                        ?>
                                    <a href="#" onClick="window.open('content/<?= $this->process ?>_PDF.php?id=<?= $query[$c][$field[$i]] ?>', '', 'width=550,height=700');
                                            return false;" title="รายละเอียด">     
                                        <?php
                                        echo "<img src='../images/printer.ico' width='25'></a></td>";
                                    }
                                }
                            }
                            $c++;
                            $C++;
                            $ii++;
                            echo "</tr>";
                        }
                        echo "</tbody></table></div>";
                    }
}
