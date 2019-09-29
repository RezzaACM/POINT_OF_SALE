<form action="<?php echo base_url('item/tambah_act')?>" method="post">
<div class="col-md-12">
    <div class="form-group">
        <div class="row">
            <label for="id_item" class="control-label col-md-3">ID ITEM</label>
            <div class="col-md-9">
                <input autofocus type="text" name="id_item" id="id_item" class="form-control id_item" placeholder="Masukkan ID Menu" readonly value="<?php echo $generateId?>">
                <span id="cek_nip"></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <label for="nama" class="control-label col-md-3">Nama Item</label>
            <div class="col-md-9">
                <input type="text" name="nama_item" id="nama" class="form-control" placeholder="Masukan Nama Item" required>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <label for="jenis" class="control-label col-md-3">Jenis Item</label>
            <div class="col-md-9">
                <select class="form-control" name="kategori" id="" required>
                    <option value="">-- Kategori --</option>
                    <?php foreach($category as $cat){ ?>
                        <option value="<?php echo $cat['id_kategori']?>"><?php echo $cat['kategori']?></option>
                    <?php }?>
                </select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <label for="harga" class="control-label col-md-3">Harga Item</label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="harga" name="harga_item" placeholder="Masukan Harga Jual" required>
            </div>
        </div>
    </div>
                <input type="hidden" class="form-control" id="stok" name="stok" placeholder="Masukan Jumlah Stok" >
    <div class="form-group">
        <div class="row">
            <label for="deskripsi" class="control-label col-md-3">Deskripsi Item</label>
            <div class="col-md-9">
                <textarea name="deskripsi" id="deskripsi" cols="63" rows="7" ></textarea>
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