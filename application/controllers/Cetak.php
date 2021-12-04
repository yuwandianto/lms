<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak extends CI_Controller
{

    function stSatu()
    {
        $data['surat'] = $this->db->get_where('data_templateSK', ['id' => 1])->row();
        $data['sekolah'] = $this->db->get_where('data_instansi', ['id' => 1])->row();
        $data['kop1'] = $this->db->get_where('data_kopSurat', ['id' => 1])->row();

        $this->load->view('cetak/stSatu', $data);
    }
}

/* End of file Cetak.php */
