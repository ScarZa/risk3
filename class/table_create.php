<?php
    require 'db_mng.php';
class Table extends Db_mng {
    public $column;
    
    public function __construct($column) {
        $this->column=$column;
    }
    public function create_TB(){
        $query=  $this->select();
        $field=  $this->listfield('', $this->sql);
        echo "<table id='example1' class='table table-bordered table-striped'>";
        echo "<thead><tr align='center' bgcolor='#898888'>";
        foreach ($this->column as $key => $value) {
            echo "<th align='center'>$value</th>";
        }
        echo "</tr></thead><tbody>";
        $c=0;
        for ($I=0;$I<count($query);$I++){
            $num_field=  $this->count_field();
            echo "<tr>";
            for ($i=0;$i<($num_field);$i++){
                echo "<td align='center'>".$query[$c][$field[$i]]."</td>";
            }
            $c++;
            echo "</tr>";
        }
        echo "</tbody>";
        echo "<tfoot><tr align='center' bgcolor='#898888'>";
        foreach ($this->column as $key => $value) {
            echo "<th align='center'>$value</th>";
        }
        echo "</tr></tfoot></table>";
    }
     public function create_TB_mng($process){
         $this->process=$process;
        $query=  $this->select();
        $field=  $this->listfield('', $this->sql);
        echo "<table id='example1' class='table table-bordered table-striped'>";
        echo "<thead><tr align='center' bgcolor='#898888'>";
        foreach ($this->column as $key => $value) {
            echo "<th align='center'>$value</th>";
        }
        echo "</tr></thead><tbody>";
        $c=0;
        for ($I=0;$I<count($query);$I++){
            $num_field=  $this->count_field();
            echo "<tr>";
            for ($i=0;$i<($num_field);$i++){
                if($i<($num_field-3)){
                echo "<td align='center'>".$query[$c][$field[$i]]."</td>";
                }else{
                if($i=($num_field-3)){
                 echo "<td align='center'>";?>
                    <a href="#" onClick="window.open('content/detial_<?= $this->process?>.php?id=<?= $query[$c][$field[$i]]?>','','width=650,height=400'); return false;" title="รายละเอียด">     
                    <?php    echo "<img src='images/icon_set1/document.ico' width='25'></a></td>";
                }    
                if($i=($num_field-2)){
                 echo "<td align='center'>"
                    . "<a href='index.php?page=content/add_".$this->process."&method=edit&id=".$query[$c][$field[$i]]."'>"
                         . "<img src='images/icon_set1/document_edit.ico' width='25'></a></td>";
                }
                if($i=($num_field-1)){
                 
                 echo "<td align='center'>";
                 ?>
                 <a href="index.php?page=process/prc<?= $this->process?>&method=delete_<?= $this->process?>&del_id=<?= $query[$c][$field[$i]]?>" onClick="return confirm('กรุณายืนยันการลบอีกครั้ง !!!')">
                 <?php
                     echo "<img src='images/icon_set1/document_delete.ico' width='25'></a></td>";   
                }
            }
            }
            $c++;
            echo "</tr>";
        }
        echo "</tbody>";
        echo "<tfoot><tr align='center' bgcolor='#898888'>";
        foreach ($this->column as $key => $value) {
            echo "<th align='center'>$value</th>";
        }
        echo "</tr></tfoot></table>";
    }
    public function create_TB_PDF($process){
         $this->process=$process;
        $query=  $this->select();
        $field=  $this->listfield('', $this->sql);
        echo "<table id='example1' class='table table-bordered table-striped'>";
        echo "<thead><tr align='center' bgcolor='#898888'>";
        foreach ($this->column as $key => $value) {
            echo "<th align='center'>$value</th>";
        }
        echo "</tr></thead><tbody>";
        $c=0;
        for ($I=0;$I<count($query);$I++){
            $num_field=  $this->count_field();
            echo "<tr>";
            for ($i=0;$i<($num_field);$i++){
                if($i<($num_field-2)){
                echo "<td align='center'>".$query[$c][$field[$i]]."</td>";
                }else{
                if($i=($num_field-2)){
                 echo "<td align='center'>";?>
                    <a href="#" onClick="window.open('content/detial_<?= $this->process?>.php?id=<?= $query[$c][$field[$i]]?>','','width=650,height=400'); return false;" title="รายละเอียด">     
                    <?php    echo "<img src='images/icon_set1/document.ico' width='25'></a></td>";
                }    
                if($i=($num_field-1)){
                echo "<td align='center'>";?>
                    <a href="#" onClick="window.open('content/<?= $this->process?>_PDF.php?id=<?= $query[$c][$field[$i]]?>','','width=550,height=700'); return false;" title="รายละเอียด">     
                    <?php    echo "<img src='images/printer.ico' width='25'></a></td>";
                }
            }
            }
            $c++;
            echo "</tr>";
        }
        echo "</tbody>";
        echo "<tfoot><tr align='center' bgcolor='#898888'>";
        foreach ($this->column as $key => $value) {
            echo "<th align='center'>$value</th>";
        }
        echo "</tr></tfoot></table>";
    }
    public function create_TB_Detial($process){
         $this->process=$process;
        $query=  $this->select();
        $field=  $this->listfield('', $this->sql);
        echo "<table id='example1' class='table table-bordered table-striped'>";
        echo "<thead><tr align='center' bgcolor='#898888'>";
        foreach ($this->column as $key => $value) {
            echo "<th align='center'>$value</th>";
        }
        echo "</tr></thead><tbody>";
        $c=0;
        for ($I=0;$I<count($query);$I++){
            $num_field=  $this->count_field();
            echo "<tr>";
            for ($i=0;$i<($num_field);$i++){
                if($i<($num_field-1)){
                echo "<td align='center'>".$query[$c][$field[$i]]."</td>";
                }else{
                if($i=($num_field-1)){
                 echo "<td align='center'>";?>
                    <a href="#" onClick="window.open('content/detial_<?= $this->process?>.php?id=<?= $query[$c][$field[$i]]?>','','width=650,height=400'); return false;" title="รายละเอียด">     
                    <?php    echo "<img src='images/icon_set1/document.ico' width='25'></a></td>";
                }    
            }
            }
            $c++;
            echo "</tr>";
        }
        echo "</tbody>";
        echo "<tfoot><tr align='center' bgcolor='#898888'>";
        foreach ($this->column as $key => $value) {
            echo "<th align='center'>$value</th>";
        }
        echo "</tr></tfoot></table>";
    }
}
