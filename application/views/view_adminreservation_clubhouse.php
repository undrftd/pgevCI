<div id="page-content-wrapper">

  <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>

  <span class="dropdown sign-out">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="dot-style">&#8226;</span> &nbsp;Hello, <?php echo $this->session->userdata('firstname'); ?></a>
    <ul class="dropdown-menu pull-right">
      <li class="dropdown-header"><strong><a>Activities</a></strong></li>
      <li><a href="<?php echo base_url("admin_announcements/post_announcements"); ?>">+ &nbsp;Post an Announcement</a></li>
      <li><a href="<?php echo base_url("admin_ticketing/new_tickets"); ?>">New Tickets &nbsp;<span class="badge"> <?php echo $count; ?> </span> </a></li>
      <li><a href="<?php echo base_url("admin_reservation/court_one"); ?>">New Reservations &nbsp;<span class="badge"> <?php echo $reserve; ?> </span> </a></li>
      <li><a href="<?php echo base_url("admin_forms/car_sticker"); ?>">New Online Application &nbsp;<span class="badge"> <?php echo $forms; ?> </span> </a></li>
      <li role="separator" class="divider"></li>
      <li class="dropdown-header"><strong><a>Account</a></strong></li>
      <li><a href="<?php echo base_url("admin_profile/"); ?>"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>&nbsp; Edit Account</a></li>
      <li><a href="<?php echo base_url("login/signout/"); ?>">Sign Out</a></li>
    </ul>
  </span>

  <hr class="colored-hr">
  <br><br>

  <div class="header-style">
    <h1> Reservations for the Clubhouse</h1>
  </div>

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

  <div class="portlet">

    <div class="portlet-header">

      <button onclick="hideReservation()" class="btn btn-custom-1" id="hide-button">Hide Reservations</button>

      <hr>

      <div id="reservation-table">

        <form action="<?php echo base_url(); ?>admin_reservation/check_reservations_clubhouse/" method="GET">
          <div id="search-group">
            <input id='datetimepicker4' type='text' name="search" class="form-control" placeholder="Click here to view the calendar">
              <button type="submit" class="btn btn-custom-8"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
            </input>
          </div>
        </form>

        <br><br>

        <div class="tab-content">

          <div class="reservation-schedule">

            <div class="tab-pane fade in active" id="portlet_tab1">

              <div class="table-responsive">

                <table class="table table-hover">
                  <tr>
                    <th><br>Date and Time Reserved</th>
                    <th><br>10-11</th>
                    <th><br><span>&#8226;</span> &nbsp;11-12 PM</th>
                    <th><br>12-1</th>
                    <th><br>1-2</th>
                    <th><br>2-3</th>
                    <th><br>3-4</th>
                    <th><br>4-5</th>
                    <th><br>5-6</th>
                    <th><br>6-7</th>
                    <th><br>7-8</th>
                    <th><br>8-9</th>
                    <th><br>9-10</th>
                    <th><br>10-11</th>
                    <th><br><span>&#8226;</span> &nbsp;11-12 AM</th>
                    <th><br>12-1</th>
                  </tr>

                    <tr><td><?php echo date("F d, Y", strtotime($date)); ?></td>

                    <?php
                    
                    $tdX = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);

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
                    for ($i = 10; $i<=24; $i++) {

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

      </div>

      <br><br>

    </div>

    <div class="portlet-title">

      <ul class="nav nav-tabs">

        <li>
          <a href="<?php echo base_url(); ?>admin_reservation/court_one">
            Court 1 <span class="badge"> <?php echo $countone; ?> </span> </a>
        </li>

        <li>
            <a href="<?php echo base_url(); ?>admin_reservation/court_two">
            Court 2 <span class="badge"> <?php echo $counttwo; ?> </span> </a>
        </li>

        <li class="active">
          <a href="<?php echo base_url(); ?>admin_reservation/clubhouse">
            Clubhouse <span class="badge"> <?php echo $countclub; ?> </span> </a>
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
                    <td><?php if ($row->reservation_start < 12 && $row->reservation_end > 12 && $row->reservation_end < 25) { $resultstart = $row->reservation_start; $resultend = $row->reservation_end - 12; echo $resultstart . ":00 AM - " . $resultend . ":00 PM"; } else if ($row->reservation_start > 12 && $row->reservation_end > 12 && $row->reservation_end < 25) { $resultstart = $row->reservation_start - 12; $resultend = $row->reservation_end - 12; echo $resultstart . ":00 PM - " . $resultend . ":00 PM"; } else if($row->reservation_start < 12 && $row->reservation_end = 25) { $resultstart = $row->reservation_start; $resultend = $row->reservation_end - 24; echo $resultstart . ":00 AM - " . $resultend . ":00 AM"; }else if($row->reservation_start > 12 && $row->reservation_end = 25) { $resultstart = $row->reservation_start-12; $resultend = $row->reservation_end - 24; echo $resultstart . ":00 PM - " . $resultend . ":00 AM"; }?> </td>
                    <td><?php if($row->reservation_status == 2) { echo "Pending"; } else if($row->reservation_status == 1) { echo "Approved"; } else { echo "Denied"; } ?> </td>
                    <td class="action-button">
                      <?php if($row->reservation_status == 2) { echo
                      '<button type="button" class="btn btn-custom-3" data-href="' . base_url() . 'admin_reservation/approve_courtonereservation/' . $row->reservation_id .'" data-toggle="modal" data-target="#delete-modal-1"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>  &nbsp;Approve </button>
                      <button type="button" class="btn btn-custom-3" data-href="' . base_url() . 'admin_reservation/deny_courtonereservation/' . $row->reservation_id .'" data-toggle="modal" data-target="#delete-modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>  &nbsp;Deny </button>'; } else { echo "No Action Needed"; } ?>

                    </td>
                </tr>
                <?php endforeach; ?>

              </table>

              <br><br>

              <center><div id="pagination-link"><?php echo $clubhouselinks; ?></div></center>

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

</div>
