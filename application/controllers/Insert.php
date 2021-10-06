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

        $upload = $this->modelInsert->import_classes();

        if ($upload == 1) {

            $file = './assets/tmp_import/kelas.xlsx';

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
            delete_files('.assets/tmp_import/');

            $this->session->set_flashdata('tipe', 'success');
            $this->session->set_flashdata('pesan', 'Data berhasil di import');
            redirect('pageAdmin/class');
        } else {
            delete_files('./assets/tmp_import/');

            $this->session->set_flashdata('tipe', 'error');
            $this->session->set_flashdata('pesan', $upload);
            redirect('pageAdmin/class');
        }

        // print_r($sheetData);
    }

    function student()
    {
        $namaSiswa = $this->input->post('namaSiswa');
        $kodeKelas = $this->input->post('kodeKelas');
        $nisn = $this->input->post('nisn');

        $insert = $this->modelInsert->student($namaSiswa,$kodeKelas,$nisn);

        if ($insert == 0) {
            echo '0';
        } elseif($insert == 2) {
            echo 'Data tidak berhasil diinput';
        } else {
            echo '1';
        }
        
    }
}

/* End of file Insert.php */
