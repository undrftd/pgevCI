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

    <div class="row">

      <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 nopadding">

        <div class="header-style">
          <h1> Emergency Ticket </h1>
        </div>

        <?php if ($this->session->flashdata('emergencysuccess')){ ?>
          <div class="success-message text-center" id="prompt-message">
            <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3><br>
            <p> <?php echo $this->session->flashdata('emergencysuccess'); ?></p><br>
            <p class="ticket-id"><?php echo $ticket->request_type ."-" . $ticket->ticketid; ?></p><br><br>
            <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
          </div>
        <?php } ?>

        <?php if ($this->session->flashdata('emergencyfail')){ ?>
          <div class="error-message text-center" id="prompt-message">
            <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3>
            <p> <?php echo $this->session->flashdata('emergencyfail'); ?></p><br>
            <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
          </div>
        <?php } ?>

          <br>

        <div class="information">

          <form action="<?php echo site_url(); ?>user_ticketing/send_emergency" method="POST" enctype="multipart/form-data">

            <div class="form-group">

              <h4> Ticket Information </h4><br>

              <p> Homeowner's Name </p>
              <input class="form-control" id="sel1" type="text" value="<?php echo $this->session->userdata('firstname') . " " . $this->session->userdata('lastname');;?>" disabled>

              <br>


              <p> Select a type of ticket: </p>
              <select name="type" class="form-control" id="sel1" required>
                  <option value="" selected hidden>Type of Emergency</option>
                  <option value="EFR">Fire</option>
                  <option value="ERB">Robbery</option>
                  <option value="EBT">Broken House Tube</option>
                  <option value="ESP">Suspicious Person</option>
              </select>
              <p class="error"><?php echo form_error('type'); ?> </p>

            </div><br>

            <div class="form-group">
              <p> Message </p>
              <textarea name ="content" class="form-control" id="user-message" placeholder="Kindly explain your emergency..." rows="15" reseize="none" required></textarea>
              <p class="error"><?php echo form_error('content'); ?> </p>
            </div>

            <br>

            <div class="form-group">
              <p>Attachment</p>

              <div id="fileList"></div>
              <p class="help-block">Formats accepted: .doc, .docx, .pdf, .png, .jpg </p>
            </div>

            <hr>

            <div class="form-group">

              <div class="user-buttons">

                <input type="file" name="file" id="file" style="display: none;" multiple onchange="javascript:updateList()" />
                <button type="button" onclick="document.getElementById('file').click();" class="btn btn-custom-1"><i class="material-icons">attach_file</i></button></a>
                <button type="submit" class="btn btn-custom">Send</button>

              </div>

            </div>

          </form>

        </div>

        <br>
        <br>

      </div>
    </div>
  </div>

</div>
