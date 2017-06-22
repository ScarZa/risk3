var createTable = function (column,level_col='1', tid=null,responsive=true) {
    this.column = column;
    this.level_col = level_col;
    this.tid = tid;
    this.responsive = responsive;

    this.columnOBJ = JSON.parse(this.column);
    //this.dataOBJ = JSON.parse(this.data);
    if(this.responsive == true){
        var resp = 'table-responsive';
    }else{
        var resp = '';
    }
    this.GetHead = function () {
        var head = "<div class='"+resp+"'><table id='" + this.tid + "' class='table table-border table-hover' frame='below'>" +
                "<thead bgcolor='#898888' style='text-align: center'>";
                
        if(this.level_col=='2'){
            head += "<tr style='text-align: center'><th  style='text-align: center;vertical-align: middle;' width='5%' rowspan='2'>ลำดับ</th>";
        for (var key in this.columnOBJ) {
            colspan = this.columnOBJ[key].length;

            if (colspan == 0) {
                head += "<th style='text-align: center;vertical-align: middle;' rowspan='2'>" + key + "</th>";
            } else {
                head += "<th style='text-align: center' colspan='" + colspan + "'>" + key + "</th>";
            }
        }
        head += "</tr><tr>";
        for (var key in this.columnOBJ) {
            var value = this.columnOBJ[key];
            for (var keys in value) {

                head += "<th style='text-align: center'>" + value[keys] + "</th>";
            }
        }
    }else if(this.level_col=='1'){
        head += "<tr style='text-align: center'><th  style='text-align: center;vertical-align: middle;' width='5%'>ลำดับ</th>";
        for (var key in this.columnOBJ) {
            var value = this.columnOBJ[key];
            //for (var keys in value) {

                head += "<th style='text-align: center'>" + value + "</th>";
            //}
        }
    }
        head += "</tr></thead>";
    return head;
    }

    this.GetTable = function (data,content) {
        var dataOBJ = JSON.parse(data);

        var table = this.GetHead();
        table += "<tbody>";
        var order = 1;
        
        $(function (){ 
        for (var i = 0; i < dataOBJ.length; i++) {
            table += "<tr class=''>";
            table += "<td align='center'>" + order + "</td>";
            //for (var dkey in ndataOBJ[i]) {
            $.each( dataOBJ[i], function( dkey, val ) {
                //if (ndataOBJ[i].hasOwnProperty(dkey))
                    table += "<td align='center'>" + val + "</td>";
            });
            table += "</tr>";
            order++;
        }
        table += "</tbody></table></div>";
        $('#' + content + '').html(table);
    });
    }

    this.GetTableAjax = function (locate, content,detail=false ) {
        this.locate = locate;

        var table = this.GetHead();
        table += "<tbody>";
        var order = 1;
        var count_col=this.columnOBJ.length;
        $.getJSON(this.locate, function (dataTB) {
            if (dataTB != null && dataTB.length > 0) {
                for (var i = 0; i < dataTB.length; i++) {
                    table += "<tr class='tr_c'>";
                    table += "<td align='center'>" + order + "</td>";
                    var c =0;
                    $.each( dataTB[i], function( dkey, val ) {
                        if(detail !=false){
                            if(c< (count_col)-1){
                            table += "<td align='center'>" + val + "</td>";
                         }else if(c == (count_col)-1){
                            table += "<td align='center'><a href='index.html?page="+detail+"&data="+encode64(val)+"'><img src='images/icon_set1/file.ico' width='25'></a></td>";
                        /*table += "<td class='td_c' align='center'><a href='#'><img src='images/icon_set1/file.ico' width='25'></a></td>";
                        $('table').find('tr td a:nth-child(1)').attr("onclick","loadPage('#index_content',"+detail+","+val+")");
                        //console.log(a1);
                                /*a1.on('click',function(){
                            //$(e.target).attr("onclick","loadPage('#index_content',"+detail+","+val+")");//#a1 
                                    alert("yeyeyeyeye!!!");
                            $('#index_content').load('content/detail_risk.php');
                            });*/
                            }
                        }else{
                            table += "<td align='center'>" + val + "</td>";
                        }c++;
                });
                    table += "</tr>";
                    order++;
                }
                table += "</tbody></table></div>";
                $('#' + content + '').html(table);
                
            }
            $("#dbtable1").DataTable();
            $('#dbtable2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
        $('#dbtable3').DataTable({
            "paging": false,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true
        });
        });
}
}
