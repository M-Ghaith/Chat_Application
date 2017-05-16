<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Processors extends CI_Controller {

public function __construct()
{
	parent::__construct();
	$this->load->model('user');
	$this->load->helper(array('url','form'));
	$this->load->library(array('form_validation','session'));
}
public function index()
{

	$this->load->view('home');
}
public function sign_up()
{

			$this->form_validation->set_rules('email','Email','required|trim|valid_email',array(
			'required'=>'You must eneter data to field',
			'valid_email'=>'please enter valid email',
			
		));
			$this->form_validation->set_rules('password','Password','required|min_length[8]|max_length[15]|trim',array(
			'required'=>'You must eneter data to field',
			
			'min_length[8]'=>'the name must at least 8 letters'

		));
			$this->form_validation->set_rules('cpassword','Cpassword','required|min_length[8]|max_length[15]|trim|matches[password]',array(
			'required'=>'You must eneter data to field',
			
			'min_length[8]'=>'the name must at least 8 letters',
			'matches[password]'=>'no match'
		));


			$this->form_validation->set_rules('nickName','NickName','required|min_length[3]|max_length[15]|trim|alpha_numeric',array(
			'required'=>'You must eneter data to field',
			
			'min_length[3]'=>'the name must at least 3 letters',
			'alpha_numeric'=>'You can only use char and numbers stick together'
			
		));



		if ($this->form_validation->run()==false) 
		{
			$this->load->view('home');
		}
		else
		{
			$data=array
			(
			
				'email'=>$this->input->post('email',true),
				'password'=>md5($this->input->post('password',true)),
				'nickName'=>$this->input->post('nickName',true)

			);
			if ($this->user->is_user_exist($data['nickName'])||$this->user->is_exist_email($data['email'])) 
			{
				$message['errors']='you are already exist';
				$this->load->view('home',$message);
			}
			else
			{
				$this->user->insert_user($data);
				$message['succes']='you are registered';
				$this->load->view('home',$message);

			}
		}

			


}
public function sign_in()
{


	$data=array
	(
		'email'=>$this->input->post('email',true),
		'password'=>md5($this->input->post('password',true))
	
	);
	$result=$this->user->get_user($data);
	if ($result) 
	{
		$session_data=array

		(
			'id'=>$result[0]->id,
			'first_name'=>$result[0]->first_name,
			'last_name'=>$result[0]->last_name,
			'email'=>$result[0]->email

		);
		$this->session->set_userdata($session_data);
		$posts['post']=$this->show_post();
		$this->load->view('wall',$posts);

	}
	else
	{
		$message['errors']="invalid email or password";
		$this->load->view('home',$message);
	}
}


public function log_out()
{
	
	$this->session->sess_destroy();
	$this->load->view('home');
}
public function  is_valid()

{	
	$val=$this->input->post('nickName');

	if ($this->user->is_user_exist($val)) 
	{
		echo 'true';
    }
    else
    {
    	echo 'false';
    }
			

	
}




}
