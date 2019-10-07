<style>
@media print{
    .btn { 
        visibility: hidden;
    }
    footer{
        visibility: hidden;
    }

}
</style>

<section style="width:50%;">
<?php
$subtotal = 0;
foreach($invoiceDetail as $row){
    // var_dump($row['id_invoice']);
    $invoice = $row['id_invoice'];
    $payment = $row['nama_payment'];
    $grandTotal = $row['total_bayar'];
    $diskon = $row['diskon'];
    $kasir = $row['nama_staff'];
    $customer = $row['nama_customer'];
    $date = $row['ts_order_date'];
    $time = $row['ts_order_time'];
    $subtotal += $row['subtotal'];

    // var_dump($subtotal);
} ?>
<h1 style="font-size:23px; text-align:center">Dapur Sunda "Bu Yuyu"</h1>
<table>
                <tr>
                    <td>No.Invoice</td>
                    <td colspan="5">:</td>
                    <td><?php echo $invoice?></td>
                </tr>
                <tr>
                    <td>Kasir</td>
                    <td colspan="5">:</td>
                    <td><?php echo $kasir?></td>
                </tr>
                <tr>
                    <td>Customer</td>
                    <td colspan="5">:</td>
                    <td><?php echo $customer?></td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td colspan="5">:</td>
                    <td><?php echo $date; echo " "; echo $time;?></td>
                </tr>
            </table>
            <table border="1" style="margin-top:10px; border:1px solid black; text-align:center;">
                <tr style="border:1px solid black;">
                    <td width="100px">Nama Item</td>
                    <td width="100px">Jumlah</td>
                    <td width="100px">Harga</td>
                    <td width="100px">Total</td>
                </tr>
                <?php foreach($invoiceDetail as $row){ 
                    
                    // var_dump($row);
                    
                ?>
                <tr>
                    <td><?php echo $row['nama_item'] ?></td>
                    <td><?php echo $row['jumlah_order'] ?></td>
                    <td><?php echo $row['harga_item'] ?></td>
                    <td><?php echo $row['subtotal'] ?></td>
                </tr>
                <?php }?>
            </table>
            <table style="margin-top:10px;">
                <tr>
                    <td>Payment</td>
                    <td>:</td>
                    <td><?php echo $payment?></td>
                </tr>
                <tr>
                    <td>Subtotal</td>
                    <td>:</td>
                    <td>Rp. <?php echo number_format($subtotal,0,".",".")?></td>
                </tr>
                <tr>
                    <td>Diskon</td>
                    <td>:</td>
                    <td><?php echo $diskon?>%</td>
                </tr>
                <tr>
                    <td>Grand Total</td>
                    <td>:</td>
                    <td>Rp. <?php echo number_format($grandTotal,0,".",".")?></td>
                </tr>
                
            </table>


<div class="modal-footer">
        <!-- <button class='btn btn-danger' data-dismiss='modal' id="cancel"></button> -->
        <button class='btn btn-primary' id="simpanItem"></button> 
    </div>

</section>

<!-- </form> -->

<script>
    $(document).ready(function(){
        var button = '';
        var cancel = '';
        button += 'Print'
        cancel += 'CANCEL'
        $('#modalFooter').remove();
        $('#simpanItem').html(button);
        $('#cancel').html(cancel);
    });
</script>
<script>
    $(document).ready(function(){
        $(document).on('click','#simpanItem',function(e){
            e.preventDefault();
            window.print();
        });
    });
</script>