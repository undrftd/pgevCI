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

    function unique_reserve_time_courtone()
    {

        $reservedate = $this->CI->input->post('datepick');
        $reservetime = $this->CI->input->post('reservetime');

        $check = $this->CI->db->get_where('courtone_reservation', array('reservation_date' => $reservedate, 'reservation_time' => $reservetime), 1);

        if ($check->num_rows() > 0) {

            $this->set_message('unique_reserve_time_courtone', 'This time schedule is already booked.');

            return FALSE;
        }

        return TRUE;
    }

    function unique_reserve_time_courttwo()
    {

        $reservedate = $this->CI->input->post('datepick');
        $reservetime = $this->CI->input->post('reservetime');

        $check = $this->CI->db->get_where('courttwo_reservation', array('reservation_date' => $reservedate, 'reservation_time' => $reservetime), 1);

        if ($check->num_rows() > 0) {

            $this->set_message('unique_reserve_time_courttwo', 'This time schedule is already booked.');

            return FALSE;
        }

        return TRUE;
    }

     function unique_reserve_time_clubhouse()
    {

        $reservedate = $this->CI->input->post('datepick');
        $reservetime = $this->CI->input->post('reservetime');

        $check = $this->CI->db->get_where('clubhouse_reservation', array('reservation_date' => $reservedate, 'reservation_time' => $reservetime), 1);

        if ($check->num_rows() > 0) {

            $this->set_message('unique_reserve_time_clubhouse', 'This time schedule is already booked.');

            return FALSE;
        }

        return TRUE;
    }

}