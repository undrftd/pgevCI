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

  <div class="portlet nopadding">

    <div class="header-style">
      <h1> Announcements </h1>
    </div>

    <br>

    <div class="portlet-header">

      <form action="<?php echo base_url(); ?>user_announcements/search_announcement" method="GET">
      <div id="search-group">

        <input id='datetimepicker4' type='text' name="search" class="form-control" placeholder="Search for an announcement">
          <button type="submit" class="btn btn-custom-8"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
        </input>

      </div>
      </form>
    </div>

    <br><br>

    <div class="portlet-title">

      <ul class="nav nav-tabs">

        <li class="active">
          <a href="<?php echo base_url(); ?>user_announcements/announcements">
        Announcements </a>
        </li>

        <li>
          <a href="<?php echo base_url(); ?>user_announcements/bulletin">
          Bulletin </a>
        </li>

      </ul>

    </div>

    <div class="portlet-body">

      <div class="tab-content">

        <div class="tab-pane fade in active">

          <?php if ($this->session->flashdata('announcementfeedback')){ ?>
              <div class="success-message text-center" id="prompt-message">
                <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3>
                <p> <?php echo $this->session->flashdata('announcementfeedback'); ?> </p><br>
                <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
              </div>
          <?php } ?>

          <?php if ($this->session->flashdata('announcementfail')){ ?>
            <div class="error-message text-center" id="prompt-message">
              <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3>
              <p> <?php echo $this->session->flashdata('announcementfail'); ?> </p><br>
              <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
            </div>
          <?php } ?>

          <div class="announcement-message">

            <br>

            <div class="row the-list">

              <?php foreach($order as $row): ?>

              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 box nopadding">

                  <div class="information-1">

                    <h4><?php echo $row->post_title ?> </h4>
                    <p><small class="date-archive"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>&nbsp;  <?php echo date("F d, Y", strtotime($row->post_date)) . " at " . date("g:i A", $row->post_time);?></small> </p>
                    <hr>
                    <p> <?php echo substr($row->post_content, 0, 300); if(strlen($row->post_content) > 300) {echo "..."; } else { echo ""; } ?> </p>
                    <hr>

                    <div class="more-link">

                      <a href="<?php echo site_url() . "user_announcements/viewmore_announcement/" . $row->post_id; ?>"><p>Read More</p></a>

                    </div>

                  </div>

                  <br>

              </div>

              <div class="box-wrap clearfix"></div>

            <?php endforeach; ?>

            </div>

            <center><div id="pagination-link"><?php echo $announcementslinks; ?></div></center>

          </div>

        </div>

      </div>

    </div>

  </div>

</div>
