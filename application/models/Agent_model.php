<?php  
 class Agent_model extends CI_Model  
 {  
	function insert_item($data){
		$this->db->insert("item",$data);
	}
	function insert_customer($data){
		$this->db->insert("customer",$data);
	}	
	function insert_booking($data){
		$this->db->insert("booking",$data);
	}	
 }