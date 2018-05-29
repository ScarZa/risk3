function reviewModal () {
$("#createModal").empty().append("<div class='modal' id='reviewModal' role='dialog' aria-labelledby='exampleModalLabel'>"
                                    +"<div class='modal-dialog' role='document'><div class='modal-content'></div></div></div>");
    $('#reviewModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var recipient = button.data('whatever')
  var modal = $(this)

                $(".modal-content").append($("<form role='form' id='analysisModal'></form>"))
                $("form#analysisModal").append("<div class='modal-header'>"
                                    +"<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"
                                    +"<h4 class='modal-title' id='reviewModalLabel'>รับใบแจ้งซ่อม</h4></div><div class='modal-body' id='modelreview'><span id='review_detail'></span></div>"
                                    +"<div class='modal-footer'><input id='analyzesubmit' type='submit' value='บันทึก' class='btn btn-primary' /><button type='button' class='btn btn-danger' data-dismiss='modal'>ปิด</button></div>");
                              modal.find('.modal-title').text('ความเสี่ยง : ลำดับที่ ' + recipient)
                $("div#modelreview").append($("<H3><font color='#0000ff'>การทบทวนความเสี่ยง</font></H3>")
                                            ,$("<div class='form-group'><label>วันที่วิเคราะห์ความเสี่ยง &nbsp;</label><input type='text' name='mng_date' id='mng_date' class='form-control' readonly required></div>")
                                            ,$("<div class='form-group'><label>เหตุการณ์ที่เกิดขึ้นมีผลกระทบต่อบริการหรือหน่วยงาน ใดบ้าง</label><textarea class='form-control' style='width: 100%' COLS='100%' rows='2' placeholder='บรรยายเหตุการณ์ที่เกิดขึ้นมีผลกระทบ' name='incident_old' id='incident_old' required></textarea></div>")
                                            ,$("<div class='form-group'><label>วิเคราะห์สาเหตุที่เกิด</label><div id='sel_analysis'></div></div>")
                                            ,$("<div class='form-group'><label>สาเหตุของปัญหา</label><textarea class='form-control' style='width: 100%' COLS='100%' rows='2' placeholder='บรรยายสาเหตุของปัญหา' name='edit_summary' id='edit_summary' required></textarea></div>")
                                            ,$("<div class='form-group'><label>มาตรการหรือแนวทางแก้ไข</label><textarea class='form-control' style='width: 100%' COLS='100%' rows='2' placeholder='บรรยายมาตรการหรือแนวทางแก้ไข' name='edit_process' id='edit_process' required></textarea></div>")
                                            ,$("<div class='form-group'><label>ระยะเวลาในการดำเนินการเพื่อให้กรรมการความเสี่ยงติดตามประเมินผล</label><select class='form-control' name='evaluate' id='evaluate' required></select></div>")
                                            ,$("<input type='hidden' name='takerisk_id' value='"+recipient+"'>")
                                            ,$("<input type='hidden' name='method' value='review'>"));
                                            $.getJSON('JsonData/analysis.php', function (LR) {
                                    for (var key in LR) { 
                                        $("div#sel_analysis").append($("<input type='checkbox' name='check"+LR[key].analysis_id+"' id='check"+LR[key].analysis_id+"' value='"+LR[key].topic+"'>&nbsp;&nbsp;&nbsp;&nbsp;<b>"+LR[key].topic+" : </b>"+LR[key].detail+"<br>"));
                                    }
                                });
                                $.getJSON('JsonData/evaluate.php', function (LR) {
                                    var option="$('<option value=''> ...เลือกระยะเวลา... </option>'),";
                                    for (var key in LR) {
                                              option += "$('<option value='"+LR[key].length+"'> "+LR[key].words+" </option>'),";
                                        }
                                        $("select#evaluate").empty().append(option);
                                        }); 
        var DP = new DatepickerThai();
        DP.GetDatepicker('#mng_date');  
                        $("#analysisModal").on('submit', (function (e) {
                                        if($("#incident_old").val()==''){
                                            alert("กรุณาระบุหตุการณ์ที่เกิดขึ้นมีผลกระทบด้วยครับ!!!");
                                            $("#incident_old").focus();
                                            e.preventDefault();
                                        }else if($("#edit_summary").val()==''){
                                            alert("กรุณาระบุสาเหตุของปัญหาด้วยครับ!!!");
                                            $("#edit_summary").focus();
                                            e.preventDefault();
                                        }else if($("#edit_process").val()==''){
                                            alert("กรุณาระบุมาตรการหรือแนวทางแก้ไขด้วยครับ!!!");
                                            $("#edit_process").focus();
                                            e.preventDefault();
                                        }else if($("#evaluate").val()==''){
                                            alert("กรุณาเลือกระยะเวลาในการดำเนินการด้วยครับ");
                                            $("#evaluate").focus();
                                            e.preventDefault();
                                        }else{
        				$.ajax({
                                            type: "POST",
                                            url: "process/prcwriterisk.php",
                                            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                                            contentType: false, // The content type used when sending data to the server.
                                            cache: false, // To unable request pages to be cached
                                            processData: false,
					   success: function(result) {
						alert(result);
                                                $("#index_content").empty().load('content/dep_risk.html');
                                                modal.modal('hide');
					   }
					 });e.preventDefault();
                                     }
                        }));
                        });
                        }