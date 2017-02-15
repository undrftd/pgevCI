<div class="login-content">

  <div class="header text-center">

    <br><br>
    <h2> Parkwood Greens Executive Village CRM </h2>
    <hr class="row-hr">

    <br>

  </div>

  <br>

  <form action="<?php echo base_url(); ?>login/validate_login" method="POST">

  <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 nopadding">

      <?php if(!empty($message)){ ?>
        <p class ="error-login" id="prompt-message">
          <span class="glyphicon glyphicon-remove btn-lg"></span> <br><?php echo $message; ?><br><br>
          <button type="button" class="btn btn-custom-10" id="close-button">Dismiss</button><br>
        </p>
      <?php } ?>

      <br>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-5 col-md-offset-2 nopadding">

      <div class="login-form">

          <div class="form-group">

          <h4> Please enter your credentials  </h4><br>

          <div class="row">
            <div class="col-xs-12 nopadding">
              <div class="form-group">
                <p> Username </p>
                <input type="text" name="username" class="form-control" id="user-name" aria-label="...">
              </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->

            <div class="col-xs-12 nopadding">
              <div class="form-group">
                <p> Password </p>
                <input type="password" name="password" class="form-control" id="user-password" aria-label="...">
              </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
          </div><!-- /.row -->

          <br>

          <div class="row">

              <div class="col-xs-12 nopadding">
                <button type="submit" class="btn btn-custom-4">Sign In</button>
              </div>

          </div>

        </div>

      </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-3">

      <div class="forgot-password text-center">

        <hr>

        <p class="footer-note"> If you have forgotten your password, kindly click the button below: </p>

        <a href="<?php echo site_url("login/reset_password")?>"><button type="button" class="btn btn-custom-7">Forgot your Password?</button></a>

      </div>

      <br><br>

    </div>

  </div>
  
  </div>

</form>

<br>

<div class="row">

  <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">

    <hr>

    <p class="footer-note"> This website serves as the Community Relationship Management System of the Parkwood Greens Executive Village located in Pasig, Manila.
      For more inquiries, please contact our administrator through this number: XXX-XXX </p>

    <br><br>

  </div>

</div>
