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
        $data['jampel'] = $this->db->get('data_timing')->num_rows();
        $data['jadwal'] = $this->db->get('data_scedules')->num_rows();

        $row_chats = $this->db->get('data_chats')->num_rows();
        if ($row_chats > 29) {
            $offset = $row_chats - 30;
        } else {
            $offset = 0;
        }


        $data['chats'] = $this->db->get('data_chats', 30, $offset)->result();

        $this->db->group_by('kodeKelas');
        $data['kelas_data_siswa'] = $this->db->get('data_students')->num_rows();

        $this->db->select('id_teacher');
        $this->db->group_by('id_teacher');
        $id_teacher = $this->db->get('data_scedules')->result();
        // echo '<pre>';
        $bentrok = [];
        foreach ($id_teacher as $id_guru) {

            $a = $this->db->query("SELECT
            id_teacher,
            id_start_timing,
            id_day
            FROM data_scedules
            WHERE id_teacher = '$id_guru->id_teacher'
            GROUP BY
            id_teacher,
            id_start_timing,
            id_day
            HAVING
            COUNT(*) > 1")->result();

            array_push($bentrok, $a);
        }

        $bent = '';
        foreach ($bentrok as $b) {
            if (count($b) > 0) {

                $bent = $b;
            }
        }
        // print_r($bent[0]->id_teacher);


        if ($bent) {
            $data['jadwal_bentrok'] = 1;
            $this->db->select('namaGuru');
            $this->db->join('data_teachers', 'data_teachers.id = data_scedules.id_teacher', 'left');
            $data['guru_bentrok'] = $this->db->get_where('data_scedules', ['id_teacher' => $bent[0]->id_teacher])->row();
        } else {
            $data['jadwal_bentrok'] = 0;
        }
        // die;

        $this->load->view('admin/meta', $data);
        $this->load->view('admin/nav');
        $this->load->view('admin/dashboard');
        $this->load->view('admin/footer');
    }

    public function instansi()
    {
        is_admin();
        $data['instansi'] = $this->db->get('data_instansi')->row();

        $this->load->view('admin/meta', $data);
        $this->load->view('admin/nav');
        $this->load->view('admin/instansi');
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

    public function scedule()
    {
        is_admin();
        $this->db->select('*, jam1.jamKe as j1, jam2.jamKe as j2, data_scedules.id as idScedule');
        $this->db->join('data_teachers', 'data_teachers.id = data_scedules.id_teacher', 'left');
        $this->db->join('data_days', 'data_days.id = data_scedules.id_day', 'left');
        $this->db->join('data_timing as jam1', 'jam1.id = data_scedules.id_start_timing', 'left');
        $this->db->join('data_timing as jam2', 'jam2.id = data_scedules.id_end_timing', 'left');
        $this->db->join('data_subjects', 'data_subjects.id = data_scedules.id_subject', 'left');
        $this->db->order_by('data_teachers.id', 'asc');
        $data['scedule'] = $this->db->get('data_scedules')->result();

        $data['teachers'] = $this->db->get('data_teachers')->result();
        $data['subjects'] = $this->db->get('data_subjects')->result();
        $data['days'] = $this->db->get('data_days')->result();
        $data['classes'] = $this->db->get('data_classes')->result();
        $data['timing'] = $this->db->get('data_timing')->result();

        $this->load->view('admin/meta', $data);
        $this->load->view('admin/nav');
        $this->load->view('admin/scedule');
        $this->load->view('admin/footer');
    }

    public function kopSurat()
    {
        is_admin();
        $data['kop1'] = $this->db->get_where('data_kopSurat', ['id' => 1])->row();

        $this->load->view('admin/meta', $data);
        $this->load->view('admin/nav');
        $this->load->view('admin/kopSurat');
        $this->load->view('admin/footer');
    }

    public function tempST()
    {
        is_admin();
        $data['template1'] = $this->db->get_where('data_templateSK', ['id' => 1])->row();

        $this->load->view('admin/meta', $data);
        $this->load->view('admin/nav');
        $this->load->view('admin/tempST');
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

    function df_scedule()
    {
        is_admin();
        $this->load->helper('download');
        $data = './assets/format_import/scedule.xlsx';
        force_download($data, null);
    }
}

/* End of file PageAdmin.php */
