<br>

<div class="user-deact">

  <div class="row">

    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">

			<?php if ($this->session->flashdata('resetfeedback')){ ?>
				<div class="success-message text-center" id="prompt-message">
					<h3> Hello, User. </h3>
					<p> <?php echo $this->session->flashdata('resetfeedback'); ?>  </p><br>
					<button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
				</div>
				<br>
			<?php } ?>

			<?php if ($this->session->flashdata('resetfail')){ ?>
				<div class="error-message text-center" id="prompt-message">
					<h3> Hello, User. </h3>
					<p> <?php echo $this->session->flashdata('resetfail'); ?>  </p><br>
					<button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
				</div>
				<br>
			<?php } ?>

      <div class="announcement-message">

        <h4>Forgot your password?</h4><hr>

				<p>Enter your email address</p>

				<form action="<?php echo site_url()?>login/reset_emailvalidation" method="POST">

					<input type="email" class="form-control" name="email" id="sel1">

					<br><br>

					<div class="action-buttons text-right">

						<a href="<?php echo base_url(); ?>login/signout"><button type="button" class="btn btn-custom-1">Back to Sign In</button></a>

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
