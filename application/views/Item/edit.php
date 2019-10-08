
<form action="<?php echo base_url('item/edit_act')?>" method="post">
<div class="col-md-12">
    <div class="form-group">
        <div class="row">
            <!-- <input type="hidden" name="ts_input" value="<?php echo $itemId[0]->ts_create ?>"> -->
            <label for="id_item" class="control-label col-md-3">ID ITEM</label>
            <div class="col-md-9">
                <input autofocus type="text" name="id_item" id="id_item" class="form-control id_item" placeholder="Masukkan ID Menu" value="<?php echo $itemId[0]->id_item ?>" required autofocus readonly>
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
            <label for="jenis" class="control-label col-md-3">Kategori</label>
            <div class="col-md-9">
                <select class="form-control" name="kategori" id="">
                    <?php foreach($category as $row) {?>
                        <?php if($row['kategori'] == $itemId[0]->kategori){?>
                            <option selected value="<?php echo $row['id_kategori']?>"><?php echo $row['kategori']?></option>
                        <?php }else{?>
                            <option value="<?php echo $row['id_kategori']?>"><?php echo $row['kategori']?></option>
                        <?php }?>
                    <?php }?>
                </select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <label for="harga" class="control-label col-md-3">harga Item</label>
            <div class="col-md-9">
                <input type="number" value="<?php echo $itemId[0]->harga_item ?>" class="form-control" id="harga" name="harga" placeholder="Masukan Tempat Lahir">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <label for="status" class="control-label col-md-3">Status Item</label>
            <div class="col-md-9">
                <select class="form-control" name="status_item" id="status">
                    <?php if($itemId[0]->status_item > 0){?>
                        <option selected value="1">Tersedia</option>
                        <option value="0">Tidak Siap</option>
                    <?php }else{?>
                        <option selected value="0">Tidak Siap</option>
                        <option value="1">Tersedia</option>
                    <?php }?>
                </select>
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