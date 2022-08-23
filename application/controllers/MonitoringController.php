<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MonitoringController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Monitoring';
        $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $data['sensor'] = $this->Monitoring_M->getSensor()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar',);
        $this->load->view('monitoring', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $this->form_validation->set_rules('nama', 'Nama Alat', 'trim|required', ['required' => 'Nama alat harus diisi']);

        if ($this->form_validation->run()) {
            $this->Monitoring_M->addSensors();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil disimpan. 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect("monitoring");
        }
    }

    public function sensorVal()
    {
        $data['sensor'] = $this->Monitoring_M->getSensor()->result();

        $this->load->view('sensor_data', $data);
    }

    public function getVal()
    {
        date_default_timezone_set('Asia/Jakarta');

        // get all sensors value after segment 2
        $nama = urldecode($this->uri->segment(3));
        $ph = $this->uri->segment(4);
        $suhu = $this->uri->segment(5);
        $amonia = $this->uri->segment(6);
        $tds = $this->uri->segment(7);
        $tss = $this->uri->segment(8);
        $salinitas = $this->uri->segment(9);
        $waktu = date('Y-m-d H:i:s');

        $data = [
            'nama' => $nama,
            'waktu' => $waktu,
            'ph' => $ph,
            'suhu' => $suhu,
            'amonia' => $amonia,
            'tds' => $tds,
            'tss' => $tss,
            'salinitas' => $salinitas,
        ];

        $logdata = [
            'nama' => $nama,
            'waktu' => $waktu,
            'ph' => $ph,
            'suhu' => $suhu,
            'amonia' => $amonia,
            'tds' => $tds,
            'tss' => $tss,
            'salinitas' => $salinitas,
        ];

        // update data
        $this->Monitoring_M->updateSensor($data);
        $this->Monitoring_M->insertLog($data['nama']);
    }

    public function detail($id)
    {
        $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Log Data';
        $data['sensor'] = $this->Monitoring_M->getSensor()->result();
        $data['detail'] = $this->Monitoring_M->getDetail($id)->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar',);
        $this->load->view('logdata', $data);
        $this->load->view('templates/footer');
    }

    public function deleteSensors($id)
    {
        $this->Monitoring_M->deleteSensor($id);
        redirect();
    }

    public function deleteLogdata($id)
    {
        $this->Monitoring_M->deleteLog($id);
        redirect();
    }

    public function export($id)
    {
        $file_name = 'logdata_' . $id . "_" . date('Y-m-d') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$file_name");
        header("Content-Type: application/csv;");

        // get data 
        $logdata = $this->Monitoring_M->getDetail($id);

        // file creation 
        $file = fopen('php://output', 'w');

        $header = array('ID Aqua', 'Nama', 'Waktu', 'PH', 'Suhu', 'Amonia', 'TDS', 'TSS', 'Salinitas', 'Status');
        fputcsv($file, $header);
        foreach ($logdata->result_array() as $key => $value) {
            fputcsv($file, $value);
        }
        fclose($file);
        exit;
    }
}

/* End of file MonitoringController.php */