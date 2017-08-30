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

	$this->load->view('enterpage');
}
public function homepage()
{
	$this->load->view('homepage');
}
public function login_page()
{
	$this->load->view('login');
}
public function register_page()
{
	$this->load->view('register');
}
public function ourteam_page()
{
	$this->load->view('ourteam');
}
public function sign_up()
{

			$this->form_validation->set_rules('email','Email','required|trim|valid_email',array(
			'required'=>'You must enter Email Address to field !',
			'valid_email'=>'Please enter valid email !',
			
		));
			$this->form_validation->set_rules('password','Password','required|min_length[8]|max_length[15]|trim',array(
			'required'=>'You forgot to set a password !',
			
			'min_length[8]'=>'The Password must be at least 8 letters !'

		));
			$this->form_validation->set_rules('cpassword','Cpassword','required|min_length[8]|max_length[15]|trim|matches[password]',array(
			'required'=>'You must confirm the passwrod also !',
			
			'min_length[8]'=>'',
			'matches[password]'=>'The password is not match !'
		));


			$this->form_validation->set_rules('nickName','NickName','required|min_length[3]|max_length[15]|trim|alpha_numeric',array(
			'required'=>'You must enter a Nickname to field !',
			
			'min_length[3]'=>'The Nickname must be at least 3 letters !',
			'alpha_numeric'=>'You can only use char and numbers stick together !'
			
		));
			


		if ($this->form_validation->run()==false) 
		{
			$this->load->view('register');
		}
		else
		{
			$data=array
			(
			
				'email'=>$this->input->post('email',true),
				'password'=>md5($this->input->post('password',true)),
				'nickName'=>$this->input->post('nickName',true),
				
				'created_at'=>date('Y/m/d h:i:sa'),
				'updated_at'=>date('Y/m/d h:i:sa'),
				'status'=>'online'

			);
			if ($this->user->is_user_exist($data['nickName'])||$this->user->is_exist_email($data['email'])) 
			{
				$message['errors']='you are already exist';
				$this->load->view('register',$message);
			}
			else
			{
				$this->user->insert_user($data);
				$message['succes']='you are registered';
				$this->load->view('login',$message);

			}
		}

			


}
public function sign_in()
{


	$data=array
	(
		'nickName'=>$this->input->post('nickName',true),
		'password'=>md5($this->input->post('password',true))
	
	);
	$result=$this->user->get_user($data);
	if ($result) 
	{
		$session_data=array

		(
			'id'=>$result[0]->id,
			'email'=>$result[0]->email,
			'nickName'=>$result[0]->nickName
			

		);
		$this->session->set_userdata($session_data);
		$this->user->edit_status1();
		
		$this->load->view('chatpage');

	}
	else
	{
		$message['errors']="invalid Nickname or password";
		$this->load->view('login',$message);
	}
}


public function log_out()
{
	$this->user->edit_status2();
	$this->session->sess_destroy('logg_in');
	$this->load->view('homepage');
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
public function process()
{	
	$action=$this->input->post('action',true);
	if ($action=='show_msg') 
	{
		$result=$this->user->get_all_msg();
		 
		if ($result) 

		{
			
		
		for ($i=0; $i <count($result) ; $i++)
			{ 
				echo "<a class='pull-left' href='#'>
                     <img class='media-object img-circle' src='assests/imgs/couple.png'/>
                     </a><h4 style='color:#31708F; margin-left:70px;'><b>"
					.ucfirst($result[$i]->nickName)
					.":</h4></b><small style=' margin-left:10px;' >"
					.date('d/M h:i',strtotime($result[$i]->created_at_m))
					.":</small><br><br><div style=' margin-left:70px;'><i> "
					.$result[$i]->message
					."</i></div><hr>";
			}	
			
		}
	}

	else 
	{
			$input=array
	(
		'message'=>html_escape($this->input->post('msg',true)),
		'users_id'=>$this->session->userdata('id'),
		'created_at_m'=>date('Y/m/d h:i'),
		'updated_at'=>date('Y/m/d h:i')



	);
	$this->user->insert_msg($input);
	}
		

	}


	



public function show_users()
{


	
		$result=$this->user->get_users();
				
		if ($result)
		 {
			
		
		for ($i=0; $i <count($result) ; $i++)
		{ 
			echo "<h5 style='color:#31708F; text-align: center;'><b>".ucfirst($result[$i]->nickName)."</h5><b><hr>";
		}
	}
}
public function change_status()
{
	$data=array
	(

		'status'=>$this->input->post('status',true),
		'id'=>$this->session->userdata('id')

	);

	$this->user->edit_status($data);




}
public function recaptcha()
  {
    $google_url="https://www.google.com/recaptcha/api/siteverify";
    $secret='6LfVYSIUAAAAAIOUnDS52lvsebNYj-2kavisSwRu';
    $ip=$_SERVER['REMOTE_ADDR'];
    $url=$google_url."?secret=".$secret."&response=".$this->input->post('g-recaptcha-response')."&remoteip=".$ip;
  	$res=file_get_contents($url);
    $arr= json_decode($res, true);
    //reCaptcha success check
    if($arr['success'])
    {
      return TRUE;
    }
    else
    {
      $this->form_validation->set_message('recaptcha', 'The reCAPTCHA field is telling me that you are a robot. Shall we give it another try?');
      return FALSE;
    }
  }





}
