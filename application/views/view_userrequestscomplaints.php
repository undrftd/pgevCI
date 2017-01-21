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

              <?php if ($this->session->flashdata('')){ ?>
                <div class="success-message text-center" id="prompt-message">
                  <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3>
                  <p> <?php echo $this->session->flashdata(''); ?></p><br>
                  <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
                </div>
              <?php } ?>

              <?php if ($this->session->flashdata('')){ ?>
                <div class="error-message text-center" id="prompt-message">
                  <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3>
                  <p> <?php echo $this->session->flashdata(''); ?></p><br>
                  <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
                </div>
              <?php } ?>
                <br>

              <div class="information">

                <form>

                  <div class="form-group">

                    <h4> Ticket Information </h4><hr>

                    <p> Homeowner's Name </p>
                    <input class="form-control" id="sel1" type="text" value="<?php echo $this->session->userdata('firstname') . " " . $this->session->userdata('lastname');;?>" disabled>

                    <br>


                    <p> Select a type of ticket: </p>
                    <select class="form-control" id="sel1">
                      <option value= "" selected hidden>Type of Requests or Complaints</option>
                      <option>Lost and Found</option>
                      <option>Grass Cutting</option>
                      <option>Garbage Collecting</option>
                      <option>Pest Control</option>
                      <option>Malfunctioning Post Lights</option>
                      <option>Water Pipeline Leakages</option>
                      <option>Blocked Drainage</option>
                      <option>Electrical Short Circuit</option>
                      <option>Monthly Dues</option>
                      <option>Other</option>
                    </select>

                  </div>

                  <div class="form-group">
                    <p> Message </p>
                    <textarea class="form-control" id="user-message" placeholder="Kindly explain your reason for creating a ticket..." rows="15" reseize="none"></textarea>
                  </div>

                  <div class="form-group">
                    <p>Attachment</p>
                    <input type="file" id="exampleInputFile">
                    <p class="help-block">Formats accepted: .png, .jpg </p>
                  </div>

                  <br><br>

                  <a href="user-tracking.html"><button type="button" class="btn btn-custom-5">Send</button></a>

                </form>

              </div>

              <br>
              <br>

            </div>
          </div>
        </div>

      </div>
