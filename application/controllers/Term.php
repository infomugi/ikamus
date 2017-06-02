<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Term extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged')<>1) {
            redirect(site_url('auth'));
        }        
        $this->load->model('Term_model');
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'term/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'term/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'term/index.html';
            $config['first_url'] = base_url() . 'term/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Term_model->total_rows($q);
        $term = $this->Term_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'term_data' => $term,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'pageTitle' => 'Kelola Istilah',
            );
        $this->load->view('theme/tpl_header',$data);
        $this->load->view('term/term_list', $data);
        $this->load->view('theme/tpl_footer');          
    }

    public function read($id) 
    {
        $row = $this->Term_model->get_by_id($id);
        if ($row) {
            $data = array(
              'id_term' => $row->id_term,
              'name' => $row->name,
              'description' => $row->description,
              'status' => $this->User_model->status($row->status),
              );
            $data['pageTitle'] = 'Detail';
            $this->load->view('theme/tpl_header',$data);
            $this->load->view('term/term_read', $data);
            $this->load->view('theme/tpl_footer');            
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('term'));
        }
    }

    public function create() 
    {
        $data = array(
            'pageTitle' => 'Tambah Istilah',
            'button' => 'Submit',
            'action' => site_url('term/create_action'),
            'id_term' => set_value('id_term'),
            'name' => set_value('name'),
            'description' => set_value('description'),
            'status' => set_value('status'),
            );
        $this->load->view('theme/tpl_header',$data);
        $this->load->view('term/term_form', $data);
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

            $this->Term_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('term'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Term_model->get_by_id($id);

        if ($row) {
            $data = array(
                'pageTitle' => 'Edit Term',
                'button' => 'Update',
                'action' => site_url('term/update_action'),
                'id_term' => set_value('id_term', $row->id_term),
                'name' => set_value('name', $row->name),
                'description' => set_value('description', $row->description),
                'status' => set_value('status', $row->status),
                );

            $this->load->view('theme/tpl_header',$data);
            $this->load->view('term/term_form', $data);
            $this->load->view('theme/tpl_footer');  
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('term'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_term', TRUE));
        } else {
            $data = array(
              'name' => $this->input->post('name',TRUE),
              'description' => $this->input->post('description',TRUE),
              'status' => $this->input->post('status',TRUE),
              );

            $this->Term_model->update($this->input->post('id_term', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('term'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Term_model->get_by_id($id);

        if ($row) {
            $this->Term_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('term'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('term'));
        }
    }

    public function _rules() 
    {
       $this->form_validation->set_rules('name', 'name', 'trim|required');
       $this->form_validation->set_rules('description', 'description', 'trim|required');
       $this->form_validation->set_rules('status', 'status', 'trim|required');

       $this->form_validation->set_rules('id_term', 'id_term', 'trim');
       $this->form_validation->set_error_delimiters('<span class="label label-danger">', '</span>');
   }

   public function excel()
   {
    $this->load->helper('exportexcel');
    $namaFile = "term.xls";
    $judul = "term";
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

    foreach ($this->Term_model->get_all() as $data) {
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
    header("Content-Disposition: attachment;Filename=term.doc");

    $data = array(
        'term_data' => $this->Term_model->get_all(),
        'start' => 0
        );

    $this->load->view('term/term_doc',$data);
}

}

