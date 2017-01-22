      <div id="page-content-wrapper">
        <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>
        <br>
        <br>

        <div class="header-style">
          <h1> Requests and Complaints </h1>
        </div>

        <br><br>

          <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">

              <?php if ($this->session->flashdata('ticketsuccess')){ ?>
                <div class="success-message text-center" id="prompt-message">
                  <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3>
                  <p> <?php echo $this->session->flashdata('ticketsuccess'); ?></p>
                  <h2><?php echo $ticket->request_type ."-" . $ticket->ticketid; ?></h2>
                  <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
                </div>
              <?php } ?>

              <?php if ($this->session->flashdata('ticketfail')){ ?>
                <div class="error-message text-center" id="prompt-message">
                  <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3>
                  <p> <?php echo $this->session->flashdata('ticketfail'); ?></p><br>
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


                    <p> Select a type of ticket: </p> <p class="error"><?php echo form_error('type'); ?> </p>
                    <select name ="type" class="form-control" id="sel1">
                      <option value="" selected hidden>Type of Request or Complaint</option>
                      <option value="GC">Grass Cutting</option>
                      <option value="TC">Trash Collection</option>
                      <option value="PC">Pest Control</option>
                      <option value="MP">Malfunctioning Post Lights</option>
                      <option value="PL">Water Pipeline Leakages</option>
                      <option value="BD">Blocked Drainage</option>
                      <option value="SC">Electrical Short Circuit</option>
                      <option value="MD">Monthly Dues</option>
                      <option value="OT">Other</option>
                    </select>

                  </div>

                  <div class="form-group">
                    <p> Message </p> <p class="error"><?php echo form_error('content'); ?> </p>
                    <textarea name ="content" class="form-control" id="user-message" placeholder="Kindly explain your reason for creating a ticket..." rows="15" reseize="none"></textarea>
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
