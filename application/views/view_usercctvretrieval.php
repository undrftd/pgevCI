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

      <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 nopadding">

        <div class="header-style">
          <h1> CCTV Retrieval Request </h1>
        </div>

        <?php if ($this->session->flashdata('cctvsuccess')){ ?>
          <div class="success-message text-center" id="prompt-message">
            <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3>
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
              <p> Requested Date and Time of the Incident</p>
              <div class='input-group date' id='datetimepicker1'>
                <input id="sel1" name ="datepick" type='text' class="form-control" placeholder="Click the calendar button to select a time and date" required>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>
              <p> <?php echo form_error('datepick'); ?> </p>

            </div><br>

            <div class="form-group">
              <p> Message </p>
              <textarea name ="content" class="form-control" id="user-message" placeholder="Kindly explain the reason for your CCTV Retrieval Request" rows="15" reseize="none" required></textarea>
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
                <button type="button" onclick="document.getElementById('file').click();" class="btn btn-custom-1"><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span> &nbsp;Attach</button></a>
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
