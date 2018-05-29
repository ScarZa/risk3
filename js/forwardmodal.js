function forwardModal () {
$("#createModal").empty().append("<div class='modal' id='forwardModal' role='dialog' aria-labelledby='exampleModalLabel'>"
                                    +"<div class='modal-dialog' role='document'><div class='modal-content'><div class='modal-header'>"
                                    +"<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"
                                    +"<h4 class='modal-title' id='forwardModalLabel'>รับใบแจ้งซ่อม</h4></div><div class='modal-body' id='modalforward'><span id='forward_detail'></span></div>"
                                    +"<div class='modal-footer'><button type='button' class='btn btn-danger' data-dismiss='modal'>ปิด</button><button type='button' class='btn btn-success' id='submforward'>ส่งต่อ</button></div></div></div></div>");
    $('#forwardModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var recipient = button.data('whatever')
  var modal = $(this)
  modal.find('.modal-title').text('ส่งต่อความเสี่ยง : ลำดับที่ ' + recipient);
  
        $('div#modalforward').append("<form name='frmforward' id='frmforward'></form>");
                $('#frmforward').empty().append($("<div class='form-group' id='dep_sel'></div>")
                                    ,$("<input type='hidden' class='form-control' id='takerisk_id' name='takerisk_id'>")
                                    ,$("<input type='hidden' class='form-control' id='method' name='method'>"));
                    $('#dep_sel').empty().append("<label for='res_dep' class='control-label'>หน่วยงานที่เกี่ยวข้องที่ต้องการส่งต่อ</label><select name='res_dep' id='res_dep' class='form-control select2'></select>");
                    $.getJSON('JsonData/Dep_Data.php',{data:'check'}, function (GD) {
                                        var option="<option value=''> เลือกงาน </option>";
                                    for (var key in GD) {
                                        //if(GD[key].dep_id==data.dep_id){var select='selected';}else{var select='';}
                                              option += "$('<option value='"+GD[key].dep_id+"'> "+GD[key].name+" </option>'),";
                                        }
                                        $("select#res_dep").empty().append(option);
                                        $(".select2").select2();
                                });
                                modal.find('input#takerisk_id').val(recipient)
                                modal.find('input#method').val('forward_risk')
                                
                                $("button#submforward").click(function(e) {
                                    if($("#res_dep").val()==''){
                                            alert("กรุณาเลือกงานด้วยครับ!!!");
                                            $("#res_dep").focus();
                                            e.preventDefault();
                                        }else{
                                        e.preventDefault();
                                        modal.modal('hide');
        				$.ajax({
					   type: "POST",
					   url: "process/prcwriterisk.php",
                                           data: $("#frmforward").serialize(),
					   success: function(result) {
                                               alert(result);
                                                $("#index_content").empty().load('content/check_risk.html');
					   }
					 });
                                     }
        });
});
}