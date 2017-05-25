<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE HTML>
<html>
<head>
<title>Form Login</title>
<meta charset="UTF-8" />
<meta name="Designer" content="PremiumPixels.com">
<meta name="Author" content="$hekh@r d-Ziner, CSSJUNTION.com">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/login/css/reset.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/login/css/structure.css">
</head>

<body>
<?php 
	if ($this->session->flashdata('sukses')) {
		echo '<p class= "warning" style="margin 10px 20px;">'.$this->session->flashdata('sukses').'</p>';
	}
	 ?>
<?php echo form_open('login','class="box login"'); ?>
	<fieldset class="boxBody">
	  <label>Username</label>
	  <input type="text" tabindex="1" name="username" placeholder="Username" value="<?php echo set_value('username'); ?>" required>
	  <label><a href="<?php echo base_url() . 'lupa_password' ?>" class="rLink" tabindex="5">Forget your password?</a>Password</label>
	  <input type="password" tabindex="2" name="password" value="<?php echo set_value('password'); ?>" required>
	</fieldset>
	<footer>
	  <input type="submit" class="btnLogin" value="Login" tabindex="4">
	</footer>
 <?php echo form_close();?>
</form>
</body>
</html>
