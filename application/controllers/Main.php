<?php
class Main extends MY_Controller
{
	public function index()
	{
		$this->load->view('common/header');
		$this->load->view('nav/nav_default');
		$this->load->view('templates/register');
		$this->load->view('common/footer');
	}
}
