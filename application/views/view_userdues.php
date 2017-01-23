<div id="page-content-wrapper">
  <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>
  <br><br>

    <div class="row">

      <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">

        <div class="header-style">
          <h1> Monthly Dues </h1>
        </div>
        <br>

        <div class="admin-message text-center">

            <p> Note:
              Always pay before the cutoff date in order to avoid any problems regarding your monthly dues. If you have any problems with the information we provided here,
              create a ticket regarding some problems about your monthly dues through the button below this message. <br><br>
            </p>

            <a href="<?php echo base_url(); ?>user_ticketing"><button type="button" class="btn btn-custom-4">+ Create a Ticket</button></a>
            <br><br>

        </div>

        <br>

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

        <br>


      </div>

    </div>

  </div>
