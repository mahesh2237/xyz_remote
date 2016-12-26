<?php if ( ! defined('BASEPATH')) exit('No direct script access
allowed');

class Password extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('security');
		$this->load->helper('language');
		$this->load->library('session');
        $this->load->library('form_validation'); 
		$this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');
       // $this->lang->load('en_admin', 'english');
	}
	
	
	public function index()
	{
	//	print_r($this);
		
		redirect('password/forgot_password');
	}
	
	public function forgot_password()
	{
		$this->form_validation->set_rules('usr_email','User Email',array('required'));
		
		if($this->form_validation->run()==FALSE)
		{
			
		}
		else
		{
			
		}
	}
}
