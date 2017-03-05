<div id="page-content-wrapper">

  <div class="web-header">

    <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>

    <div class="overlay-header">
      <span class="icon-main">
        <i class="material-icons md-36 gray400">account_circle</i>
        <?php
          $totalreserve = $deniedreserve + $approvedreserve;
          if ($totalreserve >= 1) {
            echo "<span class='badge'>$totalreserve</span>";
          }
          else if ($approvedreserve >= 1) {
            echo "<span class='badge'>$approvedreserve</span>";
          }
          else if ($deniedreserve >= 1) {
            echo "<span class='badge'>$deniedreserve</span>";
          }
        ?>
      </span>
      <h4>
        <?php echo $this->session->firstname ;?> <?php echo $this->session->lastname ;?>
        <span class="dropdown sign-out">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <span>Homeowner <span class="caret"></span></span>
          </a>
          <ul class="dropdown-menu pull-right">
            <li class="dropdown-header"><strong><a>Activities</a></strong></li>
            <li><a onclick="myFunction()">Create an Emergency Ticket</a></li>
            <li><a href="<?php echo base_url("user_announcements/post_bulletin"); ?>">Post a Bulletin</a></li>
            <li><a href="<?php echo base_url("user_reservation/reservations_courtone"); ?>">My Reservation
              <span class="a-links">
                <?php
                $totalreserve = $deniedreserve + $approvedreserve;
                if ($totalreserve >= 1) {
                  echo "<span>$totalreserve</span>";
                }
                else if ($approvedreserve >= 1) {
                  echo "<span>$approvedreserve</span>";
                }
                else if ($deniedreserve >= 1) {
                  echo "<span>$deniedreserve</span>";
                }
                ?>
              </span>
            </a></li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-header"><strong><a>Account</a></strong></li>
            <li><a href="<?php echo base_url("user_accounts/"); ?>" style="display: block;"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>&nbsp; Edit Account</a></li>
            <li><a href="<?php echo base_url("login/signout/"); ?>">Sign Out</a></li>
          </ul>
        </span>
      </h4>
    </div>

  </div>

  <hr class="colored-hr">
  <br>

  <div class="row">

    <div class="col-xs-12 nopadding">

      <div class="header-style">
        <h1> Recent Community Announcement </h1>
      </div>

      <br>

      <div class="announcement-message">

        <h4> <?php if($latest == FALSE ) { echo "No Recent Announcement"; } else { echo htmlentities($latest->post_title); } ?> </h4>
        <p> <small class="date-archive"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>&nbsp; <?php if($latest == FALSE) { echo ""; } else { echo date("F d, Y", strtotime($latest->post_date)) . " at " . date("g:i A", $latest->post_time); } ?> </small> <p>
        <hr>

        <p> <?php if($latest == FALSE) { echo "The Community has no recent announcement posted. If ever announcements will be posted, the recent one will be displayed here in order to keep you updated."; } else { echo htmlentities(substr($latest->post_content, 0, 1500)); } if($latest == FALSE || strlen($latest->post_content) > 1500) { echo "..."; } else { echo ""; } ?> </p>

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

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 nopadding">

      <div class="activity-bar text-center">

        <h4> Tickets </h4><hr>

        <p> You have <?php echo $count; ?> active ticket<?php if($count > 1){ echo "s"; } else { echo ""; } ?>. To monitor this properly, go to the track tickets page by clicking the button below. </p>
        <br>
        <a href="<?php echo site_url("user_tracking/recent"); ?>"><button type="button" class="btn btn-custom-2">View More</button></a><br><br>

      </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 nopadding">

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

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 nopadding">

      <div class="activity-bar text-center reservation-bar">

        <h4> Reservation </h4><hr>

        <p> You have <?php $countallreserve = $courtone + $courttwo + $clubhouse; echo $countallreserve; ?> active reservation<?php if($countallreserve > 1){ echo "s"; } else { echo ""; } ?>.  To know more about the status of your reservations, click the button below.  </p>
        <br>
        <a href="<?php echo site_url("user_reservation/reservations_courtone"); ?>"><button type="button" class="btn btn-custom-2">View More</button></a><br><br>

        <?php
          $totalreserve = $deniedreserve + $approvedreserve;
          if ($totalreserve >= 1) {
            echo "<div class='reservation-notif'>";
            echo "<p> Reservation Status: <span class='glyphicon glyphicon-ok' aria-hidden='true'></span> &nbsp;$approvedreserve &nbsp; <span class='glyphicon glyphicon-remove' aria-hidden='true'></span> &nbsp;$deniedreserve</p>";
            echo "</div>";
          }
        ?>

      </div>

    </div>

  </div>

  <br>

</div>
