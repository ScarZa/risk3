<?php

class upload_resizeimage {

    public $folder;
    public $file;
    public $name;
    public $height;
    public $image;

    public function __construct($file = null, $folder = null, $name = null , $height=480) {
        $this->file = $file;
        $this->folder = $folder;
        $this->name = $name;
        $this->height = $height;
    }

    public function removespecialchars($name) {
        $this->name = $name;
        return preg_replace('#[^a-zA-Z0-9.-]#u', '', $this->name);
    }

    public function upload() {
if (isset($_FILES["$this->file"]["type"])) {
    $validextensions = array("jpeg", "jpg", "png","JPEG", "JPG", "PNG");
    $temporary = explode(".", $_FILES["$this->file"]["name"]);
    $file_extension = end($temporary);
    if ((($_FILES["$this->file"]["type"] == "image/png") || ($_FILES["$this->file"]["type"] == "image/jpg") || ($_FILES["$this->file"]["type"] == "image/jpeg") || ($_FILES["$this->file"]["type"] == "image/gif")
            ) //&& ($_FILES["file"]["size"] < 100000)//Approx. 100kb files can be uploaded.
            && in_array($file_extension, $validextensions)) {
        $newname = $this->name.".".$file_extension;
        $dir = $this->folder."/";
        $target = $dir.$newname;
        if ($_FILES["$this->file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["$this->file"]["error"] . "<br/><br/>";
            $image=FALSE;
        } else {
//            if (file_exists($target)) {
//                echo $newname . " : มีไฟล์นี้อยู่แล้ว";
//            } else {
                $sourcePath = $_FILES["$this->file"]['tmp_name']; // Storing source path of the file in a variable
                move_uploaded_file($sourcePath, $target); // Moving Uploaded file
                $height = $this->height;
                $size = getimagesize($target);
                $width = round($height*$size[0]/$size[1]);
                if($size[2] == 1){
                    $img_ori = imagecreatefromgif($target);
                }elseif ($size[2] == 2) {
                    $img_ori = imagecreatefromjpeg($target);
                }elseif ($size[2] == 3) {
                    $img_ori = imagecreatefrompng($target);
                }
                $photoX = imagesx($img_ori);
                $photoY = imagesy($img_ori);
                $img_new = imagecreatetruecolor($width, $height);
                
                imagecopyresampled($img_new, $img_ori, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
                if($size[2] == 1){
                imagegif($img_new,$target);
                }elseif ($size[2] == 2) {
                imagejpeg($img_new,$target);
                }elseif ($size[2] == 3) {
                imagepng($img_new,$target);
                }
                imagedestroy($img_ori);
                imagedestroy($img_new);
                //print_r($newname);
                return $newname;
        }
    } else {
//echo "<span id='invalid'>***Invalid file Size or Type***<span>";
        echo "***ไม่ใช่ไฟล์ชนิดรูปภาพ หรือไม่ได้เลือกรูปภาพ ***";
        return FALSE;
    }
    //return $image;
}

    }

}
