<?php
	$resetkey = $this->uri->segment(3);
?>

<div class="login-content">

  <div class="header text-center">
    <br>
    <h2> Parkwood Greens Executive Village CRM </h2>
    <hr class="row-hr">
    <br>
  </div>

  <div class="header-1 text-center">
    <h2> Welcome to Parkwood Greens! </h2>
    <span class="glyphicon glyphicon-tree-deciduous" aria-hidden="true"></span>
  </div>

	<form action="<?php echo base_url("login/reset_password_validation"); ?>" method="POST">

  <div class="row">

    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4 nopadding">

      <div class="login-form">

        <form>

          <div class="form-group">

            <h4> Reset your Password  </h4><br>

						<input type="text" id="sel1" name="resetkey" value="<?php echo $resetkey; ?>" hidden>

						<p>Enter your new password</p>

						<input data-toggle="password" name="password" data-placement="after" class="form-control" type="password" id="user-password" required>

						<p class="error"><?php echo form_error('password'); ?> </p><br>

						<p>Confirm new password</p>

						<input type="password" class="form-control" id="confirm-password" name="confpassword" required>

						<p class="error"><?php echo form_error('confpassword'); ?> </p>

            <br>

            <button type="submit" class="btn btn-custom-4">Reset</button>

            <div class="mobile-links" style="justify-content: flex-end;">

              <a href="#" class="sign-in" onclick="$(this).closest('form').submit()">Reset</a>

            </div>

						<?php if ($this->session->flashdata('resetvfeedback')){ ?>
              <span class ="good-login" id="prompt-message">
								<div class="loader"></div> <?php echo $this->session->flashdata('resetvfeedback'); ?> You are now being redirected to the sign in page.
              </span>
						<?php } ?>

						<?php if ($this->session->flashdata('resetvfail')){ ?>
              <span class ="error-login" id="prompt-message">
								<?php echo $this->session->flashdata('resetvfail'); ?>
              </span>
            <?php } ?>

          </div>

        </form>

      </div>

    </div>

  </div>

  </div>

  <div class="row">

    <footer class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">

      <br><hr class="forgot-hr">

			<p class="footer-note text-center"> This website serves as the Community Relationship Management System of the Parkwood Greens Executive Village located in Pasig, Manila.
        For more inquiries, please contact our administrator through this number: 576-4263 </p>

      <p class="footer-note-1 text-center"> &copy; 2017 Parkwood Greens </p><br><br>

    </footer>

  </div>

</div>

</form>
