<?php $kelamin = ['Laki-laki','Perempuam'];   ?>
<form action="<?php echo base_url('staff/tambah_act')?>" method="post">
    <div class="col-md-12">
        <div class="form-group">
            <div class="row">
                <label for="nama" class="control-label col-md-3">Nama Staff</label>
                <div class="col-md-9">
                    <input required type="text" name="nama_staff" id="nama" class="form-control id_item" placeholder="Masukkan Nama Baru">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <div class="row">
                <label for="klmn" class="control-label col-md-3">Jenis Kelamin</label>
                <div class="col-md-9">
                    <select class="form-control" name="klmn" id="klmn" required>
                        <?php foreach($kelamin as $row){  ?>
                            <option value="<?php echo $row ?>"><?php echo $row ?></option>
                        <?php }?>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <div class="row">
                <label for="Notelp" class="control-label col-md-3">No. Telpon</label>
                <div class="col-md-9">
                    <input required type="tel" name="notelp" id="Notelp" class="form-control id_item" placeholder="Masukkan No Telpon">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <div class="row">
                <label for="alamat" class="control-label col-md-3">Alamat</label>
                <div class="col-md-9">
                    <textarea class="form-control" name="alamat" id="alamat" cols="22" rows="10"></textarea>
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