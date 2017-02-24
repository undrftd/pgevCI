<div id="page-content-wrapper">

  <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>

  <span class="dropdown sign-out">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="dot-style">&#8226;</span> &nbsp;Hello, <?php echo $this->session->userdata('firstname'); ?></a>
    <ul class="dropdown-menu pull-right">
      <li class="dropdown-header"><strong><a>Activities</a></strong></li>
      <li><a href="<?php echo base_url("user_ticketing/requests_complaints"); ?>"><strong>+</strong> &nbsp;Create a Complaint</a></li>
      <li><a href="<?php echo base_url("user_announcements/post_bulletin"); ?>"><strong>+</strong> &nbsp;Post a Bulletin</a></li>
      <li><a href="<?php echo base_url("user_reservation/reservations_courtone"); ?>">View My Reservation</a></li>
      <li role="separator" class="divider"></li>
      <li class="dropdown-header"><strong><a>Account</a></strong></li>
      <li><a href="<?php echo base_url("user_accounts/"); ?>"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>&nbsp; Edit Account</a></li>
      <li><a href="<?php echo base_url("login/signout/"); ?>">Sign Out</a></li>
    </ul>
  </span>

  <hr class="colored-hr">
  <br><br>

  <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 nopadding">

      <div class="header-style">
        <h1> Post a Bulletin </h1>
      </div>

      <br>

      <div class="information">

        <div class="form-group">

          <form action="<?php echo site_url() . "user_announcements/post_bulletin_user/" ?>" method="POST">

            <p>  Bulletin Title </p>
            <input class="form-control" id="sel1" name="post_title" type="text" placeholder="What's the title?" required>
            <p class="error"> <?php echo form_error('post_title'); ?></p>

            <br>

            <p> Date </p>
            <input class="form-control" name="post_date" id="sel1" type="text" value="<?php $date = date('F d, Y'); echo date('F d, Y', strtotime($date)); ?>"readonly>
            <p class="error"> <?php echo form_error('post_date'); ?> </p>

            <br>

            <p> Kindly put the details of your Bulletin here: </p>
            <textarea class="form-control" name="post_content" id="user-message" placeholder="What do you want to say to the community?" rows="15" required></textarea>
            <p class="error" name="post_content"> <?php echo form_error('post_content'); ?></p>

            <br><br>

            <a href=""><button type="submit" class="btn btn-custom-5">Post</button></a>

          </form>

        </div>

      </div>

      <br>
      <br>

    </div>

  </div>

</div>
