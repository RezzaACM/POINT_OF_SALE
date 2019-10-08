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
        $this->printPDF($diskon,$total,$id_payment);
        redirect('transaction');
        // var_dump($customer,$menu);
    }
    public function printPDF($diskon,$total,$id_payment){
        // require_once __DIR__ . '/vendor/autoload.php';
        $data['getPayment'] = $this->get_data->get_payment_id($id_payment)->result_array();
        foreach($data['getPayment'] as $row){
            $payment = $row['nama_payment'];
        }
        foreach ($this->cart->contents() as $items){
            $customer = $items['option']['customer'];
            $invoice = $items['option']['invoice'];
            $kasir = $items['option']['kasir'];
            $tanggal = $items['option']['tgl'];
            
            // $menu = $items['name'];

            // var_dump($price);
        }
        
        $html = '
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
                    <td>'. $invoice .'</td>
                </tr>
                <tr>
                    <td>Kasir</td>
                    <td colspan="5">:</td>
                    <td>'.$kasir.'</td>
                </tr>
                <tr>
                    <td>Customer</td>
                    <td colspan="5">:</td>
                    <td>'.$customer.'</td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td colspan="5">:</td>
                    <td>'. $tanggal .'</td>
                </tr>
            </table>
            <table border="1">
                <tr>
                    <td width="100px">Nama Item</td>
                    <td width="100px">Jumlah</td>
                    <td width="100px">Harga</td>
                    <td width="100px">Total</td>
                </tr>';
                foreach ($this->cart->contents() as $items){
                $html .='<tr>
                        <td>'.$items['name'].'</td>
                        <td>'.$items['qty'].'</td>
                        <td>'.$items['price'].'</td>
                        <td>'.$items['subtotal'].'</td>
                    </tr>';
                }  
            $html .='</table>
            <table>
                <tr>
                    <td>Payment</td>
                    <td>:</td>
                    <td>'.$payment.'</td>
                </tr>
                <tr>
                    <td>Subtotal</td>
                    <td>:</td>
                    <td>'.$this->cart->total().'</td>
                </tr>
                <tr>
                    <td>Diskon</td>
                    <td>:</td>
                    <td>'.$diskon.'</td>
                </tr>
                <tr>
                    <td>Grand Total</td>
                    <td>:</td>
                    <td>'.$total.'</td>
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
        $mpdf->WriteHTML($html);
        $mpdf->Output("Invoice.pdf");
        $mpdf->Output();
        $this->cart->destroy();
        redirect('transaction');

    }

    public function riwayat(){
        $data['judul'] = "Riwayat Transaksi";
        $data['getRiwayat'] = $this->get_data->riwayat_transaksi()->result_array();
        // $kasir = $data['getRiwayat'][0]['id_user'];
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

    public function cetak_laporan(){
        $data['judul'] = "Cetak Laporan Penjualan";
        $data['dari'] = $this->input->post('dari');
        $data['sampai'] = $this->input->post('sampai');
        // var_dump($data);
        $data['getReport'] = $this->get_data->get_report($data['dari'],$data['sampai'])->result_array();
        // var_dump($data);
        // $data['getReport'] = $this->cetak_laporan_act();
        // redirect('transaction/cetak_laporan');
        $this->load->view('templates/header',$data);
        $this->load->view('transaction/laporan',$data);
        $this->load->view('templates/footer');
    }
    public function generate_pdf(){
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');

        $data['getReport'] = $this->get_data->get_report($dari,$sampai)->result_array();
        $grandTotal = 0;
        foreach($data['getReport'] as $row){
            $grandTotal += $row['total_bayar'];
        }
        
        $html = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Document</title>
        </head>
        <body>
        <h1>Laporan Penjualan Dapur Sunda "Bu Yuyu"</h1>
        <p>Dari Tanggal <span><b>'. $dari .'</b></span> s/d <span><b>'. $sampai .'</b></span> </p>
        <table border="1" style="margin:auto; width:100%; " >
            <tr>
                <th>#</th>
                <th>No. Invoice</th>
                <th>Nama Customer</th>
                <th>Kasir</th>
                <th>Order Time</th>
                <th>Total</th>
            </tr>';
        $no = 1;
        foreach($data['getReport'] as $row){
            $html .='   <tr>
                            <td>'. $no++ .'</td>
                            <td>'. $row['id_invoice'] .'</td>
                            <td>'. $row['nama_customer'] .'</td>
                            <td>'. $row['nama_staff'] .'</td>
                            <td>'. $row['ts_order_date'] .'</td>
                            <td>Rp. '. number_format($row['total_bayar']) .'</td>
                        </tr>';
        }
          
            $html.='<tr>
                        <td style="text-align:center" colspan="5"><b>Grand Total</b></td>
                        <td colspan="1"><b>Rp.'. number_format($grandTotal,0,".",".") .'</b></td>
                    </tr>
                </table>
                <table style="margin:auto; width:100%; ">
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align:right">Tangerang,</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align:right">Owner Dapur Sunda "Bu Yuyu"</td>
                    </tr>
                </table>
                <table style="margin:auto; width:100%; ">
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align:right">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align:right">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align:right">&nbsp;</td>
                    </tr>
                    <tr>
                    <td colspan="4" style="text-align:right"><b><u>Santi Yulianti</u></b></td>
                </tr>
                </table>
                </body>
                </html>';
                foreach($data['getReport'] as $row){
                    $invoice = $row['id_invoice'];
                }

        $mpdf = new \Mpdf\Mpdf();
        // $pdf = new FPDF();
        $mpdf->AddPage();
        // $mpdf->AddPage();
        $mpdf->WriteHTML($html);
        $mpdf->Output("Laporan_penjualan $dari s/d $sampai .pdf", 'D');
        // $mpdf->Output();
    }
    // public function cetak_laporan_act(){
    //     $data['judul'] = "Cetak Laporan Penjualan";
    //     $dari = $this->input->post('dari');
    //     $sampai = $this->input->post('sampai');
    //     // var_dump($dari,$sampai);
    //     $data['getReport'] = $this->get_data->get_report($dari,$sampai)->result_array();
    //     // redirect('transaction/cetak_laporan');
    //     $this->load->view('templates/header',$data);
    //     $this->load->view('transaction/laporan',$data);
    //     $this->load->view('templates/footer');
    //     // return $data;
    //     // redirect('transaction/cetak_laporan');

    // }

}

/* End of file Controllername.php */


?>