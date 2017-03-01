<div id="page-content-wrapper">

  <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>

  <span class="dropdown sign-out">

    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="dot-style">&#8226;</span> &nbsp;Hello, <?php echo $this->session->userdata('firstname'); ?><span class="badge"> <?php echo $count + $reserve + $forms;?> </span></a>
    <ul class="dropdown-menu pull-right">
      <li class="dropdown-header"><strong><a>Activities</a></strong></li>

      <li><a href="<?php echo base_url("admin_announcements/post_announcements"); ?>">+ &nbsp;Post an Announcement</a></li>
      <li><a href="<?php echo base_url("admin_ticketing/new_tickets"); ?>">New Tickets &nbsp;<span class="badge"> <?php echo $count; ?> </span> </a></li>
      <li><a href="<?php echo base_url("admin_reservation/court_one"); ?>">New Reservations &nbsp;<span class="badge"> <?php echo $reserve; ?> </span> </a></li>
      <li><a href="<?php echo base_url("admin_forms/car_sticker"); ?>">New Online Application &nbsp;<span class="badge"> <?php echo $forms; ?> </span> </a></li>

      <li role="separator" class="divider"></li>
      <li class="dropdown-header"><strong><a>Account</a></strong></li>
      <li><a href="<?php echo base_url("admin_profile/"); ?>"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>&nbsp; Edit Account</a></li>
      <li><a href="<?php echo base_url("login/signout/"); ?>">Sign Out</a></li>
    </ul>
  </span>

  <hr class="colored-hr">
  <br><br>

  <div class="row">

    <div class="header-style">
      <h1> Community Bulletin </h1>
    </div>

    <br>

    <div class="col-xs-12 col-md-8 col-lg-9 nopadding">

      <div class="announcement-message">

        <h4> <?php echo $result->post_title; ?> </h4>
        <p><small class="date-archive"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>&nbsp;  <?php echo date("F d, Y", strtotime($result->post_date)) . " at " . date("g:i A", $result->post_time);?></small> </p>
        <p class="date-posted"> <?php echo $result->firstname . " " . $result->lastname; ?> said </p>
        <hr>
        <p> <?php echo $result->post_content;  ?> </p>

        <br>

        <hr class="row-hr">
        <p>  Hello, <?php echo $this->session->userdata('firstname');?>. Do you want to ask/say something to the community? <span class="a-links"> <a href="<?php echo site_url(); ?>admin_announcements/post_bulletin"> Post a bulletin now. </a></span> </p>
        <hr>

      </div>

      <br><br>

    </div>

    <div class="col-xs-12 col-md-4 col-lg-3 nopadding">

      <div class="archive-part">

        <div class="announcement-message text-center">
          <h4> Recent Bulletins </h4>
          <hr class="colored-hr-1">
          <?php foreach ($previous as $row): ?>
          <a href="<?php echo site_url() . "admin_announcements/viewmore_bulletin/" . $row->post_id; ?>">
            <p>  <?php echo $row->post_title; ?>  <p>
            <p><small class="date-archive"> <strong><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></strong>&nbsp; <?php echo date('M Y', strtotime($row->post_date)); ?> </small></p>
            <hr>
          </a>
          <?php endforeach ?>
          <a href="<?php echo site_url("admin_announcements/bulletin"); ?>">Back to Bulletin</a>

          <br><br>

        </div>

      </div>

    </div>

  </div>

</div>
