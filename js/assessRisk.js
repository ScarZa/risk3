function assModal () { 
$("#createModal").empty().append("<div class='modal' id='assModal' role='dialog' aria-labelledby='exampleModalLabel'>"
                                    +"<div class='modal-dialog' role='document'><div class='modal-content' id='Mcontent'></div></div></div>");
    $('#assModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var recipient = button.data('whatever')
  var modal = $(this)
  
                $("div#Mcontent").append($("<form role='form' id='assessModal'></form>"));
                $("#assessModal").append("<div class='modal-header'>"
                                    +"<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"
                                    +"<h4 class='modal-title' id='assModalLabel'>รับใบแจ้งซ่อม</h4></div><div class='modal-body' id='modelass'><span id='ass_detail'></span></div>"
                                    +"<div class='modal-footer'><input id='analyzesubmit' type='submit' value='บันทึก' class='btn btn-primary' /><button type='button' class='btn btn-danger' data-dismiss='modal'>ปิด</button></div>")
                            modal.find('.modal-title').text('ทบทวนความเสี่ยง : ลำดับที่ ' + recipient)
                $("div#modelass").append($("<H4><font color='#0000ff'>การทบทวนความเสี่ยง</font></H4>")
                                            ,$("<div class='form-group'><label>ผู้บันทึกการแก้ไข &nbsp;</label><p><span style='color: #0000ff;' id='user_edit'></span></div>")
                                            ,$("<div class='form-group'><label>วันที่วิเคราะห์ความเสี่ยง &nbsp;</label><p><span style='color: #0000ff;' id='mng_date'></span></div>")
                                            ,$("<div class='form-group'><label>เหตุการณ์ที่เกิดขึ้นมีผลกระทบต่อบริการหรือหน่วยงาน ใดบ้าง</label><p><span style='color: #0000ff;' id='incident_old'></span></div>")
                                            ,$("<div class='form-group'><label>วิเคราะห์สาเหตุที่เกิด</label><p><span style='color: #0000ff;' id='incident_differ'></span></div>")
                                            ,$("<div class='form-group'><label>สาเหตุของปัญหา</label><p><span style='color: #0000ff;' id='edit_summary'></span></div>")
                                            ,$("<div class='form-group'><label>มาตรการหรือแนวทางแก้ไข</label><p><span style='color: #0000ff;' id='edit_process'></span></div>")
                                            ,$("<div class='form-group'><label>ระยะเวลาในการดำเนินการเพื่อให้กรรมการความเสี่ยงติดตามประเมินผล</label><p><span style='color: #ff0000;' id='evaluate'></span></div>")
                                            ,$("<div class='form-group' id='result'></div>"));
                   // if(data.rm_status=='Y'){
                            $("#result").append("<label>การประเมินผลของคณะกรรมการ</label><BR>");//console.log(data.detail.admin_check);
//                        if(data.detail.admin_check=='G'){ 
//                            $("#result").append("<b style='color:blue'>ผ่าน</b>");
//                        }else{
                        $.getJSON('JsonData/detail_mngrisk.php',{data: recipient}, function (data) {
                                                $("#user_edit").text(data.user_edit);
                                                $("#mng_date").text(data.mngdate);
                                                $("#incident_old").text(data.incident_old);
                                                $("#incident_differ").text(data.incident_differ);
                                                $("#edit_summary").text(data.edit_summary);
                                                $("#edit_process").text(data.edit_process);
                                                $("#evaluate").text("***ระยะเวลา "+data.evaluate+" วัน *** สามารถให้กรรมการตรวจได้ในวันที่ "+data.chkdate);
                                $.getJSON('JsonData/result.php', function (LR) {
                                    if(data.rm_status=='Y'){
                                    for (var key in LR) {
                                        if(LR[key].rs_value == data.admin_check){var checked='checked';}else{var checked='';}
                                              $("div#result").append($("<input type='radio' name='check' id='check' value='"+LR[key].rs_id+"' "+checked+" required>&nbsp;&nbsp;&nbsp;<b>"+LR[key].rs_wards+"</b><br>"));
                                    }
                                }else{
                                              $("div#result").append($("<b style='color:blue'>"+data.rs_wards+"</b>"));  
                                              $("input#analyzesubmit").remove();
                                }
                                });
                                            });
                            
                    $("form#assessModal").append($("<input type='hidden' name='method' value='assessment'>")
                                            ,$("<input type='hidden' name='mngrisk_id' value='"+recipient+"'>"));
                                $("#assessModal").on('submit', (function (e) {
                                        if($("#check").val()==''){
                                            alert("กรุณาประเมินด้วยครับ");
                                            $("#check").focus();
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
                       // }
                //}                    
                                            
                        });
                        }
