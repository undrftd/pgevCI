      <div id="page-content-wrapper">
        <a href="#menu-toggle" class="btn btn-default btn-sm" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</a>
        <br>
        <br>

        <div class="header-style">
          <h1> Reservation for Basketball Court </h1>
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

          <div class="admin-message">
            <p> Note: Court 1 is located at Parkwood Greens Executive Village Phase 1 while Court 2 is located at Phase 2. Both of these courts can be reserved for your own private use
              from Mondays to Sundays, 6:00 PM until 10:00 PM. <span class="take-note">To inquire, kindly click the add a reservation button above. </span>
            </p>
          </div>

          <br>

          <div class="reservation-schedule text-center">

            <div class="table-legend">

              <h3> Legend </h3> <br>

              <div class="row text-center">

                <div class="col-xs-6 col-sm-6 col-md-6">
                  <p class="reserved-legend"> <span> </span> <br><br> Unavailable </p>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                  <p class="vacant-legend"> <span> </span> <br><br> Available </p>
                </div>

                <br><br>

              </div>

              <br>

            </div>

            <br><br>

<?php
	// Set timezone
	date_default_timezone_set('UTC');

	// Start date
	$date =  date("F d,Y");
	// End date
	$end= '2017-02-12';
	$end_date = date("F d, Y", strtotime($end));


	while (strtotime($date) <= strtotime($end_date)) {
                echo "
                  <div class='col-xs-12 col-sm-12 col-md-6'>

                  <div class='table-responsive'>

                    <p class='reservation-date'> Date: $date</p>

                    <table class='table table-bordered'>

                      <tr>
                          <th>Court</th>
                          <th>6:00</th>
                          <th>7:00</th>
                          <th>8:00</th>
                          <th>9:00</th>
                          <th>10:00</th>
                      </tr>

                      <tr>
                          <td>Court 1</td>";

                          if($date == $end_date) { echo '<td class="reserved"></td>';} else { echo '<td class="vacant"></td>'; }
                          echo "
                          <td class='vacant'></td>
                          <td class='vacant'></td>
                          <td class='vacant'></td>
                          <td class='vacant'></td>
                      </tr>

                      <tr>
                          <td>Court 2</td>
                          <td class='vacant'></td>
                          <td class='vacant'></td>
                          <td class='vacant'></td>
                          <td class='vacant'></td>
                          <td class='vacant'></td>
                      </tr>

                    </table>

                  </div>

                </div>	";
                $date = date ("F d, Y", strtotime("+1 day", strtotime($date)));
  
	}

?>

              </div>

            <div class="pagination">Pagination Arrows here</div>

          </div>

          <div class="portlet">
  					<div class="portlet-title">

  						<div class="caption caption-red">
  							<span class="caption-subject bold font-yellow-crusta uppercase">
  							My Reservation </span>
  						</div>


  					</div>

  					<div class="portlet-body">

  						<div class="tab-content">

  							<div class="tab-pane fade in active" id="portlet_tab1">

                  <div class="table-responsive">

                    <table class="table table-hover">

                      <tr>
                          <th><br>Date</th>
                          <th><br>Time</th>
                          <th><br>Contact Number</th>
                          <th><br>Status</th>
                          <th><br>Action</th>
                      </tr>

                      <tr>
                          <td>January 8, 2016</td>
                          <td>6:00 PM - 8:00 PM</td>
                          <td>09065715254</td>
                          <td>Pending</td>
                          <td class="action-button">
                            <a href="user-court-edit.html"><button type="button" class="btn btn-custom-2">Edit</button></a>
                            <button type="button" class="btn btn-custom-3" data-toggle="modal" data-target="#delete-modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  Delete </button>
                          </td>
                      </tr>
                      <tr>
                          <td>January 12, 2016</td>
                          <td>6:00 PM - 8:00 PM</td>
                          <td>09065715254</td>
                          <td>Denied</td>
                          <td class="action-button">
                            <a href="user-court-edit.html"><button type="button" class="btn btn-custom-2">Edit</button></a>
                            <button type="button" class="btn btn-custom-3" data-toggle="modal" data-target="#delete-modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  Delete </button>
                          </td>
                      </tr>
                      <tr>
                          <td>January 16, 2016</td>
                          <td>6:00 PM - 8:00 PM</td>
                          <td>09065715254</td>
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
