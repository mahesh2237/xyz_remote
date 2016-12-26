 <?php 
 // set default value for register form
 $username = array(
    'name' => 'usr_name',
    'id' =>'name',
    'value' => set_value('usr_name'),
    'class' => 'form-control'
 ); 
 
 
 $email = array(
 'name' => 'usr_email',
  'id' => 'email',
  'value' => set_value('usr_email'),
   'class' => 'form-control'
   );
   
  $pass = array(
  'name' => 'usr_password',
   'id' =>'pwd',
   //'value' => set_value('usr_password'),
    'class' => 'form-control'
   ); 
   
    $cpass = array(
  'name' => 'c_password',
   'id' =>'cpwd',
   //'value' => set_value('c_password'),
    'class' => 'form-control'
   ); 
   
   $btn_submit = array(
   'type'=>'submit' ,
   'name' =>'register_submit',
   'class' =>'btn btn-default',
   'value' =>'register'
   );
 ?>
 <section class="register-form">
 <div class="container">	 
 <div class="row">
	 <div class="col-md-2"></div>	 
    <div class="col-md-8">
	<?php if($this->session->flashdata("success"))
      {
    echo "<p class=\"alert alert-success\">" . $this->session->flashdata("success") . "</p>\n";
      }
     else if($this->session->flashdata("error"))
      {
    echo "<p class=\"alert alert-success\">" . $this->session->flashdata("success") . "</p>\n";
      }		
	  else {	
 echo form_open(); ?>
	 
  <div class="form-group">
    <?php echo form_label('User Name','name'); ?>
    <?php echo form_input($username); ?>
    <?php echo form_error($username['name']); ?>
  </div>
  
  <div class="form-group">
    <?php echo form_label('Email address','email'); ?>
    <?php echo form_input($email); ?>
    <?php echo form_error($email['name']); ?>
  </div>
  
  <div class="form-group">
    <?php echo form_label('Password','pwd'); ?>
    <?php echo form_password($pass); ?>
    <?php echo form_error($pass['name']); ?>
  </div>
  
  <div class="form-group">
    <?php echo form_label('Confirm Password','cpwd'); ?>
    <?php echo form_password($cpass); ?>
    <?php echo form_error($cpass['name']); ?>
  </div>
  
 <?php echo form_submit($btn_submit); ?> 
 
<?php echo form_close(); ?>
<p class="text-center"> Already have an account , login </p>
 <?php } ?>
   </div>
   <div class="col-md-2"></div>	
</div>
</div>
</section>
