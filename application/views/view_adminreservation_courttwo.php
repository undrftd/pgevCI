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
    <h1> Reservations for Court Two</h1>
  </div><br>

 <div class="modal fade" id="delete-modal-1" role="dialog">

      <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Approve Reservation</h4>
            </div>

            <br>

              <div class="signin">
                  <div class="modal-body text-center">
                      <p> Are you sure you want to approve this reservation? </p><br><br>
                      <a class ="deleteclass"><button type="submit" class="btn btn-custom-1">Yes</button></a>
                      <button type="button" class="btn btn-custom" data-dismiss="modal">Cancel</button>
                  </div>
              </div>
          </div>

      </div>
  </div>

  <div class="modal fade" id="delete-modal" role="dialog">

      <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Deny Reservation</h4>
            </div>

            <br>

              <div class="signin">
                  <div class="modal-body text-center">
                      <p> Are you sure you want to deny this reservation? </p><br><br>
                      <a class ="deleteclass"><button type="submit" class="btn btn-custom-1">Yes</button></a>
                      <button type="button" class="btn btn-custom" data-dismiss="modal">Cancel</button>
                  </div>
              </div>
          </div>

      </div>
  </div>

  <div class="portlet nopadding">

    <div class="portlet-header">

      <button onclick="hideReservation()" class="btn btn-custom-1" id="hide-button">Hide Reservations</button>

      <hr>

      <div id="reservation-table">

        <form action="<?php echo base_url(); ?>admin_reservation/check_reservations_courttwo/" method="GET">
          <div id="search-group">
            <input id='datetimepicker4' type='text' name="search" class="form-control" placeholder="Click here to view the calendar">
              <button type="submit" class="btn btn-custom-8"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
            </input>
          </div>
        </form>

        <br> <br>

        <div class="tab-content">

          <div class="reservation-schedule">

            <div class="tab-pane fade in active" id="portlet_tab1">

              <div class="table-responsive">

                <table class="table table-hover">
                  <tr>
                    <th><br>Date and Time Reserved</th>
                    <th><br>6:00-7:00</th>
                    <th><br>7:00-8:00</th>
                    <th><br>8:00-9:00</th>
                    <th><br>9:00-10:00</th>
                  </tr>

                    <tr><td><?php echo date("F d, Y", strtotime($date)); ?></td>

                    <?php

                    $tdX = array(0,0,0,0,0,0,0,0,0,0,0);

                    // loop through results setting the array switches
                    foreach ($result as $result)
                    {
                      while($result->reservation_start != $result->reservation_end)
                      {
                        $tdX[$result->reservation_start] = 1;
                        $result->reservation_start++;
                      }
                    }

                    // loop through array building row
                    for ($i = 6; $i<=9; $i++) {

                     if ($tdX[$i] === 1 ) {
                         $tdClass = 'reserved';
                     } else {
                         $tdClass = 'vacant';
                     }

                     echo "<td class='$tdClass'></td>";

                    }

                    // close row
                    echo '</tr>';
                    ?>
                </table>

                <hr>

                <div class="table-legend">
                  <p> <strong>Note:</strong>&nbsp; <span class="dot-style-vacant">&#9679;</span> &nbsp;is for vacant and&nbsp; <span class="dot-style-reserved">&#9679;</span> &nbsp;is for <span class="mark-reserved">reserved</span>.  </p>
                </div>

              </div>

            </div>

          </div>

        </div>

      </div>

    <br>

    </div>

    <div class="portlet-title">

      <ul class="nav nav-tabs">

        <li>
          <a href="<?php echo base_url(); ?>admin_reservation/court_one">
            Court 1 <span class="badge"> <?php echo $countone; ?> </span> </a>
        </li>

        <li class="active">
            <a href="<?php echo base_url(); ?>admin_reservation/court_two" id="not-important">
            Court 2 <span class="badge"> <?php echo $counttwo; ?> </span> </a>
        </li>

        <li>
          <a href="<?php echo base_url(); ?>admin_reservation/clubhouse" id="not-important">
            Clubhouse <span class="badge"> <?php echo $countclub; ?> </span> </a>
        </li>

        <li class="dropdown" id="dropdown-mobile">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Others <span class="badge"> <?php echo $counttwo + $countclub; ?> </span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url(); ?>admin_reservation/court_two">Court 2 <span class="a-links"> <?php echo $counttwo; ?> </span> </a></li>
            <li><a href="<?php echo base_url(); ?>admin_reservation/clubhouse">Clubhouse <span class="a-links"> <?php echo $countclub; ?> </span> </a></li>
          </ul>
        </li>

      </ul>

    </div>

    <div class="portlet-body">

      <?php if ($this->session->flashdata('reservefeedback')){ ?>
        <div class="success-message text-center" id="prompt-message">
          <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3>
          <p> <?php echo $this->session->flashdata('reservefeedback'); ?></p><br>
          <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
        </div>
      <?php } ?>

      <?php if ($this->session->flashdata('reservefail')){ ?>
        <div class="error-message text-center" id="prompt-message">
          <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3>
          <p> <?php echo $this->session->flashdata('reservefail'); ?></p><br>
          <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
        </div>
      <?php } ?>

      <br>

      <div class="tab-content">

        <div class="reservation-schedule">

          <div class="tab-pane fade in active" id="portlet_tab1">

            <div class="table-responsive">

              <table class="table table-hover">

                <tr>
                    <th><br>Date</th>
                    <th><br>Homeowner Name</th>
                    <th><br>Time</th>
                    <th><br>Status</th>
                    <th><br>Action</th>
                </tr>

                <?php foreach($myreserve as $row):?>
                <tr>
                    <td><?php echo date("F d, Y", strtotime($row->reservation_date)); ?></td>
                    <td><?php echo $row->firstname . " " . $row->lastname; ?></td>
                    <td><?php echo $row->reservation_start . ":00 PM - " . $row->reservation_end . ":00 PM";?> </td>
                    <td><?php if($row->reservation_status == 2) { echo "Pending"; } else if($row->reservation_status == 1) { echo "Approved"; } else { echo "Denied"; } ?> </td>
                    <td class="action-button">
                      <?php if($row->reservation_status == 2) { echo
                      '<button type="button" class="btn btn-custom-3" data-href="' . base_url() . 'admin_reservation/approve_courttworeservation/' . $row->reservation_id .'" data-toggle="modal" data-target="#delete-modal-1"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>  &nbsp;Approve </button>
                      <button type="button" class="btn btn-custom-3" data-href="' . base_url() . 'admin_reservation/deny_courttworeservation/' . $row->reservation_id .'" data-toggle="modal" data-target="#delete-modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>  &nbsp;Deny </button>'; } else { echo "No Action Needed"; } ?>

                    </td>
                </tr>
                <?php endforeach; ?>

              </table>

              <br><br>
              <center><div id="pagination-link"><?php echo $courttwolinks; ?></div></center>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

    <br><br><br><br>

  </div>

</div>
