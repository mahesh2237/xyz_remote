 <?php
 $email = array(
     'name' => 'usr_email',
      'id' => 'email',
      'class' => 'form-control',
      'value' =>  set_value('usr_email')
 );
 
 $password = array(
      'name' => 'usr_password',
      'id' => 'password',
      'class' =>'form-control' 
 );
 ?>
 <section class="login-form">
 <div class="container">	 
 <div class="row">
	 <div class="col-md-2"></div>	 
    <div class="col-md-8">
<?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>		
<?php echo form_open() ?>
  <div class="form-group">
    <?php echo form_label('Email address','email'); ?>
    <?php echo form_input($email); ?>
    <?php //echo form_error($email['name']); ?>
  </div>
  <div class="form-group">
   <?php echo form_label('Password','password'); ?>
   <?php echo form_password($password); ?>
   <?php //echo form_error($password['name']); ?>
  </div>
  <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>
  <button type="submit" class="btn btn-default">login</button>
<?php echo form_close(); ?>
<p class="text-center"> Don't have an account , Create an account</p>
   </div>
   <div class="col-md-2"></div>	
</div>
</div>
</section>
