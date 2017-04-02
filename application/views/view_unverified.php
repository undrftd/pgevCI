<br>

<div class="user-deact">

  <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">

      <div class="announcement-message">

        <h4> Account Unverified </h4>

        <hr>

        <p> Sorry, <?php echo $this->session->userdata('firstname');?>. This account hasn't been verified yet. Please check your email for the account verification.</p>

      </div>

      <br>

      <a href="<?php echo base_url(); ?>login/signout"><button type="button" class="btn btn-custom-1">Back to Sign In</button></a>

    </div>

  </div>

</div>
