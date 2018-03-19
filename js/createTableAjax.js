var createTableAjax = function () {
    
    this.GetNewTableAjax = function (content,jsonsource,tempdata,cols,namefunc=null,deltable=null,delfield=null,resend=null,edit=false,process=false,pnamefunc=null,detail=false,dmodal=null,print=false,printpage=null,red=null,orange=null,yellow=null,green=null,tid1=null,tid2=null,tid3=null) {
                var table = document.createElement ("table");
            	//table.border = "1px";
                if(tid1!=null){
                    var tid=tid1;
                }else if(tid2!=null){
                    var tid=tid2;
                }else if(tid3!=null){
                    var tid=tid3;
                }//console.log(tid1);console.log(tid);
                table.setAttribute("id", tid);
                table.setAttribute("class", "table table-border table-hover");
                table.setAttribute("frame","below");
                var tHead = document.createElement ("thead");
                tHead.setAttribute("bgcolor","#898888");
                tHead.setAttribute("style","text-align: center");
                table.appendChild (tHead);
                var rowh = tHead.insertRow (-1);
                var cellh;
                for (var keys in cols) {
                    cellh = rowh.insertCell (-1);
                    cellh.innerHTML = cols[keys];
                }
            	var tBody = document.createElement ("tbody");
            	table.appendChild (tBody);
                tBody.setAttribute("style","text-align: center");
                var jsonsub=jsonsource.split("?");
                $.getJSON(jsonsub[0],{data: jsonsub[1]}, function (dataTB) {
                var value=[];
                    if (dataTB != null && dataTB.length > 0) {
                for (var i = 0; i < dataTB.length; i++) {
                		var row = tBody.insertRow (-1);
                                var I=0;
                                    $.each( dataTB[i], function( dkey, val ) {
                    			var cell = row.insertCell (-1);
                    				cell.innerHTML = val;
                                                value[I]=val;
                                                I++;
                		});
//                                if(status==true){
//                                        var cellEdit = row.insertCell (-1);
//                                        if(status==0){
//                                        editButton = document.createElement("i");
//					cellEdit.appendChild(editButton);
//					editButton.setAttribute("class","fa fa-spinner fa-spin");
//                                        editButton.setAttribute("title","รอลงทะเบียนรับ");
//                                    }else if(status==1){
//                                    editButton = document.createElement("i");
//					cellEdit.appendChild(editButton);
//					editButton.setAttribute("class","fa fa-spinner");
//                                        editButton.setAttribute("title","กำลังดำเนินการ");
//                                    }else if(status==2){
//                                    editButton = document.createElement("img");
//					cellEdit.appendChild(editButton);
//					editButton.setAttribute("src","images/Symbol_-_Check.ico");
//                                        editButton.setAttribute("title","สำเร็จ");
//                                    }else if(status==3){
//                                    editButton = document.createElement("img");
//					cellEdit.appendChild(editButton);
//					editButton.setAttribute("src","images/button_cancel.ico");
//                                        editButton.setAttribute("title","ไม่สำเร็จ");
//                                    }
//                                        editButton.setAttribute("width","25");
//                                        
//                                }
                                if(print==true){
                                        var cellEdit = row.insertCell (-1);
					editButton = document.createElement("a");
					cellEdit.appendChild(editButton);
					editButton.innerHTML = "<img src='images/printer.ico' width='25'>";
					editButton.setAttribute("href","#");
                                        editButton.setAttribute("onclick","window.open('"+printpage+"?id="+value[0]+"', '', 'width=820,height=1000');return false;");
                                }                                           
                                if(detail==true){
                                     var modalsub=dmodal.split("?");
                                        var cellEdit = row.insertCell (-1);
					editButton = document.createElement("a");
					cellEdit.appendChild(editButton);
					editButton.innerHTML = "<img src='images/icon_set1/file_search.ico' width='25'>";
					editButton.setAttribute("href","#");
                                        editButton.setAttribute("onclick",modalsub[0]+"("+modalsub[1]+")");
                                        editButton.setAttribute("data-toggle","modal");
                                        editButton.setAttribute("data-target","#"+modalsub[0]);
                                        editButton.setAttribute("data-whatever",value[0]);
                                }
                                if(process==true){
                                        var cellEdit = row.insertCell (-1);
					editButton = document.createElement("a");
					cellEdit.appendChild(editButton);
					editButton.innerHTML = "<img src='images/icon_set1/file_add.ico' width='25'>";
					editButton.setAttribute("href","#");
                                        editButton.setAttribute("onclick","loadAjax('#index_content','"+tempdata+"','"+value[0]+"','"+pnamefunc+"');");
                                }
                                if(edit==true){
                                        var cellEdit = row.insertCell (-1);
					editButton = document.createElement("a");
					cellEdit.appendChild(editButton);
					editButton.innerHTML = "<img src='images/icon_set1/file_edit.ico' width='25'>";
					editButton.setAttribute("href","#");
                                        editButton.setAttribute("onclick","loadAjax('#index_content','"+tempdata+"','"+value[0]+"','"+namefunc+"');");
                                        

					var cellDel = row.insertCell (-1);
					delButton = document.createElement("a");
					cellDel.appendChild(delButton);
					delButton.innerHTML = "<img src='images/icon_set1/file_delete.ico' width='25'>";
					delButton.setAttribute("href","#");
					delButton.setAttribute("onclick","DeleteData('JsonData/DeleteFile.php','"+deltable+"','"+delfield+"','"+value[0]+"','"+resend+"','html');");
                                    }
            }
            	var container = document.getElementById (content);
            	container.appendChild(table);
            }
            $("td:contains("+red+")").attr("style","background-color: #d61b1b;color: white");
            $("td:contains("+orange+")").attr("style","background-color: #e08002;color: white");
            $("td:contains("+yellow+")").attr("style","background-color: #e3fc07;");
            $("td:contains("+green+")").attr("style","background-color: #40ad57;color: white");
            $("#"+tid1+"").DataTable();
            $("#"+tid2+"").DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
        $("#"+tid3+"").DataTable({
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
