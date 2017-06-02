<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setting_model extends CI_Model
{

    public $table = 'setting';
    public $id = 'id_site';
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
        $this->db->like('id_site', $q);
        $this->db->or_like('name', $q);
        $this->db->or_like('description', $q);
        $this->db->or_like('keywords', $q);
        $this->db->or_like('favicon', $q);
        $this->db->or_like('logo', $q);
        $this->db->or_like('address', $q);
        $this->db->or_like('phone', $q);
        $this->db->or_like('email', $q);
        $this->db->or_like('facebook', $q);
        $this->db->or_like('instagram', $q);
        $this->db->or_like('twitter', $q);
        $this->db->or_like('status', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_site', $q);
        $this->db->or_like('name', $q);
        $this->db->or_like('description', $q);
        $this->db->or_like('keywords', $q);
        $this->db->or_like('favicon', $q);
        $this->db->or_like('logo', $q);
        $this->db->or_like('address', $q);
        $this->db->or_like('phone', $q);
        $this->db->or_like('email', $q);
        $this->db->or_like('facebook', $q);
        $this->db->or_like('instagram', $q);
        $this->db->or_like('twitter', $q);
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

    // update data
    function nonactive($id, $data)
    {
        $this->db->where('id_site !=', $id);
        $this->db->update($this->table, $data);
    }    

}
