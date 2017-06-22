<section class="content">
    <?php
    echo "<p>&nbsp;</p>	";
    echo "<p>&nbsp;</p>	";
    echo "<div class='bs-example'>
	  <div class='progress progress-striped active'>
	  <div class='progress-bar' style='width: 100%'></div>
</div>";
    echo "<div class='alert alert-dismissable alert-success'>
	  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
	  <a class='alert-link' target='_blank' href='#'><center>กำลังดำเนินการ</center></a> 
</div>";
    if (isset($_POST['check']) == 'plus') {
        require '../class/EnDeCode.php';
        $mydata= new TablePDO();
        $read="../connection/conn_DB.txt";
        $mydata->para_read($read);
        $mydata->conn_PDO();
    } else {
        $mydata= new TablePDO();
        $read="connection/conn_DB.txt";
        $mydata->para_read($read);
        $mydata->conn_PDO();
    }
    $date = new DateTime(null, new DateTimeZone('Asia/Bangkok'));//กำหนด Time zone
    if (null !== (filter_input(INPUT_POST, 'method'))) {
        $method = filter_input(INPUT_POST, 'method');
        if ($method == 'update_hos') {
            $host_id=filter_input(INPUT_POST, 'id',FILTER_SANITIZE_NUMBER_INT);
            if (trim($_FILES["image"]["name"] != "")) {
                $sql="select logo from hospital where hospital=$host_id";
                $mydata->imp_sql($sql);
                $logo=$mydata->select_a();
                if(!empty($logo['logo'])){
                $location="logo/".$logo['logo'];
                include 'function/delet_file.php';
                fulldelete($location);}
                $upload = new file_upload("image", "logo");
                $image = $upload->upload();
                
                $data = array($_POST['name'], $_POST['m_name'], $image,
                $_POST['url'], $_POST['name_mini']);
                $field=array("name","manager","logo","url","name2");
            } else {
                $image = '';
                
                $data = array($_POST['name'], $_POST['m_name'],
                $_POST['url'], $_POST['name_mini']);
                $field=array("name","manager","url","name2");
            }
            
            $table = "hospital";
            $where="hospital=:hospital";
            $execute=array(':hospital' => $host_id);
            $edit_hos=$mydata->update($table, $data, $where, $field, $execute);

            if ($edit_hos==false) {
                echo "<span class='glyphicon glyphicon-remove'></span>";
                echo "<a href='index.php?page=content/add_hos' >กลับ</a>";
            } else {
                   echo" <META HTTP-EQUIV='Refresh' CONTENT='2;URL=index.php?page=content/add_hos'>";
                }
            }
    } elseif (null !== (filter_input(INPUT_GET, 'method'))) {
        $method = filter_input(INPUT_GET, 'method');
        if($method=='delete_comm') {
            $del_id=filter_input(INPUT_GET, 'del_id');
            $delete_id=$mydata->sslDec($del_id);
            $table="community";
            $table2="budget";
            $where="comm_id=:comm_id";
            $execute=  array(':comm_id' => $delete_id);
            $del=$mydata->delete($table, $where , $execute);
            $del2=$mydata->delete($table2, $where, $execute);
        
        if($del&$del2==false){
        echo "<span class='glyphicon glyphicon-remove'></span>";
        echo "<a href='index.php?page=content/add_comm&id=$delete_id' >กลับ</a>";
    } else {
        echo" <META HTTP-EQUIV='Refresh' CONTENT='2;URL=index.php?page=content/add_comm'>";
        }
        }
    }
    ?>
</section>