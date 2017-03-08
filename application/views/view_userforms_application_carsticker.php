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

  <div class="header-style">
    <h1> My Applications </h1>
  </div>

  <br>

  <div class="portlet nopadding">

    <div class="portlet-title">

      <ul class="nav nav-tabs">
        <li>
          <a href="<?php echo base_url(); ?>user_forms/car_sticker">
          Car Sticker </a>
        </li>

        <li>
          <a href="<?php echo base_url(); ?>user_forms/work_permit">
          Work Permit </a>
        </li>

        <li>
          <a href="<?php echo base_url(); ?>user_forms/renovation" id="not-important">
          Renovation </a>
        </li>

        <li class ="active">
          <a href="<?php echo base_url(); ?>user_forms/my_carsticker" id="not-important">
          My Applications </a>
        </li>

        <li class="dropdown" id="dropdown-mobile">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Other
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <br>
            <li><a href="<?php echo base_url(); ?>user_forms/renovation">Renovation</a></li>
            <li><a href="<?php echo base_url(); ?>user_forms/my_carsticker">My Applications </a></li>
          </ul>
        </li>

      </ul>

    </div>

    <div class="portlet-body">

      <?php if ($this->session->flashdata('applicationsuccess')){ ?>
        <div class="success-message text-center" id="prompt-message">
          <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3>
          <p> <?php echo $this->session->flashdata('permitsuccess'); ?></p><br>
          <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
        </div>
      <?php } ?>

      <?php if ($this->session->flashdata('applicationfail')){ ?>
        <div class="error-message text-center" id="prompt-message">
          <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3>
          <p> <?php echo $this->session->flashdata('permitfail'); ?></p><br>
          <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
        </div>
      <?php } ?>
      <br>

    </div>

    <div class="portlet-body">

      <div class="tab-content">

        <div class="announcement-message">
          <p> Here, you can view the status of your application forms. Kindly keep track of this table to be informed whether your request has been made. Thank you!
          </p>
          <p> Go to: <a href="<?php echo site_url('user_forms/my_carsticker'); ?>" class="a-links">Car Sticker</a>, <a href="<?php echo site_url('user_forms/my_workpermit'); ?>" class="a-links">Work Permit</a>, <a href="<?php echo site_url('user_forms/my_renovation'); ?>" class="a-links">Renovation</a>
          </p>
        </div>

        <br>

        <div class="row">

          <div class="col-xs-12">

            <div class="tab-pane fade in active" id="portlet_tab1">

              <div class="table-responsive">

                <h4> Car Sticker </h4>

                <hr>

                <table class="table table-hover">

                  <tr>
                    <th><br>Date</th>
                    <th><br>File Name</th>
                    <th><br>Status</th>
                  </tr>

                  <?php foreach($myforms as $row):
                  ?>

                  <tr>
                    <td><?php echo date("F d, Y", strtotime($row->date_requested)); ?> </td>
                    <td><?php echo $row->filename; ?></td>
                    <td><?php if($row->status == 1) { echo "Pending"; } else { echo "Processed"; } ?> </td>
                  </tr>
                  <?php endforeach; ?> 

                </table>
                <br><br>
                <center><div id="pagination-link"><?php echo $myformslink; ?></div></center> 

              </div>

            </div>

            <br>

          </div>

        </div>

      </div>

    </div>

    <br><br><br>

  </div>

</div>
