<?php
class Rectangle{
    var $width;
    var $hight;
    
    function Rectangle($width,$hight){
        $this->width=$width;
        $this->hight=$hight;
    }
    function area(){
        return $this->width*$this->hight;
    }
    function perimeter(){
        return($this->width+$this->hight)*2;
    }
}
?>