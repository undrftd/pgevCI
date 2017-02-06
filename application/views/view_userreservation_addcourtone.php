<div id="page-content-wrapper">
  <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>

  <br><br><br>

  <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 nopadding">

      <div class="header-style">
        <h1>Reservation Request - Basketball Court One </h1>
      </div>

      <?php if ($this->session->flashdata('cctvsuccess')){ ?>
        <div class="success-message text-center" id="prompt-message">
          <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3><br>
          <p> <?php echo $this->session->flashdata('cctvsuccess'); ?></p><br>
          <p class="ticket-id"><?php echo $ticket->request_type ."-" . $ticket->ticketid; ?></p><br><br>
          <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
        </div>
      <?php } ?>

      <?php if ($this->session->flashdata('cctvfail')){ ?>
        <div class="error-message text-center" id="prompt-message">
          <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3>
          <p> <?php echo $this->session->flashdata('cctvfail'); ?></p><br>
          <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
        </div>
      <?php } ?>

        <br>

      <div class="information">

        <form action="<?php echo site_url();?>user_ticketing/send_cctv" method="POST" enctype="multipart/form-data">

          <div class="form-group">


            <h4> Ticket Information </h4><br>

            <p> Homeowner's Name </p>
            <input class="form-control" id="sel1" type="text" value="<?php echo $this->session->userdata('firstname') . " " . $this->session->userdata('lastname');;?>" disabled>

            <br>

            <p> Desired Reservation Date </p>
            <div class='input-group date' id='datetimepicker2'>
              <input id="sel1" name ="datepick" type='text' class="form-control" placeholder="Click the calendar button to select a time and date"/>
              <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
            <p> <?php echo form_error('datepick'); ?> </p>
            <br>

            <p> Desired Reservation Time</p>
              <select name="reservetime" class="form-control" id="sel1">
                <option value= "" selected hidden>Choose your desired time</option>
                <option value= "6">6:00 PM - 7:00 PM</option>
                <option value= "7">7:00 PM - 8:00 PM</option>
                <option value= "8">8:00 PM - 9:00 PM</option>
                <option value= "9">9:00 PM - 10:00 PM</option>
              </select>
            <p class="error"> <?php echo form_error('role'); ?></p>

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
