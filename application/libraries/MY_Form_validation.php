<?php

class MY_Form_validation extends CI_Form_validation{

    function edit_unique($value, $params)
    {
    	$CI =& get_instance();
    	$CI->load->database();

    	$CI->form_validation->set_message('edit_unique', "{field} already exists!");

    	list($table, $field, $current_id) = explode(".", $params);

    	$query = $CI->db->select()->from($table)->where($field, $value)->limit(1)->get();

    	if ($query->row() && $query->row()->userid != $current_id)
    	{
        	return FALSE;
    	}
    	else
    	{
        	return TRUE;
    	}

	}

    function hourselection()
    {
        $reservestart = $this->CI->input->post('reservestart');
        $reserveend = $this->CI->input->post('reserveend');

        if($reservestart >= $reserveend)
        {
            $this->set_message('hourselection', 'Your time selection is invalid.');

            return FALSE;
        }

        return TRUE;
    }

    function birthvalidate()
    {
        $birthdate = $this->CI->input->post('birthdate');

        if(($birthdate >= date("Y-m-d")) || strlen($birthdate) > 10)
        {
            $this->set_message('birthvalidate', 'Your birthdate is invalid.');

            return FALSE;
        }

        return TRUE;
    }

    function no_olddate()
    {
        $reservedate = $this->CI->input->post('datepick');

        if($reservedate < date("m/d/Y"))
        {
            $this->set_message('no_olddate', 'You can only pick the current date onwards.');

            return FALSE;
        }

        return TRUE;
    }

    function max_time()
    {
        $reservedate = $this->CI->input->post('datepick');
        $reservetime = $this->CI->input->post('reservestart');

        if($reservedate == date("m/d/Y") && date("g") >= '4')
        {
          $this->set_message('max_time', 'You can only reserve amenities for today until 4:00 PM only.');

          return FALSE;
        }
    }

    function min_fourhours()
    {
        $reservestart = $this->CI->input->post('reservestart');
        $reserveend = $this->CI->input->post('reserveend');

        $diff = $reserveend - $reservestart;
        if($diff < 4)
        {
            $this->set_message('min_fourhours', 'You can only book for a minimum of four hours.');

            return FALSE;
        }

        return TRUE;
    }

    function unique_reserve_courtone()
    {
        $reservedate = $this->CI->input->post('datepick');
        $reservestart = $this->CI->input->post('reservestart');
        $reserveend = $this->CI->input->post('reserveend');

        $checkstart = $this->CI->db->get_where('courtone_reservation', array('reservation_date' => $reservedate, 'reservation_start' => $reservestart, 'reservation_status' => 1), 1);

        $checkresult = $this->CI->db->get_where('courtone_reservation', array('reservation_date' => $reservedate, 'reservation_status' => 1));
        $resultreserve = $checkresult->result();
        $tdX = array(0,0,0,0,0,0,0,0,0,0);

        foreach($resultreserve as $result)
        {
            while($result->reservation_start <= $result->reservation_end)
            {
                $tdX[$result->reservation_start] = 1;
                $result->reservation_start++;
            }
        }


        for($i = $reservestart; $i < $reserveend; $i++)
        {
            if($checkstart->num_rows() > 0 || $tdX[$i] == 1)
            {
                $this->set_message('unique_reserve_courtone', 'This time schedule is already booked.');

                return FALSE;
                break;
            }
        }
        return TRUE;
    }

    function unique_reserve_courttwo()
    {
        $reservedate = $this->CI->input->post('datepick');
        $reservestart = $this->CI->input->post('reservestart');
        $reserveend = $this->CI->input->post('reserveend');

        $checkstart = $this->CI->db->get_where('courttwo_reservation', array('reservation_date' => $reservedate, 'reservation_start' => $reservestart, 'reservation_status' => 1), 1);

        $checkresult = $this->CI->db->get_where('courttwo_reservation', array('reservation_date' => $reservedate, 'reservation_status' => 1));
        $resultreserve = $checkresult->result();
        $tdX = array(0,0,0,0,0,0,0,0,0,0);

        foreach($resultreserve as $result)
        {
            while($result->reservation_start < $result->reservation_end)
            {
                $tdX[$result->reservation_start] = 1;
                $result->reservation_start++;
            }
        }

        for($i = $reservestart; $i < $reserveend; $i++)
        {
            if($checkstart->num_rows() > 0 || $tdX[$i] == 1)
            {
                $this->set_message('unique_reserve_courttwo', 'This time schedule is already booked.');

                return FALSE;
                break;
            }
        }
        return TRUE;
    }

    function unique_reserve_clubhouse()
    {
        $reservedate = $this->CI->input->post('datepick');
        $reservestart = $this->CI->input->post('reservestart');
        $reserveend = $this->CI->input->post('reserveend');

        $checkstart = $this->CI->db->get_where('clubhouse_reservation', array('reservation_date' => $reservedate, 'reservation_start' => $reservestart, 'reservation_status' => 1), 1);

        $checkresult = $this->CI->db->get_where('clubhouse_reservation', array('reservation_date' => $reservedate, 'reservation_status' => 1));
        $resultreserve = $checkresult->result();
        $tdX = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);

        foreach($resultreserve as $result)
        {
            while($result->reservation_start < $result->reservation_end)
            {
                $tdX[$result->reservation_start] = 1;
                $result->reservation_start++;
            }
        }

        for($i = $reservestart; $i < $reserveend; $i++)
        {
            if($checkstart->num_rows() > 0 || $tdX[$i] == 1)
            {
                $this->set_message('unique_reserve_clubhouse', 'This time schedule is already booked.');

                return FALSE;
                break;
            }
        }
        return TRUE;
    }
}
