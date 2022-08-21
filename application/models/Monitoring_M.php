<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Monitoring_M extends CI_Model
{

    public function getSensor()
    {
        $this->db->order_by('nama', 'asc');
        return $this->db->get('monitoring');
    }

    public function getDetail($id)
    {
        $query = 'SELECT *,
                        COUNT(*) 
                        FROM logdata WHERE id_alat=?
                        GROUP BY HOUR(waktu), MINUTE(waktu)
                        ORDER BY HOUR(waktu) DESC, MINUTE(waktu) ASC';
        return $this->db->query($query, $id);
    }

    public function getIndexLog()
    {
        $query = "SELECT * FROM logdata JOIN monitoring ON monitoring.id = logdata.id_alat";
    }

    public function addSensors()
    {

        $data = [
            'nama' => $this->input->post('nama'),
        ];

        return $this->db->insert('monitoring', $data);
    }

    public function insertLog($nama)
    {

        $query = "INSERT logdata SELECT * FROM monitoring WHERE nama='$nama'";
        $this->db->query($query);
    }

    public function updateSensor($data)
    {
        $this->db->where('nama', $data['nama']);
        $this->db->update('monitoring', $data);
    }

    public function deleteLog($id)
    {

        return $this->db->delete('logdata', array('id_alat' => $id));
    }

    public function deleteSensor($id)
    {

        return $this->db->delete('monitoring', array('id' => $id));
    }
}

/* End of file Monitoring_M.php */
