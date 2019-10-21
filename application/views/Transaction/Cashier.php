<?php foreach ($this->cart->contents() as $rows){
    $cust = $rows['option']['customer'];
}?>
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
                                    <input type="text" name="item" class="form-control" required id="item" placeholder="Nama Item">
                                    <input type="hidden" name="price" class="form-control" id="price" placeholder="Nama Item">
                                    <input type="hidden" name="id" class="form-control" id="id" placeholder="Nama Item">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="qty" class="col-sm-2 control-label">Quantity</label>
                                <div class="col-sm-5">
                                    <input type="number" required name="qty" class="form-control" id="qty" placeholder="Quantity">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kasir" class="col-sm-2 control-label">Kasir</label>
                                <div class="col-sm-5">
                                    <input type="text" readonly name="kasir" value="<?php echo $this->session->userdata('nama')?>" class="form-control" id="kasir" placeholder="Kasir">
                                    <input type="hidden" readonly name="id_kasir" value="<?php echo $this->session->userdata('id_user')?>" class="form-control" id="kasir" placeholder="Kasir">
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
                                    <?php $cart = $this->cart->contents();
                                        if(empty($cart)){
                                    ?>
                                    <input type="text" required name="customer" value="" class="form-control" id="customer" placeholder="Nama Customer">
                                    <?php }else{?>
                                    <input type="text" name="customer" readonly value="<?php echo $cust?>" class="form-control" id="customer" placeholder="Nama Customer">
                                    <?php }?>
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
                <?php $i = 1; ?>
                <?php foreach ($this->cart->contents() as $items):    
                $subTotal = 0;
                ?>
                <tr>
                    <td><?php echo $i++?></td>
                    <td><?php echo $items['id'] ?></td>
                    <td><?php echo $items['name'] ?></td>
                    <td><?php echo $items['price'] ?></td>
                    <td><?php echo $items['qty'] ?></td>
                    <td><?php echo number_format($items['subtotal'],0,".",".") ?></td>
                    <td><a href="<?php echo base_url('transaction/delete/'.$items['rowid'])?>">Hapus</a></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    <form action="<?php echo base_url('transaction/checkout')?>" method="post" class="form-horizontal">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="kasir" class="col-sm-5 control-label">Sub Total</label>
                    <div class="col-sm-7">
                        <input type="text" name="subtotal" value="<?php echo $this->cart->total(); ?>" class="form-control" id="subtotal" placeholder="Kasir">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="payment" class="col-sm-5 control-label">Payment</label>
                    <div class="col-sm-7">
                        <select required class="form-control" name="payment" id="payment">
                            <option value="">--Jenis Payment--</option>
                            <?php foreach ($payment as $row){ ?>
                                <option value="<?php echo $row->id_payment?>"><?php echo $row->nama_payment?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="diskon" class="col-sm-5 control-label">Discount(%)</label>
                    <div class="col-sm-7">
                        <input  type="text" name="diskon" class="form-control" id="diskon" placeholder="Diskon">
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
                    <a href="<?php echo base_url('transaction/delete_all') ?>" style="width:50%" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="total" class="col-sm-5 control-label">Grand Total</label>
                    <div class="col-sm-7">
                        <input  type="text" name="total" value="<?php echo $this->cart->total(); ?>" class="form-control" id="grandTotal" placeholder="Grand Total">
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
                    <button type="submit" id="submit" formtarget="_blank" onclick="return confirm('Anda Yakin Dengan Pesanan Ini?')" style="width:50%" class="btn btn-success">Proses Pembayaran</button>
                </div>
            </div>
        </div>
    </form>


</section>
<link rel="stylesheet" href="<?php echo base_url()?>assets/manual/css/bootstrap-datepicker.css">
<script src="<?php echo base_url()?>assets/manual/js/bootstrap-datepicker.js"></script>
<script>
    $("#myDate").datepicker({
    format: "yyyy-mm-dd",
    // read
    }).datepicker("setDate", new Date());
</script>
<script src="<?php echo base_url().'assets/manual/js/jquery-3.3.1.js'?>" type="text/javascript"></script>
<script src="<?php echo base_url().'assets/manual/js/bootstrap.js'?>" type="text/javascript"></script>
<script src="<?php echo base_url().'assets/manual/js/jquery-ui.js'?>" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){

        $('#item').autocomplete({
            source: "<?php echo site_url('transaction/at_complete');?>",
    
            select: function (event, ui) {
                var desc = ui.item.description;
                console.log(desc);
                $('#item').val(ui.item.label);
                $('#id').val(ui.item.id);
                $('#price').val(desc); 
            }
        });

    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#diskon').keyup(function(){
        // <!-- Ambil nilai bayar dan diskon !-->
        var bayar=parseInt($('#subtotal').val());
        var diskon=parseInt($('#diskon').val());

        var total_bayar=bayar-(diskon/100)*bayar;
        $('#grandTotal'). val(total_bayar);
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#cash').keyup(function(){
            var cash = parseInt($('#cash').val());
            var gTotal = parseInt($('#grandTotal').val());
            // console.log(gTotal,cash);
            
            var kembalian = cash-gTotal;
            console.log(kembalian);
            
            $('#kembali').val(kembalian);
        });

        $('#submit').click(function(){
            window.location.reload();   
        },2000);
    });
</script>
<script src="<?php echo base_url('assets/manual/js/simple.money.format.js')?>"></script>
<script type="text/javascript">
    // $('#subtotal').simpleMoneyFormat();
    // $('#grandTotal').simpleMoneyFormat();
    // $('#cash').simpleMoneyFormat();
    // $('#kembali').simpleMoneyFormat();
</script>