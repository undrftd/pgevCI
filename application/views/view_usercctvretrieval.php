<div id="page-content-wrapper">
  <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>
  <br>
  <br>

  <div class="header-style">
    <h1> CCTV Retrieval Request </h1>
  </div>

  <br>

    <div class="row">

      <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">

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
              <p> Requested Date and Time of the Incident</p>
              <div class='input-group date' id='datetimepicker1'>
                <input id="sel1" name ="datepick" type='text' class="form-control" placeholder="Click the calendar button to select a time and date"/>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>
              <p> <?php echo form_error('datepick'); ?> </p>

            </div>

            <div class="form-group">
              <p> Message </p>
              <textarea name ="content" class="form-control" id="user-message" placeholder="Kindly explain the reason for your CCTV Retrieval Request" rows="15" reseize="none"></textarea>
              <p class="error"><?php echo form_error('content'); ?> </p>
            </div>

            <div class="form-group">
              <p>Attachment</p>

             <input type="file" name="file" size="20" id="exampleInputFile"/>
              <p class="help-block">Formats accepted: .doc, .docx, .pdf, .png, .jpg </p>
            </div>

            <br><br>

            <button type="submit" class="btn btn-custom-5">Send</button>

          </form>

        </div>

        <br>
        <br>

      </div>
    </div>
  </div>

</div>
