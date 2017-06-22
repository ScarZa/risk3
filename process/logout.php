<?php session_save_path("../session/");
session_start(); ?>
<section class="content">
<?php
echo	 "<p>&nbsp;</p>	"; 
echo	 "<p>&nbsp;</p>	";
echo "<div class='bs-example'>
	  <div class='progress progress-striped active'>
	  <div class='progress-bar' style='width: 100%'></div>
</div>";
echo "<div class='alert alert-dismissable alert-danger'>
	  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
	  <a class='alert-link' target='_blank' href='#'><center>ออกจากระบบเรียบร้อย</center></a> 
</div>";
unset($_SESSION['rm_id']);
unset($_SESSION['rm_fullname']);
unset($_SESSION['rm_dep']);
unset($_SESSION['rm_main_dep']);
unset($_SESSION['rm_status']);
session_destroy();

 echo "<meta http-equiv='refresh' content='0;url=index.html'>";
?>
</section> 