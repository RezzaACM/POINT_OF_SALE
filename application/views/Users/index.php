<div class="container-fluid">
    
    <div class="row">
        <div class="col-md-12">
            <h1>List User</h1>
            <?php if ($this->session->flashdata('flash')): ?>
            <div class="alert alert-success alert-dismissible" id="alert" role="alert">
                <p class="text-center"><strong>Success! Item berhasil<?php echo $this->session->flashdata('flash')?></strong></p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <?php endif; ?>
        </div>
    </div> 

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-tittle">List User</h3>
                    <a href="<?php echo site_url()?>user/tambah" class="btn btn-success" id="tambahItem"
                    >Tambah User</a>
                </div>
                <div class="box-body">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Staff</th>
                                <th>Username</th>
                                <th>Level User</th>
                                <th>Foto User</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="show">
                            <?php
                            $no = 1;
                            foreach($users as $row){?>
                            <tr>
                                <td><?php echo $no++?></td>
                                <td><?php echo $row->nama_staff?></td>
                                <td><?php echo $row->username?></td>
                                <?php if($row->level_user == 1) {?>
                                    <td>Super User</td>
                                <?php }else{?>
                                    <td>Admin</td>
                                <?php }?>
                                <?php if($row->foto_user != null){ ?>
                                    <td><img class="image-circle" width="60px" height="60px" src="<?php echo base_url('upload/user/'.$row->foto_user)?>" alt=""></td>
                                <?php }else { ?>
                                    <td><img src="" alt="photo_user"></td>
                                <?php   }?>
                                <td>
                                <a onclick="" href="<?php echo site_url('user/edit/'.$row->id_user)?>" title="edit" id="editItem" class="fa fa-edit"></a> |
                                <a href="<?php echo base_url('user/delete/'.$row->id_user)?>" onclick="return confirm('Anda yakin menghapus data ini ?')" title="hapus" class="fa fa-trash"></a>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
$(document).ready( function () {
    $('#myTable').DataTable({
        
    });

    $(document).on('click','#tambahItem', function(e){
        e.preventDefault();

        $('.modal-dialog').removeClass('modal-sm');
        $('.modal-dialog').addClass('modal-md');
		$('#modalHeader').html('Tambah Data Item');
        $('#modalContent').load($(this).attr('href'));
        $('#myModal').modal('show');
    });

    $('#alert').fadeTo(1500, 500).slideUp(500, function(){
        $('#alert').slideUp(500);
    });

    $(document).on('click','#editItem', function(e){
        e.preventDefault();

        $('.modal-dialog').removeClass('modal-sm');
        $('.modal-dialog').addClass('modal-md');
		$('#modalHeader').html('Edit Data Item');
        $('#modalContent').load($(this).attr('href'));
        $('#myModal').modal('show');
    });

    $(document).on('click','#detailItem', function(e){
        e.preventDefault();

        $('.modal-dialog').removeClass('modal-sm');
        $('.modal-dialog').addClass('modal-md');
		$('#modalHeader').html('Detail Item');
        $('#modalContent').load($(this).attr('href'));
        $('#myModal').modal('show');
    });
});

</script>