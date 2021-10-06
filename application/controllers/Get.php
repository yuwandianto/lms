<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Get extends CI_Controller
{

    public function classes()
    {
        $class = $this->db->get('data_classes')->result();
        $no = 1;
        foreach ($class as $key) {
            echo '<tr>';
            echo '<td>' . $no++ . '</td>';
            echo '<td>' . $key->namaKelas . '</td>';
            echo '<td>' . $key->kodeKelas . '</td>';
            echo '<td>' . $key->tingkat . '</td>';
            echo '<td></td>';
            echo '</tr>';
        }
    }

    function class()
    {
        $id = $this->input->post('id');

        $this->db->where('id', $id);
        $data = $this->db->get('data_classes')->result();

        // $mydata = [];
        // foreach ($data as $key ) {
        //     # code...

        // }

        echo json_encode($data);
    }
}

/* End of file Get.php */
