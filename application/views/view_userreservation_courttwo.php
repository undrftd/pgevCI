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
    <h1> Reservations for Court Two</h1>
  </div><br>

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

  <div class="portlet nopadding">

    <a href="<?php echo site_url('user_reservation/add_reservation_courttwo') ?>"><button type="button" class="btn btn-custom-1">+ Add a Reservation</button></a><br><br>

    <div class="portlet-title">

      <ul class="nav nav-tabs">

        <li>
          <a href="<?php echo base_url(); ?>user_reservation/court_one">
            Court 1 </a>
        </li>

        <li class="active">
            <a href="<?php echo base_url(); ?>user_reservation/court_two">
            Court 2 </a>
        </li>

        <li>
          <a href="<?php echo base_url(); ?>user_reservation/clubhouse" id="not-important">
            Clubhouse </a>
        </li>

         <li>
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

        <div class="row">

          <div class="col-xs-12 nopadding">

            <div class="court-message">
              <p> Note: Court 2 is located at Parkwood Greens Executive Village Phase 1 while Court 2 is located at Phase 2. Both of these courts can be reserved for your own private use
                from Mondays to Sundays, 6:00 PM until 10:00 PM. To <strong>inquire</strong>, kindly click the add a reservation button above. To <strong>check</strong> if a day is available, kindly use the search bar below and check the table.
                Also, your reservations can be viewed below through the tab, My Reservation.
              </p>
            </div>

            <br>

            <form action="<?php echo base_url(); ?>user_reservation/check_availability_courttwo/" method="GET">
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

            <div class="col-xs-12 nopadding">

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
<<<<<<< HEAD

                      $tdX = array(0,0,0,0,0,0,0,0,0,0);
=======
                      
                      $tdX = array(0,0,0,0,0,0,0,0,0,0,0);
>>>>>>> cac3bb2edd02df5c51d3e8c173d0fcd6e5cab38e

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

    </div>

  </div>

</div>
