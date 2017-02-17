<?php

class Model_statistics extends CI_Model {

	function count_totaltickets()
	{
		$query = $this->db->select('*')->from('tickets')->get();
		return $query->num_rows();
	}

	function count_reservationcourtone()
	{
		$query = $this->db->select('*')->from('courtone_reservation')->get();
		return $query->num_rows();
	}

	function count_reservationcourttwo()
	{
		$query = $this->db->select('*')->from('courttwo_reservation')->get();
		return $query->num_rows();
	}

	function count_reservationclubhouse()
	{
		$query = $this->db->select('*')->from('clubhouse_reservation')->get();
		return $query->num_rows();
	}

	function count_carsticker()
	{
		$query = $this->db->select('*')->from('upload_carsticker')->get();
		return $query->num_rows();
	}

	function count_workpermit()
	{
		$query = $this->db->select('*')->from('upload_workpermit')->get();
		return $query->num_rows();
	}

	function count_renovation()
	{
		$query = $this->db->select('*')->from('upload_renovation')->get();
		return $query->num_rows();
	}

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

	function count_totalgarbage()
	{
		$query = $this->db->select('*')->from('tickets')->where('request_type', 'RTC')->get();
		return $query->num_rows();
	}

	function count_progressgarbage()
	{
		$query = $this->db->select('*')->from('tickets')->where('request_type', 'RTC')->where('status', 1)->get();
		return $query->num_rows();
	}

	function count_closedgarbage()
	{
		$query = $this->db->select('*')->from('tickets')->where('request_type', 'RTC')->where('status', 0)->get();
		return $query->num_rows();
	}

	function count_totalpest()
	{
		$query = $this->db->select('*')->from('tickets')->where('request_type', 'RPC')->get();
		return $query->num_rows();
	}

	function count_progresspest()
	{
		$query = $this->db->select('*')->from('tickets')->where('request_type', 'RPC')->where('status', 1)->get();
		return $query->num_rows();
	}

	function count_closedpest()
	{
		$query = $this->db->select('*')->from('tickets')->where('request_type', 'RPC')->where('status', 0)->get();
		return $query->num_rows();
	}

	function count_totalpost()
	{
		$query = $this->db->select('*')->from('tickets')->where('request_type', 'RMP')->get();
		return $query->num_rows();
	}

	function count_progresspost()
	{
		$query = $this->db->select('*')->from('tickets')->where('request_type', 'RMP')->where('status', 1)->get();
		return $query->num_rows();
	}

	function count_closedpost()
	{
		$query = $this->db->select('*')->from('tickets')->where('request_type', 'RMP')->where('status', 0)->get();
		return $query->num_rows();
	}

	function count_totalpipeline()
	{
		$query = $this->db->select('*')->from('tickets')->where('request_type', 'RPL')->get();
		return $query->num_rows();
	}

	function count_progresspipeline()
	{
		$query = $this->db->select('*')->from('tickets')->where('request_type', 'RPL')->where('status', 1)->get();
		return $query->num_rows();
	}

	function count_closedpipeline()
	{
		$query = $this->db->select('*')->from('tickets')->where('request_type', 'RPL')->where('status', 0)->get();
		return $query->num_rows();
	}

	function count_totaldrainage()
	{
		$query = $this->db->select('*')->from('tickets')->where('request_type', 'RBD')->get();
		return $query->num_rows();
	}

	function count_progressdrainage()
	{
		$query = $this->db->select('*')->from('tickets')->where('request_type', 'RBD')->where('status', 1)->get();
		return $query->num_rows();
	}

	function count_closeddrainage()
	{
		$query = $this->db->select('*')->from('tickets')->where('request_type', 'RBD')->where('status', 0)->get();
		return $query->num_rows();
	}

	function count_totalshortcircuit()
	{
		$query = $this->db->select('*')->from('tickets')->where('request_type', 'RSC')->get();
		return $query->num_rows();
	}

	function count_progressshortcircuit()
	{
		$query = $this->db->select('*')->from('tickets')->where('request_type', 'RSC')->where('status', 1)->get();
		return $query->num_rows();
	}

