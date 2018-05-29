var AJAXCharts = function (container, type, title, unit, categories, data, subtitle) {

    this.container = container;
    this.type = type;
    this.title = title;
    this.subtitle = subtitle;
    this.unit = unit;
    this.categories = categories;
    this.data = data;
    //document.write(this.container);
    this.GetCL = function () {
        var optionString = JSON.stringify({
            chart: {
                renderTo: this.container,
                backgroundColor: null,
                type: this.type
            },
            title: {
                text: this.title,
                x: -20 //center
            },
            subtitle: {
                text: this.subtitle,
                x: -20
            },
            xAxis: {
                categories: this.categories /////นำ object มาใช้ได้เลย
                        // categories: [] //ให้เป็น array ว่าง เพื่อรอรับค่าจาก file อื่น
            },
            yAxis: {
                title: {
                    text: ''
                },
                plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            //series: this.data /////นำ object มาใช้ได้เลย
            series: []    //ให้เป็น array ว่าง เพื่อรอรับค่าจาก file อื่น
        });
        var options = JSON.parse(optionString);
        if(this.type == 'column'){
        options.tooltip = {
                enabled: true,
                formatter: function () {
                    return '<b>' + this.series.name + '</b><br/>' +
                            this.x + ': ' + this.y +' '+unit;
                }
            };
    }else if(this.type == 'line'){
        options.tooltip = {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} '+unit+'</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        };    
        }
        var jsonsub=this.data.split("?");
        //ส่งค่า ID ให้ json_data.php
          //รับค่าที่เป็น object จาก file อื่น
         $.getJSON(jsonsub[0],{data: jsonsub[1],data2: jsonsub[2],data3: jsonsub[3],data4: jsonsub[4]}, function (json) {
         for(var i=0;i<json.length;i++){
             options.series[i] = json[i];
      }
         chart = new Highcharts.Chart(options);
         });
        //chart = new Highcharts.Chart(options);
        //return options;
    }

    this.GetBar = function () {
        var optionString = JSON.stringify({
            chart: {
                renderTo: this.container,
                type: this.type
            },
            title: {
                text: this.title
            },
            subtitle: {
                text: this.subtitle
            },
            xAxis: [{
                    categories: this.categories,
                    reversed: false,
                    labels: {
                        step: 1
                    }
                }, {// mirror axis on right side
                    opposite: true,
                    reversed: false,
                    categories: this.categories,
                    linkedTo: 0,
                    labels: {
                        step: 1
                    }
                }],
            yAxis: {
                title: {
                    text: this.unit
                },

            },
            plotOptions: {
                series: {
                    stacking: 'normal'
                }
            },
            series: this.data
        });
        var options = JSON.parse(optionString);
        options.yAxis = {labels: {// เพิ่ม option
                formatter: function () {
                    return Math.abs(this.value) + '%';
                }
            }};
        options.tooltip = {
            formatter: function () {
                return '<b>' + this.point.category + '</b><br/>' +
                        this.series.name + ' : ' + Highcharts.numberFormat(Math.abs(this.point.y), 0)+' '+ unit;
            }
        };
        chart = new Highcharts.Chart(options);
    }
    
    this.GetPie = function () {

    // Radialize the colors
   /* Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
        return {
            radialGradient: {
                cx: 0.5,
                cy: 0.3,
                r: 0.7
            },
            stops: [
                [0, color],
                [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
            ]
        };
    });*/

    // Build the chart
    var optionString = JSON.stringify({
        chart: {
            renderTo: this.container,
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: this.type
        },
        title: {
            text: this.title
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f} %</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name} </b>: {y} '+unit,
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    },
                    connectorColor: 'silver'
                }
            }
        },
        series: []
    });
    var jsonsub=this.data.split("?");
        //ส่งค่า ID ให้ json_data.php
          //รับค่าที่เป็น object จาก file อื่น
         
        var options = JSON.parse(optionString);
        $.getJSON(jsonsub[0],{data: jsonsub[1]}, function (json) {
         for(var i=0;i<json.length;i++){
             options.series[i] = json[i];
      }
         chart = new Highcharts.Chart(options);
         });
}

    this.GetCLStrack = function () {
   var optionString = JSON.stringify({
        chart: {
            renderTo: this.container,
            type: this.type
        },

        title: {
            text: this.title
        },
        subtitle: {
            text: this.subtitle
        },

        xAxis: {
            categories: this.categories
        },

        yAxis: {
            allowDecimals: false,
            min: 0,
            title: {
                text: this.unit
            }
,
                stackLabels: {
                enabled: true,
                style: {
                    fontWeight: 'bold',
                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                }
            }
        },
         tooltip: {
            headerFormat: '<b>{point.key}</b><br>',
            pointFormat: '<span style="color:{series.color}">\u25CF</span> {series.name}: {point.y} / {point.stackTotal}'+ this.unit
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

        series: this.data
    });
        var options = JSON.parse(optionString);
        chart = new Highcharts.Chart(options);
}

}


