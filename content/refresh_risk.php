<?php 
function __autoload($class_name) {
    include '../class/' . $class_name . '.php';
}
$conn_DB = new EnDeCode();
$read = "../connection/conn_DB.txt";
$conn_DB->para_read($read);
$conn_db = $conn_DB->Read_Text();
$conn_DB->conn_PDO();
set_time_limit(0);

$sql = "select count(takerisk_id) AS countrisk from takerisk WHERE move_status='Y' and recycle='N' and subcategory!='' group by move_status";
$conn_DB->imp_sql($sql);
$result = $conn_DB->select_a();
$result['countrisk'] = empty($result['countrisk'])?0:$result['countrisk'];
?>
                <a href="JavaScript:doCallAjax('countrisk');" class="dropdown-toggle" data-toggle="dropdown">
                    <i style="color: yellow;" class="fa fa-bell-o"></i>
                  <span class="label label-danger"><?=$result['countrisk']?></span>
                </a>
                <ul class="dropdown-menu">
                    <li class="header" style="color: red;"><b>คุณมี <?=$result['countrisk']?> รายการแจ้งย้าย</b></li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu"><?php  $sql2 = "select t1.takerisk_id, s1.category,t1.level_risk, s1.name from takerisk t1 
                    inner join subcategory s1 on t1.subcategory=s1.subcategory
                    WHERE t1.move_status='Y' and t1.recycle='N' order by t1.level_risk DESC";
                                $conn_DB->imp_sql($sql2);
                                $result2 = $conn_DB->select();
                                for($i=0;$i<count($result2);$i++){ 
                                    if($result2[$i]['category']=='1'){
                                       $icon = "fa fa-bed"; 
                                    }elseif($result2[$i]['category']=='2'){
                                       $icon = 'fa fa-medkit'; 
                                    }elseif($result2[$i]['category']=='3'){
                                       $icon = 'fa fa-heartbeat'; 
                                    }elseif($result2[$i]['category']=='4'){
                                       $icon = 'fa fa-bug'; 
                                    }elseif($result2[$i]['category']=='5'){
                                       $icon = 'fa fa-leaf'; 
                                    }elseif($result2[$i]['category']=='6'){
                                       $icon = 'fa fa-money'; 
                                    }elseif($result2[$i]['category']=='7'){
                                       $icon = 'fa fa-pie-chart'; 
                                    }elseif($result2[$i]['category']=='8'){
                                       $icon = 'fa fa-file-text'; 
                                    }
                                    if($result2[$i]['level_risk']=='A' or $result2[$i]['level_risk']=='B' or $result2[$i]['level_risk']=='C'){
                                        $color='success';
                                    }elseif($result2[$i]['level_risk']=='D' or $result2[$i]['level_risk']=='E' or $result2[$i]['level_risk']=='F'){
                                        $color='yellow';
                                    }elseif($result2[$i]['level_risk']=='G' or $result2[$i]['level_risk']=='H' or $result2[$i]['level_risk']=='I'){
                                        $color='red';
                                    }
?>
                      <li>
<!--                          <a href="index.html?page=content/detail_risk.php&data=<?= base64_encode($result2[$i]['takerisk_id'])?>">-->
                          <a href="#" onclick="DetailRisk ('#index_content',{data:<?=$result2[$i]['takerisk_id']?>})">
                      <i class="<?=$icon?> text-<?= $color?>"></i>  <?= $result2[$i]['name']?> 
                        </a>
                      </li>
                                <?php } ?>
                   </ul>
                  </li>
                  <li class="footer"><a href="#" onclick="loadPage('#index_content','content/check_risk.html')">ดูทั้งหมด</a></li>
                </ul>
<?php $conn_DB->close_PDO(); ?>