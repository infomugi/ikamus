<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Term_model');
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->library('parser');       
        if ($this->session->userdata('logged')<>1) {
            redirect(site_url('auth'));
        }    
        $data = array(
            'pageTitle' => 'Api Documentation', 
            );

        $this->load->view('theme/tpl_header',$data);
        $this->parser->parse('site/api', $data);      
        $this->load->view('theme/tpl_footer');      
    }    

    public function listTerm()
    {
    header('Content-Type: application/json');
    
    //Limit
    // $start = $_POST['start'];
    // $limit = $_POST['limit'];
       
    // $data = $this->Term_model->listCriteria($limit,$start);

      //All
      $data = $this->Term_model->listAll();
      $response = array(
          'status' => "success",
          'message' => "Data retrieved successfully.",          
          "data" => $data,
          );
      echo $this->Term_model->json($response);
  } 

  public function getById($id) 
  {
      header('Content-Type: application/json');
    $row = $this->Term_model->get_by_id($id);
    if ($row) {

        $data = array(
          'id_term' => $row->id_term,
          'name' => $row->name,
          'description' => strip_tags($row->description),
          'status' => $this->User_model->status($row->status),
          );


        $response = array(
          'status' => "success",
          'message' => "Data retrieved successfully.",          
          "data" => $data,
          );

        echo $this->Term_model->json($response);

    } else {

     $message["status"] = "failed";
     $message["message"] = "Data not Found.";
     echo $this->Term_model->json($message);
 }
}  

  public function searchTerm($word) 
  {
      header('Content-Type: application/json');
    // $start =$_POST['$start'];
    // $limit =$_POST['limit'];
    // $word =$_POST['word'];
    
    // $row = $this->Term_model->search($limit, $start,$word);
    $data = $this->Term_model->search($word);
    
    if ($data) {

        $response = array(
          'status' => "success",
          'message' => "Data retrieved successfully.",          
          "data" => $data,
          );

        echo $this->Term_model->json($response);

    } else {

     $message["status"] = "failed";
     $message["message"] = "Data not Found.";
     echo $this->Term_model->json($message);
 }
} 


}

