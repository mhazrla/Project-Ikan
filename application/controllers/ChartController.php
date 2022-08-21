<?php


defined('BASEPATH') or exit('No direct script access allowed');

class ChartController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
    }

    public function getChart($id)
    {
        $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Grafik';
        $data['sensor'] = $this->Monitoring_M->getSensor()->result();

        $getAvg = $this->Chart_M->getAvg($id)->result();
        $data['avg'] = json_encode($getAvg);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar',);
        $this->load->view('chart_view', $data);
        $this->load->view('templates/footer', $data,);
    }
}

/* End of file ChartController.php */
