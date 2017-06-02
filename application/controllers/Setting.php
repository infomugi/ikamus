<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Setting extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('logged')<>1) {
      redirect(site_url('auth'));
    }        
    $this->load->model('User_model');
    $this->load->model('Setting_model');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $q = urldecode($this->input->get('q', TRUE));
    $start = intval($this->input->get('start'));

    if ($q <> '') {
      $config['base_url'] = base_url() . 'setting/index.html?q=' . urlencode($q);
      $config['first_url'] = base_url() . 'setting/index.html?q=' . urlencode($q);
    } else {
      $config['base_url'] = base_url() . 'setting/index.html';
      $config['first_url'] = base_url() . 'setting/index.html';
    }

    $config['per_page'] = 10;
    $config['page_query_string'] = TRUE;
    $config['total_rows'] = $this->Setting_model->total_rows($q);
    $setting = $this->Setting_model->get_limit_data($config['per_page'], $start, $q);

    $this->load->library('pagination');
    $this->pagination->initialize($config);

    $data = array(
      'setting_data' => $setting,
      'q' => $q,
      'pagination' => $this->pagination->create_links(),
      'total_rows' => $config['total_rows'],
      'start' => $start,
      'pageTitle' => 'Manage Setting',
      );
    $this->load->view('theme/tpl_header',$data);
    $this->load->view('setting/setting_list', $data);
    $this->load->view('theme/tpl_footer');          
  }

  public function read($id) 
  {
    $row = $this->Setting_model->get_by_id($id);
    if ($row) {
      $data = array(
        'id_site' => $row->id_site,
        'name' => $row->name,
        'description' => $row->description,
        'keywords' => $row->keywords,
        'favicon' => $row->favicon,
        'logo' => $row->logo,
        'address' => $row->address,
        'phone' => $row->phone,
        'email' => $row->email,
        'facebook' => $row->facebook,
        'instagram' => $row->instagram,
        'twitter' => $row->twitter,
        'status' => $this->User_model->status($row->status),
        );
      $data['pageTitle'] = 'Detail';
      $this->load->view('theme/tpl_header',$data);
      $this->load->view('setting/setting_read', $data);
      $this->load->view('theme/tpl_footer');            
    } else {
      $this->session->set_flashdata('message', 'Record Not Found');
      redirect(site_url('setting'));
    }
  }

  public function create() 
  {
    $data = array(
      'pageTitle' => 'Add Setting',
      'button' => 'Submit',
      'action' => site_url('setting/create_action'),
      'id_site' => set_value('id_site'),
      'name' => set_value('name'),
      'description' => set_value('description'),
      'keywords' => set_value('keywords'),
      'favicon' => set_value('favicon'),
      'logo' => set_value('logo'),
      'address' => set_value('address'),
      'phone' => set_value('phone'),
      'email' => set_value('email'),
      'facebook' => set_value('facebook'),
      'instagram' => set_value('instagram'),
      'twitter' => set_value('twitter'),
      'status' => set_value('status'),
      );
    $this->load->view('theme/tpl_header',$data);
    $this->load->view('setting/setting_form', $data);
    $this->load->view('theme/tpl_footer');          
  }
  
  public function create_action() 
  {
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
      $this->create();
    } else {
      $data = array(
        'name' => $this->input->post('name',TRUE),
        'description' => $this->input->post('description',TRUE),
        'keywords' => $this->input->post('keywords',TRUE),
        'favicon' => $this->input->post('favicon',TRUE),
        'logo' => $this->input->post('logo',TRUE),
        'address' => $this->input->post('address',TRUE),
        'phone' => $this->input->post('phone',TRUE),
        'email' => $this->input->post('email',TRUE),
        'facebook' => $this->input->post('facebook',TRUE),
        'instagram' => $this->input->post('instagram',TRUE),
        'twitter' => $this->input->post('twitter',TRUE),
        'status' => $this->input->post('status',TRUE),
        );

      $this->Setting_model->insert($data);
      $this->session->set_flashdata('message', 'Create Record Success');
      redirect(site_url('setting'));
    }
  }
  
  public function update($id) 
  {
    $row = $this->Setting_model->get_by_id($id);

    if ($row) {
      $data = array(
        'pageTitle' => 'Edit Setting',
        'button' => 'Update',
        'action' => site_url('setting/update_action'),
        'id_site' => set_value('id_site', $row->id_site),
        'name' => set_value('name', $row->name),
        'description' => set_value('description', $row->description),
        'keywords' => set_value('keywords', $row->keywords),
        'favicon' => set_value('favicon', $row->favicon),
        'logo' => set_value('logo', $row->logo),
        'address' => set_value('address', $row->address),
        'phone' => set_value('phone', $row->phone),
        'email' => set_value('email', $row->email),
        'facebook' => set_value('facebook', $row->facebook),
        'instagram' => set_value('instagram', $row->instagram),
        'twitter' => set_value('twitter', $row->twitter),
        'status' => set_value('status', $row->status),
        );

      $this->load->view('theme/tpl_header',$data);
      $this->load->view('setting/setting_form', $data);
      $this->load->view('theme/tpl_footer');  
    } else {
      $this->session->set_flashdata('message', 'Record Not Found');
      redirect(site_url('setting'));
    }
  }
  
  public function update_action() 
  {
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
      $this->update($this->input->post('id_site', TRUE));
    } else {
      $data = array(
        'name' => $this->input->post('name',TRUE),
        'description' => $this->input->post('description',TRUE),
        'keywords' => $this->input->post('keywords',TRUE),
        'favicon' => $this->input->post('favicon',TRUE),
        'logo' => $this->input->post('logo',TRUE),
        'address' => $this->input->post('address',TRUE),
        'phone' => $this->input->post('phone',TRUE),
        'email' => $this->input->post('email',TRUE),
        'facebook' => $this->input->post('facebook',TRUE),
        'instagram' => $this->input->post('instagram',TRUE),
        'twitter' => $this->input->post('twitter',TRUE),
        'status' => $this->input->post('status',TRUE),
        );

      $this->Setting_model->update($this->input->post('id_site', TRUE), $data);
      $this->session->set_flashdata('message', 'Update Record Success');
      redirect(site_url('setting'));
    }
  }
  
  public function delete($id) 
  {
    $row = $this->Setting_model->get_by_id($id);

    if ($row) {
      $this->Setting_model->delete($id);
      $this->session->set_flashdata('message', 'Delete Record Success');
      redirect(site_url('setting'));
    } else {
      $this->session->set_flashdata('message', 'Record Not Found');
      redirect(site_url('setting'));
    }
  }

  public function _rules() 
  {
   $this->form_validation->set_rules('name', 'name', 'trim|required');
   $this->form_validation->set_rules('description', 'description', 'trim|required');
   $this->form_validation->set_rules('keywords', 'keywords', 'trim|required');
   $this->form_validation->set_rules('favicon', 'favicon', 'trim|required');
   $this->form_validation->set_rules('logo', 'logo', 'trim|required');
   $this->form_validation->set_rules('address', 'address', 'trim|required');
   $this->form_validation->set_rules('phone', 'phone', 'trim|required');
   $this->form_validation->set_rules('email', 'email', 'trim|required');
   $this->form_validation->set_rules('facebook', 'facebook', 'trim|required');
   $this->form_validation->set_rules('instagram', 'instagram', 'trim|required');
   $this->form_validation->set_rules('twitter', 'twitter', 'trim|required');
   $this->form_validation->set_rules('status', 'status', 'trim|required');

   $this->form_validation->set_rules('id_site', 'id_site', 'trim');
   $this->form_validation->set_error_delimiters('<span class="label label-danger">', '</span>');
 }

 public function excel()
 {
  $this->load->helper('exportexcel');
  $namaFile = "setting.xls";
  $judul = "setting";
  $tablehead = 0;
  $tablebody = 1;
  $nourut = 1;
        //penulisan header
  header("Pragma: public");
  header("Expires: 0");
  header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
  header("Content-Type: application/force-download");
  header("Content-Type: application/octet-stream");
  header("Content-Type: application/download");
  header("Content-Disposition: attachment;filename=" . $namaFile . "");
  header("Content-Transfer-Encoding: binary ");

  xlsBOF();

  $kolomhead = 0;
  xlsWriteLabel($tablehead, $kolomhead++, "No");
  xlsWriteLabel($tablehead, $kolomhead++, "Name");
  xlsWriteLabel($tablehead, $kolomhead++, "Description");
  xlsWriteLabel($tablehead, $kolomhead++, "Keywords");
  xlsWriteLabel($tablehead, $kolomhead++, "Favicon");
  xlsWriteLabel($tablehead, $kolomhead++, "Logo");
  xlsWriteLabel($tablehead, $kolomhead++, "Address");
  xlsWriteLabel($tablehead, $kolomhead++, "Phone");
  xlsWriteLabel($tablehead, $kolomhead++, "Email");
  xlsWriteLabel($tablehead, $kolomhead++, "Facebook");
  xlsWriteLabel($tablehead, $kolomhead++, "Instagram");
  xlsWriteLabel($tablehead, $kolomhead++, "Twitter");
  xlsWriteLabel($tablehead, $kolomhead++, "Status");

  foreach ($this->Setting_model->get_all() as $data) {
    $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
    xlsWriteNumber($tablebody, $kolombody++, $nourut);
    xlsWriteLabel($tablebody, $kolombody++, $data->name);
    xlsWriteLabel($tablebody, $kolombody++, $data->description);
    xlsWriteLabel($tablebody, $kolombody++, $data->keywords);
    xlsWriteLabel($tablebody, $kolombody++, $data->favicon);
    xlsWriteLabel($tablebody, $kolombody++, $data->logo);
    xlsWriteLabel($tablebody, $kolombody++, $data->address);
    xlsWriteLabel($tablebody, $kolombody++, $data->phone);
    xlsWriteLabel($tablebody, $kolombody++, $data->email);
    xlsWriteLabel($tablebody, $kolombody++, $data->facebook);
    xlsWriteLabel($tablebody, $kolombody++, $data->instagram);
    xlsWriteLabel($tablebody, $kolombody++, $data->twitter);
    xlsWriteNumber($tablebody, $kolombody++, $data->status);

    $tablebody++;
    $nourut++;
  }

  xlsEOF();
  exit();
}

public function word()
{
  header("Content-type: application/vnd.ms-word");
  header("Content-Disposition: attachment;Filename=setting.doc");

  $data = array(
    'setting_data' => $this->Setting_model->get_all(),
    'start' => 0
    );
  
  $this->load->view('setting/setting_doc',$data);
}

public function status($status,$setting) 
{
  $data = array(
    'status' => $status,
    );

  $datas = array(
    'status' => 0,
    );  

  $message = $this->User_model->status($status);

  $this->Setting_model->update($setting, $data);
  $this->Setting_model->nonactive($setting, $datas);
  $this->session->set_flashdata('message', 'Success User Set Status '.$message);
  redirect(site_url('setting'));
}

}

