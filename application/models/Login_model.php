<?php
Class Login_model  extends CI_Model{
	Public function __construct() { 
		parent::__construct();
		$this->load->library('encrypt'); 
		$this->load->database();  
	}

	public function userValidation($data){
		$username = $data['username'];
		$password = $data['pwd'];
		
		$this->db->select("*");
		$this->db->where("email",$username);
		
		$query = $this->db->get("users");
		$query = $query->result();
		if(count($query) == 1){
			$decode = $this->encrypt->decode($query[0]->password);
			if($decode == $password){
				return array(
					"status"=>"success",
					"responce"=> 1,
					"data"=>$query,
				);
			}else{
				return array(
					"status"=>"Invalid password",
					"responce"=> 0,
					"data"=>array(),
				);
			}
		}else{
			return array(
				"status"=>"Invalid user",
				"responce"=> 0,
				"data"=>array(),
			);
		}
		
	}
}
?>