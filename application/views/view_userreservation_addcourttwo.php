<div id="page-content-wrapper">
  <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>

  <br><br><br>

  <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 nopadding">

      <div class="header-style">
        <h1>Reservation Request - Basketball Court Two </h1>
      </div>

        <br>

      <div class="information">

        <form action="<?php echo site_url();?>user_reservation/create_reservation_courttwo" method="POST">

           <div class="form-group">


            <h4> Reservation Information </h4><br>

            <p> Homeowner's Name </p>
            <input class="form-control" id="sel1" type="text" value="<?php echo $this->session->userdata('firstname') . " " . $this->session->userdata('lastname');;?>" disabled>

            <br>

            <p> Desired Reservation Date </p>
            <div class='input-group date' id='datetimepicker2'>
              <input id="sel1" name="datepick" type='text' class="form-control" placeholder="Click the calendar button to select a time and date"/>
              <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
            <p class="error"> <?php echo form_error('datepick'); ?></p>
            <br>

            <p> Desired Reservation Start Time</p>
              <select name="reservestart" class="form-control" id="sel1">
                <option value= "" selected hidden>Choose your start time</option>
                <option value= "6">6:00 PM</option>
                <option value= "7">7:00 PM</option>
                <option value= "8">8:00 PM</option>
                <option value= "9">9:00 PM</option>
              </select>
            <p class="error"> <?php echo form_error('reservestart'); ?></p>
            <br>

            <p> Desired Reservation End Time</p>
              <select name="reserveend" class="form-control" id="sel1">
                <option value= "" selected hidden>Choose your end time</option>
                <option value= "6">6:00 PM</option>
                <option value= "7">7:00 PM</option>
                <option value= "8">8:00 PM</option>
                <option value= "9">9:00 PM</option>
                <option value= "10">10:00 PM</option>
              </select>
            <p class="error"> <?php echo form_error('reserveend');?> </p>

          </div>


          <br><br>

          <button type="submit" class="btn btn-custom-5">Add Reservation</button>

        </form>

      </div>

      <br>
      <br>

    </div>

  </div>

</div>
