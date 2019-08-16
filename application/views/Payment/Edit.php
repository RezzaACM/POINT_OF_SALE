<form action="<?php echo base_url('payment/edit_act')?>" method="post">
    <div class="col-md-12">
        <div class="form-group">
            <div class="row">
                <label for="id_item" class="control-label col-md-3">Payment</label>
                <div class="col-md-9">
                    <input required type="hidden" value="<?php echo $payId[0]->id_payment ?>" name="id" id="kategori" class="form-control id_item" placeholder="Masukkan Kategori Baru">
                    <input required type="text" value="<?php echo $payId[0]->nama_payment ?>" name="payment" id="kategori" class="form-control id_item" placeholder="Masukkan Kategori Baru">
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal-footer">
        <button class='btn btn-danger' data-dismiss='modal' id="cancel"></button>
        <button class='btn btn-primary' id="simpanItem"></button> 
    </div>

</form>

<script>
    $(document).ready(function(){
        var button = '';
        var cancel = '';
        button += 'SUBMIT'
        cancel += 'CANCEL'
        $('#modalFooter').remove();
        $('#simpanItem').html(button);
        $('#cancel').html(cancel);
    });
</script>