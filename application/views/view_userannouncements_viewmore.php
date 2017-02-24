<div id="page-content-wrapper">

  <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>

  <span class="dropdown sign-out">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="dot-style">&#8226;</span> &nbsp;Hello, <?php echo $this->session->userdata('firstname'); ?></a>
    <ul class="dropdown-menu pull-right">
      <li class="dropdown-header"><strong><a>Activities</a></strong></li>
      <li><a onclick="myFunction()"><strong>+</strong> &nbsp;Create an Emergency Ticket</a></li>
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

    <div class="header-style">
      <h1> Community Announcement </h1>
    </div>

    <br>

    <div class="col-xs-12 col-md-8 col-lg-9 nopadding">

      <div class="announcement-message">

        <h4> <?php echo $result->post_title; ?> </h4>
        <p> <?php echo date("F d, Y", strtotime($result->post_date)) . " " . date("g:i A", $result->post_time); ?> <p>
        <p class="date-posted"> Community Administrator </p>
        <hr>
        <p> <?php echo $result->post_content;  ?> </p>

      </div>

      <br>

    </div>

    <div class="col-xs-12 col-md-4 col-lg-3 nopadding">

      <div class="archive-part">

        <div class="announcement-message text-center">
          <h4> Previous Announcements </h4>
          <hr class="colored-hr-1">
          <?php foreach ($previous as $row): ?>
          <a href="<?php echo site_url() . "user_announcements/viewmore_announcement/" . $row->post_id; ?>"> <p> <span class="dot-style">&middot;</span> <?php echo $row->post_title; ?> <span class="date-archive"> <?php echo date('m/y', strtotime($row->post_date)); ?> </span> <p>
          <hr>
          <?php endforeach ?>
          <a href="<?php echo site_url("user_announcements/announcements"); ?>"><span class="glyphicon glyphicon-chevron-left btn-sm" aria-hidden="true"></span>Back to Announcements</a>

          <br><br>

        </div>

      </div>

    </div>

  </div>

</div>
