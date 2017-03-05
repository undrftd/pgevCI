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

  <div class="modal fade" id="delete-modal" role="dialog">

      <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Delete</h4>
            </div>

            <br>

            <div class="signin">

              <div class="modal-body text-center">
                  <p> <?php echo $this->session->userdata('firstname');?>, are you sure you want to set this ticket as Finished? </p><br>
                  <a class ="deleteclass"><button type="submit" class="btn btn-custom">Yes</button></a>
                  <button type="button" class="btn btn-custom-1" data-dismiss="modal">Cancel</button>
              </div>

            </div>

          </div>

        </div>

      </div>

  <div class="header-style">
    <h1> Ticket History </h1>
  </div>

  <br>

  <?php if ($this->session->flashdata('historysuccess')){ ?>
    <div class="success-message text-center" id="prompt-message">
      <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3>
      <p> <?php echo $this->session->flashdata('historysuccess'); ?> </p><br>
      <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button>
    </div>
  <?php } ?>

  <?php if ($this->session->flashdata('historyfail')){ ?>
    <div class="error-message text-center" id="prompt-message">
      <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3>
      <p> <?php echo $this->session->flashdata('historyfail'); ?> </p><br>
      <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button>
    </div>
  <?php } ?>

  <br>

  <div class="table-responsive">

    <table class="table table-hover" id="tracking-table">

      <tr>
          <th><br>Ticket ID</th>
          <th><br>Status</th>
          <th><br>Date Created</th>
          <th><br>Date Resolved</th>
          <th><br>Feedback</th>
      </tr>

  <?php foreach($result as $row): ?>
      <tr>
          <td><?php echo $row->request_type . "-" . $row->ticketid; ?> </td>
          <td><?php if($row->status == 0) { echo "Resolved"; } else if($row->status == 1){ echo "Work in Progress"; } else if($row->status == 2){ echo "Unaddressed";}  ?></td>
          <td><?php echo date("m/d/Y g:i A", $row->date_requested);; ?> </td>
          <td><?php if($row->status != 0) { echo "Awaiting Resolution"; } else { echo date("m/d/Y g:i A", $row->date_closed); } ?></td>
          <td><?php if($row->homeowner_feedback == 0) { echo "Finished"; } else if($row->homeowner_feedback == 0 && $row->status == 0) { echo "Closed - No Action Needed"; }else if($row->homeowner_feedback != 0 && $row->status == 0) { echo "Closed by Administrators"; }else { echo "<button type='button' class='btn btn-custom-3' data-href='".base_url()."user_tracking/set_finished_recent/".$row->ticketid."' data-toggle='modal' data-target='#delete-modal'>Set as Finished</button>"; } ?></td>
  <?php endforeach; ?>

    </table>

  </div>

  <center><?php echo $ticketlinks; ?></center>

  <br>

  <a href="<?php site_url(); ?>recent"><button type="button" class="btn btn-custom">Recent Tickets</button></a>

  <br><br><br><br><br>

</div>
