<div id="page-content-wrapper">

  <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>

  <span class="dropdown sign-out">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="dot-style">&#8226;</span> &nbsp;Hello, <?php echo $this->session->userdata('firstname'); ?></a>
    <ul class="dropdown-menu pull-right">
      <li class="dropdown-header"><strong><a>Activities</a></strong></li>
      <li><a onclick="myFunction()"><strong>+</strong> &nbsp;Create an Emergency Ticket</a></li>
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

  <div class="header-style">
    <h1> My Reservation </h1>
  </div>

  <div class="modal fade" id="delete-modal" role="dialog">

      <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Cancel Reservation</h4>
            </div>

            <br>

            <div class="signin">
                <div class="modal-body text-center">
                    <p> Are you sure you want to cancel your reservation? </p><br><br>
                    <a class ="deleteclass"><button type="submit" class="btn btn-custom-1">Yes</button></a>
                    <button type="button" class="btn btn-custom" data-dismiss="modal">Cancel</button>
                </div>
            </div>
          </div>

      </div>
  </div>

  <br>

  <div class="portlet nopadding">

    <div class="portlet-title">

      <ul class="nav nav-tabs">

        <li>
          <a href="<?php echo base_url(); ?>user_reservation/court_one">
            Court 1 </a>
        </li>

        <li>
            <a href="<?php echo base_url(); ?>user_reservation/court_two">
            Court 2 </a>
        </li>

        <li>
          <a href="<?php echo base_url(); ?>user_reservation/clubhouse" id="not-important">
            Clubhouse </a>
        </li>

        <li class="active">
          <a href="<?php echo base_url(); ?>user_reservation/reservations_courtone" id="not-important">
            My Reservation </a>
        </li>

        <li class="dropdown" id="dropdown-mobile">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Other
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url(); ?>user_reservation/clubhouse">Clubhouse </a></li>
            <li><a href="<?php echo base_url(); ?>user_reservation/reservations_courtone">My Reservation </a></li>
          </ul>
        </li>

      </ul>

    </div>

    <div class="portlet-header">

      <?php if ($this->session->flashdata('reservefeedback')){ ?>
        <div class="success-message text-center" id="prompt-message">
          <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3>
          <p> <?php echo $this->session->flashdata('reservefeedback'); ?></p><br>
          <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button>
        </div>
      <?php } ?>

      <?php if ($this->session->flashdata('reservefail')){ ?>
        <div class="error-message text-center" id="prompt-message">
          <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3>
          <p> <?php echo $this->session->flashdata('reservefail'); ?></p><br>
          <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button>
        </div>
      <?php } ?>

    </div>

    <br>

    <div class="portlet-body">
      <div class="tab-content">

        <div class="court-message">
          <p> Here, you can view the status of your current reservations. Kindly keep track of this table to be informed whether your request has been accepted. Thank you!
          </p>
          <p> Go to: <a href="<?php echo site_url(); ?>user_reservation/reservations_courtone" class="a-links">Court 1</a>, <a href="<?php echo site_url(); ?>user_reservation/reservations_courttwo" class="a-links">Court 2</a>, <a href="<?php echo site_url(); ?>user_reservation/reservations_clubhouse" class="a-links">Clubhouse</a>
          </p>
        </div>

        <br>

        <div class="row">

          <div class="col-xs-12">

            <div class="tab-pane fade in active" id="portlet_tab1">

              <div class="table-responsive">

                <h4> Clubhouse </h4>

                <hr>

                <table class="table table-hover">

                  <tr>
                      <th><br>Date</th>
                      <th><br>Time</th>
                      <th><br>Status</th>
                      <th><br>Action</th>
                  </tr>

                  <?php foreach($myreserve as $row):
                  ?>

                  <tr>
                      <td><?php echo date("F d, Y", strtotime($row->reservation_date)) ?></td>
                        <td><?php if ($row->reservation_start < 12 && $row->reservation_end > 12 && $row->reservation_end < 25) { $resultstart = $row->reservation_start; $resultend = $row->reservation_end - 12; echo $resultstart . ":00 AM - " . $resultend . ":00 PM"; } else if ($row->reservation_start > 12 && $row->reservation_end > 12 && $row->reservation_end < 25) { $resultstart = $row->reservation_start - 12; $resultend = $row->reservation_end - 12; echo $resultstart . ":00 PM - " . $resultend . ":00 PM"; } else if($row->reservation_start < 12 && $row->reservation_end = 25) { $resultstart = $row->reservation_start; $resultend = $row->reservation_end - 24; echo $resultstart . ":00 AM - " . $resultend . ":00 AM"; }else if($row->reservation_start > 12 && $row->reservation_end = 25) { $resultstart = $row->reservation_start-12; $resultend = $row->reservation_end - 24; echo $resultstart . ":00 PM - " . $resultend . ":00 AM"; } else if($row->reservation_start == 12 && $row->reservation_end > 12 && $row->reservation_end < 25){ $resultstart = $row->reservation_start; $resultend = $row->reservation_end - 12; echo $resultstart . ":00 PM - " . $resultend . ":00 PM"; } else if($row->reservation_start == 12 && $row->reservation_end && $row->reservation_end == 25){ $resultstart = $row->reservation_start; $resultend = $row->reservation_end - 24; echo $resultstart . ":00 PM - " . $resultend . ":00 AM"; } ?> </td>
                      <td><?php if($row->reservation_status == 2) { echo "Pending"; } elseif($row->reservation_status == 0) { echo "Denied"; } else { echo "Approved"; } ?> </td>
                      <td class="action-button">
                      <?php if($row->reservation_status == 0) { echo "No Action Needed"; } else { echo '
                        <button type="button" class="btn btn-custom-3" data-href="' . base_url() . 'user_reservation/cancelreservation_courtone/' . $row->reservation_id .'" data-toggle="modal" data-target="#delete-modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>  &nbsp;Cancel </button>';
                      } ?>
                      </td>
                  </tr>
                  <?php endforeach; ?>

                </table>
                <br><br>
                <center><div id="pagination-link"><?php echo $clubhouselinks; ?></div></center>
              </div>

            </div>

            <br>

          </div>

        </div>

      </div>

    </div>

  </div>

</div>
