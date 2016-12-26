<?php
class Account_model extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
	}
	
	public function register_user($data)
	{
		if($this->db->insert('users',$data))
		{
			return $this->db->insert_id();
		}
		else
		{
			return false;
		}
	}
	
	public function does_email_exist($email) {
     $query = $this->db->get_where('users', array('usr_email' => $email));
     return $query->row();
   
  }
  
  
  public function authenticate_user($email , $password)
   {
	 $query = $this->db->get_where('users',array('usr_email'=>$email));
	 
	 $user_data = $query->row();
	
	if(!empty($user_data)){
	 $hash =  $user_data->usr_hash;
	
	 if(password_verify($password,$hash))
	 {
		 return true;
	 }
    }
    return false;
   }
   
   public function get_userdata($email)
   {
	   $query = $this->db->get_where('users',array('usr_email'=>$email));
	 
	   return $query->row();
   }
   
   public function do_login($userdata)
   { 
	   $userdata->logged_in = true;
	   $this->session->set_userdata($userdata);
   }
}
?>
