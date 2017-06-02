<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class User extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('logged')<>1) {
      redirect(site_url('auth'));
    }        
    $this->load->model('User_model');
    $this->load->library('form_validation');
    $this->load->helper('form_helper');    
  }

  public function index()
  {
    $q = urldecode($this->input->get('q', TRUE));
    $start = intval($this->input->get('start'));

    if ($q <> '') {
      $config['base_url'] = base_url() . 'user/index.html?q=' . urlencode($q);
      $config['first_url'] = base_url() . 'user/index.html?q=' . urlencode($q);
    } else {
      $config['base_url'] = base_url() . 'user/index.html';
      $config['first_url'] = base_url() . 'user/index.html';
    }

    $config['per_page'] = 10;
    $config['page_query_string'] = TRUE;
    $config['total_rows'] = $this->User_model->total_rows($q);
    $user = $this->User_model->get_limit_data($config['per_page'], $start, $q);

    $this->load->library('pagination');
    $this->pagination->initialize($config);

    $data = array(
      'user_data' => $user,
      'q' => $q,
      'pagination' => $this->pagination->create_links(),
      'total_rows' => $config['total_rows'],
      'start' => $start,
      'pageTitle' => 'Manage User',
      'action' => site_url('user/access_action'),
      );
    $this->load->view('theme/tpl_header',$data);
    $this->load->view('user/user_list', $data);
    $this->load->view('theme/tpl_footer');          
  }

  public function read($id) 
  {
    $row = $this->User_model->get_by_id($id);
    if ($row) {
      $data = array(
        'id_user' => $row->id_user,
        'create_time' => $row->create_time,
        'update_time' => $row->update_time,
        'visit_time' => $row->visit_time,
        'fullname' => $row->fullname,
        'gender' => $this->User_model->gender($row->gender),
        'birth' => $row->birth,
        'email' => $row->email,
        'username' => $row->username,
        'password' => $row->password,
        'level' => $this->User_model->level($row->level),
        'division' => $row->division,
        'image' => $row->image,
        'ipaddress' => $row->ipaddress,
        'active' => $this->User_model->active($row->active),
        'status' => $this->User_model->status($row->status),
        );
      $data['pageTitle'] = 'Detail';
      $this->load->view('theme/tpl_header_full',$data);
      $this->load->view('user/user_read', $data);
      $this->load->view('theme/tpl_footer');            
    } else {
      $this->session->set_flashdata('message', 'Record Not Found');
      redirect(site_url('user'));
    }
  }

  public function create() 
  {
    $data = array(
      'pageTitle' => 'Add User',
      'button' => 'Submit',
      'action' => site_url('user/create_action'),
      'id_user' => set_value('id_user'),
      'create_time' => set_value('create_time'),
      'update_time' => set_value('update_time'),
      'visit_time' => set_value('visit_time'),
      'fullname' => set_value('fullname'),
      'gender' => set_value('gender'),
      'birth' => set_value('birth'),
      'email' => set_value('email'),
      'username' => set_value('username'),
      'password' => set_value('password'),
      'level' => set_value('level'),
      'division' => set_value('division'),
      'image' => set_value('image'),
      'ipaddress' => set_value('ipaddress'),
      'active' => set_value('active'),
      'status' => set_value('status'),
      );
    $this->load->view('theme/tpl_header',$data);
    $this->load->view('user/user_form', $data);
    $this->load->view('theme/tpl_footer');          
  }

  public function create_action() 
  {
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
      $this->create();
    } else {
      $data = array(
        'create_time' => $this->input->post('create_time',TRUE),
        'update_time' => $this->input->post('update_time',TRUE),
        'visit_time' => $this->input->post('visit_time',TRUE),
        'fullname' => $this->input->post('fullname',TRUE),
        'gender' => $this->input->post('gender',TRUE),
        'birth' => $this->input->post('birth',TRUE),
        'email' => $this->input->post('email',TRUE),
        'username' => $this->input->post('username',TRUE),
        'password' => $this->input->post('password',TRUE),
        'level' => $this->input->post('level',TRUE),
        'division' => $this->input->post('division',TRUE),
        'image' => $this->input->post('image',TRUE),
        'ipaddress' => $this->input->post('ipaddress',TRUE),
        'active' => $this->input->post('active',TRUE),
        'status' => $this->input->post('status',TRUE),
        );

      $this->User_model->insert($data);
      $this->session->set_flashdata('message', 'Create Record Success');
      redirect(site_url('user'));
    }
  }

  public function update($id) 
  {
    $row = $this->User_model->get_by_id($id);

    if ($row) {
      $data = array(
        'pageTitle' => 'Edit User',
        'button' => 'Update',
        'action' => site_url('user/update_action'),
        'id_user' => set_value('id_user', $row->id_user),
        'create_time' => set_value('create_time', $row->create_time),
        'update_time' => set_value('update_time', $row->update_time),
        'visit_time' => set_value('visit_time', $row->visit_time),
        'fullname' => set_value('fullname', $row->fullname),
        'gender' => set_value('gender', $row->gender),
        'birth' => set_value('birth', $row->birth),
        'email' => set_value('email', $row->email),
        'username' => set_value('username', $row->username),
        'level' => set_value('level', $row->level),
        'division' => set_value('division', $row->division),
        'image' => set_value('image', $row->image),
        'ipaddress' => set_value('ipaddress', $row->ipaddress),
        'active' => set_value('active', $row->active),
        'status' => set_value('status', $row->status),
        // untuk edit ganti '' menjadi data dari database misalnya $row->provinsi
        'get_division' => $this->User_model->get_division(),
        'division' => $this->input->post('division') ? $this->input->post('division') : '',          
        );

      $this->load->view('theme/tpl_header',$data);
      $this->load->view('user/user_form_update', $data);
      $this->load->view('theme/tpl_footer');  
    } else {
      $this->session->set_flashdata('message', 'Record Not Found');
      redirect(site_url('user'));
    }
  }

  public function update_action() 
  {
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
      $this->update($this->input->post('id_user', TRUE));
    } else {
      $data = array(
        'create_time' => $this->input->post('create_time',TRUE),
        'update_time' => date('Y-m-d h:i:s'),
        'visit_time' => $this->input->post('visit_time',TRUE),
        'fullname' => $this->input->post('fullname',TRUE),
        'gender' => $this->input->post('gender',TRUE),
        'birth' => $this->input->post('birth',TRUE),
        'email' => $this->input->post('email',TRUE),
        'username' => $this->input->post('username',TRUE),
        'level' => $this->input->post('level',TRUE),
        'division' => $this->input->post('division',TRUE),
        'image' => $this->input->post('image',TRUE),
        'ipaddress' => $this->input->post('ipaddress',TRUE),
        'active' => $this->input->post('active',TRUE),
        'status' => $this->input->post('status',TRUE),
        // untuk edit ganti '' menjadi data dari database misalnya $row->provinsi
        'get_division' => $this->User_model->get_division(),
        'division' => $this->input->post('division') ? $this->input->post('division') : '',          
        );

      $this->User_model->update($this->input->post('id_user', TRUE), $data);
      $this->session->set_flashdata('message', 'Update Record Success');
      redirect(site_url('user'));
    }
  }

  public function delete($id) 
  {
    $row = $this->User_model->get_by_id($id);

    if ($row) {
      $this->User_model->delete($id);
      $this->session->set_flashdata('message', 'Delete Record Success');
      redirect(site_url('user'));
    } else {
      $this->session->set_flashdata('message', 'Record Not Found');
      redirect(site_url('user'));
    }
  }

  public function _rules() 
  {
   // $this->form_validation->set_rules('create_time', 'create time', 'trim|required');
   $this->form_validation->set_rules('update_time', 'update time', 'trim|required');
   $this->form_validation->set_rules('visit_time', 'visit time', 'trim|required');
   $this->form_validation->set_rules('fullname', 'fullname', 'trim|required');
   $this->form_validation->set_rules('gender', 'gender', 'trim|required');
   $this->form_validation->set_rules('birth', 'birth', 'trim|required');
   $this->form_validation->set_rules('email', 'email', 'trim|required');
   $this->form_validation->set_rules('username', 'username', 'trim|required');
   $this->form_validation->set_rules('level', 'level', 'trim|required');
   $this->form_validation->set_rules('division', 'division', 'trim|required');
   $this->form_validation->set_rules('image', 'image', 'trim|required');
   // $this->form_validation->set_rules('ipaddress', 'ipaddress', 'trim|required');
   $this->form_validation->set_rules('active', 'active', 'trim|required');
   $this->form_validation->set_rules('status', 'status', 'trim|required');

   $this->form_validation->set_rules('id_user', 'id_user', 'trim');
   $this->form_validation->set_error_delimiters('<span class="label label-danger">', '</span>');
 }


 public function setting() 
 {
  $row = $this->User_model->get_by_id($this->session->userdata('id'));

  if ($row) {
    $data = array(
      'pageTitle' => 'Edit Profile - '.$row->fullname,
      'button' => 'Edit Profile',
      'action' => site_url('user/update_action'),
      'id_user' => set_value('id_user', $row->id_user),
      'create_time' => set_value('create_time', $row->create_time),
      'update_time' => set_value('update_time', $row->update_time),
      'visit_time' => set_value('visit_time', $row->visit_time),
      'fullname' => set_value('fullname', $row->fullname),
      'gender' => set_value('gender', $row->gender),
      'birth' => set_value('birth', $row->birth),
      'email' => set_value('email', $row->email),
      'username' => set_value('username', $row->username),
      'password' => set_value('password', $row->password),
      'level' => set_value('level', $row->level),
      // 'division' => set_value('division', $row->division),
      'image' => set_value('image', $row->image),
      'ipaddress' => set_value('ipaddress', $row->ipaddress),
      'active' => set_value('active', $row->active),
      'status' => set_value('status', $row->status),
      // untuk edit ganti '' menjadi data dari database misalnya $row->provinsi
      'get_division' => $this->User_model->get_division(),
      'division' => $this->input->post('division') ? $this->input->post('division') : '', 
      );

    $this->load->view('theme/tpl_header',$data);
    $this->load->view('user/user_form_setting', $data);
    $this->load->view('theme/tpl_footer');  
  } else {
    $this->session->set_flashdata('message', 'Record Not Found');
    redirect(site_url('user'));
  }
}

