<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth_M extends CI_Model
{

    public function insert($data)
    {
        return $this->db->insert('users', $data);
    }
}

/* End of file Auth_M.php */
