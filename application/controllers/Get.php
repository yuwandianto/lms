<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Get extends CI_Controller
{

    function class()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $data = $this->db->get('data_classes')->result();
        echo json_encode($data);
    }

    function student()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $data = $this->db->get('data_students')->result();
        echo json_encode($data);
    }

    function teacher()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $data = $this->db->get('data_teachers')->result();
        echo json_encode($data);
    }

    function subject()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $data = $this->db->get('data_subjects')->result();
        echo json_encode($data);
    }

    function timing()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $data = $this->db->get('data_timing')->result();
        echo json_encode($data);
    }

    function scedule()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $data = $this->db->get('data_scedules')->result();
        echo json_encode($data);
    }
}

/* End of file Get.php */
