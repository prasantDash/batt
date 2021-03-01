<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	//To create users
	//http://localhost/projects/codeigniterPro/index.php/Users/createUser?username=root1&password=root1
	//Toget all user detail
	//http://localhost/projects/codeigniterPro/index.php/Users/getUserDetail
	//Toget user id wise
	//http://localhost/projects/codeigniterPro/index.php/Users/getUserDetail/1
	//To deleted user
	//http://localhost/projects/codeigniterPro/index.php/Users/deleteUser/8
	//To edit user
	//http://localhost/projects/codeigniterPro/index.php/Users/editUser/1/admin1/admin1

	function __construct() { 
		parent::__construct(); 
		$this->load->helper('url');		
	}

	public function getalluser(){

		$cachesName = "user";
		
		$this->load->driver("cache",array("adapter"=>"apc","backup"=>"file"));
		if(!$this->cache->get($cachesName)){
			$this->load->model("Users_model");
			$responce  = $this->Users_model->getalluser();
			$this->cache->save($cachesName,$responce,5);
		}else{
			$getCache = $this->cache->cache_info();
			echo "<pre>";
			var_dump($getCache);
		}
		
	}

	public function deleteAllCache(){
		$this->load->driver("cache",array("adapter"=>"apc","backup"=>"file"));
		$delCache = $this->cache->clean();
		if($delCache){
			echo "Cache deleted";
		}else{
			echo "Unable to delete cached";
		}
	}

	public function deleteCache($cacheName){
		$this->load->driver("cache",array("adapter"=>"apc","backup"=>"file"));
		$delCache = $this->cache->delete("user");
		if($delCache){
			echo "Cache deleted";
		}else{
			echo "Unable to delete cached";
		}
	}

	public function index() { 
		echo "User Controllers"; 
	}

	public function editUser($id,$username,$password){
		$data = array();

		$data['id'] = $id;
		$data['username'] = $username;
		$data['password'] = md5($password);

		$this->load->model('Users_model');
		$data = json_encode($data);
		$userData = $this->Users_model->editUser($data);
		
		$res = array();
		if($userData){
			$res['status'] = "Success";
			$res['mess'] = "User updated successfully.";
		}else{
			$res['status'] = "Fail";
			$res['mess'] = "Unable to update user.";
		}
		echo json_encode($res);
	}


	public function deleteUser($id = false){
		$this->load->model('Users_model');
		$userData = $this->Users_model->deleteUser($id);
		$res = array();
		if($userData){
			$res['status'] = "Success";
			$res['mess'] = "User deleted succesfully.";
		}else{
			$res['status'] = "Fail";
			$res['mess'] = "Unable to delete.";
		}
		echo json_encode($res);
	}

	public function ifUserExit($data = false){
		$this->load->model('Users_model');
		$deleteStatus = $this->Users_model->ifUserExit($data);
		return $deleteStatus;
	}

	public function createUser(){
		$username = $this->input->get('username');
		$password = $this->input->get('password');

		$res = array();
		if(!empty($username) or !empty($password)){
			$data = array( 
				'username' => $username, 
				'password' => md5($password),
				'status'=>1,
				'created_date'=>date("Y-m-d H:i:s")
			);
			$data = json_encode($data);
			$userSts = $this->ifUserExit($username);
			if($userSts > 0){
				$res['status'] = 'Fail';
				$res['mess'] = 'User already exit.';
			}else{
				$this->load->model('Users_model');
				$InsertStatus = $this->Users_model->createUser($data);
				if($InsertStatus){
					$res['status'] = 'Success';
					$res['mess'] = 'User created succesfully.';
				}else{
					$res['status'] = 'Fail';
					$res['mess'] = 'Unable to create user.';
				}
			}		 
		}else{
			
			$res['status'] = 'Fail';
			$res['mess'] = 'Input are missing.';
		}		
		echo json_encode($res);
			
	}

	public function getUserDetail($id = false){
		$this->load->model('Users_model');
		$userData = $this->Users_model->getUserDetail($id);
		echo $userData;
	} 

		
}
