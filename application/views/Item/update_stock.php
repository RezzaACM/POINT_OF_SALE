<form action="<?php echo base_url('item/update_stock_act/'.$itemId[0]->id_item)?>" method="post">
<div class="col-md-12">
    <div class="form-group">
        <div class="row">
            <label for="nama" class="control-label col-md-3">Nama Item</label>
            <div class="col-md-9">
                <input type="hidden" name="id" value="<?php echo $itemId[0]->id_item ?>">
                <input type="text" readonly name="nama_item" id="nama" value="<?php echo $itemId[0]->nama_item ?>" class="form-control" placeholder="Masukan Nama Item" >
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <label for="stok" class="control-label col-md-3">Input Stok</label>
            <div class="col-md-9">
                <input type="number" class="form-control" id="stok" name="stok" placeholder="Masukan Jumlah Stok" required>
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