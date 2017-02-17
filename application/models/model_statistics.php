<?php

class Model_statistics extends CI_Model {

	function count_january()
	{
		$query = $this->db->select('date_requested')->from('tickets')->get();
		$result = $query->result();

		$ctr = 0;
		foreach($result as $row):
			if(date("F", strtotime(unix_to_human($row->date_requested))) == "January")
			{
				$ctr++;
			}
			else
			{
				$ctr = $ctr+0;
			}
		endforeach;

		return $ctr;
	}

	function count_february()
	{
		$query = $this->db->select('date_requested')->from('tickets')->get();
		$result = $query->result();

		$ctr = 0;
		foreach($result as $row):
			if(date("F", strtotime(unix_to_human($row->date_requested))) == "February")
			{
				$ctr++;
			}
			else
			{
				$ctr = $ctr+0;
			}
		endforeach;

		return $ctr;
	}

	function count_march()
	{
		$query = $this->db->select('date_requested')->from('tickets')->get();
		$result = $query->result();

		$ctr = 0;
		foreach($result as $row):
			if(date("F", strtotime(unix_to_human($row->date_requested))) == "March")
			{
				$ctr++;
			}
			else
			{
				$ctr = $ctr+0;
			}
		endforeach;

		return $ctr;
	}

	function count_april()
	{
		$query = $this->db->select('date_requested')->from('tickets')->get();
		$result = $query->result();

		$ctr = 0;
		foreach($result as $row):
			if(date("F", strtotime(unix_to_human($row->date_requested))) == "April")
			{
				$ctr++;
			}
			else
			{
				$ctr = $ctr+0;
			}
		endforeach;

		return $ctr;
	}

	function count_may()
	{
		$query = $this->db->select('date_requested')->from('tickets')->get();
		$result = $query->result();

		$ctr = 0;
		foreach($result as $row):
			if(date("F", strtotime(unix_to_human($row->date_requested))) == "May")
			{
				$ctr++;
			}
			else
			{
				$ctr = $ctr+0;
			}
		endforeach;

		return $ctr;
	}

	function count_june()
	{
		$query = $this->db->select('date_requested')->from('tickets')->get();
		$result = $query->result();

		$ctr = 0;
		foreach($result as $row):
			if(date("F", strtotime(unix_to_human($row->date_requested))) == "June")
			{
				$ctr++;
			}
			else
			{
				$ctr = $ctr+0;
			}
		endforeach;

		return $ctr;
	}

	function count_july()
	{
		$query = $this->db->select('date_requested')->from('tickets')->get();
		$result = $query->result();

		$ctr = 0;
		foreach($result as $row):
			if(date("F", strtotime(unix_to_human($row->date_requested))) == "July")
			{
				$ctr++;
			}
			else
			{
				$ctr = $ctr+0;
			}
		endforeach;

		return $ctr;
	}

	function count_august()
	{
		$query = $this->db->select('date_requested')->from('tickets')->get();
		$result = $query->result();

		$ctr = 0;
		foreach($result as $row):
			if(date("F", strtotime(unix_to_human($row->date_requested))) == "August")
			{
				$ctr++;
			}
			else
			{
				$ctr = $ctr+0;
			}
		endforeach;

		return $ctr;
	}

	function count_september()
	{
		$query = $this->db->select('date_requested')->from('tickets')->get();
		$result = $query->result();

		$ctr = 0;
		foreach($result as $row):
			if(date("F", strtotime(unix_to_human($row->date_requested))) == "September")
			{
				$ctr++;
			}
			else
			{
				$ctr = $ctr+0;
			}
		endforeach;

		return $ctr;
	}

	function count_october()
	{
		$query = $this->db->select('date_requested')->from('tickets')->get();
		$result = $query->result();

		$ctr = 0;
		foreach($result as $row):
			if(date("F", strtotime(unix_to_human($row->date_requested))) == "October")
			{
				$ctr++;
			}
			else
			{
				$ctr = $ctr+0;
			}
		endforeach;

		return $ctr;
	}

	function count_november()
	{
		$query = $this->db->select('date_requested')->from('tickets')->get();
		$result = $query->result();

		$ctr = 0;
		foreach($result as $row):
			if(date("F", strtotime(unix_to_human($row->date_requested))) == "November")
			{
				$ctr++;
			}
			else
			{
				$ctr = $ctr+0;
			}
		endforeach;

		return $ctr;
	}

	function count_december()
	{
		$query = $this->db->select('date_requested')->from('tickets')->get();
		$result = $query->result();

		$ctr = 0;
		foreach($result as $row):
			if(date("F", strtotime(unix_to_human($row->date_requested))) == "December")
			{
				$ctr++;
			}
			else
			{
				$ctr = $ctr+0;
			}
		endforeach;

		return $ctr;
	}

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
