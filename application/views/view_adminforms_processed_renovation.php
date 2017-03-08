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

  <div class="modal fade" id="delete-modal" role="dialog">

      <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Delete Ticket</h4>
            </div>

            <br>

              <div class="signin">
                  <div class="modal-body text-center">
                      <p> Are you sure you want to delete this ticket? </p><br><br>
                      <button type="submit" class="btn btn-custom-1">Yes</button>
                      <button type="button" class="btn btn-custom" data-dismiss="modal">Cancel</button>
                  </div>
              </div>
          </div>

      </div>
  </div>

  <div class="modal fade" id="view-message" role="dialog">

      <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Homeowner Remarks</h4>
            </div>

            <div class="modal-body">
              <p> <?php echo "123"?> </p>
            </div>

            <div class="modal-footer">
              <br>
              <button type="button" class="btn btn-custom-6" data-dismiss="modal">X &nbsp;Close</button>
            </div>

          </div>

      </div>

  </div>

  <div class="header-style">
    <h1> Application Details </h1>
  </div>

  <br>

  <div class="row">

    <div class="col-md-10 col-md-offset-1 nopadding">

    <?php if ($this->session->flashdata('moreapplicationsuccess')){ ?>
      <div class="success-message text-center" id="prompt-message">
        <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3>
        <p> <?php echo $this->session->flashdata('moreticketsuccess'); ?> </p><br>
        <p> Redirecting to the Ticketing Page...</p>
        <div class="loader"></div><br>
      </div>
    <?php } ?>

    <?php if ($this->session->flashdata('moreapplicationfail')){ ?>
      <div class="error-message text-center" id="prompt-message">
        <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3>
        <p> <?php echo $this->session->flashdata('moreticketfail'); ?> </p><br>
        <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
      </div>
    <?php } ?>

    <br>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-1 nopadding">

      <div class="information">

          <div class="form-group">

            <h4> Application Information </h4>
            <br>
            <p> Name </p>
            <input class="form-control" id="sel1" type="text" value="<?php echo $finisheddetails->firstname . " " . $finisheddetails->lastname; ?>" readonly>

            <br>

            <p> Contact Number </p>
            <input class="form-control" id="sel1" type="text" value="<?php echo $finisheddetails->contactnum; ?>" readonly>

            <br>

            <p> File Name </p>
            <input class="form-control" id="sel1" type="text" value="<?php echo $finisheddetails->filename; ?>" readonly>

            <br>

            <p> Date Requested </p>
            <input class="form-control" id="sel1" type="text" value="<?php echo $finisheddetails->date_requested; ?>" readonly>
            
            <br>

            <p> Status </p>
              <input class="form-control" id="sel1" type="text" value="<?php if($finisheddetails->status == 1) { echo "For Resubmission"; } else { echo "Processed"; } ?>" readonly>
            
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
            <textarea name ="admin-remarks" class="form-control" id="user-message" ></textarea>
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
          <textarea name ="admin-remarks" class="form-control" id="user-message" disabled><?php echo $finisheddetails->remarks; ?></textarea>

          <br><hr>

          <br>
  
          <a href="<?php echo site_url("admin_forms/renovation"); ?>"> <button type="button" class="btn btn-custom-5">Back to Application Requests</button>

        </div>

      </div>

    </div>

  </div>

  <br><br><br><br>

</div>


