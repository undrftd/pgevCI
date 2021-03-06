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
          <h1> Monthly Dues </h1>
        </div>
        <br>

        <div class="admin-message text-center">

            <p> Note:
              Always pay before the cutoff date in order to avoid any problems regarding your monthly dues. If you have any problems with the information we provided here,
              create a ticket regarding some problems about your monthly dues through the button near the form.
            </p>

        </div>

        <br>

        <div class="information">
          <a href="<?php echo base_url(); ?>user_ticketing/requests_complaints"><button type="button" class="create-ticket"><span class="add-sign">+</span><span class="add-word">Create Ticket</span></button></a>
            <div class="form-group">
              <h4> Billing Information </h4>
            <br>
            <p> Name </p>
            <input class="form-control" id="sel1" type="text" placeholder="" value="<?php echo $this->session->userdata('firstname') . " " . $this->session->userdata('middlename') . " " . $this->session->userdata('lastname'); ?>" readonly>
            <br>

            <p> Address </p>
            <input class="form-control" id="sel1" type="text" placeholder="" value="<?php echo $this->session->userdata('address'); ?>" readonly>
            <br>

            <p> Monthly Dues (₱) </p>
            <input class="form-control" id="sel1" type="text" placeholder="" value="<?php echo $this->session->userdata('monthly_dues'); ?>" readonly>
            <br>

            <p> Arrears (₱) </p>
            <input class="form-control" id="sel1" type="text" placeholder="" value="<?php echo $this->session->userdata('arrears'); ?>" readonly>
            <br>

            <p> Total Balance (₱) </p>
            <input class="form-control" id="sel1" type="text" placeholder="" value="<?php echo number_format($this->session->userdata('monthly_dues') + $this->session->userdata('arrears'), 2, '.', ''); ?>" readonly>
            <br>

            <p> Month(s) Unpaid </p>
            <input class="form-control" id="sel1" type="text" placeholder=""
            value="<?php
            if(($this->session->userdata('arrears') >  0 && $this->session->userdata('monthly_dues') == 0)
            || ($this->session->userdata('arrears') > 0 && $this->session->userdata('monthly_dues') > 0 )
            || ($this->session->userdata('arrears') == 0 && $this->session->userdata('monthly_dues') > 0 ))
            {
              echo ($this->session->userdata('arrears') + $this->session->userdata('monthly_dues')) / ($rate->securityfee + $rate->assocfee);
            }
            else
            {
              echo "0";
            }  ?>" readonly>
          </div>

        </div>

        <br><br>

      </div>

    </div>

    <br>

  </div>
