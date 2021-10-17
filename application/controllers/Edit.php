<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Edit extends CI_Controller
{

    public function class()
    {
        $id = $this->input->post('id');
        $namaKelas = $this->input->post('namaKelas');
        $kodeKelas = $this->input->post('kodeKelas');
        $tingkat = $this->input->post('tingkat');

        $kodeKelasLama = $this->db->get_where('data_classes', ['id' => $id])->row()->kodeKelas;

        $data = [
            'namaKelas' => $namaKelas,
            'kodeKelas' => $kodeKelas,
            'tingkat' => $tingkat
        ];
        $this->db->where('id', $id);
        $this->db->update('data_classes', $data);

        $data1 = ['kodeKelas' => $kodeKelas];
        $this->db->where('kodeKelas', $kodeKelasLama);
        $this->db->update('data_students', $data1);
    }

    public function student()
    {
        $id = $this->input->post('id');
        $namaSiswa = $this->input->post('namaSiswa');
        $kodeKelas = $this->input->post('kodeKelas');
        $nisn = $this->input->post('nisn');

        $data = [
            'namaSiswa' => $namaSiswa,
            'kodeKelas' => $kodeKelas,
            'nisn' => $nisn
        ];
        $this->db->where('id', $id);
        $this->db->update('data_students', $data);
    }

    public function teacher()
    {
        $id = $this->input->post('id');
        $namaGuru = $this->input->post('namaGuru');
        $nip = $this->input->post('nip');
        $hp = $this->input->post('hp');
        $password = $this->input->post('password');

        if ($password != '') {
            # code...
            $data = [
                'namaGuru' => $namaGuru,
                'nip' => $nip,
                'hp' => $hp,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ];
            $this->db->where('id', $id);
            $this->db->update('data_teachers', $data);
        } else {
            $data = [
                'namaGuru' => $namaGuru,
                'nip' => $nip,
                'hp' => $hp
            ];
            $this->db->where('id', $id);
            $this->db->update('data_teachers', $data);
        }
    }

    public function subject()
    {
        $id = $this->input->post('id');
        $namaMapel = $this->input->post('namaMapel');
        $kodeMapel = $this->input->post('kodeMapel');
        $kelompok = $this->input->post('kelompok');


        $data = [
            'namaMapel' => $namaMapel,
            'kodeMapel' => $kodeMapel,
            'kelompok' => $kelompok
        ];
        $this->db->where('id', $id);
        $this->db->update('data_subjects', $data);
    }

    public function timing()
    {
        $id = $this->input->post('id');
        $jamKe = $this->input->post('jamKe');
        $waktuMulai = $this->input->post('waktuMulai');
        $waktuSelesai = $this->input->post('waktuSelesai');


        $data = [
            'jamKe' => $jamKe,
            'waktuMulai' => $waktuMulai,
            'waktuSelesai' => $waktuSelesai
        ];
        $this->db->where('id', $id);
        $this->db->update('data_timing', $data);
    }
}

/* End of file Edit.php */
