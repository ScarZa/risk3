<?php 
session_save_path("./session/");
session_start(); 
function __autoload($class_name) {
    include 'class/'.$class_name.'.php';
}
set_time_limit(0);
$conn_DB= new EnDeCode();
$read="connection/conn_DB.txt";
$conn_DB->para_read($read);
$conn_db=$conn_DB->Read_Text();
$dbconfig["hostname"]= trim($conn_db[0]) ;
$db=$conn_DB->conn_PDO();
?>
<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="index.php">
                  <i class="menu-icon fa fa-home bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Home</h4>
                    <p>หน้าหลัก</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="index.php?page=content/add_person">
                  <i class="menu-icon fa fa-user bg-yellow"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Manage</h4>
                    <p>จัดการสมาชิก</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                    <p>nora@example.com</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-file-code-o bg-green"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                    <p>Execution time 5 seconds</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-right">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Update Resume
                    <span class="label label-success pull-right">95%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Laravel Integration
                    <span class="label label-warning pull-right">50%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Back End Framework
                    <span class="label label-primary pull-right">68%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

          </div><!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <?php $check = md5(trim('check'));?>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                    <a href="#" onClick="return popup('set_conn_db.php?method=<?= $check ?>&host=main', popup, 400, 600);" title="Config Database">
                        <img src="images/icon_set2/gear.ico" width="25">&nbsp;&nbsp; Connect Database Main </a>
                </label>
              </div><!-- /.form-group -->
              <div class="form-group">
                <label class="control-sidebar-subheading">
                    <a href="index.php?page=content/add_user">
                        <img src="images/icon_set2/gear.ico" width="25">&nbsp;&nbsp; ตั้งค่าผู้ใช้งาน </a>
                </label>
              </div><!-- /.form-group -->
              <div class="form-group">
                <label class="control-sidebar-subheading">
                    <a href="index.php?page=content/add_hos">
                        <img src="images/icon_set2/gear.ico" width="25">&nbsp;&nbsp; ตั้งค่าองค์กร </a>
                </label>
              </div>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                    <a href="#" onclick="confirm('กรุณายืนยันการสำรองข้อมูลอีกครั้ง !!!');loadPage('#index_content','content/backup.php');">
                        <img src="images/backup-restore.ico" width="25">&nbsp;&nbsp; backup </a>
                </label>
              </div>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                    <a href="#" onClick="window.open('content/openDB.php','','width=400,height=350'); return false;" title="ข้อมูลสำรอง">
                        <img src="images/database.ico" width="25">&nbsp;&nbsp; ข้อมูลสำรอง</a>
                </label>
              </div>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                    <a href="#" onClick="return popup('about.php', popup, 500, 600);" title="ทีมพัฒนา">
                    <img src="images/Paper Mario.ico" width="25">&nbsp;&nbsp; ทีมพัฒนา</a>
                </label>
              </div>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                    <a href="#" title="hostname main config">DB Main : <?= $dbconfig["hostname"]?></a><br>
                    <a href="#" title="session id">SESSION ID : <?php echo session_id();?></a>
                </label>
              </div>
               </form>
          </div><!-- /.tab-pane -->
        </div>
       
    