<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>ระบบบริหารความเสี่ยง</title>
        <LINK REL="SHORTCUT ICON" HREF="<?= isset($pic) ? $fol . $pic : '' ?>">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="../template/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../template/plugins/font-awesome-4.6.3/css/font-awesome.min.css">
        <!-- jQuery 2.1.4 -->
    <script src="../template/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!--date picker-->
        <script src="../template/plugins/jquery-ui-1.11.4.custom/jquery-1.12.3.js"></script>
        <script src="../template/plugins/jquery-ui-1.11.4.custom/jquery-ui-1.11.4.custom.js"></script>
        <link rel="stylesheet" href="../template/plugins/jquery-ui-1.11.4.custom/jquery-ui-1.11.4.custom.css" />
        <link rel="stylesheet" href="../template/plugins/jquery-ui-1.11.4.custom/SpecialDateSheet.css" />
        <script src="../js/DatepickerThai4.js" type="text/javascript"></script>
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../template/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="../template/dist/css/skins/_all-skins.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="../template/plugins/iCheck/flat/blue.css">
        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="../template/plugins/iCheck/all.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="../template/plugins/datatables/dataTables.bootstrap.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="../template/plugins/morris/morris.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="../template/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <!-- Select2 -->
        <link rel="stylesheet" href="../template/plugins/select2/select2.min.css">
       <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="../template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        <script src="../template/plugins/excellentexport.js"></script>
        
<!--HighChart-->
    <script src="../template/plugins/Highcharts/code/highcharts.js"></script>
    <script src="../template/plugins/Highcharts/code/modules/exporting.js"></script>
    <script src="../template/plugins/Highcharts/code/modules/data.js"></script>
    <script src="../template/template/plugins/Highcharts/code/modules/drilldown.js"></script>
    <script src="../plugins/Highcharts/code/highcharts-3d.js"></script>
    
        <script language="Javascript" type="text/javascript" src="../js/sendGetPost.js"></script>
        <script src="../js/createTable.js" type="text/javascript"></script>
        
        <script src="../js/AJAXCharts.js" type="text/javascript"></script>
        <script src="../template/plugins/json2/json2.js" type="text/javascript"></script><!-- JSON2 -->
<script type="text/javascript">
            function popup(url, name, windowWidth, windowHeight) {
                myleft = (screen.width) ? (screen.width - windowWidth) / 2 : 100;
                mytop = (screen.height) ? (screen.height - windowHeight) / 2 : 100;
                properties = "width=" + windowWidth + ",height=" + windowHeight;
                properties += ",scrollbars=yes, top=" + mytop + ",left=" + myleft;
                window.open(url, name, properties);
            }
        </script>
        <script type="text/javascript">
            function inputDigits(sensor) {
                var regExp = /[0-9.-/]$/;
                if (!regExp.test(sensor.value)) {
                    alert("กรอกตัวเลขเท่านั้นครับ");
                    sensor.value = sensor.value.substring(0, sensor.value.length - 1);
                }
            }
        </script>
        <!--scrip check ตัวอักษร-->
        <script type="text/javascript">
            function inputString(sensor) {
                var regExp = /[A-Za-zก-ฮะ-็่-๋์/]$/;
                if (!regExp.test(sensor.value)) {
                    alert("กรอกตัวอักษรเท่านั้นครับ");
                    sensor.value = sensor.value.substring(0, sensor.value.length - 1);
                }
            }

        </script>
        <script type="text/javascript">
            function nextbox(e, id) {
                var keycode = e.which || e.keyCode;
                if (keycode == 13) {
                    document.getElementById(id).focus();
                    return false;
                }
            }
        </script>
        <?php
    if (null !== (filter_input(INPUT_GET, 'popup'))) {
        $popup = filter_input(INPUT_GET, 'popup');
        $popup_name = filter_input(INPUT_GET, 'popname');
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_ENCODED);
        $date = filter_input(INPUT_GET, 'date');
        $cod_popup = "window.open('content/pop_$popup_name.php?date=$date&id=$id','','width=470,height=450'); return false;";
    }

    function insert_date($take_date_conv) {
            $take_date = explode("-", $take_date_conv);
            $take_date_year = @$take_date[2] - 543;
            $take_date = "$take_date_year-" . @$take_date[1] . "-" . @$take_date[0] . "";
            return $take_date;
        }

        function edit_date($take_date) {

            $take_date = explode("-", $take_date);
            $pyear = $take_date[0] + 543;
            $take_date = "$take_date[2]-$take_date[1]-$pyear";
            return $take_date;
        }
    ?>
    </head>
    