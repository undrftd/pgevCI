<div id="page-content-wrapper">
  <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>

  <br><br>

    <div class="row">

      <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">

        <div class="header-style">
          <h1> Requests and Complaints </h1>
        </div>

        <?php if ($this->session->flashdata('requestsuccess')){ ?>
          <div class="success-message text-center" id="prompt-message">
            <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3><br>
            <p> <?php echo $this->session->flashdata('requestsuccess'); ?></p><br>
            <p class="ticket-id"><?php echo $ticket->request_type ."-" . $ticket->ticketid; ?></p><br><br>
            <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
          </div>
        <?php } ?>

        <?php if ($this->session->flashdata('requestfail')){ ?>
          <div class="error-message text-center" id="prompt-message">
            <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3>
            <p> <?php echo $this->session->flashdata('requestfail'); ?></p><br>
            <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
          </div>
        <?php } ?>

          <br>

        <div class="information">

          <form action="<?php echo site_url();?>user_ticketing/send_requestcomplaint" method="POST" enctype="multipart/form-data">

            <div class="form-group">

              <h4> Ticket Information </h4><br>

              <p> Homeowner's Name </p>
              <input class="form-control" id="sel1" type="text" value="<?php echo $this->session->userdata('firstname') . " " . $this->session->userdata('lastname');;?>" disabled>

              <br>


              <p> Select a type of ticket: </p>
              <select name ="type" class="form-control" id="sel1">
                <option value="" selected hidden>Type of Request or Complaint</option>
                <option value="RGC">Grass Cutting</option>
                <option value="RTC">Trash Collection</option>
                <option value="RPC">Pest Control</option>
                <option value="RMP">Malfunctioning Post Lights</option>
                <option value="RPL">Water Pipeline Leakages</option>
                <option value="RBD">Blocked Drainage</option>
                <option value="RSC">Electrical Short Circuit</option>
                <option value="RMD">Monthly Dues</option>
                <option value="ROT">Other</option>
              </select>
              <p class="error"><?php echo form_error('type'); ?> </p>

            </div>

            <div class="form-group">
              <p> Message </p>
              <textarea name ="content" class="form-control" id="user-message" placeholder="Kindly elaborate your requests or complaints in the community..." rows="15" reseize="none"></textarea>
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
