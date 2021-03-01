<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	function __construct() { 
		parent::__construct(); 
		$this->load->helper('url');
		$this->load->library("session");	
	}

	public function index(){
		$this->load->view("header");
		$this->load->view("test_page");
		$this->load->view("footer");
	}	
}