public function password() 
{
  $row = $this->User_model->get_by_id($this->session->userdata('id'));

  if ($row) {
    $data = array(
      'pageTitle' => 'Edit Password',
      'button' => 'Edit Password',
      'action' => site_url('user/password_action'),
      'id_user' => set_value('id_user', $row->id_user),
      'password' => set_value('password', $row->password),     
      );

    $this->load->view('theme/tpl_header',$data);
    $this->load->view('user/user_form_password', $data);
    $this->load->view('theme/tpl_footer');  
  } else {
    $this->session->set_flashdata('message', 'Record Not Found');
    redirect(site_url('user/password'));
  }
}

public function password_action() 
{
  $this->_rules_password();

  if ($this->form_validation->run() == FALSE) {
    $this->update($this->input->post('id_user', TRUE));
  } else {
    $data = array(
      'password' => md5($this->input->post('password',TRUE)),
      );

    $this->User_model->update($this->input->post('id_user', TRUE), $data);
    $this->session->set_flashdata('message', 'Update Record Success');
    redirect(site_url('user/password'));
  }
}

public function _rules_password() 
{
 $this->form_validation->set_rules('password', 'password', 'trim|required');

 $this->form_validation->set_rules('id_user', 'id_user', 'trim');
 $this->form_validation->set_error_delimiters('<span class="label label-danger">', '</span>');
}

