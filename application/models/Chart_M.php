<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Chart_M extends CI_Model
{

	public function getAvg($id)
	{
		$query = "SELECT nama
                    , DATE(waktu) AS date
                    , ROUND(AVG(ph), 2) as pH
                    , ROUND(AVG(suhu), 2) as suhu
                    , ROUND(AVG(amonia), 2) as amonia
                    , ROUND(AVG(tds), 2) as TDS
                    , ROUND(AVG(tss), 2) as TSS
                    , ROUND(AVG(salinitas), 2) as salinitas
                    , status
                    
                FROM logdata WHERE id_alat = $id
                GROUP BY 1, 2";

		return $this->db->query($query);
	}
}

/* End of file Chart_M.php */
