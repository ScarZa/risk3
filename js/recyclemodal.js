function recycleModal () {
$("#createModal").empty().append("<div class='modal' id='recycleModal' role='dialog' aria-labelledby='exampleModalLabel'>"
                                    +"<div class='modal-dialog' role='document'><div class='modal-content'><div class='modal-header'>"
                                    +"<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"
                                    +"<h4 class='modal-title' id='recycleModalLabel'>รับใบแจ้งซ่อม</h4></div><div class='modal-body' id='modalrecycle'><span id='recycle_detail'></span></div>"
                                    +"<div class='modal-footer'><button type='button' class='btn btn-danger' data-dismiss='modal'>ปิด</button><button type='button' class='btn btn-success' id='submrecycle'>ส่งไปถังขยะ</button></div></div></div></div>");
    $('#recycleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var recipient = button.data('whatever')
  var modal = $(this)
  modal.find('.modal-title').text('ส่งความเสี่ยง : ลำดับที่ ' + recipient+' ไปถังขยะ');
  
        $('div#modalrecycle').append("<form name='frmrecycle' id='frmrecycle'></form>");
                $('#frmrecycle').empty().append($("<div class='form-group'><input type='text' name='detail_recycle' id='detail_recycle' class='form-control' placeholder='ระบุสาเหตุการย้ายลงถังขยะ'></div>")
                                    ,$("<input type='hidden' class='form-control' id='takerisk_id' name='takerisk_id'>")
                                    ,$("<input type='hidden' class='form-control' id='method' name='method'>"));

                                modal.find('input#takerisk_id').val(recipient)
                                modal.find('input#method').val('recycle')
                                
                                $("button#submrecycle").click(function(e) {
                                        e.preventDefault();
                                        modal.modal('hide');
        				$.ajax({
					   type: "POST",
					   url: "process/prcwriterisk.php",
                                           data: $("#frmrecycle").serialize(),
					   success: function(result) {
                                               alert(result);
                                                $("#index_content").empty().load('content/check_risk.html');
					   }
					 });
        });
});
}