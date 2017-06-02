<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model
{

    public $table = 'user';
    public $id = 'id_user';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_user', $q);
        $this->db->or_like('create_time', $q);
        $this->db->or_like('update_time', $q);
        $this->db->or_like('visit_time', $q);
        $this->db->or_like('fullname', $q);
        $this->db->or_like('gender', $q);
        $this->db->or_like('birth', $q);
        $this->db->or_like('email', $q);
        $this->db->or_like('username', $q);
        $this->db->or_like('password', $q);
        $this->db->or_like('level', $q);
        $this->db->or_like('division', $q);
        $this->db->or_like('image', $q);
        $this->db->or_like('ipaddress', $q);
        $this->db->or_like('active', $q);
        $this->db->or_like('status', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_user', $q);
        $this->db->or_like('create_time', $q);
        $this->db->or_like('update_time', $q);
        $this->db->or_like('visit_time', $q);
        $this->db->or_like('fullname', $q);
        $this->db->or_like('gender', $q);
        $this->db->or_like('birth', $q);
        $this->db->or_like('email', $q);
        $this->db->or_like('username', $q);
        $this->db->or_like('password', $q);
        $this->db->or_like('level', $q);
        $this->db->or_like('division', $q);
        $this->db->or_like('image', $q);
        $this->db->or_like('ipaddress', $q);
        $this->db->or_like('active', $q);
        $this->db->or_like('status', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function gender($data){
        if($data==1){
            return "Laki-laki";
        }else{
            return "Perempuan";
        }
    }

    function level($data){
        if($data==1){
            return "Superadmin";
        }else if($data==2){
            return "Admin";
        }else{
            return "Member";
        }
    }    

    function division($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get('division')->row();
    } 

    function active($data){
        if($data==1){
            return "Online";
        }else{
            return "Offline";
        }
    } 

    function status($data){
        if($data==1){
            return "Aktif";
        }else{
            return "Tidak Aktif";
        }
    } 

    function online($data){
        if($data==1){
            return "success";
        }else{
            return "danger";
        }
    }        

    function get_log()
    {
       $this->db->order_by('visit_time', 'ASC');
       return $this->db->get($this->table)->result();
   }           

   public function get_last_login($data)
   {
       $this->db->where('active', $data);
       $this->db->order_by('visit_time', 'ASC');
       return $this->db->get($this->table)->result();
   }    

   function get_division()
   {
        // ambil data dari db
    $this->db->order_by('name', 'asc');
    $result = $this->db->get('division');

        // bikin array
        // please select berikut ini merupakan tambahan saja agar saat pertama
        // diload akan ditampilkan text please select.
    $dd[''] = '-- Pilih Divisi --';
    if ($result->num_rows() > 0) {
        foreach ($result->result() as $row) {
            // tentukan value (sebelah kiri) dan labelnya (sebelah kanan)
            $dd[$row->id_division] = $row->name;
        }
    }
    return $dd;
}   

}
