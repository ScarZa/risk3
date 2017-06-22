<?php

class file_upload {

    public $folder;
    public $file;

    public function __construct($file = null, $folder = null) {
        $this->file = $file;
        $this->folder = $folder;
    }

    public function removespecialchars($name) {
        $this->name = $name;
        return preg_replace('#[^a-zA-Z0-9.-]#u', '', $this->name);
    }

    public function upload() {
        if (move_uploaded_file($_FILES["$this->file"]["tmp_name"], "$this->folder/" . $this->removespecialchars(date("d-m-Y/") . "1" . $_FILES["$this->file"]["name"]))) {
            $this->file = date("d-m-Y/") . "1" . $_FILES["$this->file"]["name"];
            $image = $this->removespecialchars($this->file);
            return $image;
        }
    }

}
