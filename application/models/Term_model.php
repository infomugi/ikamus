<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Term_model extends CI_Model
{

    public $table = 'term';
    public $id = 'id_term';
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
        $this->db->like('id_term', $q);
        $this->db->or_like('name', $q);
        $this->db->or_like('description', $q);
        $this->db->or_like('status', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_term', $q);
        $this->db->or_like('name', $q);
        $this->db->or_like('description', $q);
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

    public function listAll() {
        $query = $this->db->query("SELECT * FROM term GROUP BY name ORDER BY name ASC");
        return   $query->result(); 
    }  

    public function listCriteria($limit, $start) {
        $query = $this->db->query("SELECT * from term ORDER BY name ASC LIMIT '$limit','$start'");
        return   $query->result(); 
    }    

    public function json($data){
        return json_encode($data);
    }   
    
    // get data with limit and search
    // public function search($limit, $start = 0, $word = NULL) {
    public function search($word = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->or_like('name', $word);
        $this->db->or_like('description', $word);
        // $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }    

}
