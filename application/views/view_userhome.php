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

    <div class="col-xs-12">

      <div class="header-style">
        <h1> Recent Community Announcement </h1>
      </div>

      <br>

      <div class="announcement-message">

        <h4> <?php if($latest == FALSE ) { echo "No Recent Announcement"; } else { echo $latest->post_title; } ?> </h4>
        <p> <?php if($latest == FALSE) { echo ""; } else { echo date("F d, Y", strtotime($latest->post_date)) . " " . date("g:i A", $latest->post_time); } ?> <p>
        <hr>

        <p> <?php if($latest == FALSE) { echo "The Community has no recent announcement posted. If ever announcements will be posted, the recent one will be displayed here in order to keep you updated."; } else { echo substr($latest->post_content, 0, 1500); } if($latest == FALSE || strlen($latest->post_content) > 1500) { echo "..."; } else { echo ""; } ?> </p>

        <br>

        <?php if($latest == FALSE || strlen($latest->post_content) <   1500) { echo ""; } else { echo "<a href='" . site_url() . "user_announcements/viewmore_announcement/" . $latest->post_id . "'><button type='button' class='btn btn-custom'>View More</button></a>"; } ?>

      </div>

      <br>

    </div>

    <div class="clearfix visible-md-block"></div>
    <div class="clearfix visible-sm-block"></div>

    <div class="col-xs-12 nopadding">

      <h4 class="activity-heading text-center"> User Activities <hr></h4>

    </div>

    <div class="col-xs-12 col-sm-12 col-lg-6 nopadding">

      <div class="activity-bar text-center">

        <h4> Tickets </h4><hr>

        <p> You have <?php echo $count; ?> active ticket<?php if($count > 1){ echo "s"; } else { echo ""; } ?>. To monitor this properly, go to the track tickets page by clicking the button below. </p>
        <br>
        <a href="<?php echo site_url("user_tracking/recent"); ?>"><button type="button" class="btn btn-custom-2">View More</button></a><br><br>

      </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-lg-6 nopadding">

      <div class="activity-bar text-center">

        <h4> Monthly Dues </h4><hr>

        <p> You have <?php
            if(($this->session->userdata('arrears') >  0 && $this->session->userdata('monthly_dues') == 0)
            || ($this->session->userdata('arrears') > 0 && $this->session->userdata('monthly_dues') > 0 )
            || ($this->session->userdata('arrears') == 0 && $this->session->userdata('monthly_dues') > 0 ))
            {
              echo ($this->session->userdata('arrears') + $this->session->userdata('monthly_dues')) / ($rate->securityfee + $rate->assocfee);
            }
            else
            {
              echo "0";
            }  ?> unpaid dues. To properly monitor your outstanding dues and arrears, click the button below.</p>
        <br>
        <a href="<?php echo site_url("user_dues"); ?>"><button type="button" class="btn btn-custom-2">View More</button></a><br><br>

      </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-lg-6 nopadding">

      <div class="activity-bar text-center">

        <h4> Reservation </h4><hr>

        <p> You have <?php echo $courtone + $courttwo + $clubhouse; ?> active reservation. To check whether this has been approved or not, click the button below. </p>
        <br>
        <a href="<?php echo site_url("user_reservation/reservations_courtone"); ?>"><button type="button" class="btn btn-custom-2">View More</button></a><br><br>

      </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-lg-6 nopadding">

      <div class="activity-bar text-center">

        <h4> Suggestions </h4><hr>

        <p> If you have suggestions within our community, feel free to leave us a message in the suggestions page. </p>
        <br>
        <a href="<?php echo site_url("user_suggestions"); ?>"><button type="button" class="btn btn-custom-2">View More</button></a><br><br>

      </div>

    </div>

  </div>

  <br>

</div>
