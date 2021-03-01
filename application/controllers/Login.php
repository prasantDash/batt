<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library("form_validation");
		$this->load->library("session");

	}

	public function logout(){
		$this->session->unset_userdata('userData');
		redirect('/'); 
	}


	public function index(){
			

			$data = array();
			$data['res'] = array(
				"status"=>""
			);
			$this->load->view('header');
			$this->load->view('login',$data);
			$this->load->view('footer');
	}

	public function userData(){
		
		
		$this->form_validation->set_rules('username', 'user name', 'required');
		$this->form_validation->set_rules('pwd', 'password', 'required');
		if ($this->form_validation->run() == FALSE){
			
			
			$data = array();
			$data['res'] = array(
				"status"=>""
			);
			$this->load->view('header');
			$this->load->view('login',$data);
			$this->load->view('footer');

			echo validation_errors();
		}else{
				
			
			$resData = $this->input->post(array('username', 'pwd'), TRUE);
			$this->load->model("Login_model");
			$res = $this->Login_model->userValidation($resData);
			if($res['responce'] == 1){
				$this->session->set_userdata('userData', $res["data"]);
				redirect('/'); 
			}else{
				$data = array();
				$data['res'] = $res;
				$this->load->view('header');
				$this->load->view('login',$data);
				$this->load->view('footer');

				//echo validation_errors();
			}
			
			
			
		}
	}
}