public function avatar() 
{
  $row = $this->User_model->get_by_id($this->session->userdata('id'));

  if ($row) {
    $data = array(
      'pageTitle' => 'Edit Avatar',
      'button' => 'Edit Avatar',
      'action' => site_url('user/avatar_action'),
      'id_user' => set_value('id_user', $row->id_user),
      'image' => set_value('image', $row->image),
      );

    $this->load->view('theme/tpl_header',$data);
    $this->load->view('user/user_form_avatar', $data);
    $this->load->view('theme/tpl_footer');  

  } else {

    $this->session->set_flashdata('message', 'Record Not Found');
    redirect(site_url('user/avatar'));

  }
}

function avatar_action()  
{  
 if(isset($_FILES["image"]["name"]))  
 {  
  $config['upload_path'] = './assets/uploads/avatar/big/'; 
  $config['allowed_types'] = 'jpg|jpeg|png|gif';  
  $config['max_size'] = '262144';

  $new_name = $this->session->userdata('username');
  $config['file_name'] = $new_name;   
  $this->load->library('upload', $config);  
  $this->upload->overwrite = true;

  if(!$this->upload->do_upload('image'))  
  {  
   echo $this->upload->display_errors();  
 }  
 else  
 {  
   $data = $this->upload->data();  

   $config['image_library'] = 'gd2';  
   $config['source_image'] = './assets/uploads/avatar/big/'.$data["file_name"];  
   $config['create_thumb'] = FALSE;  
   $config['maintain_ratio'] = FALSE;  
   $config['quality'] = '40%';  
   $config['width'] = 200;  
   $config['height'] = 200;  
   $config['new_image'] = './assets/uploads/avatar/middle/'.$data["file_name"];  
   $this->load->library('image_lib', $config);  
   $this->image_lib->overwrite = true;
   $this->image_lib->resize();  


   $update = array(
    'image' => $data["file_name"],
    );

   $this->User_model->update($this->session->userdata('id'), $update);

   echo '<img src="'.base_url().'./assets/uploads/avatar/middle/'.$data["file_name"].'" class="img-thumbnail" />';  
 }  
}  
}  

public function log()
{
  $user = $this->User_model->get_log();
  $data = array(
    'user_data' => $user,
    'pageTitle' => 'Log Activity',
    );

  $this->load->view('theme/tpl_header',$data);
  $this->load->view('user/user_log', $data);
  $this->load->view('theme/tpl_footer');          
}

public function level($level,$user) 
{
  $data = array(
    'level' => $level,
    );

  $message = $this->User_model->level($level);

  $this->User_model->update($user, $data);
  $this->session->set_flashdata('message', 'Success User Set Level '.$message);
  redirect(site_url('user'));
}

}

