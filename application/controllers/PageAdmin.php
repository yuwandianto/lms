<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PageAdmin extends CI_Controller
{

    public function index()
    {
        is_admin();
        $data['kelas'] = $this->db->get('data_classes')->num_rows();
        $data['guru'] = $this->db->get('data_teachers')->num_rows();
        $data['siswa'] = $this->db->get('data_students')->num_rows();
        $data['mapel'] = $this->db->get('data_subjects')->num_rows();

        $data['chats'] = $this->db->get('data_chats', 10)->result();


        $this->load->view('admin/meta', $data);
        $this->load->view('admin/nav');
        $this->load->view('admin/dashboard');
        $this->load->view('admin/footer');
    }

    public function class()
    {
        is_admin();
        $data['classes'] = $this->db->get('data_classes')->result();

        $this->load->view('admin/meta', $data);
        $this->load->view('admin/nav');
        $this->load->view('admin/class');
        $this->load->view('admin/footer');
    }

    public function student()
    {
        is_admin();
        $this->db->select('*, data_students.id as ids');
        $this->db->join('data_classes', 'data_classes.kodeKelas = data_students.kodeKelas', 'left');
        $this->db->order_by('data_students.kodeKelas', 'asc');
        $this->db->order_by('namaSiswa', 'asc');
        $data['students'] = $this->db->get('data_students')->result();

        $data['classes'] = $this->db->get('data_classes')->result();


        $this->load->view('admin/meta', $data);
        $this->load->view('admin/nav');
        $this->load->view('admin/students');
        $this->load->view('admin/footer');
    }

    public function teacher()
    {
        is_admin();
        $data['teachers'] = $this->db->get('data_teachers')->result();

        $this->load->view('admin/meta', $data);
        $this->load->view('admin/nav');
        $this->load->view('admin/teacher');
        $this->load->view('admin/footer');
    }

    public function subject()
    {
        is_admin();
        $data['subjects'] = $this->db->get('data_subjects')->result();

        $this->load->view('admin/meta', $data);
        $this->load->view('admin/nav');
        $this->load->view('admin/subject');
        $this->load->view('admin/footer');
    }

    public function timing()
    {
        is_admin();
        $data['timing'] = $this->db->get('data_timing')->result();

        $this->load->view('admin/meta', $data);
        $this->load->view('admin/nav');
        $this->load->view('admin/timing');
        $this->load->view('admin/footer');
    }

    function df_class()
    {
        is_admin();
        $this->load->helper('download');
        $data = './assets/format_import/kelas.xlsx';
        force_download($data, null);
    }

    function df_students()
    {
        is_admin();
        $this->load->helper('download');
        $data = './assets/format_import/siswa.xlsx';
        force_download($data, null);
    }

    function df_teacher()
    {
        is_admin();
        $this->load->helper('download');
        $data = './assets/format_import/guru.xlsx';
        force_download($data, null);
    }

    function df_subject()
    {
        is_admin();
        $this->load->helper('download');
        $data = './assets/format_import/mapel.xlsx';
        force_download($data, null);
    }

    function df_timing()
    {
        is_admin();
        $this->load->helper('download');
        $data = './assets/format_import/timing.xlsx';
        force_download($data, null);
    }
}

/* End of file PageAdmin.php */
