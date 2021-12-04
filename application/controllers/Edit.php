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

    public function scedule()
    {
        $id = $this->input->post('id');
        $id_class = $this->input->post('id_class');
        $id_day = $this->input->post('id_day');
        $id_end_timing = $this->input->post('id_end_timing');
        $id_start_timing = $this->input->post('id_start_timing');
        $id_subject = $this->input->post('id_subject');
        $id_teacher = $this->input->post('id_teacher');

        $this->load->model('modelInsert');
        $update = $this->modelInsert->update_scedule($id, $id_class, $id_day, $id_end_timing, $id_start_timing, $id_subject, $id_teacher);

        if ($update == 1) {
            echo json_encode('success');
        } elseif ($update == 2) {
            echo json_encode('duplicated');
        } elseif ($update == 3) {
            echo json_encode('err');
        } else {
            echo json_encode('error');
        }
    }

    function instansi()
    {
        $namaSekolah = $this->input->post('namaSekolah', true);
        $npsn = $this->input->post('npsn', true);
        $alamat = $this->input->post('alamat', true);
        $namaKepsek = $this->input->post('namaKepsek', true);
        $tp = $this->input->post('tp', true);
        $t_anggaran = $this->input->post('t_anggaran', true);

        $this->load->model('modelInsert');
        $ubah = $this->modelInsert->instansi($namaSekolah, $npsn, $alamat, $namaKepsek, $tp, $t_anggaran);

        if ($ubah == 1) {
            $this->session->set_flashdata('tipe', 'success');
            $this->session->set_flashdata('pesan', 'Data berhasil diubah');
            redirect('pageAdmin/instansi', 'refresh');
        } else {
            $this->session->set_flashdata('tipe', 'error');
            $this->session->set_flashdata('pesan', 'Data gagal diubah');
            redirect('pageAdmin/instansi', 'refresh');
        }
    }

    function logo()
    {
        $this->load->model('modelInsert');
        $ubah = $this->modelInsert->logo();

        if ($ubah == 1) {
            $this->session->set_flashdata('tipe', 'success');
            $this->session->set_flashdata('pesan', 'Logo berhasil diubah');
            redirect('pageAdmin/instansi', 'refresh');
        } elseif ($ubah == 2) {
            $this->session->set_flashdata('tipe', 'error');
            $this->session->set_flashdata('pesan', 'Logo gagal diubah');
            redirect('pageAdmin/instansi', 'refresh');
        } else {
            $this->session->set_flashdata('tipe', 'error');
            $this->session->set_flashdata('pesan', $ubah);
            redirect('pageAdmin/instansi', 'refresh');
        }
    }

    function kopSatu()
    {

        $line1 = $this->input->post('line1', true);
        $line2 = $this->input->post('line2', true);
        $line3 = $this->input->post('line3', true);
        $line4 = $this->input->post('line4', true);
        $line5 = $this->input->post('line5', true);
        $line6 = $this->input->post('line6', true);

        $this->load->model('modelInsert');
        $update = $this->modelInsert->kopSatu($line1, $line2, $line3, $line4, $line5, $line6);

        if ($update == 1) {
            $this->session->set_flashdata('tipe', 'success');
            $this->session->set_flashdata('pesan', 'Data berhasil diubah');
            redirect('pageAdmin/kopSurat', 'refresh');
        } else {
            $this->session->set_flashdata('tipe', 'error');
            $this->session->set_flashdata('pesan', 'Data gagal diubah');
            redirect('pageAdmin/kopSurat', 'refresh');
        }
    }

    function logoKopSatu()
    {
        $this->load->model('modelInsert');
        $ubah = $this->modelInsert->logoKopSatu();

        if ($ubah == 1) {
            $this->session->set_flashdata('tipe', 'success');
            $this->session->set_flashdata('pesan', 'Logo berhasil diubah');
            redirect('pageAdmin/kopSurat', 'refresh');
        } elseif ($ubah == 2) {
            $this->session->set_flashdata('tipe', 'error');
            $this->session->set_flashdata('pesan', 'Logo gagal diubah');
            redirect('pageAdmin/kopSurat', 'refresh');
        } else {
            $this->session->set_flashdata('tipe', 'error');
            $this->session->set_flashdata('pesan', $ubah);
            redirect('pageAdmin/kopSurat', 'refresh');
        }
    }
}

/* End of file Edit.php */
