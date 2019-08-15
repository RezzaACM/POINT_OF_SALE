<div class="container">
    <div class="col-md-12">
        <div class="row">
            <h1> Kasir Dapur Sunda Bu Yuyu</h1>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <form action="" method="post" enctype="">
                <div class="panel panel-primary">
                    <div class="panel-heading">Transaksi</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="usr">No. Invoice</label>
                                    <input type="text" name="invoice" value="<?php echo $invoice?>" readonly class="form-control" id="usr">
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Tanggal</label>
                                    <input disabled type="text" name="date" readonly id="myDate" class="form-control" id="pwd">
                                </div>
                                <div class="form-group">
                                    <label for="user">Kasir</label>
                                    <input readonly type="text" class="form-control" name="user" id="user" value="<?php echo $this->session->userdata('nama')?>">
                                </div>
                                <div class="form-group">
                                    <label for="pembeli">Pelanggan</label>
                                    <input required type="text" class="form-control" name="pembeli" id="pembeli" value=" ">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        
        <div class="col-md-8">
            <div class="box">
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID Menu</th>
                                <th>Nama Menu</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th>Sub Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="width:20%">
                                    <div class="form-group">
                                    <select class="form-control" name="id" id="id">
                                        <option value=""></option>
                                    </select>
                                    </div>
                                </td>
                                <td style="width:25%">
                                    <div class="form-group">
                                        <input type="text" name="nama_menu" class="form-control">
                                    </div>
                                </td>
                                <td style="width:10%">
                                    <div class="form-group">
                                        <input type="number" name="qty" class="form-control">
                                    </div>          
                                </td>
                                <td style="width:20%;">
                                    <div class="form-group">
                                        <input type="text" name="harga" class="form-control">
                                    </div>
                                </td>
                                <td style="width:30%;">
                                    <div class="form-group">
                                        <input type="text" name="subtotal" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <a href="" class="fa fa-remove"></a>
                                </td>      
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2" style="border-left:none;">
                                    <input type="button" class="btn btn-danger" id="addrow" value="Add Row">
                                </td>
                            </tr>
                        </tfoot>
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
    format: "yyyy-mm-dd"
    }).datepicker("setDate", new Date());
</script>
<script>
    $(document).ready(function(){
        var counter = 0;

        $(document).on('click','#addrow', function(e){
        e.preventDefault();

            var newRow = $('<tr>');
            var cols = '';

        cols += '<td><input type="text" class="form-control" name="name' + counter + '"/></td>';
        cols += '<td><input type="text" class="form-control" name="mail' + counter + '"/></td>';
        cols += '<td><input type="text" class="form-control" name="phone' + counter + '"/></td>';
        cols += '<td><input type="text" class="form-control" name="name' + counter + '"/></td>';
        cols += '<td><input type="text" class="form-control" name="mail' + counter + '"/></td>';

        cols += '<td><input type="text" class="form-control" name="phone' + counter + '"/></td>';

        newRow.append(cols);
        $('table.order-list').append(newRow);
        counter++;
        });
    });
</script>