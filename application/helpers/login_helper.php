<?php
defined('BASEPATH') or exit('No direct script access allowed');

function is_admin()
{
    if (!($_SESSION['level'] == 2)) {
        redirect('', 'refresh');
    }
}

function is_teacher()
{
    if (!($_SESSION['level'] == 1)) {
        redirect('', 'refresh');
    }
}
