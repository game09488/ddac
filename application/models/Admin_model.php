<?php  
 class Admin_model extends CI_Model  
 {  
	function insert_admin($data){
		$this->db->insert("users",$data);
	}
	function insert_item($data){
		$this->db->insert("item",$data);
	}	
	function insert_vessel($data){
		$this->db->insert("vessel",$data);
	}	
	function insert_agent($data){
		$this->db->insert("agent",$data);
	}
	function insert_customer($data){
		$this->db->insert("customer",$data);
	}	
	function insert_booking($data){
		$this->db->insert("booking",$data);
	}	
	function fetch_data(){
		$query = $this->db->get("users");
		return $query;
	}
	function fetch_item(){
		$query = $this->db->get("item");
		return $query;
	}
	function fetch_vessel(){
		$query = $this->db->get("vessel");
		return $query;
	}
	function fetch_booking(){
		$query = $this->db->get("booking");
		return $query;
	}	
	function delete_data($id){
		$this->db->where("id",$id);
		$this->db->delete("users");
	}
	function delete_item($id){
		$this->db->where("item_id",$id);
		$this->db->delete("item");
	}
	function delete_agent($id){
		$this->db->where("agent_id",$id);
		$this->db->delete("agent");
	}
	function delete_customer($id){
		$this->db->where("customer_id",$id);
		$this->db->delete("customer");
	}
	function delete_vessel($id){
		$this->db->where("vessel_id",$id);
		$this->db->delete("vessel");
	}
	function delete_booking($id){
		$this->db->where("booking_id",$id);
		$this->db->delete("booking");
	}	
	function getAdmin($id){
		$this->db->select('*');
		$this->db->where('id', $id);
		$this->db->from('users');
		$query = $this->db->get();
		return $query->row();
	}
	function getItem($id){
		$this->db->select('*');
		$this->db->where('item_id', $id);
		$this->db->from('item');
		$query = $this->db->get();
		return $query->row();
	}
	function getAgent($id){
		$this->db->select('*');
		$this->db->where('agent_id', $id);
		$this->db->from('agent');
		$query = $this->db->get();
		return $query->row();
	}
	function getCustomer($id){
		$this->db->select('*');
		$this->db->where('customer_id', $id);
		$this->db->from('customer');
		$query = $this->db->get();
		return $query->row();
	}
	function getVessel($id){
		$this->db->select('*');
		$this->db->where('vessel_id', $id);
		$this->db->from('vessel');
		$query = $this->db->get();
		return $query->row();
	}
	function getBooking($id){
		$this->db->select('*');
		$this->db->where('booking_id', $id);
		$this->db->from('booking');
		$query = $this->db->get();
		return $query->row();
	}		
	function update_admin($id){
		$data = array(
			'id' => $this->input->post('a_id'),
			'username' => $this->input->post('a_username'),
			'password' => $this->input->post('a_password'),
		);
		$this->db->where('id',$id);
		$this->db->update('users',$data);
		return $id;
	}
	function update_item($id){
		$data = array(
			"item_id" => $this->input->post("i_id"),
			"item_name" => $this->input->post("i_name"),
			"item_weight" => $this->input->post("i_weight"),
			"item_quantity" => $this->input->post("i_quantity"),
			"item_desc" => $this->input->post("i_desc"),
			"register_agent" => $this->input->post("r_agent"),
		);	
		$this->db->where('item_id',$id);
		$this->db->update('item',$data);
		return $id;
	}
	function update_agent($id){
		$data = array(
			"agent_id" => $this->input->post("agent_id"),
			"username" => $this->input->post("agent_username"),
			"password" => $this->input->post("agent_password"),
			"full_name" => $this->input->post("agent_full_name"),
			"contact" => $this->input->post("agent_contact"),
			"address" => $this->input->post("agent_address"),
		);	
		$this->db->where('agent_id',$id);
		$this->db->update('agent',$data);
		return $id;
	}
	function update_customer($id){
		$data = array(
			"customer_id" => $this->input->post("customer_id"),
			"customer_name" => $this->input->post("customer_name"),
			"customer_contact" => $this->input->post("customer_contact"),
			"customer_email" => $this->input->post("customer_email"),
			"customer_address" => $this->input->post("customer_address"),
			"register_agent" => $this->input->post("register_agent"),
		);	
		$this->db->where('customer_id',$id);
		$this->db->update('customer',$data);
		return $id;
	}
	function update_vessel($id){
		$data = array(
			"vessel_id" => $this->input->post("vessel_id"),
			"vessel_model" => $this->input->post("vessel_model"),
			"vessel_from" => $this->input->post("vessel_from"),
			"vessel_to" => $this->input->post("vessel_to"),
			"vessel_dep_date" => $this->input->post("vessel_dep_date"),
			"vessel_dep_time" => $this->input->post("vessel_dep_time"),
			"vessel_ari_date" => $this->input->post("vessel_ari_date"),
			"vessel_ari_time" => $this->input->post("vessel_ari_time"),
			"vessel_cap" => $this->input->post("vessel_cap"),			
		);	
		$this->db->where('vessel_id',$id);
		$this->db->update('vessel',$data);
		return $id;
	}
	function update_booking($id){
		$data = array(
			"booking_id" => $this->input->post("booking_id"),
			"customer_id" => $this->input->post("customer_id"),
			"vessel_id" => $this->input->post("vessel_id"),
			"item_id" => $this->input->post("item_id"),
			"status" => $this->input->post("status"),			
		);	
		$this->db->where('booking_id',$id);
		$this->db->update('booking',$data);
		return $id;
	}
 }  