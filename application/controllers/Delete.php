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

    function all_subjects()
    {
        $this->db->truncate('data_subjects');
        $this->session->set_flashdata('tipe', 'success');
        $this->session->set_flashdata('pesan', 'Data berhasil di hapus');
        redirect('pageAdmin/subject');
    }

    function subject()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->delete('data_subjects');
    }

    function all_timing()
    {
        $this->db->truncate('data_timing');
        $this->session->set_flashdata('tipe', 'success');
        $this->session->set_flashdata('pesan', 'Data berhasil di hapus');
        redirect('pageAdmin/timing');
    }

    function timing()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->delete('data_timing');
    }

    function all_scedules()
    {
        $this->db->truncate('data_scedules');
        $this->session->set_flashdata('tipe', 'success');
        $this->session->set_flashdata('pesan', 'Data berhasil di hapus');
        redirect('pageAdmin/scedule');
    }

    function scedule()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->delete('data_scedules');
    }
}

/* End of file Delete.php */
