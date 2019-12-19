<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tampilKompensasi extends CI_Controller {

 function __construct(){
	parent::__construct();
	$this->load->model('modelKompensasi', '', TRUE);
	$this->load->helper(array('form', 'url'));
 }

 public function index()
 {
  $data['title'] = "Join CodeIgniter"; 
  // query memanggil function duatable di model
  $data['join3'] = $this->modelKompensasi->tigatable(); 
  $this->load->view("admin/dashboard", $data);   
  
 }

 
 } 
  
}