<?php
	$resetkey = $this->uri->segment(3);
?>

<br>

<div class="user-deact">

  <div class="row">

    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">

			<?php if ($this->session->flashdata('resetvfeedback')){ ?>
				<div class="success-message text-center" id="prompt-message">
					<h3> Hello, User. </h3>
					<p> <?php echo $this->session->flashdata('resetvfeedback'); ?>  </p><br>
					<p> Redirecting to the Login Page...</p>
					<div class="loader"></div><br>
				</div>
				<br>
			<?php } ?>

		<?php if ($this->session->flashdata('resetvfail')){ ?>
			<div class="error-message text-center" id="prompt-message">
				<h3> Hello, User. </h3>
				<p> <?php echo $this->session->flashdata('resetvfail'); ?>  </p><br>
				<button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
			</div>
			<br>
		<?php } ?>

      <div class="announcement-message">

        <h4>Reset your Password</h4><hr>

				<form action="<?php echo base_url("login/reset_password_validation"); ?>" method="POST">

					<input type="text" id="sel1" name="resetkey" value="<?php echo $resetkey; ?>" hidden>

					<p>Enter your new password</p>

					<input data-toggle="password" name="password" data-placement="after" class="form-control" type="password" id="user-password" required>

					<p class="error"><?php echo form_error('password'); ?> </p><br>

					<p>Confirm new password</p>

					<input type="password" class="form-control" id="confirm-password" name="confpassword" required>

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
