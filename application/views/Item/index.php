<div class="container-fluid">
    
    <div class="row">
        <div class="col-md-12">
            <h1>List Menu</h1>
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
                    <h3 class="box-tittle">List of Menu</h3>
                    <a href="<?php echo site_url()?>item/tambah" class="btn btn-success" id="tambahItem"
                    >Tambah Item</a>
                </div>
                <div class="box-body">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>ID ITEM</th>
                                <th>Nama Item</th>
                                <th>Kategori</th>
                                <th>Harga Item</th>
                                <th>Stock Item</th>
                                <th>Status Item</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="show">
                            <?php 
                            $no = 1;
                            foreach($getItemAll as $row){?>
                            <tr>
                                <td><?php echo $no++?></td>
                                <td><a id="detailItem" href="<?php echo site_url('item/detail/'.$row['id_item'])?>" ><?php echo $row['id_item'] ?></a></td>
                                <td><?php echo $row['nama_item'] ?></td>
                                <td><?php echo $row['kategori'] ?></td>
                                <td>Rp <?php echo number_format($row['harga_item'], 0,".",".")  ?></td>
                                <td><?php echo $row['stok_item']?></td>
                                <?php if ($row['status_item'] == 1){?>
                                    <td>Tersedia</td>
                                <?php }else{?>
                                    <td>Kosong</td>
                                <?php }?>
                                <td class="no-print" style="font-size:20px">
                                    <a onclick="" href="<?php echo site_url('item/edit/'.$row['id_item'])?>" title="edit" id="editItem" class="fa fa-edit"></a> |
                                    <a href="<?php echo base_url('item/delete/'.$row['id_item'])?>" onclick="return confirm('Anda yakin menghapus data ini ?')" title="hapus" class="fa fa-trash"></a>
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