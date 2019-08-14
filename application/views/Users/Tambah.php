<?php $kelamin = ['Laki-laki','Perempuam'];   ?>
<form action="<?php echo base_url('user/tambah_act')?>" method="post" enctype="multipart/form-data">
    <div class="col-md-12">
        <div class="form-group">
            <div class="row">
                <label for="id_staff" class="control-label col-md-3">Nama Staff</label>
                <div class="col-md-9">
                    <select class="form-control" name="id_staff" id="id_staff" required>
                        <?php foreach ($staff as $row_s): ?>
                            <option value="<?php echo $row_s['id_staff'] ?>"><?php echo $row_s['nama_staff'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <div class="row">
                <label for="username" class="control-label col-md-3">Username</label>
                <div class="col-md-9">
                    <input required type="text" name="username" id="username" class="form-control id_item" placeholder="Masukkan Username">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <div class="row">
                <label for="password" class="control-label col-md-3">Password</label>
                <div class="col-md-9">
                    <input required type="password" name="password" id="password" class="form-control id_item" placeholder="Masukkan Username">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <div class="row">
                <label for="level_user" class="control-label col-md-3">Level User</label>
                <div class="col-md-9">
                    <select required class="form-control" name="level_user" id="level_user" required>
                        <option value="1">Super User</option>
                        <option value="2">Admin</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <div class="row">
                <label for="foto" class="control-label col-md-3">Foto </label>
                <div class="col-md-9">
                    <input required type="file" name="foto" id="foto" class="form-control id_item" placeholder="Masukkan Username">
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