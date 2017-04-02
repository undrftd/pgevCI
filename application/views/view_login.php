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

  <form action="<?php echo base_url(); ?>login/validate_login" method="POST">

  <div class="row">

    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4 nopadding">

      <div class="login-form">

        <form>

          <div class="form-group">

            <h4> Please enter your credentials  </h4><br>

            <div class="form-group">
              <p> User ID </p>
              <input type="text" name="username" class="form-control" id="user-name">
            </div><!-- /input-group -->

            <div class="form-group">
              <p> Password </p>
              <input data-toggle="password" name="password" data-placement="after" class="form-control" type="password" id="user-password">
            </div><!-- /input-group -->

            <br>

            <button type="submit" class="btn btn-custom-4">Sign In</button>

            <div class="mobile-links">

              <a class="forgot-password-1" href="<?php echo site_url("login/reset_password")?>">Forgot Password?</a>

              <a href="#" class="sign-in" onclick="$(this).closest('form').submit()">Sign in</a>

            </div>

            <span class="forgot-password"><a href="<?php echo site_url("login/reset_password")?>"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> &nbsp;Forgot Password?</a></span>

            <?php if(!empty($message)){ ?>
              <span class ="error-login" id="prompt-message">
                 <?php echo $message; ?>
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
