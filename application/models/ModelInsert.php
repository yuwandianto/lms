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

    function subject($namaMapel, $kodeMapel, $kelompok)
    {
        $this->db->where('kodeMapel', $kodeMapel);
        $cek = $this->db->get('data_subjects');

        if ($cek->num_rows() > 0) {
            return 0;
        }

        $data = [
            'kodeMapel' => $kodeMapel,
            'namaMapel' => $namaMapel,
            'kelompok' => $kelompok,

        ];

        $insert = $this->db->insert('data_subjects', $data);
        return 1;
    }

    function import_excel()
    {

        $config['upload_path'] = './assets/tmp_import/';
        $config['allowed_types'] = 'xlsx';
        $config['max_size']  = '1000';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            return $this->upload->display_errors();
        } else {
            $data = array('upload_data' => $this->upload->data(), 'status' => 1);
            return $data;
        }
    }

    function timing($jamKe, $waktuMulai, $waktuSelesai)
    {
        $this->db->where('jamKe', $jamKe);
        $cek = $this->db->get('data_timing');

        if ($cek->num_rows() > 0) {
            return 0;
        }

        $data = [
            'jamKe' => $jamKe,
            'waktuMulai' => $waktuMulai,
            'waktuSelesai' => $waktuSelesai,

        ];

        $insert = $this->db->insert('data_timing', $data);
        return 1;
    }

    function chat($text)
    {
        $email = $this->session->userdata('user');
        $level = $this->session->userdata('level');

        if ($level == 2) {
            # code...
            $user = $this->db->get_where('data_administrators', ['email' => $email])->row();
            $object = [
                'user' => $user->name,
                'email' => $email,
                'text_chat' => $text
            ];

            $insert = $this->db->insert('data_chats', $object);
            if ($insert) {
                return 1;
            } else {
                return 0;
            }
        } elseif ($level == 1) {
            $user = $this->db->get_where('data_teachers', ['email' => $email])->row();
            $object = [
                'user' => $user->namaGuru,
                'email' => $email,
                'text_chat' => $text
            ];

            $insert = $this->db->insert('data_chats', $object);
            if ($insert) {
                return 1;
            } else {
                return 0;
            }
        }
    }

    function scedule($id_class, $id_day, $id_end_timing, $id_start_timing, $id_subject, $id_teacher)
    {
        $data_start = $this->db->get_where('data_timing', ['id' => $id_start_timing])->row()->jamKe;
        $data_end = $this->db->get_where('data_timing', ['id' => $id_end_timing])->row()->jamKe;

        if ($data_start > $data_end) {

            return 3;
        }

        $this->db->where('id_start_timing', $id_start_timing);
        $this->db->where('id_teacher', $id_teacher);
        $this->db->where('id_day', $id_day);
        $cek = $this->db->get('data_scedules')->num_rows();

        $this->db->where('id_end_timing', $id_start_timing);
        $this->db->where('id_teacher', $id_teacher);
        $this->db->where('id_day', $id_day);
        $cek2 = $this->db->get('data_scedules')->num_rows();

        $this->db->where('id_start_timing', $id_end_timing);
        $this->db->where('id_teacher', $id_teacher);
        $this->db->where('id_day', $id_day);
        $cek3 = $this->db->get('data_scedules')->num_rows();

        if ($cek || $cek2 || $cek3) {
            return 2;
        } else {
            $object = [
                'id_class' => $id_class,
                'id_day' => $id_day,
                'id_end_timing' => $id_end_timing,
                'id_start_timing' => $id_start_timing,
                'id_subject' => $id_subject,
                'id_teacher' => $id_teacher
            ];

            $insert = $this->db->insert('data_scedules', $object);

            if ($insert) {
                return 1;
            } else {
                return 0;
            }
        }
    }

    function update_scedule($id, $id_class, $id_day, $id_end_timing, $id_start_timing, $id_subject, $id_teacher)
    {
        $data_start = $this->db->get_where('data_timing', ['id' => $id_start_timing])->row()->jamKe;
        $data_end = $this->db->get_where('data_timing', ['id' => $id_end_timing])->row()->jamKe;

        if ($data_start > $data_end) {
            return 3;
        }

        $last = $this->db->get_where('data_scedules', ['id' => $id])->row();

        $this->db->where('id_start_timing', $id_start_timing);
        $this->db->where('id_teacher', $id_teacher);
        $this->db->where('id_day', $id_day);
        // $this->db->where_not_in('id', $id);
        $cek = $this->db->get('data_scedules')->num_rows();

        $this->db->where('id_end_timing', $id_start_timing);
        $this->db->where('id_teacher', $id_teacher);
        $this->db->where('id_day', $id_day);
        // $this->db->where_not_in('id', $id);
        $cek2 = $this->db->get('data_scedules')->num_rows();

        $this->db->where('id_start_timing', $id_end_timing);
        $this->db->where('id_teacher', $id_teacher);
        $this->db->where('id_day', $id_day);
        // $this->db->where_not_in('id', $id);
        $cek3 = $this->db->get('data_scedules')->num_rows();

        if ($cek || $cek2 || $cek3) {
            return 2;
        }

        $object = [
            'id_class' => $id_class,
            'id_day' => $id_day,
            'id_end_timing' => $id_end_timing,
            'id_start_timing' => $id_start_timing,
            'id_subject' => $id_subject,
            'id_teacher' => $id_teacher
        ];

        $this->db->where('id', $id);
        $update = $this->db->update('data_scedules', $object);

        // $insert = $this->db->insert('data_scedules', $object);

        if ($update) {
            return 1;
        } else {
            return 0;
        }
    }
}

/* End of file ModelInsert.php */
