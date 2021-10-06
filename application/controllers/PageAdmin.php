<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PageAdmin extends CI_Controller
{

    public function index()
    {
        $this->load->view('admin/meta');
        $this->load->view('admin/nav');
        $this->load->view('admin/dashboard');
        $this->load->view('admin/footer');
    }

    public function class()
    {
        $data['classes'] = $this->db->get('data_classes')->result();

        $this->load->view('admin/meta', $data);
        $this->load->view('admin/nav');
        $this->load->view('admin/class');
        $this->load->view('admin/footer');
    }

    public function student()
    {
        $this->db->select('*, data_students.id as ids');
        
        $this->db->join('data_classes', 'data_classes.kodeKelas = data_students.kodeKelas', 'left');
        $data['students'] = $this->db->get('data_students')->result();

        $data['classes'] = $this->db->get('data_classes')->result();


        $this->load->view('admin/meta', $data);
        $this->load->view('admin/nav');
        $this->load->view('admin/students');
        $this->load->view('admin/footer');
    }

    function df_class()
    {
        $this->load->helper('download');
        $data = './assets/format_import/kelas.xlsx';
        force_download($data, null);
    }
}

/* End of file PageAdmin.php */
