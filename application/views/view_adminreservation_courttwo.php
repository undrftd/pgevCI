<div id="page-content-wrapper">

  <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>

  <br><br><br>

  <div class="header-style">
    <h1> Reservation for the Amenities</h1>
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
                      <a class ="deleteclass"><button type="submit" class="btn btn-custom-1">Yes</button>
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
                      <a class ="deleteclass"><button type="submit" class="btn btn-custom-1">Yes</button>
                      <button type="button" class="btn btn-custom" data-dismiss="modal">Cancel</button>
                  </div>
              </div>
          </div>

      </div>
  </div>

  <div class="portlet">

    <div class="portlet-header">

      <form action="<?php echo base_url(); ?>admin_reservation/check_reservations_courtone/" method="GET">
        <div id="search-group">
          <input id='datetimepicker4' type='text' name="search" class="form-control" placeholder="Click here to view the calendar">
            <button type="submit" class="btn btn-custom-8"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
          </input>
        </div>
      </form>

    <br><br>

    </div>

    <div class="portlet-title">

      <ul class="nav nav-tabs">

        <li>
          <a href="<?php echo base_url(); ?>admin_reservation/court_one">
            Court 1 </a>
        </li>

        <li class="active">
            <a href="<?php echo base_url(); ?>admin_reservation/court_two">
            Court 2 </a>
        </li>

        <li>
          <a href="<?php echo base_url(); ?>admin_reservation/clubhouse">
            Clubhouse </a>
        </li>

      </ul>

    </div>

    <div class="portlet-body">

      <br>

      <div class="tab-content">

        <div class="row">

          <div class="col-xs-12 nopadding">
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

        </div>

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

                <?php foreach($myreserve as $row): ?>
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

              <hr>

              <div class="table-legend">
                <p> Insert admin note here.
                </p>
              </div>

              <br><br>
              <center><div id="pagination-link"><?php echo $courttwolinks; ?></div></center>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

</div>
