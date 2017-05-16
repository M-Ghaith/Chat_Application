<?php

class User extends CI_Model{

public function __construct()
{
	parent::__construct();
}
public function insert_user($data)
{
	$this->db->insert('users',$data);
}
public function is_user_exist($data)
{
	
	$this->db->select('nickName');
	$this->db->from('users');
	$this->db->where('nickName',$data);
	$result=$this->db->get();
	if ($result->num_rows()==1) 
	{
		return true;
	}
	else
	{
		return false;
	}

}
public function is_exist_email($data)
{
	
	$this->db->select('email');
	$this->db->from('users');
	$this->db->where('email',$data);
	$result=$this->db->get();
	if ($result->num_rows()==1) 
	{
		return true;
	}
	else
	{
		return false;
	}

}
public function get_user($data)
{

	$this->db->select('*');
	$this->db->from('users');
	$this->db->where('email',$data['email']);
	$this->db->where('password',$data['password']);
	$result=$this->db->get();
	if ($result->num_rows()==1) 
	{
		return $result->result();
		
	}
	else
	{
		return false;
	}

}




}