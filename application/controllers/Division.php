<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Division extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged')<>1) {
            redirect(site_url('auth'));
        }        
        $this->load->model('Division_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'division/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'division/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'division/index.html';
            $config['first_url'] = base_url() . 'division/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Division_model->total_rows($q);
        $division = $this->Division_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'division_data' => $division,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'pageTitle' => 'Manage Division',
            );
        $this->load->view('theme/tpl_header',$data);
        $this->load->view('division/division_list', $data);
        $this->load->view('theme/tpl_footer');          
    }

    public function read($id) 
    {
        $row = $this->Division_model->get_by_id($id);
        if ($row) {
            $data = array(
              'id_division' => $row->id_division,
              'name' => $row->name,
              'description' => $row->description,
              'status' => $row->status,
              );
            $data['pageTitle'] = 'Detail';
            $this->load->view('theme/tpl_header',$data);
            $this->load->view('division/division_read', $data);
            $this->load->view('theme/tpl_footer');            
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('division'));
        }
    }

    public function create() 
    {
        $data = array(
            'pageTitle' => 'Add Division',
            'button' => 'Submit',
            'action' => site_url('division/create_action'),
            'id_division' => set_value('id_division'),
            'name' => set_value('name'),
            'description' => set_value('description'),
            'status' => set_value('status'),
            );
        $this->load->view('theme/tpl_header',$data);
        $this->load->view('division/division_form', $data);
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
              'status' => $this->input->post('status',TRUE),
              );

            $this->Division_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('division'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Division_model->get_by_id($id);

        if ($row) {
            $data = array(
                'pageTitle' => 'Edit Division',
                'button' => 'Update',
                'action' => site_url('division/update_action'),
                'id_division' => set_value('id_division', $row->id_division),
                'name' => set_value('name', $row->name),
                'description' => set_value('description', $row->description),
                'status' => set_value('status', $row->status),
                );

            $this->load->view('theme/tpl_header',$data);
            $this->load->view('division/division_form', $data);
            $this->load->view('theme/tpl_footer');  
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('division'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_division', TRUE));
        } else {
            $data = array(
              'name' => $this->input->post('name',TRUE),
              'description' => $this->input->post('description',TRUE),
              'status' => $this->input->post('status',TRUE),
              );

            $this->Division_model->update($this->input->post('id_division', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('division'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Division_model->get_by_id($id);

        if ($row) {
            $this->Division_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('division'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('division'));
        }
    }

    public function _rules() 
    {
       $this->form_validation->set_rules('name', 'name', 'trim|required');
       $this->form_validation->set_rules('description', 'description', 'trim|required');
       $this->form_validation->set_rules('status', 'status', 'trim|required');

       $this->form_validation->set_rules('id_division', 'id_division', 'trim');
       $this->form_validation->set_error_delimiters('<span class="label label-danger">', '</span>');
   }

   public function excel()
   {
    $this->load->helper('exportexcel');
    $namaFile = "division.xls";
    $judul = "division";
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
    xlsWriteLabel($tablehead, $kolomhead++, "Status");

    foreach ($this->Division_model->get_all() as $data) {
        $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
        xlsWriteNumber($tablebody, $kolombody++, $nourut);
        xlsWriteLabel($tablebody, $kolombody++, $data->name);
        xlsWriteLabel($tablebody, $kolombody++, $data->description);
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
    header("Content-Disposition: attachment;Filename=division.doc");

    $data = array(
        'division_data' => $this->Division_model->get_all(),
        'start' => 0
        );
    
    $this->load->view('division/division_doc',$data);
}

}

