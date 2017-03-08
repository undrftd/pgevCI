<div id="page-content-wrapper">

  <div class="web-header">

    <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>

    <div class="overlay-header">
      <span class="icon-main">
        <i class="material-icons md-36 gray400">account_circle</i>
        <?php
          $notif = $count + $reserve + $forms;

          if ($notif >= 1) {
            echo "<span class='badge'>$notif</span>";
          }
          else {
            echo "";
          }

        ?>
      </span>
      <h4>
        <?php echo $this->session->firstname ;?> <?php echo $this->session->lastname ;?>
        <span class="dropdown sign-out">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <span>Administrator <span class="caret"></span></span>
          </a>
          <ul class="dropdown-menu pull-right">
              <li class="dropdown-header"><strong><a>Activities</a></strong></li>
              <li><a href="<?php echo base_url("admin_announcements/post_announcements"); ?> ">Post an Announcement</a></li>
              <li><a href="<?php echo base_url("admin_ticketing/new_tickets"); ?>">Tickets
                <span class="a-links">
                  <?php
                  if ($count >= 1) {
                    echo $count;
                  }
                  else {
                    echo "";
                  }
                  ?>
                </span>
              </a></li>
              <li><a href="<?php echo base_url("admin_reservation/court_one"); ?>">Reservations
                <span class="a-links">
                  <?php
                  if ($reserve >= 1) {
                    echo $reserve;
                  }
                  else {
                    echo "";
                  }
                  ?>
                </span> </a></li>
              <li><a href="<?php echo base_url("admin_forms/car_sticker"); ?>">Online Application
                <span class="a-links">
                  <?php
                  if ($forms >= 1) {
                    echo $forms;
                  }
                  else {
                    echo "";
                  }
                  ?>
                </span> </a></li>
              <li role="separator" class="divider"></li>
              <li class="dropdown-header"><strong><a>Account</a></strong></li>
              <li><a href="<?php echo base_url("admin_profile/"); ?>" style="display: block;"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>&nbsp; Edit Account</a></li>
              <li><a href="<?php echo base_url("login/signout/"); ?>">Sign Out</a></li>
              </ul>
        </span>
      </h4>
    </div>
  </div>

  <hr class="colored-hr">
  <br>

  <div class="header-style">
    <h1> Application Details - Renovation</h1>
  </div>

  <br>

  <div class="row">

    <div class="col-md-10 col-md-offset-1 nopadding">

    <?php if ($this->session->flashdata('moreapplicationsuccess')){ ?>
      <div class="success-message text-center" id="prompt-message">
        <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3>
        <p> <?php echo $this->session->flashdata('moreapplicationsuccess'); ?> </p><br>
        <p> Redirecting to the Application Page...</p>
        <div class="loader"></div><br>
      </div>
    <?php } ?>

    <?php if ($this->session->flashdata('moreapplicationfail')){ ?>
      <div class="error-message text-center" id="prompt-message">
        <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3>
        <p> <?php echo $this->session->flashdata('moreapplicationfail'); ?> </p><br>
        <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
      </div>
    <?php } ?>

    <br>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-1 nopadding">

      <div class="information">

         <form action ="<?php echo site_url() . "admin_forms/save_application_renovation/" . $renovationdetails->formid; ?>" method="POST">

          <div class="form-group">

            <h4> Application Information </h4>
            <br>
            <p> Name </p>
            <input class="form-control" id="sel1" type="text" value="<?php echo $renovationdetails->firstname . " " . $renovationdetails->lastname; ?>" readonly>

            <br>

            <p> Contact Number </p>
            <input class="form-control" id="sel1" type="text" value="<?php echo $renovationdetails->contactnum; ?>" readonly>

            <br>

            <p> Date Requested </p>
            <input class="form-control" id="sel1" type="text" value="<?php echo date("F d, Y", strtotime($renovationdetails->date_requested)); ?>" readonly>
            
            <br>

            <p> Status </p>
              <select name ="statusforms" class="form-control" id="sel1">
                <option value ="<?php echo $renovationdetails->status; ?>" selected hidden> Choose Status</option>
                <option value ="0">Processed</option>
                <option value="1">For Resubmission</option>
              </select>
            
            <br>

            <span class="view-icon"><a href="#" onclick="openNav()">View more details</a></span>

        </div>

        <div id="myNav" class="overlay">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <div class="overlay-content">
            <div class="overlay-header">
              <h4> Application Details </h4>
            </div>
            <hr>
            <a>Remarks</a><br>
            <textarea name ="admin-remarks" class="form-control" id="user-message" placeholder="Note: This is only accessible after changing the status of a ticket to Closed." reseize="none" disabled="disabled" pattern=".{5,}" title="Remarks should at least be 5 characters long." ></textarea>
            <p class="error"><?php echo form_error('admin-remarks'); ?> </p>
            <a href="#" class="save-link" onclick="$(this).closest('form').submit()">Save changes</a>
            <hr>
          </div>
          <span class="overlay-footer"> &copy; 2017 Parkwood Greens </span>
        </div>

      </div>

      <br>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-4 nopadding">

      <div class="information-other">

        <div class="form-group">

          <p> Remarks </p>
          <textarea name ="admin-remarks" class="form-control" id="user-message" placeholder="Note: This is only accessible if an application needs to be resubmitted." reseize="none" disabled="disabled" pattern=".{5,}" title="Remarks should at least be 5 characters long." required></textarea>
          <p class="error"><?php echo form_error('admin-remarks'); ?> </p>

          <br><hr>

          <br>
  
          <button type="submit" class="btn btn-custom-5">Save changes</button>

          </form>

        </div>

      </div>

    </div>

  </div>

  <br><br><br><br>

</div>


