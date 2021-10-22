<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelLogin extends CI_Model
{

    function process_login()
    {
        $email = $this->input->post('email', true);
        $password = $this->input->post('password', true);
        $level = $this->input->post('level', true);

        if ($level == 1) {
            # is teacher ?
            $isregistered = $this->db->get_where('data_teachers', ['email' => $email]);
            if ($isregistered->num_rows() > 0) {
                # email is registered
                if (password_verify($password, $isregistered->row()->password)) {
                    # password is match
                    $array = array(
                        'user' => $isregistered->row()->email,
                        'level' => 1
                    );
                    $this->session->set_userdata($array);
                    return 1;
                } else {
                    # wrong password
                    return 3;
                }
            } else {
                # email not registered
                return 4;
            }
        } elseif ($level == 2) {
            # is administrator ?
            $isregistered = $this->db->get_where('data_administrators', ['email' => $email]);
            if ($isregistered->num_rows() > 0) {
                # email is registered
                if (password_verify($password, $isregistered->row()->password)) {
                    # password is match
                    $array = array(
                        'user' => $isregistered->row()->email,
                        'level' => 2
                    );
                    $this->session->set_userdata($array);
                    return 2;
                } else {
                    # wrong password
                    return 3;
                }
            } else {
                # email not registered
                return 4;
            }
        }
    }
}

/* End of file ModelLogin.php */
