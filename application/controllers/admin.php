<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {	
	public function _construct(){
		if(isset($_SESSION['user_logged'])){		
			$this->session->set-flashdata("error","Please login before browsing this page.");
			redirect("main/login");
		}
	}
	public function p_admin(){
		$this->load->view('p_admin');
	}
	public function p_admin_um(){
		$this->load->view('p_admin_um');
	}
	public function p_admin_sm(){
		$this->load->model("Admin_model");
		$data["fetch_booking"] = $this->Admin_model->fetch_booking();		
		$this->load->view('p_admin_sm',$data);
	}
	public function p_admin_vm(){
		$this->load->model("Admin_model");
		$data["fetch_vessel"] = $this->Admin_model->fetch_vessel();		
		$this->load->view('p_admin_vm',$data);
	}	
	public function p_admin_im(){
		$this->load->model("Admin_model");
		$data["fetch_item"] = $this->Admin_model->fetch_item();
		$this->load->view('p_admin_im',$data);
	}
	public function p_admin_a(){
		$this->load->model("Admin_model");
		$data["fetch_data"] = $this->Admin_model->fetch_data();
		$this->load->view('p_admin_a',$data);
	}
	public function form_validation(){		
		$this->load->library('form_validation');
		$this->form_validation->set_rules("a_username","Username",'required');
		$this->form_validation->set_rules("a_password","Password",'required');
		if($this->form_validation->run()){
			$this->load->model("Admin_model");
			$data = array(
				"username" => $this->input->post("a_username"),
				"password" => $this->input->post("a_password"),
			);			
				$this->Admin_model->insert_admin($data);
				redirect(base_url()."index.php/admin/inserted");		
		}else{
			redirect(base_url()."index.php/admin/fail_insert");
		}	
	}
	public function form_validation2(){		
		$this->load->library('form_validation');
		$this->form_validation->set_rules("i_name","Item Name",'required');
		$this->form_validation->set_rules("i_weight","Item Weight",'required');
		$this->form_validation->set_rules("i_quantity","Item Quantity",'required');
		$this->form_validation->set_rules("i_desc","Item Description",'required');
		$this->form_validation->set_rules("r_agent","Register Agent",'required');
		if($this->form_validation->run()){
			$this->load->model("Admin_model");
			$data = array(
				"item_name" => $this->input->post("i_name"),
				"item_weight" => $this->input->post("i_weight"),
				"item_quantity" => $this->input->post("i_quantity"),
				"item_desc" => $this->input->post("i_desc"),
				"register_agent" => $this->input->post("r_agent"),
			);			
				$this->Admin_model->insert_item($data);
				redirect(base_url()."index.php/admin/inserted2");		
		}else{
			redirect(base_url()."index.php/admin/fail_insert2");
		}	
	}
	public function form_validation3(){		
		$this->load->library('form_validation');
		$this->form_validation->set_rules("agent_username","Agent Username",'required');
		$this->form_validation->set_rules("agent_password","Agent Password",'required');
		$this->form_validation->set_rules("agent_full_name","Agent Full Name",'required');
		$this->form_validation->set_rules("agent_contact","Agent Contact",'required');
		$this->form_validation->set_rules("agent_address","Agent Address",'required');
		if($this->form_validation->run()){
			$this->load->model("Admin_model");
			$data = array(
				"username" => $this->input->post("agent_username"),
				"password" => $this->input->post("agent_password"),
				"full_name" => $this->input->post("agent_full_name"),
				"contact" => $this->input->post("agent_contact"),
				"address" => $this->input->post("agent_address"),
			);			
				$this->Admin_model->insert_agent($data);
				redirect(base_url()."index.php/admin/inserted3");		
		}else{
			redirect(base_url()."index.php/admin/fail_insert3");
		}	
	}
	public function form_validation4(){		
		$this->load->library('form_validation');
		$this->form_validation->set_rules("customer_name","Customer Name",'required');
		$this->form_validation->set_rules("customer_contact","Customer Contact",'required');
		$this->form_validation->set_rules("customer_email","Customer Email",'required');
		$this->form_validation->set_rules("customer_address","Customer Address",'required');
		if($this->form_validation->run()){
			$this->load->model("Admin_model");
			$data = array(
				"customer_name" => $this->input->post("customer_name"),
				"customer_contact" => $this->input->post("customer_contact"),
				"customer_email" => $this->input->post("customer_email"),
				"customer_address" => $this->input->post("customer_address"),
				"register_agent" => $this->input->post("register_agent"),
			);			
				$this->Admin_model->insert_customer($data);
				redirect(base_url()."index.php/admin/inserted4");		
		}else{
			redirect(base_url()."index.php/admin/fail_insert4");
		}	
	}
	public function form_validation5(){		
		$this->load->library('form_validation');
		$this->form_validation->set_rules("vessel_model","Vessel Model",'required');
		$this->form_validation->set_rules("vessel_dep_date","Vessel Departure Date",'required');
		$this->form_validation->set_rules("vessel_dep_time","Vessel Departure Time",'required');
		$this->form_validation->set_rules("vessel_ari_date","Vessel Arrival Date",'required');
		$this->form_validation->set_rules("vessel_ari_time","Vessel Arrival Time",'required');
		$this->form_validation->set_rules("vessel_from","Vessel Route From",'required');
		$this->form_validation->set_rules("vessel_to","Vessel Route To",'required');
		$this->form_validation->set_rules("vessel_cap","Vessel Capacity",'required');
		if($this->form_validation->run()){
			$this->load->model("Admin_model");
			$data = array(
				"vessel_model" => $this->input->post("vessel_model"),
				"vessel_dep_date" => $this->input->post("vessel_dep_date"),
				"vessel_dep_time" => $this->input->post("vessel_dep_time"),
				"vessel_ari_date" => $this->input->post("vessel_ari_date"),
				"vessel_ari_time" => $this->input->post("vessel_ari_time"),
				"vessel_from" => $this->input->post("vessel_from"),
				"vessel_to" => $this->input->post("vessel_to"),
				"vessel_cap" => $this->input->post("vessel_cap"),
			);			
				$this->Admin_model->insert_vessel($data);
				redirect(base_url()."index.php/admin/inserted5");		
		}else{
			redirect(base_url()."index.php/admin/fail_insert5");
		}	
	}
	public function form_validation6(){		
		$this->load->library('form_validation');
		$this->form_validation->set_rules("customer_id","Customer ID",'required');
		$this->form_validation->set_rules("vessel_id","Vessel ID",'required');
		$this->form_validation->set_rules("item_id","Item ID",'required');
		if($this->form_validation->run()){
			$this->load->model("Admin_model");
			$data = array(
				"booking_date_time" => $this->input->post("booking_date_time"),
				"admin_agent_id" => $this->input->post("admin_agent_id"),
				"customer_id" => $this->input->post("customer_id"),
				"vessel_id" => $this->input->post("vessel_id"),
				"item_id" => $this->input->post("item_id"),
				"status" => $this->input->post("status"),
			);			
				$this->Admin_model->insert_booking($data);
				redirect(base_url()."index.php/admin/inserted6");		
		}else{
			redirect(base_url()."index.php/admin/fail_insert6");
		}	
	}
	public function fail_insert6(){
		$this->p_admin_sm();
	}
	public function inserted6(){
		$this->p_admin_sm();
	}	
	public function fail_insert5(){
		$this->p_admin_vm();
	}
	public function inserted5(){
		$this->p_admin_vm();
	}	
	public function fail_insert3(){
		$this->p_admin_um();
	}
	public function inserted3(){
		$this->p_admin_um();
	}	
	public function fail_insert4(){
		$this->p_admin_um();
	}
	public function inserted4(){
		$this->p_admin_um();
	}		
	public function fail_insert2(){
		$this->p_admin_im();
	}
	public function inserted2(){
		$this->p_admin_im();
	}	
	public function fail_insert(){
		$this->p_admin_a();
	}
	public function inserted(){
		$this->p_admin_a();
	}
	public function delete_data(){
		$id = $this->uri->segment(3);
		$this->load->model("Admin_model");
		$this->Admin_model->delete_data($id);
		redirect(base_url()."index.php/admin/deleted");
	}
	public function delete_item(){
		$id = $this->uri->segment(3);
		$this->load->model("Admin_model");
		$this->Admin_model->delete_item($id);
		redirect(base_url()."index.php/admin/deleted2");
	}
	public function delete_agent(){
		$id = $this->uri->segment(3);
		$this->load->model("Admin_model");
		$this->Admin_model->delete_agent($id);
		redirect(base_url()."index.php/admin/deleted3");
	}	
	public function delete_customer(){
		$id = $this->uri->segment(3);
		$this->load->model("Admin_model");
		$this->Admin_model->delete_customer($id);
		redirect(base_url()."index.php/admin/deleted4");
	}
	public function delete_vessel(){
		$id = $this->uri->segment(3);
		$this->load->model("Admin_model");
		$this->Admin_model->delete_vessel($id);
		redirect(base_url()."index.php/admin/deleted5");
	}
	public function delete_booking(){
		$id = $this->uri->segment(3);
		$this->load->model("Admin_model");
		$this->Admin_model->delete_booking($id);
		redirect(base_url()."index.php/admin/deleted6");
	}	
	public function deleted(){
		$this->p_admin_a();
	}
	public function deleted2(){
		$this->p_admin_im();
	}	
	public function deleted3(){
		$this->p_admin_um();
	}
	public function deleted4(){
		$this->p_admin_um();
	}
	public function deleted5(){
		$this->p_admin_vm();
	}
	public function deleted6(){
		$this->p_admin_sm();
	}	
	public function update($id){
		$this->load->model('Admin_model');
		if(isset($_POST['update'])){
			if($this->Admin_model->update_admin($id)){
				$this->session->set_flashdata('success','Successfully Update Admin');
				redirect(base_url()."index.php/admin/p_admin_a");
			}else{
				$this->session->set_flashdata('success','Update Failed');
				redirect(base_url()."index.php/admin/p_admin_a");
			}
		}
		
		$data['admin'] = $this->Admin_model->getAdmin($id);
		$this->load->view('f_admin',$data);
	}
	public function update_item($id){
		$this->load->model('Admin_model');
		if(isset($_POST['update'])){
			if($this->Admin_model->update_item($id)){
				$this->session->set_flashdata('success','Successfully Update Item');
				redirect(base_url()."index.php/admin/p_admin_im");
			}else{
				$this->session->set_flashdata('success','Update Failed');
				redirect(base_url()."index.php/admin/p_admin_im");
			}
		}
		
		$data['item'] = $this->Admin_model->getItem($id);
		$this->load->view('f_item',$data);
	}	
	public function update_agent($id){
		$this->load->model('Admin_model');
		if(isset($_POST['update'])){
			if($this->Admin_model->update_agent($id)){
				$this->session->set_flashdata('success','Successfully Update Agent');
				redirect(base_url()."index.php/admin/p_admin_um");
			}else{
				$this->session->set_flashdata('success','Update Failed');
				redirect(base_url()."index.php/admin/p_admin_um");
			}
		}
		
		$data['agent'] = $this->Admin_model->getAgent($id);
		$this->load->view('f_agent',$data);
	}
	public function update_customer($id){
		$this->load->model('Admin_model');
		if(isset($_POST['update'])){
			if($this->Admin_model->update_customer($id)){
				$this->session->set_flashdata('success','Successfully Update Customer');
				redirect(base_url()."index.php/admin/p_admin_um");
			}else{
				$this->session->set_flashdata('success','Update Failed');
				redirect(base_url()."index.php/admin/p_admin_um");
			}
		}
		
		$data['customer'] = $this->Admin_model->getCustomer($id);
		$this->load->view('f_customer',$data);
	}
	public function update_vessel($id){
		$this->load->model('Admin_model');
		if(isset($_POST['update'])){
			if($this->Admin_model->update_vessel($id)){
				$this->session->set_flashdata('success','Successfully Update Vessel');
				redirect(base_url()."index.php/admin/p_admin_vm");
			}else{
				$this->session->set_flashdata('success','Update Failed');
				redirect(base_url()."index.php/admin/p_admin_vm");
			}
		}
		
		$data['vessel'] = $this->Admin_model->getVessel($id);
		$this->load->view('f_vessel',$data);
	}
	public function update_booking($id){
		$this->load->model('Admin_model');
		if(isset($_POST['update'])){
			if($this->Admin_model->update_booking($id)){
				$this->session->set_flashdata('success','Successfully Update Booking');
				redirect(base_url()."index.php/admin/p_admin_sm");
			}else{
				$this->session->set_flashdata('success','Update Failed');
				redirect(base_url()."index.php/admin/p_admin_sm");
			}
		}
		
		$data['booking'] = $this->Admin_model->getBooking($id);
		$this->load->view('f_booking',$data);
	}
}