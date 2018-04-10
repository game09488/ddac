<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function login(){		
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');		
			if($this->form_validation->run() == TRUE){
				$username = $_POST['username'];
				$password = $_POST['password'];
				
				$this->db->select('*');
				$this->db->from('users');
				$this->db->where(array('username' => $username, 'password' => $password));
				$query = $this->db->get();				
				$user = $query->row();
				
				$this->db->select('*');
				$this->db->from('agent');
				$this->db->where(array('username' => $username, 'password' => $password));
				$query1 = $this->db->get();				
				$user1 = $query1->row();
				
				if($user!=NULL){
					if($user->username){					
						$this->session->set_flashdata("success","Login Successful");				
						$_SESSION['user_logged'] = TRUE;
						$_SESSION['username'] = $user->username;				
						redirect(base_url()."index.php/admin/p_admin","refresh");
					}
				}else if($user1->username){
					if($user1->username){
						$this->session->set_flashdata("success","Login Successful");				
						$_SESSION['user_logged'] = TRUE;
						$_SESSION['username'] = $user1->username;
						$_SESSION['full_name'] = $user1->full_name;						
						redirect(base_url()."index.php/agent/p_agent","refresh");
					}
				}else{
					$this->session->set_flashdata("error","Invalid user,please try again");
					redirect(base_url()."index.php/main/login","refresh");
				}		
			}		
		$this->load->view('login');
	}
	
	public function logout(){
		unset($_SESSION);
		redirect(base_url()."index.php/main/login","refresh");
	}
}