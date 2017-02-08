      <div id="page-content-wrapper">

  <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>

  <br><br><br>

  <div class="header-style">
    <h1> Reservation for the Amenities</h1>
  </div>

  <div class="modal fade" id="delete-modal" role="dialog">

      <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
              <div class="signin">
                  <div class="modal-body text-center">
                      <p> Are you sure you want to remove this reservation from the list? </p><br><br>
                      <button type="submit" class="btn btn-custom-1">Yes</button>
                      <button type="button" class="btn btn-custom" data-dismiss="modal">Cancel</button>
                  </div>
              </div>
          </div>

      </div>
  </div>

  <br>

  <a href="<?php echo site_url('user_reservation/add_reservation_courtone') ?>"><button type="button" class="btn btn-custom-1">+ Add a Reservation</button></a><br>

  <div class="portlet">

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
          <a href="<?php echo base_url(); ?>user_reservation/clubhouse">
            Clubhouse </a>
        </li>

        <li class="active">
          <a href="<?php echo base_url(); ?>user_reservation/reservations">
            My Reservation </a>
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
        </div>

        <br>

				<div class="tab-pane fade in active" id="portlet_tab1">

          <div class="table-responsive">

            <table class="table table-hover">

              <tr>
                  <th><br>Date</th>
                  <th><br>Time</th>
                  <th><br>Status</th>
                  <th><br>Action</th>
              </tr>
  
              <!--<?php foreach($myreserve as $row): ?>
              <tr>
                  <td><?php echo date("F d, Y", strtotime($row->reservation_date)) ?></td>
                  <td><?php echo $row->reservation_start . ":00 PM - " . $row->reservation_end . ":00 PM";?> </td>
                  <td><?php if($row->reservation_status == 1) { echo "Pending"; } else { echo "Approved"; } ?> </td>
                  <td class="action-button">
                    <button type="button" class="btn btn-custom-3" data-toggle="modal" data-target="#delete-modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  Delete </button>
                  </td>
              </tr>
              <?php endforeach; ?>-->

            </table>
            <br><br>

          </div>

				</div>

      </div>