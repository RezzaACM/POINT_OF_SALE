<style>
@media print{
    .sect *{ 
        visibility: hidden;
    }
}
</style>
<div class="container-fluid sect">
    <div class="row">
        <div class="col-md-12">
            <h2>Riwayat Transaki Penjualan</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>No.Inovice</th>
                                <th>Nama Customer</th>
                                <th>Total Bayar</th>
                                <th>Kasir</th>
                                <th>Order Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1;
                            foreach ($getRiwayat as $row){
                            ?>
                            <tr>
                                <td><?php echo $no++?></td>
                                <td><?php echo $row['id_invoice'] ?></td>
                                <td><?php echo $row['nama_customer'] ?></td>
                                <td>Rp. <?php echo number_format($row['total_bayar'],0,".",".") ?></td>
                                <td><?php echo $row['nama_staff'] ?></td>
                                <td><?php echo $row['ts_order_date']; echo " "; echo $row['ts_order_time'] ?></td>
                                <td><a title="Print" id="print" href="<?php echo base_url('transaction/riwayat_detail/'.$row['id_invoice'])?>"><i class="fa fa-print"></i></a></td>
                            </tr>
                            <?php }?>
                        </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#myTable').DataTable({
        
        });

        $(document).on('click','#print', function(e){
            e.preventDefault();

            $('.modal-dialog').removeClass('modal-sm');
            $('.modal-dialog').addClass('modal-md');
            $('#modalHeader').html('Detail Item');
            $('#modalContent').load($(this).attr('href'));
            $('#myModal').modal('show');
        });

    });
</script>
<!-- <script>
    $('#print').click(function(){
        window.print();
    });
</script> -->