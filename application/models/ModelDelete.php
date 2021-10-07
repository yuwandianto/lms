<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelDelete extends CI_Model
{

    function class($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('data_classes');
    }
}

/* End of file ModelDelete.php */
