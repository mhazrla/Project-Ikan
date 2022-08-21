<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AuthController extends CI_Controller
{

    public function index()
    {

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_message('required', '{field} masih kosong');


        if ($this->form_validation->run() == false) {

            $data['title'] = "Login Page";
            $this->load->view('templates/auth/header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('users', ['username' => $username])->row_array();

        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'username' => $user['username'],
                        'role_id' => $user['role_id']
                    ];

                    $this->session->set_userdata($data);
                    redirect('monitoring');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Password salah!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>');
                    redirect('auth/login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Akun ini tidak aktif
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Username tidak ada.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('auth/login');
        }
    }

    public function registration()
    {

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]', [
            'is_unique' => 'Username telah digunakan'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|matches[passconf]');
        $this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|min_length[6]|matches[password]');

        $this->form_validation->set_message('matches', 'Password tidak sama');
        $this->form_validation->set_message('required', '{field} masih kosong');
        $this->form_validation->set_message('min_length', 'Minimal password 6 karakter');

        if ($this->form_validation->run() == false) {

            $data['title'] = "Registration Form";
            $this->load->view('templates/auth/header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth/footer');
        } else {

            $data = [
                'name' => htmlspecialchars($this->input->post('name')),
                'username' => htmlspecialchars($this->input->post('username')),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->Auth_M->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Selamat!!</strong> Akun Anda sudah dibuat.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('auth/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Anda berhasil logout.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
        redirect('auth/login');
    }


    /* End of file AuthController.php */
}
