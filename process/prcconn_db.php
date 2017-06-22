<?php include '../header2.php';?>
<script language="JavaScript" type="text/javascript">
            var StayAlive = 1; // เวลาเป็นวินาทีที่ต้องการให้ WIndows เปิดออก 
            function KillMe()
            {
                setTimeout("self.close()", StayAlive * 1000);
            }
        </script>
    </head>
    <body onLoad="KillMe();self.focus();window.opener.location.reload();">
        <?php
        //include '../class/write_conn.php';
function __autoload($class_name) {
    include '../class/'.$class_name.'.php';
}
        if (null !== (filter_input(INPUT_POST, 'host'))) {
        $host= filter_input(INPUT_POST, 'host');
        if($host=='main'){
        $conn_file="../connection/conn_DB.txt";    
        }if($host=='hos'){
        $conn_file="../connection/conn_DBHosxp.txt";
        }
foreach ($_POST['val_conn'] as $value) {
         $conn_value[] = $value;
}
        $write_conn=new write_conn($conn_file, $conn_value);
        }
        ?>
    </body>
</html>

