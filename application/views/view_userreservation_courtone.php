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

  <a href="user-court-add.html"><button type="button" class="btn btn-custom-1">+ Add a Reservation</button></a><br>

  <div class="portlet">

    <div class="portlet-title">

      <ul class="nav nav-tabs">

        <li class="active">
          <a href="<?php echo base_url(); ?>user_forms/car_sticker">
            Court 1 </a>
        </li>

        <li>
            <a href="#">
            Court 2 </a>
        </li>

        <li>
          <a href="#">
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
                from Mondays to Sundays, 6:00 PM until 10:00 PM. To <strong>inquire</strong>, kindly click the add a reservation button above. To <strong>check</strong> if this day is available, kindly click the word below.
                Also, your reservations can be viewed below through the table, My Reservation.
              </p>
              <form action="<?php echo base_url(); ?>user_reservation/check_availability_courtone/" method="GET">
              <a href="#" onclick="$(this).closest('form').submit()" class="a-links">Check if this day is available</a>
            </div>
            <br><br>

            <div class="date-picker" data-date="<?php echo $date; ?> " data-keyboard="true">

              <div class="date-container pull-left">

                  <h2 class="weekday"></h2>
                  <h4 class="date"></h4>
                  <h2 class="year pull-right"></h2>

              </div>

              <span data-toggle="datepicker" data-type="subtract" class="glyphicon glyphicon-chevron-left" aria-hidden="true"></></span>
              <span data-toggle="datepicker" data-type="add" class="glyphicon glyphicon-chevron-right" aria-hidden="true"></></span>

              <div class="input-group input-datepicker">
                  <input type="text" name="search" class="form-control" data-format="YYYY/MM/DD" placeholder="Skip to a certain date (YYYY/MM/DD)" id="sel1">
                  <span class="input-group-btn">
                      <button class="btn btn-custom-8" type="button">Go</button>
                  </span>

              </div>

              <span data-toggle="calendar" class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
            </form>
            </div>

          </div>

        </div>

        <br><br><br>
       
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

              <div class="table-responsive">

                <table class="table table-hover">
                  <h1> Reservation Status for <?php echo date("F d, Y", strtotime($date)); ?>
                  <tr>
                    <th><br>Time Reserved</th>
                    <th><br>6:00-7:00</th>
                    <th><br>7:00-8:00</th>
                    <th><br>8:00-9:00</th>
                    <th><br>9:00-10:00</th>
                  </tr>
              
                  <tr>
                    <td>Status</td>
                    <?php if($result == FALSE) { echo '<td class="vacant"></td>'; } else if($result->reservation_time == 6) { echo '<td class="reserved"></td>'; } else { echo '<td class="vacant"></td>'; } ?>
                     <?php if($result == FALSE) { echo '<td class="vacant"></td>'; } else if($result->reservation_time == 7) { echo '<td class="reserved"></td>'; } else { echo '<td class="vacant"></td>'; } ?>
                     <?php if($result == FALSE) { echo '<td class="vacant"></td>'; } else if($result->reservation_time == 8) { echo '<td class="reserved"></td>'; }   else { echo '<td class="vacant"></td>'; } ?>
                     <?php if($result == FALSE) { echo '<td class="vacant"></td>'; } else if($result->reservation_time == 9) { echo '<td class="reserved"></td>'; } else { echo '<td class="vacant"></td>'; }?>
                  </tr>

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
