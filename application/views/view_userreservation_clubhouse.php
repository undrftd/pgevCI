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

  <a href="<?php echo site_url('user_reservation/add_reservation_clubhouse') ?>"><button type="button" class="btn btn-custom-1">+ Add a Reservation</button></a><br>

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

        <li class="active">
          <a href="<?php echo base_url(); ?>user_reservation/clubhouse">
            Clubhouse </a>
        </li>

      </ul>

    </div>

    <div class="portlet-body">

      <br>

      <div class="tab-content">

        <div class="row">

          <div class="col-xs-12 nopadding">

            <div class="court-message">
              <p> Note: Court 1 is located at Parkwood Greens Executive Village Phase 1 while Court 2 is located at Phase 2. Both of these courts can be reserved for your own private use
                from Mondays to Sundays, 6:00 PM until 10:00 PM. To <strong>inquire</strong>, kindly click the add a reservation button above. To <strong>check</strong> if a day is available, kindly use the search bar below and check the table.
                Also, your reservations can be viewed below through the table, My Reservation.
              </p>
            </div>

            <br>

            <form action="<?php echo base_url(); ?>user_reservation/check_availability_clubhouse/" method="GET">
            <div id="search-group">

              <input id='datetimepicker4' type='text' name="search" class="form-control" placeholder="Choose a preferred date">
                <button type="submit" class="btn btn-custom-8"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
              </input>

            </div>
            </form>

          </div>

        </div>

        <br><br>

        <div class="reservation-schedule">

          <div class="row">

            <div class="col-md-4 nopadding">

              <div class="information">

                <div class="row">

                  <div class="col-xs-12 nopadding">
                    <p class="vacant-legend"> <span></span> - Vacant </p>
                  </div>
                  <br><br><br>
                  <div class="col-xs-12 nopadding">
                    <p class="reserved-legend"> <span></span> - Reserved </p>
                  </div>

                </div>

              </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-8 nopadding">

              <div class="table-responsive text-right">

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
                    // Set an array of 10 'hour' switches
                    $tdX = array(0,0,0,0,0,0,0,0,0,0,0);

                    // loop through results setting the array switches
                    foreach ($result as $result)
                    {
                      $tdX[$result->reservation_time] = 1;
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
                    echo '</tr>'; ?>
                </table>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

  <br><hr>

  <div class="portlet">

    <div class="portlet-title">

      <ul class="nav nav-tabs">

        <li class="active">
          <a href="#">
            My Reservation </a>
        </li>

      </ul>

    </div>

    <div class="portlet-body">

      <br>

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

              <tr>
                  <td>January 8, 2016</td>
                  <td>6:00 PM - 8:00 PM</td>
                  <td>Pending</td>
                  <td class="action-button">
                    <a href="user-court-edit.html"><button type="button" class="btn btn-custom-2">Edit</button></a>
                    <button type="button" class="btn btn-custom-3" data-toggle="modal" data-target="#delete-modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  Delete </button>
                  </td>
              </tr>
              <tr>
                  <td>January 12, 2016</td>
                  <td>6:00 PM - 8:00 PM</td>
                  <td>Denied</td>
                  <td class="action-button">
                    <a href="user-court-edit.html"><button type="button" class="btn btn-custom-2">Edit</button></a>
                    <button type="button" class="btn btn-custom-3" data-toggle="modal" data-target="#delete-modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  Delete </button>
                  </td>
              </tr>
              <tr>
                  <td>January 16, 2016</td>
                  <td>6:00 PM - 8:00 PM</td>
                  <td>Pending</td>
                  <td class="action-button">
                    <a href="user-court-edit.html"><button type="button" class="btn btn-custom-2">Edit</button></a>
                    <button type="button" class="btn btn-custom-3" data-toggle="modal" data-target="#delete-modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  Delete </button>
                  </td>
              </tr>

            </table>
            <br><br>

          </div>

        </div>

      </div>

    </div>

  </div>

</div>

