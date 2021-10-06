<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Delete extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('modelDelete');
    }


    public function class()
    {
        $id = $this->input->post('id');
        $this->modelDelete->class($id);
    }

    function all_classes()
    {
        $this->db->truncate('data_classes');
        $this->session->set_flashdata('tipe', 'success');
        $this->session->set_flashdata('pesan', 'Data berhasil di hapus');
        redirect('pageAdmin/class');
    }

    function student()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->delete('data_students');
        
    }
}

/* End of file Delete.php */
