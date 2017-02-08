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

  <div class="portlet">

    <div class="portlet-title">

      <ul class="nav nav-tabs">

        <li  class="active">
          <a href="<?php echo base_url(); ?>admin_reservation/court_one">
            Court 1 </a>
        </li>

        <li>
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
                <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
              </div> 
              <br>
            <?php } ?>

            <?php if ($this->session->flashdata('reservefail')){ ?>
              <div class="error-message text-center" id="prompt-message">
                <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3>
                <p> <?php echo $this->session->flashdata('reservefail'); ?></p><br>
                <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
              </div>
            <?php } ?>
            <div class="court-message">
              <p> Note: Court 1 is located at Parkwood Greens Executive Village Phase 1 while Court 2 is located at Phase 2. Both of these courts can be reserved for your own private use
                from Mondays to Sundays, 6:00 PM until 10:00 PM. To <strong>inquire</strong>, kindly click the add a reservation button above. To <strong>check</strong> if a day is available, kindly use the search bar below and check the table.
                Also, your reservations can be viewed below through the table, My Reservation.
              </p>
            </div>

            <br>

            <form action="<?php echo base_url(); ?>user_reservation/check_availability_courtone/" method="GET">
            <div id="search-group">

              <input id='datetimepicker4' type='text' name="search" class="form-control" placeholder="Choose a preferred date">
                <button type="submit" class="btn btn-custom-8"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
              </input>

            </div>
            </form>

          </div>

        </div>

        <br><br>
        <h1> <?php echo date('F d, Y'); ?> </h1>
				<div class="tab-pane fade in active" id="portlet_tab1">

          <div class="table-responsive">

            <table class="table table-hover">

              <tr>
                  <th><br>Time</th>
                  <th><br>Status</th>
                  <th><br>Action</th>
              </tr>
  
              <?php foreach($myreserve as $row): ?>
              <tr>
                  <td><?php echo $row->reservation_start . ":00 PM - " . $row->reservation_end . ":00 PM";?> </td>
                  <td><?php if($row->reservation_status == 1) { echo "Pending"; } else { echo "Approved"; } ?> </td>
                  <td class="action-button">
                    <button type="button" class="btn btn-custom-3" data-toggle="modal" data-target="#delete-modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  Approve </button>
                    <button type="button" class="btn btn-custom-3" data-toggle="modal" data-target="#delete-modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  Deny </button>
                  </td>
              </tr>
              <?php endforeach; ?>

            </table>
            <br><br>
  </div>

</div>
