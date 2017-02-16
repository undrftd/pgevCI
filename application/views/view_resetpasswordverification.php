<?php
	$resetkey = $this->uri->segment(3);
?>

<br>

<div class="user-deact">

  <div class="row">

    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">

      <div class="announcement-message">

        <h4>Reset your Password</h4><hr>

				<form action="<?php echo base_url("login/reset_password_validation"); ?>" method="POST">

					<input type="text" id="sel1" name="resetkey" value="<?php echo $resetkey; ?>" hidden>

					<p>Enter your new password</p>

					<input type="password" name="password" class="form-control"  id="sel1" required>

					<p class="error"><?php echo form_error('password'); ?> </p><br>

					<p>Confirm new password</p>

					<input type="password" class="form-control" id="sel1" name="confpassword" required>

					<p class="error"><?php echo form_error('confpassword'); ?> </p>

					<br><br>

					<div class="action-buttons text-right">

						<button type="submit" class="btn btn-custom">Submit</button>

					</div>

				</form>

				<hr>

				<div class="table-legend">
					<p> <strong> <span class="dot-style">&middot;</span>&nbsp;Note: </strong>&nbsp;If you cannot remember your email address too. Kindly contact us through this number: 887-8888
					</p>
				</div>

      </div>

      <br><br>

    </div>

  </div>

</div>
