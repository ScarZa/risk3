<h1>Test AJAX</h1>
<?php   if(!empty($_POST['data'])){ echo count($_POST['data']).'<br>';
         for($i = 0;$i < count($_POST['data']);$i++){
             $values[$i] = isset($_POST['data'][$i])?$_POST['data'][$i]:'';
             echo $values[$i].' '.$i."<br>";
         }
}else{
    $value1= isset($_POST['data0'])?$_POST['data0']:'';
    $value2= isset($_POST['data1'])?$_POST['data1']:'';
    $value3= isset($_POST['data2'])?$_POST['data2']:'';
    $value4= isset($_POST['data3'])?$_POST['data3']:'';
    $value5= isset($_POST['data4'])?$_POST['data4']:'';
    $value6= isset($_POST['data5'])?$_POST['data5']:'';
    $value7= isset($_POST['data6'])?$_POST['data6']:'';
    $value8= isset($_POST['data7'])?$_POST['data7']:'';
    $value9= isset($_POST['data8'])?$_POST['data8']:'';
    $value= isset($_GET['value'])?$_GET['value']:'';
   
    //Arrays.stream(values).forEach(System.out::println);
   
    
    echo $value1." ".$value2." ".$value3." ".$value4." ".$value5." ".$value6." ".$value7." ".$value8." ".$value9;
    echo $value;
            }
?>