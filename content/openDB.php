<?php 
session_save_path("../session/");
session_start(); 
if (empty($_SESSION['rm_id'])) {
    echo "<meta http-equiv='refresh' content='0;url=index.php'/>";
    exit();
}
include '../header2.php';
$dir = "../backupDB/"; // Directory name
if (is_dir($dir)) {
	if ($dh = opendir($dir)) {
		$i = 0;
		while (($getfile = readdir($dh)) !== false) {
			$file[$i] = $getfile;
			$i++;
		}
		closedir($dh);
	}
	$filenum = count($file);
        sort($file);
}
?>

    <div class="col-lg-12">
              <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">สำรองฐานข้อมูล</h3>
                    </div>
                  <div class="panel-body">
<?php
   for ($i=0; $i<$filenum; $i++){
    if(($file[$i]==".")||($file[$i]=="..")){ continue;  }
	echo "<a href=\"".$dir.$file[$i]."\" target='_blank'>".$file[$i]."</a><br />";
}
?>
                    </div></div></div>
        <div class="control-sidebar-bg"></div>
        <!-- jQuery 2.1.4 -->
     <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
        <!-- jQuery 2.1.4 -->
        <?php        include '../footer2.php';?>
    