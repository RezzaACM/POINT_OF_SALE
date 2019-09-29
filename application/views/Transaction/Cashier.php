<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3>Kasir Dapur Sunda Bu Yuyu</h3>
                <hr>
                <div class="col-md-6">
            <!-- form start -->
                    <form class="form-horizontal" method="post" action="<?php echo base_url('transaction/transaction_act')?>">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="invoice" class="col-sm-2 control-label">No.Invoice</label>
                                <div class="col-sm-10">
                                    <input type="text" name="invoice" readonly value="<?php echo $invoice ?>" class="form-control" id="invoice" placeholder="No.Invoice">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Item" class="col-sm-2 control-label">Nama Item</label>
                                <div class="col-sm-10">
                                    <input type="text" name="item" class="form-control" id="Item" placeholder="Nama Item">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="qty" class="col-sm-2 control-label">Quantity</label>
                                <div class="col-sm-5">
                                    <input type="number" name="qty" class="form-control" id="qty" placeholder="Quantity">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kasir" class="col-sm-2 control-label">Kasir</label>
                                <div class="col-sm-5">
                                    <input type="text" name="kasir" class="form-control" id="kasir" placeholder="Kasir">
                                </div>
                                <button class="col-sm-4 btn btn-primary"><i class="fa fa-shopping-cart"></i> Tambahkan</button>
                            </div>
                        </div>
                </div>
                <div class="col-md-6">
                    <div class="box-body">
                    <div class="form-group">
                                <label for="customer" class="col-sm-2 control-label">Customer</label>
                                <div class="col-sm-10">
                                    <input type="text" name="customer" class="form-control" id="customer" placeholder="Nama Customer">
                                </div>
                            </div>
                            <div style="margin-top:50px;" class="form-group">
                                <label for="tanggal" class="col-sm-2 control-label">Tanggal</label>
                                <div class="col-sm-10">
                                    <input type="text" name="tanggal" class="form-control" readonly="true" id="myDate" placeholder="tanggal">
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="box">
            <!-- /.box-header -->
        <div class="box-body">
            <table class="table table-bordered">
                <tr>
                    <th>#</th>
                    <th>ID Item</th>
                    <th>Nama Item</th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </table>
        </div>
    </div>
    <form action="" class="form-horizontal">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="kasir" class="col-sm-5 control-label">Sub Total</label>
                    <div class="col-sm-7">
                        <input type="text" name="kasir" class="form-control" id="kasir" placeholder="Kasir">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="payment" class="col-sm-5 control-label">Payment</label>
                    <div class="col-sm-7">
                        <select class="form-control" name="payment" id="payment">
                            <option value="">--Jenis Payment--</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="diskon" class="col-sm-5 control-label">Discount</label>
                    <div class="col-sm-7">
                        <input type="text" name="diskon" class="form-control" id="diskon" placeholder="Diskon">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="cash" class="col-sm-5 control-label">Cash</label>
                    <div class="col-sm-7">
                        <input type="text" name="cash" class="form-control" id="cash" placeholder="Cash">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <button type="reset" style="width:50%" class="btn btn-danger">Cancel</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="total" class="col-sm-5 control-label">Grand Total</label>
                    <div class="col-sm-7">
                        <input type="text" name="total" class="form-control" id="total" placeholder="Grand Total">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="kembali" class="col-sm-5 control-label">Change</label>
                    <div class="col-sm-7">
                        <input type="text" name="kembali" class="form-control" id="kembali" placeholder="Kembalian">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <button type="submit" style="width:50%" class="btn btn-success">Proses Pembayaran</button>
                </div>
            </div>
        </div>
    </form>


</section>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
<script>
    $("#myDate").datepicker({
    format: "yyyy-mm-dd",
    // read
    }).datepicker("setDate", new Date());
</script>

<!-- <div class="row">
            <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                <h3 class="box-title">Kasir Dapur Sunda "Bu Yuyu"</h3>
                </div>
                /.box-header
                <div class="box-body">
                <table class="table table-bordered">
                </table>
                </div>
                <div class="box-footer">

                </div>
            </div>
            </div>
        </div> -->