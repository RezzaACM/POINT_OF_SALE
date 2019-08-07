<div class="container-fluid">
    
    <div class="row">
        <div class="col-md-12">
            <h1>List Menu</h1>
        </div>
    </div> 

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h5 class="box-tittle">List of Menu</h5>
                </div>
                <div class="box-body">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID ITEM</th>
                                <th>Nam Item</th>
                                <th>Jenis Item</th>
                                <th>Harga Item</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="show">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    $(document).ready(function (){
        // show_data();
        $('#myTable').DataTable({
            'processing' : true,
            'serverSide' : true,
            "autoWidth": false,
            'order'      : [],
            'ajax'       : {
                'type'    : 'POST',
                'url'     : '<?php echo base_url('item/get_item')?>'
            },
            "columns": [
                        {"data": "id_item"},
                        {"data": "nama_item"},
                        {"data": "jenis_item"},
                        {"data": "harga_item"},
                        { "render": function ( data, type, row ) {  // Tampilkan jenis kelamin
                        var html = ""
                        if(row.status_item == 1){ // Jika jenis kelaminnya 1
                            html = 'Tersedia' // Set laki-laki
              }else{ // Jika bukan 1
                            html = 'Tidak Tersedia' // Set perempuan
                        }
                        return html; // Tampilkan jenis kelaminnya
                    }
                },
                        {"data": "action"}
                        // {"data": "item",width:100},
                    ],
        });
    });
</script>