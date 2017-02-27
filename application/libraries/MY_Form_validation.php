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
        
        $reserveactualend = $reserveend - 1;
        $reserveactualstart = $reservestart + 1;

        if($checkstart->num_rows() > 0 || $tdX[$reservestart] == 1 || $tdX[$reserveactualend] == 1 || $tdX[$reserveactualstart] == 1) {

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

        $checkstart = $this->CI->db->get_where('courttwo_reservation', array('reservation_date' => $reservedate, 'reservation_start' => $reservestart, 'reservation_status' => 1), 1);

        $checkresult = $this->CI->db->get_where('courttwo_reservation', array('reservation_date' => $reservedate, 'reservation_status' => 1));
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
        
        $reserveactualend = $reserveend - 1;
        $reserveactualstart = $reservestart + 1;

        if($checkstart->num_rows() > 0 || $tdX[$reservestart] == 1 || $tdX[$reserveactualend] == 1 || $tdX[$reserveactualstart] == 1) {

            $this->set_message('unique_reserve_courtone', 'This time schedule is already booked.');

            return FALSE;
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
            while($result->reservation_start <= $result->reservation_end)
            {
                $tdX[$result->reservation_start] = 1;
                $result->reservation_start++;
            }
        }
        
        $reserveactualend = $reserveend - 1;
        $reserveactualstart = $reservestart + 1;

        if($checkstart->num_rows() > 0 || $tdX[$reservestart] == 1 || $tdX[$reserveactualend] == 1 || $tdX[$reserveactualstart] == 1) {

            $this->set_message('unique_reserve_courtone', 'This time schedule is already booked.');

            return FALSE;
        }
        return TRUE;
    }
}