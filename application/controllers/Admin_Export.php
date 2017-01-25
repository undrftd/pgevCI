<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Export extends CI_Controller {

 function __construct()
 {
  parent::__construct();
  $this->load->database();
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
   $arrangeData['Time'] = date("m/d/Y g:i A", $data['timestamp']);
   $arrangeData['User ID'] = $data['session_id'];
   $arrangeData['Full Name'] = $data['fullname'];
   $arrangeData['Page Accessed'] = $data['request_uri'];
   $dataToExports[] = $arrangeData;
  }
  // set header
  $filename = "AuditLog.xls";
                header("Content-Type: application/vnd.ms-excel");
                header("Content-Disposition: attachment; filename=\"$filename\"");
  $this->exportExcelData($dataToExports);
 }
}