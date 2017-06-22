<?php
class write_conn {
    public $fconn;
    public $vconn=array();
    public function write_conn($conn_file,$conn_value){
        $this->fconn = $conn_file;
        $this->vconn=$conn_value;
        $this->objFopen="";
        $this->objFopen = fopen($this->fconn, 'w');
        $count_vconn=count($this->vconn);
        for($i=0;$i<$count_vconn;$i++){
            
        $data[$i]=$this->vconn[$i];
        $write[$i] = "$data[$i]\r\n";
        fwrite($this->objFopen, $write[$i]);
        }

        if ($this->objFopen) {
            echo "บันทึกเรียบร้อย";
        } else {
            echo "ไม่สามารถบันทึกได้";
        }

        fclose($this->objFopen);
}
}
