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
	$this->db->where('nickName',$data['nickName']);
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
public function insert_msg($data)
{
	$this->db->insert('messages',$data);

}
public function get_all_msg()
{	
	$this->db->select('*');
	$this->db->from('messages,users');
	$this->db->where('users_id=id');
	$this->db->order_by('created_at_m','ASC');
	$result=$this->db->get();
	if ($result->num_rows() > 0)
	 {
		return $result->result();

	}
	else
	{
		return false;
	}


}
public function get_users()
{
	$this->db->select('*');
	$this->db->from('users');
	$this->db->where('status','online');
	$result=$this->db->get();
	if ($result->num_rows()>0)
	{
		return $result->result();
	}
	else
	{
		return false;
	}

}
public function edit_status($data)
{
			$data1=array('status'=>$data['status']);
			
	 		$this->db->where('id', $data['id']);
	 		 $this->db->update('users', $data1);
           
            
}
public function edit_status1()
{
			$data=array('status'=>'online');
	 		$this->db->where('id', $this->session->userdata('id'));
            $this->db->update('users',$data); 
}
public function edit_status2()
{
			$data=array('status'=>'offline');
	 		$this->db->where('id', $this->session->userdata('id'));
            $this->db->update('users',$data); 
}


}