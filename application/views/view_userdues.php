<div id="page-content-wrapper">
  <a href="#menu-toggle" class="btn btn-default btn-sm" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</a>
  <br>
  <br>

  <div class="header-style">
    <h1> Monthly Dues </h1>
  </div>

  <br>

    <div class="row">

      <div class="col-xs-12 col-sm-12 col-md-5 col-md-offset-2">

        <div class="admin-message">

            <p> Dear User,<br><br>
              Always pay before the cutoff date in order to avoid any problems regarding your monthly dues. If you have any problems with the information we provided here,
              create a ticket regarding some problems about your monthly dues through the button below this message. <br><br>
              Many thanks, <br>
              Parkwood Greens Executive Village Administrators
            </p>

            <br><br>

            <a href="user-requests.html"><button type="button" class="btn btn-custom">Create a Ticket</button></a>
            <br>
            <br>

        </div>

        <br>

      </div>

      <div class="clearfix visible-md-block"></div>
      <div class="clearfix visible-sm-block"></div>

      <div class="col-xs-12 col-sm-12 col-md-3">

        <div class="information">
            <div class="form-group">
              <h4> Billing Information </h4>
            <br>
            <p> Name </p>
            <input class="form-control" id="sel1" type="text" placeholder="" value="<?php echo $this->session->userdata('firstname') . " " . $this->session->userdata('lastname'); ?>" readonly>
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
            <input class="form-control" id="sel1" type="text" placeholder="" value="<?php echo $this->session->userdata('monthly_dues') + $this->session->userdata('arrears'); ?>" readonly>
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
            
              <br>
          </div>
        </div>
        <br>
        <br>

      </div>


    </div>
  </div>

</div>
