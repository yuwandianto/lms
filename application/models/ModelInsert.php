<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelInsert extends CI_Model
{

    function classes($namaKelas, $kodeKelas, $tingkat)
    {
        $this->db->where('kodeKelas', $kodeKelas);
        $cek = $this->db->get('data_classes');

        if ($cek->num_rows() > 0) {
            return 0;
        }

        $data = [
            'namaKelas' => $namaKelas,
            'kodeKelas' => $kodeKelas,
            'tingkat' => $tingkat,

        ];

        $insert = $this->db->insert('data_classes', $data);
        return 1;
    }

    function import_classes()
    {

        $config['upload_path'] = './assets/tmp_import/';
        $config['allowed_types'] = 'xlsx';
        $config['max_size']  = '1000';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            return $this->upload->display_errors();
        } else {
            $data = array('upload_data' => $this->upload->data());
            return 1;
        }
    }

    function student($namaSiswa, $kodeKelas, $nisn)
    {
        // cek nisn
        $ada = $this->db->get_where('data_students', ['nisn' => $nisn])->num_rows();
        if ($ada > 0) {
            return 0;
        } else {
            $data = [
                'namaSiswa' => $namaSiswa,
                'kodeKelas' => $kodeKelas,
                'nisn' => $nisn,
            ];

            $insert = $this->db->insert('data_students', $data);

            if ($insert) {
                return 1;
            } else {
                return 2;
            }
        }
    }

    function teacher($namaGuru, $nip, $email, $password, $hp)
    {
        $ada = $this->db->get_where('data_teachers', ['email' => $email])->num_rows();
        if ($ada > 0) {
            return 0;
        } else {
            $data = [
                'namaGuru' => $namaGuru,
                'nip' => $nip,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'hp' => $hp,
            ];

            $insert = $this->db->insert('data_teachers', $data);

            if ($insert) {
                return 1;
            } else {
                return 2;
            }
        }
    }

    function import_teachers()
    {

        $config['upload_path'] = './assets/tmp_import/';
        $config['allowed_types'] = 'xlsx';
        $config['max_size']  = '1000';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            return $this->upload->display_errors();
        } else {
            $data = array('upload_data' => $this->upload->data());
            return 1;
        }
    }
}

/* End of file ModelInsert.php */
