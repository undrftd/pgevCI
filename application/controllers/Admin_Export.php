<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Export extends CI_Controller {

 function __construct()
    {   
      parent::__construct();

      $this->load->model('model_accounts');
      $session_admin = $this->session->userdata('isAdmin');
      $session_deact = $this->session->userdata('status');
      $session_data = $this->model_accounts->checksession();
      $session_username = $this->session->userdata('username');
      
      $method = $this->router->fetch_method();

      if(($session_admin == FALSE) && $method != 'login')
      {
          $this->session->set_flashdata( 'message', 'You need to login to access this location' );
          redirect('user_home');
      }
      elseif(($session_deact == 'deact') && $method != 'login')
      {
          $this->session->set_flashdata( 'message', 'You need to login to access this location' );
          redirect('admin_deact');
      }

      if($session_data->username != $session_username)
      {
          redirect('login/signout');
      }
    }
 

 public function exportExcelData($records)
 {
  $heading = false;
        if (!empty($records))
            foreach ($records as $row) {
                if (!$heading) {
                    // display field/column names as a first row
                    echo implode("\t", array_keys($row)) . "\n";
                    $heading = true;
                }
                echo implode("\t", ($row)) . "\n";
            }
 }

 public function exportData()
 {
  $query =$this->db->get('usertracking'); // fetch Data from table
  $allData = $query->result_array();  // this will return all data into array
  $dataToExports = [];
  foreach ($allData as $data) {
   $arrangeData['Time,'] = date("m/d/Y g:i A", $data['timestamp']) . ",";
   $arrangeData['User ID,'] = $data['session_id'] . ",";
   $arrangeData['Full Name,'] = $data['fullname'] . ",";
   $arrangeData['Page Accessed,'] = $data['request_uri'] . ",";
   $dataToExports[] = $arrangeData;
  }
  // set header
  $filename = "AuditLog.csv";
                header("Content-Type: application/vnd.ms-excel");
                header("Content-Disposition: attachment; filename=\"$filename\"");
  $this->exportExcelData($dataToExports);
 }

 public function exportDataTicket()
 {
  $query = $this->db->select('*')->from('accounts')->join('ticketlog', 'accounts.userid = ticketlog.userid' )->get();
  $allData = $query->result_array();  // this will return all data into array
  $dataToExports = [];
  foreach ($allData as $data) {
   $arrangeData['Ticket ID,'] = $data['request_type'] . "-" . $data['ticketid'] . ",";
   $arrangeData['Homeowner\'s Name,'] = $data['firstname'] . " " . $data['lastname'] . ",";
   $arrangeData['Date Requested,'] = date("m/d/Y g:i A", $data['date_requested']) . ",";
   $dataToExports[] = $arrangeData;
  }
  // set header
  $filename = "TicketLog.csv";
                header("Content-Type: application/vnd.ms-excel");
                header("Content-Disposition: attachment; filename=\"$filename\"");
  $this->exportExcelData($dataToExports);
 }

 public function exportDuesHomeowner()
 {
  $query = $this->db->select('*')->from('accounts')->where('role', 0)->get();
  $allData = $query->result_array();  // this will return all data into array
  $dataToExports = [];
  foreach ($allData as $data) {
   $arrangeData['Homeowner\'s Name,'] = $data['firstname'] . " " . $data['lastname'] . ",";
   $arrangeData['Monthly Dues'] = $data['monthly_dues'] . ",";
   $arrangeData['Arrears'] = $data['arrears'] . ",";
   $arrangeData['Total Balance'] = $data['monthly_dues'] + $data['arrears'] . ",";
   $dataToExports[] = $arrangeData;
  }
  // set header
  $filename = "Homeowner_Dues.csv";
                header("Content-Type: application/vnd.ms-excel");
                header("Content-Disposition: attachment; filename=\"$filename\"");
  $this->exportExcelData($dataToExports);
 }

 public function exportDuesAdmin()
 {
  $query = $this->db->select('*')->from('accounts')->where('role', 1)->get();
  $allData = $query->result_array();  // this will return all data into array
  $dataToExports = [];
  foreach ($allData as $data) {
   $arrangeData['Homeowner\'s Name,'] = $data['firstname'] . " " . $data['lastname'] . ",";
   $arrangeData['Monthly Dues'] = $data['monthly_dues'] . ",";
   $arrangeData['Arrears'] = $data['arrears'] . ",";
   $arrangeData['Total Balance'] = $data['monthly_dues'] + $data['arrears'] . ",";
   $dataToExports[] = $arrangeData;
  }
  // set header
  $filename = "Admin_Dues.csv";
                header("Content-Type: application/vnd.ms-excel");
                header("Content-Disposition: attachment; filename=\"$filename\"");
  $this->exportExcelData($dataToExports);
 }
}