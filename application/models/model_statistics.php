<?php

class Model_statistics extends CI_Model {

	function count_totalgrasscutting()
	{
		$query = $this->db->select('*')->from('tickets')->where('request_type', 'RGC')->get();
		return $query->num_rows();
	}

	function count_progressgrasscutting()
	{
		$query = $this->db->select('*')->from('tickets')->where('request_type', 'RGC')->where('status', 1)->get();
		return $query->num_rows();
	}

	function count_closedgrasscutting()
	{
		$query = $this->db->select('*')->from('tickets')->where('request_type', 'RGC')->where('status', 0)->get();
		return $query->num_rows();
	}

	/*function averesolution_time()
	{
		$query = $this->db->select('AVG(date_requested) as averagedate')->from('tickets')->get();
		$time = $query->row()->averagedate;

		$query2 = $this->db->select('AVG(date_closed) as averagedate')->from('tickets')->get();
		$time2 = $query->row()->averagedate;

		return timespan($time, $time2, 3);
	}*/
	

}
