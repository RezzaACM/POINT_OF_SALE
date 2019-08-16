<form action="<?php echo base_url('payment/tambah_act')?>" method="post">
    <div class="col-md-12">
        <div class="form-group">
            <div class="row">
                <label for="id_item" class="control-label col-md-3">Payment</label>
                <div class="col-md-9">
                    <input required type="text" name="payment" id="kategori" class="form-control id_item" placeholder="Masukkan Kategori Baru">
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal-footer">
        <button class='btn btn-primary' id="simpanItem"></button>
    </div>

</form>
<script>
    $(document).ready(function(){
        var button = '';
        button += 'SUBMIT'
        $('#modalFooter').remove();
        $('#simpanItem').html(button);
    });
</script>