	function count_closedshortcircuit()
	{
		$query = $this->db->select('*')->from('tickets')->where('request_type', 'RSC')->where('status', 0)->get();
		return $query->num_rows();
	}

	function count_totalmonthlydues()
	{
		$query = $this->db->select('*')->from('tickets')->where('request_type', 'RMD')->get();
		return $query->num_rows();
	}

	function count_progressmonthlydues()
	{
		$query = $this->db->select('*')->from('tickets')->where('request_type', 'RMD')->where('status', 1)->get();
		return $query->num_rows();
	}

	function count_closedmonthlydues()
	{
		$query = $this->db->select('*')->from('tickets')->where('request_type', 'RMD')->where('status', 0)->get();
		return $query->num_rows();
	}

	function count_totalothers()
	{
		$query = $this->db->select('*')->from('tickets')->where('request_type', 'ROT')->get();
		return $query->num_rows();
	}

	function count_progressothers()
	{
		$query = $this->db->select('*')->from('tickets')->where('request_type', 'ROT')->where('status', 1)->get();
		return $query->num_rows();
	}

	function count_closedothers()
	{
		$query = $this->db->select('*')->from('tickets')->where('request_type', 'ROT')->where('status', 0)->get();
		return $query->num_rows();
	}

	function count_totalfire()
	{
		$query = $this->db->select('*')->from('tickets')->where('request_type', 'EFR')->get();
		return $query->num_rows();
	}

	function count_progressfire()
	{
		$query = $this->db->select('*')->from('tickets')->where('request_type', 'EFR')->where('status', 1)->get();
		return $query->num_rows();
	}

	function count_closedfire()
	{
		$query = $this->db->select('*')->from('tickets')->where('request_type', 'EFR')->where('status', 0)->get();
		return $query->num_rows();
	}

	function count_totalrobbery()
	{
		$query = $this->db->select('*')->from('tickets')->where('request_type', 'ERB')->get();
		return $query->num_rows();
	}

	function count_progressrobbery()
	{
		$query = $this->db->select('*')->from('tickets')->where('request_type', 'ERB')->where('status', 1)->get();
		return $query->num_rows();
	}

	function count_closedrobbery()
	{
		$query = $this->db->select('*')->from('tickets')->where('request_type', 'ERB')->where('status', 0)->get();
		return $query->num_rows();
	}

	function count_totalbrokentube()
	{
		$query = $this->db->select('*')->from('tickets')->where('request_type', 'EBT')->get();
		return $query->num_rows();
	}

	function count_progressbrokentube()
	{
		$query = $this->db->select('*')->from('tickets')->where('request_type', 'EBT')->where('status', 1)->get();
		return $query->num_rows();
	}

	function count_closedbrokentube()
	{
		$query = $this->db->select('*')->from('tickets')->where('request_type', 'EBT')->where('status', 0)->get();
		return $query->num_rows();
	}

	function count_totalsuspiciousperson()
	{
		$query = $this->db->select('*')->from('tickets')->where('request_type', 'ESP')->get();
		return $query->num_rows();
	}

	function count_progresssuspiciousperson()
	{
		$query = $this->db->select('*')->from('tickets')->where('request_type', 'ESP')->where('status', 1)->get();
		return $query->num_rows();
	}

	function count_closedsuspiciousperson()
	{
		$query = $this->db->select('*')->from('tickets')->where('request_type', 'ESP')->where('status', 0)->get();
		return $query->num_rows();
	}

	function count_totalcctv()
	{
		$query = $this->db->select('*')->from('tickets')->where('request_type', 'CTV')->get();
		return $query->num_rows();
	}

	function count_progresscctv()
	{
		$query = $this->db->select('*')->from('tickets')->where('request_type', 'CTV')->where('status', 1)->get();
		return $query->num_rows();
	}

	function count_closedcctv()
	{
		$query = $this->db->select('*')->from('tickets')->where('request_type', 'CTV')->where('status', 0)->get();
		return $query->num_rows();
	}

}
