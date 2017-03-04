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

  <form action="<?php echo site_url()?>login/reset_emailvalidation" method="POST">

  <div class="row">

    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4 nopadding">

      <div class="login-form">

        <form>

          <div class="form-group">

            <h4> Forgot your Password?  </h4><br>

            <div class="form-group">
              <p> Enter your email address </p>
              <input type="text" name="email" class="form-control" id="user-name" required>
            </div><!-- /input-group -->

            <br>

            <button type="submit" class="btn btn-custom-4">Submit</button>

            <div class="mobile-links">

              <a class="forgot-password-1" href="<?php echo base_url(); ?>login/signout">Back to Sign In</a>

              <a href="#" class="sign-in" onclick="$(this).closest('form').submit()">Submit</a>

            </div>

            <span class="forgot-password"><a href="<?php echo base_url(); ?>login/signout"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> &nbsp;Back to Sign In</a></span>

            <?php if ($this->session->flashdata('resetfeedback')){ ?>
              <span class ="good-login" id="prompt-message">
                 Hello! <?php echo $this->session->flashdata('resetfeedback'); ?> Thank you!
              </span>
            <?php } ?>

            <?php if ($this->session->flashdata('resetfail')){ ?>
              <span class ="error-login" id="prompt-message">
                Hello! <?php echo $this->session->flashdata('resetfail'); ?> Thank you!
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

      <p class="footer-note text-center"> If you cannot remember your email address too. Kindly contact us through this number: 576-4263 </p>

      <p class="footer-note-1 text-center"> &copy; 2017 Parkwood Greens </p><br><br>

    </footer>

  </div>

</div>

</form>
