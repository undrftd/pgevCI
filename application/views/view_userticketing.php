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
          <h1> Create a Ticket </h1>
        </div>

        <br>

        <div class="admin-message text-center">

          <p> Note: If you have any concerns with regards to our community, kindly choose between the provided options below and we are going to find a solution
            for it.
          </p>

        </div>

        <div class="row">

            <div class="col-xs-12 nopadding">

              <div class="ticket-type text-center">
                  <h4> Requests </h4><hr>
                  <p> This option is for requests which can be found on this list: Grass Cutting and Trash Collection </p><br>
                  <a href ="<?php echo site_url(); ?>user_ticketing/requests"><button type="button" class="btn btn-custom-2" id="close-button">+ Create</button></a><br><br>
              </div>
              </a>

            </div>

            <div class="col-xs-12 nopadding">

              <div class="ticket-type text-center">
                  <h4> Complaints </h4><hr>
                  <p> This option is for complaints which can be found on this list: Malfunctioning Post Lights, Water Leakages, Blocked Drainage, Electrical Short Circuit, and Monthly Dues. </p><br>
                  <a href ="<?php echo site_url(); ?>user_ticketing/complaints"><button type="button" class="btn btn-custom-2" id="close-button">+ Create</button></a><br><br>
              </div>
              </a>

            </div>

            <div class="col-xs-12 nopadding">

              <div class="ticket-type text-center">
                  <h4> CCTV Retrieval Request</h4><hr>
                  <p> This option is for homeowners who want a copy of their preferred CCTV footage. </p><br>
                  <a href ="<?php echo site_url(); ?>user_ticketing/cctv_retrieval"><button type="button" class="btn btn-custom-2" id="close-button">+ Create</button></a><br><br>
              </div>
              </a>

            </div>

            <div class="col-xs-12 nopadding">
              <div class="ticket-type text-center">
                <h4> Emergency Ticket</h4><hr>
                <p> This option is solely used for emergencies that may cause trouble to you or anyone in the community. </p><br>
                <button type="button" class="btn btn-custom-10" id="close-button" onclick="myFunction()">+ Create</button><br><br>
              </div>

            </div>

      </div>

      <br><br>

    </div>

  </div>

</div>

<script type="text/javascript">
  function breakTime() { // <<< do not edit or remove this line!
  /* Set Break Hour in 24hr Notation */
      var breakHour=16
      var startHour=8
      /* Set Break Minute */
      var breakMinute=30
      /* Set Break Message */
      var breakMessage="Hello, Homeowner! I'm sorry, but the administrators could only accommodate requests and complaints until 4:30 PM. Expect the ticket to be accommodated within the next working day. Thank you for your kind consideration. "
      ///////////////////No Need to Edit//////////////
      var theDate=new Date()
      if (Math.abs(theDate.getHours())>=breakHour||Math.abs(theDate.getHours())<=startHour&&Math.abs(theDate.getMinutes())!=breakMinute){
      this.focus();
      clearInterval(breakInt)
      alert(breakMessage)
        }
  }
  var breakInt=setInterval("breakTime()",500)
</script>
