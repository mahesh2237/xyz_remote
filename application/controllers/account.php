<?php

class Account extends MY_Controller
{
  function __construct()
  {
	 
	  parent::__construct();
	   $this->load->library('encrypt');
	   $this->load->model('account_model');
	 
  }	
  public function index()
  {
	  redirect('account/register');
  }
  
  public function forgot_password()
  {
	  
  }
  
  public function reset_password()
  {
	  
  }
  
  public function register()
  {
	  
	  $this->form_validation->set_rules('usr_email','Email address','required|valid_email|is_unique[users.usr_email]');
	  $this->form_validation->set_rules('usr_name','User Name','required|min_length[5]|max_length[25]|is_unique[users.usr_uname]');
	  $this->form_validation->set_rules('usr_password','Password','required|min_length[5]|max_length[25]');
	  $this->form_validation->set_rules('c_password','Confirm Password','required|matches[usr_password]');
	  $this->form_validation->set_message('is_unique', 'The %s is already taken');
	  if($this->form_validation->run()=== false)
	  {
	  $this->load->view('common/header');
	  $this->load->view('nav/nav_default');
	  $this->load->view('accounts/register');
	  $this->load->view('common/footer');
      }
      else
      {
		 $user_data = array();
		 $user_data['usr_email'] = $this->input->post('usr_email');
		 $user_data['usr_uname'] = $this->input->post('usr_name');
		 $password = $this->input->post('usr_password');
		 $hash = password_hash($password, PASSWORD_DEFAULT);
		 $user_data['usr_hash'] = $hash;
		 $user =  $this->account_model-> register_user($user_data);
		 if($user)
		 {
			 
	          $this->session->set_flashdata("success", 'Your account is created successfully, please login.');
              redirect("account/register");
			 
		 }
		 else
		 {
			  $this->session->set_flashdata("error", 'Something went wrong , please try again later.');
              redirect("account/register");
			 
			 
		 }
	  }
  }
  
  public function login()
  {
	  $this->form_validation->set_rules('usr_email','Email address','required|valid_email|callback_user_authentication['.$this->input->post("usr_password").']');
	//  $this->form_validation->set_rules('usr_password','Password','required');
	  
	  if($this->form_validation->run() === false )
	  {
	  $this->load->view('common/header');
	  $this->load->view('nav/nav_default');
	  $this->load->view('accounts/login');
	  $this->load->view('common/footer');
     }
     else 
     {
		
		$email = $this->input->post('usr_email'); 
		
		$user_data = $this->account_model->get_userdata($email);
		
		$this->account_model->do_login($user_data);
		
		redirect('welcome');
	 }
  }
  
  public function user_authentication($email=null,$password=null)
  {


	 if($email != '')
	 { 
	  if($this->account_model->does_email_exist($email))
	  {
		 if(!$this->account_model->authenticate_user($email , $password))
		 {
			 $this->form_validation->set_message('user_authentication', 'Incorrect Password');
		    return false;
		 }
		 else
		 {
		   return true;
		 }
	  }
	  else {
		    $this->form_validation->set_message('user_authentication', 'This {field} is not exist');
		    return false;
	  }
	 }
	 else
	 {
		  $this->form_validation->set_message('user_authentication', 'Incorrect Email or password');
		    return false;
	 }
  }
}
