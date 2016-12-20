<div class="container">

      <div class="header">
        <h1> Please enter your credentials</h1>
      </div>

      <br>

      <form action="<?php echo base_url(); ?>login/validate_login" method="POST">
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
              <input type="text" name="username" class="form-control" id="user-name" aria-label="..." placeholder="Enter your username">
            </div><!-- /input-group -->
          </div><!-- /.col-lg-6 -->

          <div class="col-lg-6">
            <div class="form-group">
              <input type="password" name="password" class="form-control" id="user-password" aria-label="..." placeholder="Enter your password">
            </div><!-- /input-group -->
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->

      <?php if(!empty($message)){ ?>
        <center><strong class ="header" style="color:white; font-family: Times New Roman"><?php echo $message; ?></strong>
      <?php } ?>

        </br>
        </br>
        <!-- Standard button -->
        <div class="action-buttons text-center">

         <button type="submit" class="btn btn-custom">Sign In</button>

          <button type="button" class="btn btn-custom">Forgot your password?</button>

        </div>
      </form>

      <br>
      <br>

      <hr>

      <p> This website serves as the Community Relationship Management System of the Parkwood Greens Executive Village located in Pasig, Manila.
        <br> For more inquiries, please contact our administrator through this number: XXX-XXX </p>

      <br>
      <br>

    </div>
