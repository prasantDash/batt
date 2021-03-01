<?php
class MY_Controller extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library("session");
		$this->load->helper('url');
		if(isset($this->session->get_userdata()['userData'])){
			return true;
		}else{
			redirect('/Login');
		}
		
				
	}

	public function checkUserLoginStatus(){
		return true;
	}
}