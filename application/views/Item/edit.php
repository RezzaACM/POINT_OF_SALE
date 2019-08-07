
<form action="<?php echo base_url('item/edit_act')?>" method="post">
<div class="col-md-12">
    <div class="form-group">
        <div class="row">
            <label for="id_item" class="control-label col-md-3">ID ITEM</label>
            <div class="col-md-9">
                <input type="text" name="id_item" id="id_item" class="form-control id_item" placeholder="Masukkan ID Menu" value="<?php echo $itemId[0]->id_item ?>" required autofocus>
                <span id="cek_nip"></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <label for="nama" class="control-label col-md-3">Nama Item</label>
            <div class="col-md-9">
                <input type="text" name="nama_item" id="nama" class="form-control" placeholder="Masukan Nama Item" value="<?php echo $itemId[0]->nama_item ?>" required>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <label for="jenis" class="control-label col-md-3">Jenis Item</label>
            <div class="col-md-9">
                <input type="text" value="<?php echo $itemId[0]->jenis_item ?>" class="form-control" id="jenis" name="jenis_item" placeholder="Masukan Tempat Lahir" >
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <label for="harga" class="control-label col-md-3">harga Item</label>
            <div class="col-md-9">
                <input type="text" value="<?php echo $itemId[0]->harga_item ?>" class="form-control" id="harga" name="harga_item" placeholder="Masukan Tempat Lahir">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <label for="deskripsi" class="control-label col-md-3">Deskripsi Item</label>
            <div class="col-md-9">
                <textarea name="deskripsi" id="deskripsi" cols="63" rows="7" ><?php echo $itemId[0]->deskripsi_item ?></textarea>
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