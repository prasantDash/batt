<?php 
Class Users_model  extends CI_Model { 

	Public function __construct() { 
		parent::__construct();
		$this->load->helper('url'); 
		$this->load->database();  
	}

	public function getalluser(){
		$this->db->select("id,name,email");
		$query = $this->db->get("users");
		$query = $query->result();
		return $query;
	}

	public function ifUserExit($userName = false){
		$this->db->select("id,username,created_date,status");
		if($userName){
			$this->db->where("username",$userName);
		}		
		$query = $this->db->get("users"); 

		return count($query->result());

			
	}

	public function editUser($data){
		$data = json_decode($data);
		$inputData = array();
		$inputData['status'] = 1;
		$inputData['username'] = $data->username;
		$inputData['password'] = $data->password;
		$inputData['updated_date'] = date("Y-m-d H:i:s");

		
		$this->db->where("id", $data->id); 
		$updateStatus = $this->db->update("users", $inputData);
		return $updateStatus;
	}

	public function deleteUser($id = false){	
		$data = array();
		$data['status'] = 0;
		$this->db->where("id", $id); 
		$updateStatus = $this->db->update("users", $data);
		return $updateStatus; 
	}

	Public function getUserDetail($id = false){
		$this->db->select("id,name");
		$this->db->where("status",1);
		if($id){
			$this->db->where("id",$id);
		}		
		$query = $this->db->get("users"); 

		$data['records'] = $query->result();

		return json_encode($data);
	}

	public function createUser($data){
		$data = json_decode($data);
		if($this->db->insert("users", $data)) { 
			return true; 
		} 
	}




	
} 
?> 