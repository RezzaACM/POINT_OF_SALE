<div class="container-fluid">
    
    <div class="row">
        <div class="col-md-12">
            <h1>Category</h1>
            <?php if ($this->session->flashdata('flash')): ?>
            <div class="alert alert-success alert-dismissible" id="alert" role="alert">
                <p class="text-center"><strong>Success! Kategori berhasil<?php echo $this->session->flashdata('flash')?></strong></p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <?php endif; ?>
        </div>
    </div> 

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-tittle">List of Category</h3>
                    <a href="<?php echo site_url()?>kategori/tambah" class="btn btn-success" id="tambahItem"
                    >Tambah Kategori</a>
                </div>
                <div class="box-body">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Kategori</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="show">
                            <?php 
                            $no = 1;
                            foreach ($category as $row){?>
                            <tr>
                                <td><?php echo $no++?></td>
                                <td><?php echo $row['kategori'] ?></td>
                                <td>
                                    <a onclick="" href="<?php echo site_url('kategori/edit/'.$row['id_kategori'])?>" title="edit" id="editItem" class="fa fa-edit"></a> |
                                    <a href="<?php echo base_url('kategori/delete/'.$row['id_kategori'])?>" onclick="return confirm('Anda yakin menghapus data ini ?')" title="hapus" class="fa fa-trash"></a>
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
$(document).ready(function(){
        $('#myTable').DataTable();

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

});
</script>