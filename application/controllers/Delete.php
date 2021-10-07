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

    function teacher()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->delete('data_teachers');
    }

    function all_students()
    {
        $this->db->truncate('data_students');
        $this->session->set_flashdata('tipe', 'success');
        $this->session->set_flashdata('pesan', 'Data berhasil di hapus');
        redirect('pageAdmin/student');
    }

    function all_teachers()
    {
        $this->db->truncate('data_teachers');
        $this->session->set_flashdata('tipe', 'success');
        $this->session->set_flashdata('pesan', 'Data berhasil di hapus');
        redirect('pageAdmin/teacher');
    }
}

/* End of file Delete.php */
