<?php
session_save_path("../session/");
session_start();

function __autoload($class_name) {
    include '../class/' . $class_name . '.php';
}

set_time_limit(0);
$conn_DB = new EnDeCode();
$read = "../connection/conn_DB.txt";
$conn_DB->para_read($read);
$conn_DB->Read_Text();
$conn_DB->conn_PDO();
 if (!empty($_SESSION['rm_id'])) { ?>                  
<li class="dropdown messages-menu" id="inbox1">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-envelope-o"></i>
            <span class="label label-warning">
                <?php
                include_once '../template/plugins/funcDateThai.php';
                $user_dep = $_SESSION['rm_dep'];
                $sql = "select count(t.takerisk_id) AS inbox from takerisk t
                        LEFT JOIN mngrisk m1 ON m1.takerisk_id = t.takerisk_id
                        WHERE t.res_dep = :user_dep and t.move_status='N' and t.recycle='N' and ISNULL(m1.mng_status)";
                $execute = array(':user_dep' => $user_dep);
                $conn_DB->imp_sql($sql);
                $result = $conn_DB->select_a($execute);
                echo $inbox = $result['inbox'];
                ?>
            </span>
        </a>
        <ul class="dropdown-menu">
            <li class="header">คุณมีรายการรอทบทวน <?= $inbox ?> รายการ</li>

            <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                    <?php
                    $sql = "select s1.category,t1.level_risk,s1.name  as sub_name , t1.takerisk_id , t1.take_file1 , t1.take_rec_date,LEFT(t1.take_detail,35)  AS detail  from takerisk t1 
                LEFT JOIN mngrisk m1 ON m1.takerisk_id = t1.takerisk_id
                INNER JOIN subcategory s1 ON t1.subcategory = s1.subcategory 
                WHERE t1.res_dep = :user_dep and t1.move_status='N' and t1.recycle='N' and ISNULL(m1.mng_status)
                ORDER BY t1.level_risk DESC";
                    $execute = array(':user_dep' => $user_dep);
                    $conn_DB->imp_sql($sql);
                    $result2 = $conn_DB->select($execute);
                    for ($i = 0; $i < count($result2); $i++) {
                        if ($result2[$i]['category'] == '1') {
                            $icon = "fa fa-bed";
                        } elseif ($result2[$i]['category'] == '2') {
                            $icon = 'fa fa-medkit';
                        } elseif ($result2[$i]['category'] == '3') {
                            $icon = 'fa fa-heartbeat';
                        } elseif ($result2[$i]['category'] == '4') {
                            $icon = 'fa fa-bug';
                        } elseif ($result2[$i]['category'] == '5') {
                            $icon = 'fa fa-leaf';
                        } elseif ($result2[$i]['category'] == '6') {
                            $icon = 'fa fa-money';
                        } elseif ($result2[$i]['category'] == '7') {
                            $icon = 'fa fa-pie-chart';
                        } elseif ($result2[$i]['category'] == '8') {
                            $icon = 'fa fa-file-text';
                        }
                        if ($result2[$i]['level_risk'] == 'A' or $result2[$i]['level_risk'] == 'B' or $result2[$i]['level_risk'] == 'C') {
                            $color = 'success';
                        } elseif ($result2[$i]['level_risk'] == 'D' or $result2[$i]['level_risk'] == 'E' or $result2[$i]['level_risk'] == 'F') {
                            $color = 'yellow';
                        } elseif ($result2[$i]['level_risk'] == 'G' or $result2[$i]['level_risk'] == 'H' or $result2[$i]['level_risk'] == 'I') {
                            $color = 'red';
                        }
                        ?> 
                        <li><!-- start message -->
                            <a href="#" onclick="DetailRisk ('#index_content',{data:<?=$result2[$i]['takerisk_id']?>})">
                                <?php if (!empty($result2[$i]['take_file1'])) { ?>
                                    <div class="pull-left">
                                        <img src="myfile/<?= $result2[$i]['take_file1'] ?>" class="img-circle" alt="User Image">
                                    </div><?php } ?>
                                <h4>
                                    <i class="<?= $icon ?> text-<?= $color ?>"></i> <?= $result2[$i]['sub_name'] ?>:
                                </h4>
                                <p><?= $result2[$i]['detail'] ?>...</p>
                                <small><i class="fa fa-clock-o"> <?= DateThai1($result2[$i]['take_rec_date']) ?></i></small>
                            </a>
                        </li><!-- end message --><?php } ?>
                </ul>
            </li>
            <li class="footer"><a href="#" onclick="loadPage('#index_content','content/dep_risk.html')">ดูทั้งหมด</a></li>
        </ul>
    </li>
     <?php if ($_SESSION['rm_status'] == 'Y') { ?>
        <li class="dropdown notifications-menu" id="mySpan"></li>
    <?php }elseif ($_SESSION['rm_status']=='A') { ?>
        <li class="dropdown messages-menu" id="inbox2">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-envelope-o"></i>
            <span class="label label-danger">
                <?php
                include_once '../template/plugins/funcDateThai.php';
                $user_mdep = $_SESSION['rm_main_dep'];
                $sql = "select count(t.takerisk_id) AS inbox 
from takerisk t 
LEFT JOIN mngrisk m1 ON m1.takerisk_id = t.takerisk_id 
LEFT OUTER JOIN subcategory s1 ON t.subcategory = s1.subcategory
inner join department d1 on t.res_dep=d1.dep_id 
WHERE d1.main_dep = :user_mdep and t.move_status='N' and t.recycle='N' and (m1.mng_status='N' or ISNULL(m1.mng_status))";
                $execute = array(':user_mdep' => $user_mdep);
                $conn_DB->imp_sql($sql);
                $result = $conn_DB->select_a($execute);
                echo $inbox = $result['inbox'];
                ?>
            </span>
        </a>
        <ul class="dropdown-menu">
            <li class="header">คุณมีความเสี่ยงฝ่ายรอทบทวน <?= $inbox ?> รายการ</li>

            <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                    <?php
                    $sql = "select s1.category,t1.level_risk,s1.name  as sub_name , t1.takerisk_id , t1.take_file1 , t1.take_rec_date,LEFT(t1.take_detail,35)  AS detail  
                        from takerisk t1 
                LEFT JOIN mngrisk m1 ON m1.takerisk_id = t1.takerisk_id
                INNER JOIN subcategory s1 ON t1.subcategory = s1.subcategory 
                inner join department d1 on t1.res_dep=d1.dep_id
                WHERE d1.main_dep = :user_mdep and t1.move_status='N' and t1.recycle='N' and (m1.mng_status='N' or ISNULL(m1.mng_status))
                ORDER BY t1.level_risk DESC";
                    $execute = array(':user_mdep' => $user_mdep);
                    $conn_DB->imp_sql($sql);
                    $result2 = $conn_DB->select($execute);
                    for ($i = 0; $i < count($result2); $i++) {
                        if ($result2[$i]['category'] == '1') {
                            $icon = "fa fa-bed";
                        } elseif ($result2[$i]['category'] == '2') {
                            $icon = 'fa fa-medkit';
                        } elseif ($result2[$i]['category'] == '3') {
                            $icon = 'fa fa-heartbeat';
                        } elseif ($result2[$i]['category'] == '4') {
                            $icon = 'fa fa-bug';
                        } elseif ($result2[$i]['category'] == '5') {
                            $icon = 'fa fa-leaf';
                        } elseif ($result2[$i]['category'] == '6') {
                            $icon = 'fa fa-money';
                        } elseif ($result2[$i]['category'] == '7') {
                            $icon = 'fa fa-pie-chart';
                        } elseif ($result2[$i]['category'] == '8') {
                            $icon = 'fa fa-file-text';
                        }
                        if ($result2[$i]['level_risk'] == 'A' or $result2[$i]['level_risk'] == 'B' or $result2[$i]['level_risk'] == 'C') {
                            $color = 'success';
                        } elseif ($result2[$i]['level_risk'] == 'D' or $result2[$i]['level_risk'] == 'E' or $result2[$i]['level_risk'] == 'F') {
                            $color = 'yellow';
                        } elseif ($result2[$i]['level_risk'] == 'G' or $result2[$i]['level_risk'] == 'H' or $result2[$i]['level_risk'] == 'I') {
                            $color = 'red';
                        }
                        ?> 
                        <li><!-- start message -->
                            <a href="#" onclick="DetailRisk ('#index_content',{data:<?=$result2[$i]['takerisk_id']?>})">
                                <?php if (!empty($result2[$i]['take_file1'])) { ?>
                                    <div class="pull-left">
                                        <img src="myfile/<?= $result2[$i]['take_file1'] ?>" class="img-circle" alt="User Image">
                                    </div><?php } ?>
                                <h4>
                                    <i class="<?= $icon ?> text-<?= $color ?>"></i> <?= $result2[$i]['sub_name'] ?>:
                                </h4>
                                <p><?= $result2[$i]['detail'] ?>...</p>
                                <small><i class="fa fa-clock-o"> <?= DateThai1($result2[$i]['take_rec_date']) ?></i></small>
                            </a>
                        </li><!-- end message --><?php } ?>
                </ul>
            </li>
            <li class="footer"><a href="#" onclick="loadPage('#index_content','content/Mdep_risk.html')">ดูทั้งหมด</a></li>
        </ul>
    </li>        
           <?php }
} if (empty($_SESSION['rm_id'])) { ?>
    <li class="dropdown messages-menu">

        <a href="#" onClick="return popup('login_page.html', popup, 430, 380);" title="เข้าสู่ระบบบริหารความเสี่ยง">
            <img src="images/key-y.ico" width="18"> เข้าสู่ระบบ
        </a>

    </li>
<?php
} else {

    $user_id = $_SESSION['rm_id'];
    if (!empty($user_id)) {

        $sql = "select photo, CASE admin WHEN 'Y' THEN 'คณะกรรมการ/ผู้ดูลระบบ' "
                . "WHEN 'N' THEN 'ผู้ใช้งานทั่วไป' "
                . "WHEN 'A' THEN 'หัวหน้าฝ่าย' END AS rm_status,photo "
                . "from user WHERE user_id=:user_id";
        $execute = array(':user_id' => $user_id);
        $conn_DB->imp_sql($sql);
        $result = $conn_DB->select_a($execute);

        $empno_photo = isset($result['photo'])?$result['photo']:'';
        if (empty($empno_photo)) {
            $photo = 'person.png';
            $fold = "images/";
        } else {
            $photo = $empno_photo;
            $fold = "USERimgs/";
        }
    }
    ?>
    <!-- User Account: style can be found in dropdown.less -->
    <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?= $fold . $photo ?>" class="user-image" alt="User Image">
            <span class="hidden-xs"><?= $_SESSION['rm_fullname'] ?></span>
        </a>
        <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
                <img src="<?= $fold . $photo ?>" class="img-circle" alt="User Image">
                <p>
    <?= $_SESSION['rm_fullname'] ?>
                    <small><?= $result['rm_status'] ?></small>
                </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
                <div class="pull-left">
                    <a href="#" onclick="RemovejQueryCookie('year');loadAjax('#index_content','JsonData/tempSendData.php','<?= $_SESSION['rm_id']?>','AddUser');" class="btn btn-default btn-flat">ข้อมูลส่วนตัว</a>
                </div>
                <div class="pull-right">
                    <a href="#" onclick="loadAjax('#index_content','process/logout.php',null,'logout','html');" class="btn btn-default btn-flat">ออกจากระบบ</a>
                </div>
            </li>
        </ul>
    </li>
    <?php if ($_SESSION['rm_status'] == 'Y') { ?>
        <!-- Control Sidebar Toggle Button 
        <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li>-->
    <?php }
} ?>
