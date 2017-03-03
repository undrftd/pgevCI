<div id="page-content-wrapper">

  <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>

  <span class="dropdown sign-out">
    <span class="mobile-title">Parkwood Greens</span>
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
      <span class="user-account"><i class="material-icons md-26 gray400">account_circle</i></span>
      <span class="main-title"><span class="dot-style">&#8226;</span> &nbsp;Hello, <?php echo $this->session->userdata('firstname'); ?></span>
    </a>
    <ul class="dropdown-menu pull-right">
      <li class="dropdown-header"><strong><a>Activities</a></strong></li>
      <li><a onclick="myFunction()">Create an Emergency Ticket</a></li>
      <li><a href="<?php echo base_url("user_announcements/post_bulletin"); ?>">Post a Bulletin</a></li>
      <li><a href="<?php echo base_url("user_reservation/reservations_courtone"); ?>">View My Reservation</a></li>
      <li role="separator" class="divider"></li>
      <li class="dropdown-header"><strong><a>Account</a></strong></li>
      <li><a href="<?php echo base_url("user_accounts/"); ?>" style="display: block;"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>&nbsp; Edit Account</a></li>
      <li><a href="<?php echo base_url("login/signout/"); ?>">Sign Out</a></li>
    </ul>
  </span>

  <hr class="colored-hr">
  <br>

  <div class="row">

    <div class="header-style">
      <h1> Community Announcement </h1>
    </div>

    <br>

    <div class="col-xs-12 col-md-8 col-lg-9 nopadding">

      <div class="announcement-message">

        <h4> <?php echo $result->post_title; ?> </h4>
        <p> <small class="date-archive"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>&nbsp; <?php echo date("F d, Y", strtotime($result->post_date)) . " at " . date("g:i A", $result->post_time); ?> </small> <p>
        <p class="date-posted"> Community Administrator </p>
        <hr>
        <p> <?php echo $result->post_content;  ?> </p>

      </div>

      <br>

    </div>

    <div class="col-xs-12 col-md-4 col-lg-3 nopadding">

      <div class="archive-part">

        <div class="announcement-message text-left">
          <h4> Recent Announcements </h4>
          <hr class="colored-hr-1">
          <?php foreach ($previous as $row): ?>
          <a href="<?php echo site_url() . "user_announcements/viewmore_announcement/" . $row->post_id; ?>">
            <p>  <?php echo $row->post_title; ?>  <p>
            <p><small class="date-archive"> <strong><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></strong>&nbsp; <?php echo date('M Y', strtotime($row->post_date)); ?> </small></p>
            <hr>
          </a>
          <?php endforeach ?>
          <a href="<?php echo site_url("user_announcements/announcements"); ?>">View More Announcements</a>

          <br><br>

        </div>

        <br><br>

      </div>

    </div>

  </div>

</div>
