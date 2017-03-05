<div id="page-content-wrapper">
  <div class="web-header">

    <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>

    <div class="overlay-header">
      <span class="icon-main">
        <i class="material-icons md-36 gray400">account_circle</i>
        <?php
          $totalreserve = $deniedreserve + $approvedreserve;
          if ($totalreserve >= 1) {
            echo "<span class='badge'>$totalreserve</span>";
          }
          else if ($approvedreserve >= 1) {
            echo "<span class='badge'>$approvedreserve</span>";
          }
          else if ($deniedreserve >= 1) {
            echo "<span class='badge'>$deniedreserve</span>";
          }
        ?>
      </span>
      <h4>
        <?php echo $this->session->firstname ;?> <?php echo $this->session->lastname ;?>
        <span class="dropdown sign-out">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <span>Homeowner <span class="caret"></span></span>
          </a>
          <ul class="dropdown-menu pull-right">
            <li class="dropdown-header"><strong><a>Activities</a></strong></li>
            <li><a onclick="myFunction()">Create an Emergency Ticket</a></li>
            <li><a href="<?php echo base_url("user_announcements/post_bulletin"); ?>">Post a Bulletin</a></li>
            <li><a href="<?php echo base_url("user_reservation/reservations_courtone"); ?>">My Reservation
              <span class="a-links">
                <?php
                $totalreserve = $deniedreserve + $approvedreserve;
                if ($totalreserve >= 1) {
                  echo "<span>$totalreserve</span>";
                }
                else if ($approvedreserve >= 1) {
                  echo "<span>$approvedreserve</span>";
                }
                else if ($deniedreserve >= 1) {
                  echo "<span>$deniedreserve</span>";
                }
                ?>
              </span>
            </a></li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-header"><strong><a>Account</a></strong></li>
            <li><a href="<?php echo base_url("user_accounts/"); ?>" style="display: block;"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>&nbsp; Edit Account</a></li>
            <li><a href="<?php echo base_url("login/signout/"); ?>">Sign Out</a></li>
          </ul>
        </span>
      </h4>
    </div>

  </div>

  <hr class="colored-hr">
  <br>

  <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 nopadding">

      <div class="header-style">
        <h1>Reservation Request - Clubhouse </h1>
      </div>

        <br>

      <div class="information">

        <form action="<?php echo site_url();?>user_reservation/create_reservation_clubhouse" method="POST">

          <div class="form-group">


            <h4> Reservation Information </h4><br>

            <p> Homeowner's Name </p>
            <input class="form-control" id="sel1" type="text" value="<?php echo $this->session->userdata('firstname') . " " . $this->session->userdata('lastname');;?>" disabled>

            <br>

            <p> Desired Reservation Date </p>
            <div class='input-group date' id='datetimepicker2'>
              <input id="sel1" name="datepick" type='text' class="form-control" placeholder="Click the calendar button to select a time and date" required/>
              <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
            <p class="error"> <?php echo form_error('datepick'); ?></p>
            <br>

            <p> Desired Reservation Start Time</p>
              <select name="reservestart" class="form-control" id="sel1" required>
                <option value= "" selected hidden>Choose your start time</option>
                <option value= "10">10:00 AM</option>
                <option value= "11">11:00 AM</option>
                <option value= "12">12:00 PM</option>
                <option value= "13">1:00 PM</option>
                <option value= "14">2:00 PM</option>
                <option value= "15">3:00 PM</option>
                <option value= "16">4:00 PM</option>
                <option value= "17">5:00 PM</option>
                <option value= "18">6:00 PM</option>
                <option value= "19">7:00 PM</option>
                <option value= "20">8:00 PM</option>
                <option value= "21">9:00 PM</option>
              </select>
            <p class="error"> <?php echo form_error('reservestart'); ?></p>
            <br>

            <p> Desired Reservation End Time</p>
              <select name="reserveend" class="form-control" id="sel1" required>
                <option value= "" selected hidden>Choose your end time</option>
                <option value= "14">2:00 PM</option>
                <option value= "15">3:00 PM</option>
                <option value= "16">4:00 PM</option>
                <option value= "17">5:00 PM</option>
                <option value= "18">6:00 PM</option>
                <option value= "19">7:00 PM</option>
                <option value= "20">8:00 PM</option>
                <option value= "21">9:00 PM</option>
                <option value= "22">10:00 PM</option>
                <option value= "23">11:00 PM</option>
                <option value= "24">12:00 PM</option>
                <option value= "25">1:00 AM</option>
              </select>
            <p class="error"> <?php echo form_error('reserveend');?> </p>


          </div>

          <br><br>

          <button type="submit" class="btn btn-custom-5">Add Reservation</button>

          <div class="send-mobile">
            <a href="#" onclick="$(this).closest('form').submit()">+ Add Reservation</a>
          </div>

        </form>

      </div>

      <br><br><br>

    </div>

  </div>

</div>
