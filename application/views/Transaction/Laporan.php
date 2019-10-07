<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h2>Cetak Laporan Penjualan</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <form class="form-group" action="<?php echo base_url('transaction/cetak_laporan') ?>" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row">
                                    <label for="dari" class="control-label col-md-2" style="padding-top:5px;">Dari</label>
                                    <div class="col-md-9">
                                        <input  required autocomplete="off" type="text" class="form-control" name="dari" id="myDate" placeholder="YYYY-MM-DD">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <label for="sampai" class="contorl-label col-md-2" style="padding-top:5px;">Sampai</label>
                                    <div class="col-md-9">
                                        <input required autocomplete="off" type="text" class="form-control" name="sampai" id="myDateSampai" placeholder="YYYY-MM-DD">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary">Cari <i class="fa fa-search"></i> </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>#</th>
                            <th>No. Invoice</th>
                            <th>Nama Customer</th>
                            <th>Order Time</th>
                            <th>Kasir</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                        <?php 
                        $no = 1;
                        if($getReport == null){?>
                        <tr style="text-align:center">
                            <td colspan="7">Tidak ada data yang dicari</td>
                        </tr>
                        <?php }?>
                        <?php
                        $grandTotal = 0; 
                        foreach ($getReport as $row){
                            $grandTotal += $row['total_bayar'];

                            // var_dump($row);
                        ?>
                        <tr>
                            <tr>
                                <td><?php echo $no++?></td>
                                <td><?php echo $row['id_invoice'] ?></td>
                                <td><?php echo $row['nama_customer'] ?></td>
                                <td><?php echo $row['nama_staff'] ?></td>
                                <td><?php echo $row['ts_order_date']; echo " "; echo $row['ts_order_time'] ?></td>
                                <td>Rp. <?php echo number_format($row['total_bayar'],0,".",".") ?></td>
                                <td><a title="Print" id="print" href="<?php echo base_url('transaction/riwayat_detail/'.$row['id_invoice'])?>"><i class="fa fa-print"></i></a></td>
                            </tr>
                        </tr>
                        <?php }?>
                        <tr>
                            <td style="text-align:center" colspan="5"><b>Grand Total</b></td>
                            <td colspan=""><b>Rp. <?php echo number_format($grandTotal,0,".",".")?></b></td>
                            <td>
                                <form action="<?php echo base_url('transaction/generate_pdf') ?>" method="post">
                                    <input type="hidden" name="dari" value="<?php echo $dari ?>">
                                    <input type="hidden" name="sampai" value="<?php echo $sampai ?>">
                                    <?php if($getReport != null){?>
                                    <button class="btn btn-primary">Generate PDF</button>
                                    <?php }?>
                                </form>
                            </td>
                                
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
<script>
    $("#myDate").datepicker({
    format: "yyyy-mm-dd",
    // read
    });
    $("#myDateSampai").datepicker({
    format: "yyyy-mm-dd",
    // read
    });
</script>