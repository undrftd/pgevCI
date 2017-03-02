<div id="page-content-wrapper">

  <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>

  <span class="dropdown sign-out">
    <span class="mobile-title">Parkwood Greens</span>
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
    <span class="user-account"><i class="material-icons md-26 gray400">more_vert</i></span>
    <span class="main-title"><span class="dot-style">&#8226;</span> &nbsp;Hello, <?php echo $this->session->userdata('firstname'); ?></span>
      <?php
        $notif = $count + $reserve + $forms;

        if ($notif >= 1) {
          echo "<span class='badge'>$notif</span>";
        }
        else {
          echo "";
        }

      ?>
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

  <hr class="colored-hr">
  <br>

  <div class="modal fade" id="delete-modal" role="dialog">

      <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
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
              <h4 class="modal-title">Message</h4>
            </div>

            <div class="modal-body">
              <p> <?php echo $result->content; ?> </p>
            </div>

            <div class="modal-footer">
              <br>
              <button type="button" class="btn btn-custom-6" data-dismiss="modal">X &nbsp;Close</button>
            </div>

          </div>

      </div>

  </div>

  <div class="header-style">
    <h1> Ticket Details </h1>
  </div>

  <br>

  <div class="row">

    <div class="col-md-10 col-md-offset-1 nopadding">

    <?php if ($this->session->flashdata('moreticketsuccess')){ ?>
      <div class="success-message text-center" id="prompt-message">
        <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3>
        <p> <?php echo $this->session->flashdata('moreticketsuccess'); ?> </p><br>
        <p> Redirecting to the Ticketing page...</p>
        <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
      </div>
    <?php } ?>

    <?php if ($this->session->flashdata('moreticketfail')){ ?>
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

         <form>

          <div class="form-group">

            <h4> Ticket Information </h4>
            <br>
            <p> Ticket ID </p>
            <input class="form-control" id="sel1" type="text" value="<?php echo $result->request_type . " - " . $result->ticketid; ?>" readonly>

            <br>

            <p> Name </p>
            <input class="form-control" id="sel1" type="text" value="<?php echo $result->firstname . " " . $result->lastname; ?>" readonly>

            <br>

            <p> Contact Number </p>
            <input class="form-control" id="sel1" type="text" value="<?php echo $result->contactnum; ?>" readonly>

            <br>

            <p> Type of Ticket </p>
            <input class="form-control" id="sel1" type="text" value="<?php
                        if($result->request_type == 'RGC')
                        {
                          echo "Grass Cutting";
                        }
                        else if($result->request_type == 'RTC')
                        {
                          echo "Trash Collection";
                        }
                        else if($result->request_type == 'RPC')
                        {
                          echo "Pest Control";
                        }
                         else if($result->request_type == 'RMP')
                        {
                          echo "Malfunctioning Post Lights";
                        }
                        else if($result->request_type == 'RPL')
                        {
                          echo "Water Pipeline Leakages";
                        }
                         else if($result->request_type == 'RBD')
                        {
                          echo "Blocked Drainage";
                        }
                        else if($result->request_type == 'RSC')
                        {
                          echo "Electrical Short Circuit";
                        }
                         else if($result->request_type == 'RMD')
                        {
                          echo "Monthly Dues";
                        }
                        else if($result->request_type == 'ROT')
                        {
                          echo "Other";
                        }
                        else if($result->request_type == 'CTV')
                        {
                          echo "CCTV Retrieval Request";
                        }
                         else if($result->request_type == 'EFR')
                        {
                          echo "Fire";
                        }
                        else if($result->request_type == 'ERB')
                        {
                          echo "Robbery";
                        }
                        else if($result->request_type == 'EBT')
                        {
                          echo "Broken House Tube";
                        }
                        else if($result->request_type == 'ESP')
                        {
                          echo "Suspicious Person";
                        }  ?>" readonly>
            <br>

            <p> Status </p>
            <input name ="status" class="form-control" id="sel1" value ="<?php if($result->status == 1) { echo "Work in Progress"; } else if($result->status == 0) { echo "Closed"; } else { echo "Set Status"; } ?>" readonly>

            <br>

            <p> Date Created </p>
            <input class="form-control" id="sel1" type="text" value="<?php echo date("m/d/Y g:i A", $result->date_requested); ?>" readonly>

            <br>

            <p> Date Closed </p>
            <input class="form-control" id="sel1" type="text" value="<?php echo date("m/d/Y g:i A", $result->date_closed); ?>" readonly>

            <br>

            <p> Date and Time Requested </p>
            <input class="form-control" id="sel1" type="text" value="<?php if($result->request_type == 'CTV'){ echo $result->date_cctv; } else { echo " "; } ?>" readonly="">

            <p class="help-block">Exclusively for CCTV Retrieval Request</p>

        </div>

      </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-4 nopadding">

      <div class="information">

        <div class="form-group">

          <p> Message </p>
          <button type="button" class="btn btn-custom-6" data-toggle="modal" data-target="#view-message">View</button>

          <br><br>

          <p> Attachment (<?php if($result->attachment != NULL) { echo "1";} else {echo "0"; } ?>) </p>
          <a href="<?php echo site_url() . "admin_ticketing/download_attachment/" . $result->ticketid; ?>"><button type="button" class="btn btn-custom-11"><span class="glyphicon glyphicon-save" aria-hidden="true"></span>  &nbsp;Download</button></a>

          <br><br>

          <p> Remarks </p>
          <textarea name ="admin-remarks" class="form-control" id="user-message"  reseize="none" disabled="disabled"><?php echo $result->closed_remarks; ?></textarea>
          <p class="error"><?php echo form_error('content'); ?> </p>
          <br>

          <hr>

          <br>

          <a href="<?php echo site_url();?>admin_ticketing/closed_tickets"><button type="button" class="btn btn-custom-5">Back to Ticketing</button>

          </form>

        </div>

      </div>

    </div>

  </div>

  <br>

</div>
