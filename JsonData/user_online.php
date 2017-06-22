<?php
session_save_path("../session/");
session_start(); 
function __autoload($class_name) {
    include '../class/'.$class_name.'.php';
}
set_time_limit(0);
$conn_DB= new EnDeCode();
$read="../connection/conn_DB.txt";
$conn_DB->para_read($read);
$conn_DB->Read_Text();
$db=$conn_DB->conn_PDO();
                        include_once '../function/timeLoginFacebook.php';
                        $sql = "select * from user   order by time_login  DESC LIMIT 12";
                        $conn_DB->imp_sql($sql);
                        $result=$conn_DB->select();
                        for ($i=0;$i<count($result);$i++) {
                            $result[$i]['date_login'];
                            $result[$i]['time_login'];
                            $Format = date("d M Y H:i");
                            $Timestamp = $result[$i]['time_login'];
                            $Language = "th";
                            $TimeText = "true";
                            $time = generate_date_today("d M Y H:i", ($Timestamp), "th", true);
                            ?>
                            <a href="#" class="list-group-item">
                                <span class="pull-right badge bg-green"><?= $time?></span>
                                <i class="fa fa-user"></i> <?= $result[$i]['user_fname'] . ' ' . $result[$i]['user_lname']?>
                            </a>
    <?php } $conn_DB->close_PDO();// end time login    ?>  