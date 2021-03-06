<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Insert extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('modelInsert');
    }

    public function class()
    {
        $namaKelas = $this->input->post('namaKelas');
        $kodeKelas = $this->input->post('kodeKelas');
        $tingkat = $this->input->post('tingkat');

        $insert = $this->modelInsert->classes($namaKelas, $kodeKelas, $tingkat);

        if ($insert == 1) {
            # code...
            echo json_encode('success');
        } elseif ($insert == 0) {
            echo json_encode('duplicated');
        } else {
            echo json_encode('error');
        }
    }

    public function import_classes()
    {

        $upload = $this->modelInsert->import_excel();

        if ($upload['status'] == 1) {

            $file = './assets/tmp_import/' . $upload['upload_data']['file_name'];

            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            $spreadsheet = $reader->load($file);

            $sheetData = $spreadsheet->getActiveSheet()->toArray();

            for ($i = 1; $i < count($sheetData); $i++) {
                # code...
                $data = [
                    'namaKelas' => $sheetData[$i][1],
                    'kodeKelas' => $sheetData[$i][2],
                    'tingkat' => $sheetData[$i][3],
                ];

                $this->db->where('kodeKelas', $sheetData[$i][2]);
                $cek = $this->db->get('data_classes');

                if ($cek->num_rows() > 0) {
                    $error = 'ada dupikasi data pada ' . $cek->row()->kodeKelas;
                    delete_files('./assets/tmp_import/');

                    $this->session->set_flashdata('tipe', 'error');
                    $this->session->set_flashdata('pesan', $error);
                    redirect('pageAdmin/class');
                } else {
                    $this->db->insert('data_classes', $data);
                }
            }
            delete_files('./assets/tmp_import/');

            $this->session->set_flashdata('tipe', 'success');
            $this->session->set_flashdata('pesan', 'Data berhasil di import');
            redirect('pageAdmin/class');
        } else {
            delete_files('./assets/tmp_import/');

            $this->session->set_flashdata('tipe', 'error');
            $this->session->set_flashdata('pesan', $upload);
            redirect('pageAdmin/class');
        }
    }

    function student()
    {
        $namaSiswa = $this->input->post('namaSiswa');
        $kodeKelas = $this->input->post('kodeKelas');
        $nisn = $this->input->post('nisn');

        $insert = $this->modelInsert->student($namaSiswa, $kodeKelas, $nisn);

        if ($insert == 0) {
            echo '0';
        } elseif ($insert == 2) {
            echo 'Data tidak berhasil diinput';
        } else {
            echo '1';
        }
    }

    public function import_students()
    {

        $upload = $this->modelInsert->import_excel();

        if ($upload['status'] == 1) {

            $file = './assets/tmp_import/' . $upload['upload_data']['file_name'];

            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            $spreadsheet = $reader->load($file);

            $sheetData = $spreadsheet->getActiveSheet()->toArray();

            for ($i = 1; $i < count($sheetData); $i++) {
                # code...
                $data = [
                    'namaSiswa' => $sheetData[$i][1],
                    'nisn' => $sheetData[$i][2],
                    'kodeKelas' => $sheetData[$i][3],
                ];

                $kelasada = $this->db->get_where('data_classes', ['kodeKelas' => $sheetData[$i][3]]);

                if ($kelasada->num_rows() > 0) {

                    $this->db->where('nisn', $sheetData[$i][2]);
                    $cek = $this->db->get('data_students');

                    if ($cek->num_rows() > 0) {
                        $error = 'ada dupikasi data NISN pada ' . $cek->row()->nisn;
                        delete_files('./assets/tmp_import/');

                        $this->session->set_flashdata('tipe', 'error');
                        $this->session->set_flashdata('pesan', $error);
                        redirect('pageAdmin/student');
                    } else {
                        $this->db->insert('data_students', $data);
                    }
                } else {
                    $error = 'kode kelas ' . $sheetData[$i][3] . ' tidak ditemukan';
                    delete_files('./assets/tmp_import/');

                    $this->session->set_flashdata('tipe', 'error');
                    $this->session->set_flashdata('pesan', $error);
                    redirect('pageAdmin/student');
                }
            }

            delete_files('./assets/tmp_import/');

            $this->session->set_flashdata('tipe', 'success');
            $this->session->set_flashdata('pesan', 'Data berhasil di import');
            redirect('pageAdmin/student');
        } else {
            delete_files('./assets/tmp_import/');

            $this->session->set_flashdata('tipe', 'error');
            $this->session->set_flashdata('pesan', $upload);
            redirect('pageAdmin/student');
        }
    }

    function teacher()
    {
        $namaGuru = $this->input->post('namaGuru');
        $nip = $this->input->post('nip');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $hp = $this->input->post('hp');

        $insert = $this->modelInsert->teacher($namaGuru, $nip, $email, $password, $hp);

        if ($insert == 0) {
            echo '0';
        } elseif ($insert == 2) {
            echo 'Data tidak berhasil diinput';
        } else {
            echo '1';
        }
    }

    public function import_teachers()
    {

        $upload = $this->modelInsert->import_excel();

        if ($upload['status'] == 1) {

            $file = './assets/tmp_import/' . $upload['upload_data']['file_name'];

            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            $spreadsheet = $reader->load($file);

            $sheetData = $spreadsheet->getActiveSheet()->toArray();

            for ($i = 1; $i < count($sheetData); $i++) {
                # code...
                $data = [
                    'namaGuru' => $sheetData[$i][1],
                    'nip' => $sheetData[$i][2],
                    'email' => $sheetData[$i][3],
                    'hp' => $sheetData[$i][4],
                    'password' => password_hash('password', PASSWORD_DEFAULT)
                ];

                $this->db->where('email', $sheetData[$i][3]);
                $cek = $this->db->get('data_teachers');

                if ($cek->num_rows() > 0) {
                    $error = 'ada dupikasi data Email pada ' . $cek->row()->email;
                    delete_files('./assets/tmp_import/');

                    $this->session->set_flashdata('tipe', 'error');
                    $this->session->set_flashdata('pesan', $error);
                    redirect('pageAdmin/teacher');
                } else {
                    $this->db->insert('data_teachers', $data);
                }
            }

            delete_files('./assets/tmp_import/');

            $this->session->set_flashdata('tipe', 'success');
            $this->session->set_flashdata('pesan', 'Data berhasil di import');
            redirect('pageAdmin/teacher');
        } else {
            delete_files('./assets/tmp_import/');

            $this->session->set_flashdata('tipe', 'error');
            $this->session->set_flashdata('pesan', $upload);
            redirect('pageAdmin/teacher');
        }
    }

    public function subject()
    {
        $namaMapel = $this->input->post('namaMapel');
        $kodeMapel = $this->input->post('kodeMapel');
        $kelompok = $this->input->post('kelompok');

        $insert = $this->modelInsert->subject($namaMapel, $kodeMapel, $kelompok);

        if ($insert == 1) {
            # code...
            echo json_encode('success');
        } elseif ($insert == 0) {
            echo json_encode('duplicated');
        } else {
            echo json_encode('error');
        }
    }

    public function import_subjects()
    {

        $upload = $this->modelInsert->import_excel();

        if ($upload['status'] == 1) {

            $file = './assets/tmp_import/' . $upload['upload_data']['file_name'];

            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            $spreadsheet = $reader->load($file);

            $sheetData = $spreadsheet->getActiveSheet()->toArray();

            for ($i = 1; $i < count($sheetData); $i++) {
                # code...
                $data = [
                    'namaMapel' => $sheetData[$i][1],
                    'kodeMapel' => $sheetData[$i][2],
                    'kelompok' => $sheetData[$i][3],
                ];

                $this->db->where('kodeMapel', $sheetData[$i][2]);
                $cek = $this->db->get('data_subjects');

                if ($cek->num_rows() > 0) {
                    $error = 'ada dupikasi data pada ' . $cek->row()->kodeMapel;
                    delete_files('./assets/tmp_import/');

                    $this->session->set_flashdata('tipe', 'error');
                    $this->session->set_flashdata('pesan', $error);
                    redirect('pageAdmin/subject');
                } else {
                    $this->db->insert('data_subjects', $data);
                }
            }
            delete_files('./assets/tmp_import/');

            $this->session->set_flashdata('tipe', 'success');
            $this->session->set_flashdata('pesan', 'Data berhasil di import');
            redirect('pageAdmin/subject');
        } else {
            delete_files('./assets/tmp_import/');

            $this->session->set_flashdata('tipe', 'error');
            $this->session->set_flashdata('pesan', $upload);
            redirect('pageAdmin/subject');
        }
    }

    public function timing()
    {
        $jamKe = $this->input->post('jamKe');
        $waktuMulai = $this->input->post('waktuMulai');
        $waktuSelesai = $this->input->post('waktuSelesai');

        $insert = $this->modelInsert->timing($jamKe, $waktuMulai, $waktuSelesai);

        if ($insert == 1) {
            # code...
            echo json_encode('success');
        } elseif ($insert == 0) {
            echo json_encode('duplicated');
        } else {
            echo json_encode('error');
        }
    }

    public function import_timing()
    {

        $upload = $this->modelInsert->import_excel();

        if ($upload['status'] == 1) {

            $file = './assets/tmp_import/' . $upload['upload_data']['file_name'];

            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            $spreadsheet = $reader->load($file);

            $sheetData = $spreadsheet->getActiveSheet()->toArray();

            for ($i = 1; $i < count($sheetData); $i++) {
                # code...
                $data = [
                    'jamKe' => $sheetData[$i][1],
                    'waktuMulai' => $sheetData[$i][2],
                    'waktuSelesai' => $sheetData[$i][3],
                ];

                $this->db->where('jamKe', $sheetData[$i][1]);
                $cek = $this->db->get('data_timing');

                if ($cek->num_rows() > 0) {
                    $error = 'ada dupikasi data pada jam ke ' . $cek->row()->jamKe;
                    delete_files('./assets/tmp_import/');

                    $this->session->set_flashdata('tipe', 'error');
                    $this->session->set_flashdata('pesan', $error);
                    redirect('pageAdmin/timing');
                } else {
                    $this->db->insert('data_timing', $data);
                }
            }
            delete_files('./assets/tmp_import/');

            $this->session->set_flashdata('tipe', 'success');
            $this->session->set_flashdata('pesan', 'Data berhasil di import');
            redirect('pageAdmin/timing');
        } else {
            delete_files('./assets/tmp_import/');

            $this->session->set_flashdata('tipe', 'error');
            $this->session->set_flashdata('pesan', $upload);
            redirect('pageAdmin/timing');
        }
    }

    public function import_scedules()
    {

        $upload = $this->modelInsert->import_excel();

        if ($upload['status'] == 1) {

            $file = './assets/tmp_import/' . $upload['upload_data']['file_name'];

            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            $spreadsheet = $reader->load($file);

            $sheetData = $spreadsheet->getActiveSheet()->toArray();

            for ($i = 1; $i < count($sheetData); $i++) {
                # code...
                $id_teacher = $this->db->get_where('data_teachers', ['email' => $sheetData[$i][1]])->row()->id;
                $id_subject = $this->db->get_where('data_subjects', ['kodeMapel' => $sheetData[$i][2]])->row()->id;
                $id_start_timing = $this->db->get_where('data_timing', ['jamKe' => $sheetData[$i][3]])->row()->id;
                $id_end_timing = $this->db->get_where('data_timing', ['jamKe' => $sheetData[$i][4]])->row()->id;
                $id_class = $this->db->get_where('data_classes', ['kodeKelas' => $sheetData[$i][5]])->row()->id;
                $id_day = $this->db->get_where('data_days', ['dayName' => $sheetData[$i][6]])->row()->id;



                $data = [
                    'id_teacher' => $id_teacher,
                    'id_subject' => $id_subject,
                    'id_start_timing' => $id_start_timing,
                    'id_end_timing' => $id_end_timing,
                    'id_class' => $id_class,
                    'id_day' => $id_day,
                ];

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

                if (($cek > 0) || ($cek2 > 0) || ($cek3 > 0)) {
                    $error = 'Terjadi bentrok data jadwal,, <br> silakan lakukan pengecekan pada baris ke - ' . $sheetData[$i][0];
                    delete_files('./assets/tmp_import/');

                    $this->session->set_flashdata('tipe', 'error');
                    $this->session->set_flashdata('pesan', $error);
                    redirect('pageAdmin/scedule');
                } else {
                    $this->db->insert('data_scedules', $data);
                }
            }
            delete_files('./assets/tmp_import/');

            $this->session->set_flashdata('tipe', 'success');
            $this->session->set_flashdata('pesan', 'Data berhasil di import');
            redirect('pageAdmin/scedule');
        } else {
            delete_files('./assets/tmp_import/');

            $this->session->set_flashdata('tipe', 'error');
            $this->session->set_flashdata('pesan', $upload);
            redirect('pageAdmin/scedule');
        }
    }

    public function chat()
    {
        $text = $this->input->post('text-chat', true);

        $text = str_replace('
', '<br>', $text);

        $insert = $this->modelInsert->chat($text);


        if ($insert == 1) {

            redirect('pageAdmin');
        } elseif ($insert == 0) {
            redirect('pageAdmin');
        }
    }

    function scedule()
    {

        $id_class = $this->input->post('id_class');
        $id_day = $this->input->post('id_day');
        $id_end_timing = $this->input->post('id_end_timing');
        $id_start_timing = $this->input->post('id_start_timing');
        $id_subject = $this->input->post('id_subject');
        $id_teacher = $this->input->post('id_teacher');

        $insert = $this->modelInsert->scedule($id_class, $id_day, $id_end_timing, $id_start_timing, $id_subject, $id_teacher);

        if ($insert == 1) {
            echo json_encode('success');
        } elseif ($insert == 2) {
            echo json_encode('duplicated');
        } elseif ($insert == 3) {
            echo json_encode('err');
        } else {
            echo json_encode('error');
        }
    }

    function templateSTsatu()
    {
        $nomor = $this->input->post('nomor');
        $dasarSurat = $this->input->post('dasarSurat');
        $nomorSurat = $this->input->post('nomorSurat');
        $tanggalSurat = $this->input->post('tanggalSurat');
        $perihal = $this->input->post('perihal');
        $ditugaskan = $this->input->post('ditugaskan');
        $hari = $this->input->post('hari');
        $tanggal = $this->input->post('tanggal');
        $waktu = $this->input->post('waktu');
        $tempat = $this->input->post('tempat');

        $data = [
            'nomor' => $nomor,
            'dasarSurat' => $dasarSurat,
            'nomorSurat' => $nomorSurat,
            'tanggalSurat' => $tanggalSurat,
            'perihal' => $perihal,
            'ditugaskan' => $ditugaskan,
            'hari' => $hari,
            'tanggal' => $tanggal,
            'waktu' => $waktu,
            'tempat' => $tempat,

        ];
        $this->db->where('id', 1);
        $this->db->update('data_templateSK', $data);

        redirect('pageAdmin/tempST', 'refresh');
    }
}

/* End of file Insert.php */
