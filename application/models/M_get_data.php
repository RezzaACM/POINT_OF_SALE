<?php

class M_get_data extends CI_Model{

    //get all data items
    public function get_data_item(){
        return $this->db->query("SELECT * FROM `mt_items` JOIN mt_category ON mt_items.id_kategori=mt_category.id_kategori ORDER BY 'nama_item' ASC");

    }
    //get data by id item
    public function item_by_id($id_item){
        $sql = "SELECT * FROM mt_items JOIN mt_category ON mt_items.id_kategori=mt_items.id_kategori WHERE id_item = '$id_item' ";
        return $this->db->query($sql);
    }

    // Id generator Items
    public function test(){
        $data = $this->db->get('mt_items')->num_rows();
        if($data < 1 ){
            $new = 1;
            $new += $data;
            $char = 'MENU-';
            $date = date('dms');
            $customId = $char.$date.$new;
            return $customId;
        }else{
            $new = 2;
            $new *= $data;
            $char = 'MENU-';
            $date = date('dms');
            $customId = $char.$date.$new;
            return $customId;
        }
        
    }

    // get data categories
    function get_data_category(){
        return $this->db->get('mt_category');
    }
    //get data categories by id
    function get_data_category_id($id_kategori){
        $sql = "SELECT * FROM mt_category  WHERE id_kategori = '$id_kategori' ";
        return $this->db->query($sql);
    }

    // get data staff
    function get_data_staff(){
        return $this->db->get('mt_staff');
    }
    function get_data_staff_id($id_staff){
        $sql = " SELECT * FROM mt_staff WHERE id_staff = '$id_staff' ";
        return $this->db->query($sql);
    }
    // get data User
    function get_data_user(){
        $sql = " SELECT * FROM `users` JOIN mt_staff ON users.id_staff=mt_staff.id_staff ORDER BY username ASC ";
        
        return $this->db->query($sql);
    }
    function get_user_id($id_user)
    {
        $sql = " SELECT * FROM `users` JOIN mt_staff ON users.id_staff=mt_staff.id_staff WHERE id_user = '$id_user' ";
        return $this->db->query($sql);
    }
    function get_data_payment()
    {
        $sql = " SELECT * FROM mt_payment_methode ORDER BY nama_payment ASC ";
        return $this->db->query($sql);
    }
    function get_payment_id($id)
    {
        $sql = " SELECT * FROM mt_payment_methode WHERE id_payment = '$id' ";
        return $this->db->query($sql);
    }
	function search_blog($title){
		$this->db->like('nama_item', $title , 'both');
		$this->db->order_by('nama_item', 'ASC');
		$this->db->limit(10);
		return $this->db->get('mt_items')->result();
    }
    function riwayat_transaksi(){
        $sql = " SELECT * FROM ts_order JOIN users ON ts_order.id_user = users.id_user JOIN mt_staff ON mt_staff.id_staff=users.id_staff ORDER BY id_invoice ASC ";
        return $this->db->query($sql);
    }
    function get_detail_inv($id){
        $sql = " SELECT * FROM ts_order_detail a JOIN mt_payment_methode b ON a.id_payment=b.id_payment JOIN mt_items c ON a.id_item=c.id_item JOIN ts_order d ON a.id_invoice=d.id_invoice JOIN users e ON d.id_user=e.id_user JOIN mt_staff f ON e.id_staff=f.id_staff  WHERE a.id_invoice='$id' ";
        return $this->db->query($sql);
    }
    function get_report(){
        $sql =  "SELECT * FROM ts_order a 
        JOIN users b ON a.id_user = b.id_user 
        JOIN mt_staff c ON c.id_staff=b.id_staff 
        WHERE a.ts_order_date BETWEEN '2019-09-25' AND '2019-10-02' ";

        return $this->db->query($sql);
    }
    // adawd
}



?>