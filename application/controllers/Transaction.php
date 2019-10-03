<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // include_once APPPATH . '/third_party/fpdf/fpdf.php';
        $this->load->model('m_get_data','get_data');
        $this->load->model('m_delete_data','delete_data');
        $this->load->model('m_add_data','add_data');
        $this->load->model('m_edit_data','edit_data');
        $this->load->library('cart');
        if($this->session->userdata('login') != true){
            echo '<script>alert("Anda harus login terlebih dahulu!")
            window.location = "login"
            </script>
                
            ';
        }
    }

    public function invoiceGen()
    {
        $num = $this->db->get('ts_order')->num_rows();
        // var_dump($num);
        if($num < 1){
            $new = 1;
            $new += $num;
            $char = 'DSBY-';
            $date = date('dm');
            $customId = $char.$date.'-'.$new;
            return $customId;
        }else{
            $new = 1;
            $new += $num;
            $char = 'DSBY-';
            $date = date('dm');
            $customId = $char.$date.'-'.$new;
            return $customId;
        }
    }

    public function index()
    {
        $data['invoice'] = $this->invoiceGen();
        $data['judul'] = 'Transaksi';
        $data['payment'] = $this->get_data->get_data_payment()->result();
        $this->load->view('templates/header',$data);
        $this->load->view('transaction/cashier',$data);
        $this->load->view('templates/footer');   
    }
    public function transaction_act(){
        $id = $this->input->post('id');
        $inv = $this->input->post('invoice');
        $item = $this->input->post('item');
        $qty = $this->input->post('qty');
        $kasir = $this->input->post('kasir');
        $cust = $this->input->post('customer');
        $tgl = $this->input->post('tanggal');
        $price = $this->input->post('price');

        $data = array(
            'id'        => $id,
            'qty'       => $qty,
            'price'     => $price,
            'name'      => $item,
            'option'    => array(
                'invoice'   => $inv,
                'customer'  => $cust,
                'tgl'       => $tgl,
                'kasir'     => $kasir,
                'id_kasir'  => $this->input->post('id_kasir')
            )
        );

        $this->cart->insert($data);
        echo '<script>alert("Item telah dimasukkan!")
        window.location = "../transaction"
        </script>  
        ';
        // var_dump($test);

    }

    public function delete($rowId){
        if ($rowId == 'all'){
            $this->cart->destroy();
            redirect('transaction');
        }else{
            $data = array(
                'rowid' => $rowId,
                'qty'   => 0
            );
            $this->cart->update($data);
            redirect('transaction');
        }
    }
    public function delete_all(){
        $this->cart->destroy();
        redirect('transaction');
    }

    function at_complete(){
		if (isset($_GET['term'])) {
            $result = $this->get_data->search_blog($_GET['term']);
             if (count($result) > 0) {
          foreach ($result as $row)
               $arr_result[] = array(
                  'label'			=> $row->nama_item,
                  'description'	=> $row->harga_item,
                  'id'	=> $row->id_item,
              );
               echo json_encode($arr_result);
             }
      }
    }
    
    public function checkout(){
        foreach ($this->cart->contents() as $items){
            $customer = $items['option']['customer'];
            $invoice = $items['option']['invoice'];
            $id_user = $items['option']['id_kasir'];
            
            // $menu = $items['name'];

            // var_dump($price);
        }
        $diskon = $this->input->post('diskon');
        $total = $this->input->post('total');
        $this->add_data->add_data_order($invoice,$customer,$diskon,$total,$id_user);
        foreach ($this->cart->contents() as $items){
            $invoice_dt = $items['option']['invoice'];
            $menu_dt = $items['id'];
            $jumlah = $items['qty'];
            // $subtotal = $this->input->post('subtotal');
            $id_payment = $this->input->post('payment');
            $subtotal = $items['qty']*$items['price'];
            var_dump($subtotal);
            $this->add_data->add_data_detail_order($invoice_dt,$menu_dt,$jumlah,$id_payment,$subtotal);
        }
        $this->cart->destroy();
        $this->printPDF();
        redirect('transaction');
        // var_dump($customer,$menu);
    }
    public function printPDF(){
        // require_once __DIR__ . '/vendor/autoload.php';
        $data = '
        <!DOCTYPE html>
        <html>
        <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        </head>
        <body>
        <section style="border: 1px solid black; width:60%;">
        <h1 style="text-align:center">Dapur Sunda "Bu Yuyu"</h1>
            <table>
                <tr>
                    <td>No.Invoice</td>
                    <td colspan="5">:</td>
                    <td>LOEKM-001</td>
                </tr>
                <tr>
                    <td>Kasir</td>
                    <td colspan="5">:</td>
                    <td>LOEKM-001</td>
                </tr>
                <tr>
                    <td>Customer</td>
                    <td colspan="5">:</td>
                    <td>LOEKM-001</td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td colspan="5">:</td>
                    <td>LOEKM-001</td>
                </tr>
            </table>
            <table>
                <tr>
                    <td width="100px">Nama Item</td>
                    <td width="100px">Jumlah</td>
                    <td width="100px">Harga</td>
                    <td width="100px">Total</td>
                </tr>
                <tr>
                    <td>Ayam Bakar</td>
                    <td>2</td>
                    <td>50000</td>
                    <td>100000</td>
                </tr>
            </table>
            <table>
                <tr>
                    <td>Payment</td>
                    <td>:</td>
                    <td>Cash</td>
                </tr>
                <tr>
                    <td>Subtotal</td>
                    <td>:</td>
                    <td>Rp.10.000</td>
                </tr>
                <tr>
                    <td>Diskon</td>
                    <td>:</td>
                    <td>50%</td>
                </tr>
                <tr>
                    <td>Grand Total</td>
                    <td>:</td>
                    <td>100.000</td>
                </tr>
            </table>
        </section>
        
        </body>
        </html>
        ';

        $mpdf = new \Mpdf\Mpdf();
        // $pdf = new FPDF();
        $mpdf->AddPage();
        // $mpdf->AddPage();
        $mpdf->WriteHTML($data);
        $mpdf->Output();

        redirect('transaction');
    }

    public function riwayat(){
        $data['judul'] = "Riwayat Transaksi";
        $data['getRiwayat'] = $this->get_data->riwayat_transaksi()->result_array();
        $kasir = $data['getRiwayat'][0]['id_user'];
// /        var_dump($kasir);
        // $data['kasir']= $this->get_data->get_kasir()->result_array();
        // var_dump($data2);
        $this->load->view('templates/header',$data);
        $this->load->view('transaction/riwayat',$data);
        $this->load->view('templates/footer');    
    }
    public function riwayat_detail($id){
        $data['invoiceDetail'] = $this->get_data->get_detail_inv($id)->result_array();
        // var_dump($data['invoiceDetail'][0]);
        // foreach($data['invoiceDetail'] as $row){
        //     var_dump($row['id_invoice']);
        // }
        $this->load->view('transaction/detail',$data);
    }

}

/* End of file Controllername.php */


?>