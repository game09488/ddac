<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agent extends CI_Controller {	
	public function _construct(){
		if(isset($_SESSION['user_logged'])){		
			$this->session->set-flashdata("error","Please login before browsing this page.");
			redirect("main/login");
		}
	}
	public function p_agent(){
		$this->load->view('p_agent');
	}
	public function p_agent_v(){
		$this->load->view('p_agent_v');
	}	
	public function p_agent_ri(){
		$this->load->view('p_agent_ri');
	}
	public function p_agent_rc(){
		$this->load->view('p_agent_rc');
	}
	public function p_agent_ab(){
		$this->load->view('p_agent_ab');
	}
	public function form_validation(){		
		$this->load->library('form_validation');
		$this->form_validation->set_rules("i_name","Item Name",'required');
		$this->form_validation->set_rules("i_weight","Item Weight",'required');
		$this->form_validation->set_rules("i_quantity","Item Quantity",'required');
		$this->form_validation->set_rules("i_desc","Item Description",'required');
		$this->form_validation->set_rules("r_agent","Register Agent",'required');
		if($this->form_validation->run()){
			$this->load->model("Agent_model");
			$data = array(
				"item_name" => $this->input->post("i_name"),
				"item_weight" => $this->input->post("i_weight"),
				"item_quantity" => $this->input->post("i_quantity"),
				"item_desc" => $this->input->post("i_desc"),
				"register_agent" => $this->input->post("r_agent"),
			);			
				$this->Agent_model->insert_item($data);
				redirect(base_url()."index.php/agent/inserted");		
		}else{
			redirect(base_url()."index.php/agent/fail_insert");
		}	
	}
	public function fail_insert(){
		$this->p_agent_ri();
	}
	public function inserted(){
		$this->p_agent_ri();
	}
	public function form_validation2(){		
		$this->load->library('form_validation');
		$this->form_validation->set_rules("customer_name","Customer Name",'required');
		$this->form_validation->set_rules("customer_contact","Customer Contact",'required');
		$this->form_validation->set_rules("customer_email","Customer Email",'required');
		$this->form_validation->set_rules("customer_address","Customer Address",'required');
		$this->form_validation->set_rules("register_agent","Register Agent",'required');
		if($this->form_validation->run()){
			$this->load->model("Agent_model");
			$data = array(
				"customer_name" => $this->input->post("customer_name"),
				"customer_contact" => $this->input->post("customer_contact"),
				"customer_email" => $this->input->post("customer_email"),
				"customer_address" => $this->input->post("customer_address"),
				"register_agent" => $this->input->post("register_agent"),
			);			
				$this->Agent_model->insert_customer($data);
				redirect(base_url()."index.php/agent/inserted2");		
		}else{
			redirect(base_url()."index.php/agent/fail_insert2");
		}	
	}
	public function fail_insert2(){
		$this->p_agent_rc();
	}
	public function inserted2(){
		$this->p_agent_rc();
	}
	public function form_validation3(){		
		$this->load->library('form_validation');
		$this->form_validation->set_rules("customer_id","Customer ID",'required');
		$this->form_validation->set_rules("vessel_id","Vessel ID",'required');
		$this->form_validation->set_rules("item_id","Item ID",'required');
		if($this->form_validation->run()){
			$this->load->model("Agent_model");
			$data = array(
				"booking_date_time" => $this->input->post("booking_date_time"),
				"admin_agent_id" => $this->input->post("admin_agent_id"),
				"customer_id" => $this->input->post("customer_id"),
				"vessel_id" => $this->input->post("vessel_id"),
				"item_id" => $this->input->post("item_id"),
				"status" => $this->input->post("status"),
			);			
				$this->Agent_model->insert_booking($data);
				redirect(base_url()."index.php/agent/inserted3");		
		}else{
			redirect(base_url()."index.php/agent/fail_insert3");
		}	
	}
	public function fail_insert3(){
		$this->p_agent_ab();
	}
	public function inserted3(){
		$this->p_agent_ab();
	}	
}