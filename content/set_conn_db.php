<?php
$check=  md5(trim('check'));
if($_REQUEST['method']!=$check){
    echo "<meta http-equiv='refresh' content='0;url=index.php'/>";
    exit();
}
include_once '../header2.php';
$host= filter_input(INPUT_GET, 'host');
/*function __autoload($class_name) {
    include 'class/'.strtolower($class_name).'.php';
}*/
include_once '../class/TablePDO.php';
$conn_DB= new TablePDO();
if ($host=='main'){
$read="../connection/conn_DB.txt";    
}
$conn_DB->para_read($read);
$conn_db=$conn_DB->Read_Text();
        $dbconfig["hostname"]= trim($conn_db[0]) ;
        $dbconfig["username"]= trim($conn_db[1]) ;
        $dbconfig["password"]= trim($conn_db[2]) ;
        $dbconfig["database"]= trim($conn_db[3]) ;
        $dbconfig["port"]= trim($conn_db[4]) ;
        $dbconfig["charector_set"]= trim($conn_db[5]);
?>

<body>
    <form role="form" action='../process/prcconn_db.php' enctype="multipart/form-data" method='post'>
          <div class="col-lg-12">
              <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><img src='../images/phonebook.ico' width='25'>
                        <?php if ($host=='main'){?> ตั้งค่าเพื่อ Connect Main Database <?php }?></h3>
                    </div>
                  <div class="panel-body">
                      <div class="form-group"> 
                <label>HOST Name &nbsp;</label>
                <input type="text" class="form-control" name="val_conn[]" id="host_name" placeholder="host name" value="<?=$dbconfig["hostname"]?>" required>
             	</div>
                      <div class="form-group"> 
                <label>Username &nbsp;</label>
                <input type="text" class="form-control" name="val_conn[]" id="username" placeholder="username" value="<?=$dbconfig["username"]?>" required>
             	</div>
                      <div class="form-group"> 
                <label>Password &nbsp;</label>
                <input type="password" class="form-control" name="val_conn[]" id="password" placeholder="password" value="<?=$dbconfig["password"]?>">
             	</div>
                      <div class="form-group"> 
                <label>Database name &nbsp;</label>
                <input type="text" class="form-control" name="val_conn[]" id="db_name" placeholder="database name" value="<?=$dbconfig["database"]?>" required>
                      </div>
                      <div class="form-group"> 
                <label>Port &nbsp;</label>
                <input type="text" class="form-control" name="val_conn[]" id="port" placeholder="MySql Port" value="<?=$dbconfig["port"]?>" required>
                      </div>
                      <div class="form-group"> 
                <label>charset &nbsp;</label>
                <input type="text" class="form-control" name="val_conn[]" id="char" placeholder="Charset" value="<?=$dbconfig["charector_set"]?>" required>
                      </div>
                    <div class="form-group"> 
                        <center>
                            <?php $host= filter_input(INPUT_GET, 'host');?>
                            <input type="hidden" name="host" value="<?=$host?>">
                        <input type="submit" class="btn btn-success" name="submit" value="ตกลง">
                        </center>
                    </div>
                  </div>
              </div>
          </div>
    </form>
</body>
</html>
