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

        $data = [
            'namaKelas' => $namaKelas,
            'kodeKelas' => $kodeKelas,
            'tingkat' => $tingkat
        ];
        $this->db->where('id', $id);
        $this->db->update('data_classes', $data);
    }
}

/* End of file Edit.php */
