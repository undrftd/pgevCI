<?php
	$resetkey = $this->uri->segment(3);
?>

<form action="<?php echo base_url("login/reset_password_validation"); ?>" method="POST">

<input type="text" name="resetkey" value="<?php echo $resetkey; ?>" hidden>
Enter Password: <input type="password" name="password" required> <br>
<p class="error"><?php echo form_error('password'); ?> </p>

Confirm Password: <input type="password" name="confpassword" required> <br>
<p class="error"><?php echo form_error('confpassword'); ?> </p>

<input type="submit" value="Reset Password">
</form>
