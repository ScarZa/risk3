<?php
class Charts {
    public function ColumnLine_3D($daimention='3',$container,$type,$title,$unit,$categories,$name,$data,$subtitle=null) {
        $this->daimention=$daimention;
        $this->container=$container;
        $this->type=$type;
        $this->title=$title;
        $this->subtitle=$subtitle;
        $this->unit =$unit;    
        $this->categories=$categories;
        $this->name =$name; /////ชื่อข้อมูล
        $this->data =$data;       
        ?>
        <style type="text/css">
#<?= $this->container?> {
	height: 100%; 
	min-width: 50%; 
	max-width: 100%;
	margin: 0 auto;
}
		</style>
<script type="text/javascript">
$(function () {
    $('#<?= $this->container?>').highcharts({
        chart: {
            type: '<?= $this->type?>',
            margin: 75
    <?php if($this->daimention=='3'){?>
    ,
            options3d: {
                enabled: true,
        <?php if($this->type =='column' or $this->type =='bar'){?>
                alpha: 10,
                beta: 25,
                depth: 70
        <?php }elseif($this->type =='line'){?>
                alpha: 0,
                beta: 0,
                depth: 50
        <?php }?>
            }
    <?php }?>
        },
        title: {
            text: '<?= $this->title?>'
        },
        tooltip: {
                                        enabled: true,
                                        formatter: function () {
                                            return '<b>' + this.series.name + '</b><br/>' +
                                                    this.x + ': ' + this.y + ' <?= $this->unit?>';
                                        }
                                    },
        subtitle: {
            text: '<?= $this->subtitle?>'
        },
        plotOptions: {
            column: {
                depth: 25
            }
        },
        xAxis: {
            categories: [<?= $this->categories?>
            ]
        },
        yAxis: {
            title: {
                text: '<?= $this->unit?>'
            }
        },
        series: [<?php for ($c = 0; $c < count($this->name); $c++) {?>
                                    {
                                            name: '<?= $this->name[$c]?>',
                                            data: [<?= $this->data[$c]?>],
            <?php if($this->type =='column'){?>
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#FFFFFF',
                align: 'right',
                format: '{point.y}', // one decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: '11px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
            <?php }elseif($this->type =='line'){?>
                dataLabels: {
                enabled: true,
                rotation: 0,
                color: '#000000',
                align: 'right',
                format: '{point.y}', // one decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: '9px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
            <?php }?>
                                        },
                                                <?php }   ?>]
    });
});
		</script>
<?php    }

    public function Pie3D($daimention,$container,$type='pie',$title,$unit,$name,$data,$subtitle=null) {
        $this->daimention=$daimention;
        $this->container=$container;
        $this->type=$type;
        $this->title=$title;
        $this->subtitle=$subtitle;
        $this->unit =$unit;    
        $this->name =$name; ///ชื่อของหน่วย เช่น ผู้มารับบริการ
        $this->data =$data;
        ?>
        <script type="text/javascript">
$(function () {
    $('#<?= $this->container?>').highcharts({
        chart: {
            type: '<?= $this->type?>'
    <?php if($this->daimention=='3'){?>        
    ,
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
    <?php }?>
        },
        title: {
            text: '<?= $this->title?>'
        },
                subtitle: {
            text: '<?= $this->subtitle?>'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'+ '</b>: <br>' + '{y}' + ' <?= $this->unit?>'
                }
            }
        },
        series: [{
            type: '<?= $this->type?>',
            name: '<?= $this->name?>',
            data: [<?= $this->data?>]
        }]
    });
});
		</script> 
  <?php  }
  
  public function Columnstacking3D($daimention,$container,$type='column',$title,$unit,$categories,$name,$data,$stack=null,$subtitle=null) {
        $this->daimention=$daimention;  
        $this->container=$container;
        $this->type=$type;
        $this->title=$title;
        $this->subtitle=$subtitle;
        $this->unit =$unit;    
        $this->categories=$categories;
        $this->name =$name; /////ชื่อข้อมูล
        $this->data =$data;
        $this->stack=$stack;
     ?>
                         <style type="text/css">
                        #<?=$this->container?> {
    height: 100%; 
    min-width: 50%; 
    max-width: 100%;
    margin: 0 auto;
}
                    </style>
                    <script type="text/javascript">
                        $(function () {
    Highcharts.chart('<?=$this->container?>', {
        chart: {
            type: '<?= $this->type?>'
    <?php if($this->daimention=='3'){?>        
    ,
            options3d: {
                enabled: true,
                alpha: 10,
                beta: 25,
                depth: 70,
                viewDistance: 25
            }
    <?php }?>
        },

        title: {
            text: '<?= $this->title?>'
        },
        subtitle: {
            text: '<?= $this->subtitle?>'
        },

        xAxis: {
            categories: [<?= $this->categories?>]
        },

        yAxis: {
            allowDecimals: false,
            min: 0,
            title: {
                text: '<?= $this->unit?>'
            }
            <?php if($this->daimention=='2'){?>
             ,
                stackLabels: {
                enabled: true,
                style: {
                    fontWeight: 'bold',
                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                }
            }
            <?php }?>
        },
          /*  legend: {
            align: 'right',
            x: -30,
            verticalAlign: 'top',
            y: 25,
            floating: true,
            backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
            borderColor: '#CCC',
            borderWidth: 1,
            shadow: false
        },*/
        tooltip: {
            headerFormat: '<b>{point.key}</b><br>',
            pointFormat: '<span style="color:{series.color}">\u25CF</span> {series.name}: {point.y} / {point.stackTotal}'+ ' <?= $this->unit?>'
        },

        plotOptions: {
            column: {
                stacking: 'normal',
        dataLabels: {
                    enabled: true,
                    color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
                },
                depth: 40
            }
        },

        series: [<?php for ($c = 0; $c < count($this->name); $c++) {?>
                                    {
                                        
                                            name: '<?= $this->name[$c]?>',
                                            data: [<?= $this->data[$c]?>],
                                            stack: '<?= $this->stack[$c]?>'
                                        },
                                                <?php } ?>]
    });
});


                    </script>
  <?php }
}
?>