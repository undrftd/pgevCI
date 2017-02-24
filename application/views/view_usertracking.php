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

  <div class="modal fade" id="delete-modal" role="dialog">

  <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Set as Finished</h4>
        </div>

        <br>

        <div class="signin">

          <div class="modal-body text-center">
              <p> <?php echo $this->session->userdata('firstname');?>, are you sure you want to set this ticket as Finished? </p><br>
              <a class ="deleteclass"><button type="submit" class="btn btn-custom-1">Yes</button></a>
              <button type="button" class="btn btn-custom" data-dismiss="modal">Cancel</button>
          </div>

        </div>

      </div>

    </div>

  </div>

  <div class="header-style">
    <h1> Ticket Tracking </h1>
  </div>

  <br>

  <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">

      <div class="admin-message text-center">

        <p> Note: Below are the last five tickets you have recently submitted. In order to have a detailed history of your ticket submissions, click the "View History" button below. For further concerns, kidnly contact
          us through the number given below.
          <p> <strong> <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> &nbsp; Parkwood Greens Executive Village Administrators (Gemille): (02) 887-8888 </strong> </p>
        </p>

      </div>


      <?php if ($this->session->flashdata('recentsuccess')){ ?>
      <div class="success-message text-center" id="prompt-message">
        <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3>
        <p> <?php echo $this->session->flashdata('recentsuccess'); ?> </p><br>
        <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
      </div>
    <?php } ?>

    <?php if ($this->session->flashdata('recentfail')){ ?>
      <div class="error-message text-center" id="prompt-message">
        <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3>
        <p> <?php echo $this->session->flashdata('recentfail'); ?> </p><br>
        <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
      </div>
    <?php } ?>

    <br>
      <div class="table-responsive">

        <table class="table table-hover" id="tracking-table">

          <tr>
              <th><br>Ticket ID</th>
              <th><br>Request Type</th>
              <th><br>Status</th>
              <th><br>Feedback</th>
          </tr>

          <?php foreach($result as $row): ?>
          <tr>
              <td><?php echo $row->request_type . "-" . $row->ticketid; ?></td>
              <td><?php
                        if($row->request_type == 'RGC')
                        {
                          echo "Grass Cutting";
                        }
                        else if($row->request_type == 'RTC')
                        {
                          echo "Trash Collection";
                        }
                        else if($row->request_type == 'RPC')
                        {
                          echo "Pest Control";
                        }
                         else if($row->request_type == 'RMP')
                        {
                          echo "Malfunctioning Post Lights";
                        }
                        else if($row->request_type == 'RPL')
                        {
                          echo "Water Pipeline Leakages";
                        }
                         else if($row->request_type == 'RBD')
                        {
                          echo "Blocked Drainage";
                        }
                        else if($row->request_type == 'RSC')
                        {
                          echo "Electrical Short Circuit";
                        }
                         else if($row->request_type == 'RMD')
                        {
                          echo "Monthly Dues";
                        }
                        else if($row->request_type == 'ROT')
                        {
                          echo "Other";
                        }
                        else if($row->request_type == 'CTV')
                        {
                          echo "CCTV Retrieval Request";
                        }
                         else if($row->request_type == 'EFR')
                        {
                          echo "Fire";
                        }
                        else if($row->request_type == 'ERB')
                        {
                          echo "Robbery";
                        }
                        else if($row->request_type == 'EBT')
                        {
                          echo "Broken House Tube";
                        }
                        else if($row->request_type == 'ESP')
                        {
                          echo "Suspicious Person";
                        }  ?>
              </td>
              <td><?php if($row->status == 0) { echo "Resolved"; } else if($row->status == 1){ echo "Work in Progress"; } else if($row->status == 2){ echo "Unaddressed";}  ?></td>
              <td><?php if($row->homeowner_feedback == 0) { echo "Finished"; } else { echo "<button type='button' class='btn btn-custom-3' data-href='".base_url()."user_tracking/set_finished_recent/".$row->ticketid."' data-toggle='modal' data-target='#delete-modal'>Set as Finished</button>"; } ?></td>
          </tr>
        <?php endforeach; ?>
        </table>

      </div>

      <br>
      <a href="<?php site_url();?>view_history"><button type="button" class="btn btn-custom">View History</button></a>
      <br><br>

    </div>

  </div>

  <br>

</div>
