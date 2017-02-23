<?php

class MY_Form_validation extends CI_Form_validation{
    
    function edit_unique($value, $params)  
    {
    	$CI =& get_instance();
    	$CI->load->database();

    	$CI->form_validation->set_message('edit_unique', "{field} already exists!");

    	list($table, $field, $current_id) = explode(".", $params);

    	$query = $CI->db->select()->from($table)->where($field, $value)->limit(1)->get();

    	if ($query->row() && $query->row()->username != $current_id)
    	{
        	return FALSE;
    	} 
    	else 
    	{
        	return TRUE;
    	}

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

    function unique_reserve_courtone()
    {
        $reservedate = $this->CI->input->post('datepick');
        $reservestart = $this->CI->input->post('reservestart');

        $checkstart = $this->CI->db->get_where('courtone_reservation', array('reservation_date' => $reservedate, 'reservation_time' => $reservestart, 'reservation_status' => 1), 1);

        if ($checkstart->num_rows() > 0) {

            $this->set_message('unique_reserve_courtone', 'This time schedule is already booked.');

            return FALSE;
        }

        return TRUE;
    }

    function unique_reserve_courttwo()
    {
        $reservedate = $this->CI->input->post('datepick');
        $reservestart = $this->CI->input->post('reservestart');
        $reserveend = $this->CI->input->post('reserveend');

        $checkstart = $this->CI->db->get_where('courttwo_reservation', array('reservation_date' => $reservedate, 'reservation_time' => $reservestart, 'reservation_status' => 1), 1);

        if ($checkstart->num_rows() > 0) {

            $this->set_message('unique_reserve_courttwo', 'This time schedule is already booked.');

            return FALSE;
        }

        return TRUE;
    }

    function unique_reserve_clubhouse()
    {
        $reservedate = $this->CI->input->post('datepick');
        $reservestart = $this->CI->input->post('reservestart');
        $reserveend = $this->CI->input->post('reserveend');

        $checkstart = $this->CI->db->get_where('clubhouse_reservation', array('reservation_date' => $reservedate, 'reservation_time' => $reservestart, 'reservation_status' => 1), 1);

        if ($checkstart->num_rows() > 0) {

            $this->set_message('unique_reserve_clubhouse', 'This time schedule is already booked.');

            return FALSE;
        }

        return TRUE;
    }
}