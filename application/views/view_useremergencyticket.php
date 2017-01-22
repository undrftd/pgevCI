      <div id="page-content-wrapper">
        <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>
        <br>
        <br>

        <div class="header-style">
          <h1> Emergency Ticket </h1>
        </div>

        <br><br>

          <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">

              <?php if ($this->session->flashdata('emergencysuccess')){ ?>
                <div class="success-message text-center" id="prompt-message">
                  <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3>
                  <p> <?php echo $this->session->flashdata('emergencysuccess'); ?></p>
                  <h2><?php echo $ticket->request_type ."-" . $ticket->ticketid; ?></h2>
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


                    <p> Select a type of ticket: </p> <p class="error"><?php echo form_error('type'); ?> </p>
                    <select name="type" class="form-control" id="sel1">
                        <option value="" selected hidden>Type of Emergency</option>
                        <option value="FR">Fire</option>
                        <option value="RB">Robbery</option>
                        <option value="BT">Broken House Tube</option>
                        <option value="SP">Suspicious Person</option>
                    </select>

                  </div>

                  <div class="form-group">
                    <p> Message </p> <p class="error"><?php echo form_error('content'); ?> </p>
                    <textarea name ="content" class="form-control" id="user-message" placeholder="Kindly explain your emergency..." rows="15" reseize="none"></textarea>
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
