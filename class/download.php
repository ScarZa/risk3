<?php

class download {

    public $filename;
    public $path;

    public function download_file($filename, $path = NULL) {
        if (!empty($filename)) {
            // Specify file path.
            $this->filename = $filename;
            $this->path = $path;
            //$path = ''; // '/uplods/'
            $download_file = $this->path . $this->filename;
            // Check file is exists on given path.
            if (file_exists($download_file)) {
                // Getting file extension.
                $extension = explode('.', $this->filename);
                $extension = $extension[count($extension) - 1];
                // For Gecko browsers
                header('Content-Transfer-Encoding: binary');
                header('Last-Modified: ' . gmdate('D, d M Y H:i:s', filemtime($this->path)) . ' GMT');
                // Supports for download resume
                header('Accept-Ranges: bytes');
                // Calculate File size
                header('Content-Length: ' . filesize($download_file));
                header('Content-Encoding: none');
                // Change the mime type if the file is not PDF
                header('Content-Type: application/' . $extension);
                // Make the browser display the Save As dialog
                header('Content-Disposition: attachment; filename=' . $this->filename);
                readfile($download_file);
                exit;
            } else {
                echo 'File does not exists on given path';
            }
        }
    }

}
