<?php $kelamin = ['Laki-laki','Perempuam'];   ?>
<form action="<?php echo base_url('user/edit_act')?>" method="post" enctype="multipart/form-data">
    <div class="col-md-12">
        <div class="form-group">
            <div class="row">
                <label for="id_staff" class="control-label col-md-3">Nama Staff</label>
                <div class="col-md-9">
                    <input type="hidden" name="id_user" value="<?php echo $getUserId[0]->id_user ?>">
                    <input type="hidden" name="id_staff" value="<?php echo $getUserId[0]->id_staff ?>">
                    <input readonly type="text" class="form-control" name="" id="id_staff" value="<?php echo $getUserId[0]->nama_staff ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <div class="row">
                <label for="username" class="control-label col-md-3">Username</label>
                <div class="col-md-9">
                    <input type="text" value="<?php echo $getUserId[0]->username ?>" name="username2" id="username" class="form-control id_item" placeholder="Masukkan Username">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <div class="row">
                <label for="password" class="control-label col-md-3">Password</label>
                <div class="col-md-9">
                    <input type="hidden" name="old_password" value="<?php echo $getUserId[0]->password ?>">
                    <input value="" type="password" name="password" id="password" class="form-control id_item" placeholder="*******">
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
                        <?php if ($getUserId[0]->level_user == '1' ) {?>
                            <option selected value="1">Super User</option>
                            <option value="2">Admin</option>
                        <?php }else{?>
                            <option value="1">Super User</option>
                            <option selected value="2">Admin</option>
                        <?php }?>
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
                    <?php if($getUserId[0]->foto_user != null) {?>
                    <img width="60px" height="60px" src="<?php echo base_url('upload/user/'.$getUserId[0]->foto_user) ?>" alt="">
                    <?php }else{?>
                    <img width="60px" height="60px" src="<?php echo base_url('upload/user/avatar_default.png') ?>" alt="">                            
                    <?php }?>
                    <input type="hidden" name="old_foto" value="<?php echo $getUserId[0]->foto_user ?>">
                    <input type="file" value="" name="foto" id="foto" class="form-control id_item" placeholder="Masukkan Username">
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