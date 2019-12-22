<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tampilProdi extends CI_Controller {

 function __construct(){
	parent::__construct();
	$this->load->model('modelProdi', '', TRUE);
	$this->load->helper(array('form', 'url'));
 }

 public function index()
 {
  $data['title'] = "Join CodeIgniter"; 
  // query memanggil function duatable di model
  $data['join3'] = $this->modelProdi->tigatable(); 
  $this->load->view("prodi/dashboard", $data);    
  
 } 
 public function delete($id=null){
 	if(!isset($id)) show_404();

 	if ($this->modelProdi->delete($id)) {
 		redirect(site_url('prodi/dashboard'));
 	}
  
	}
}