      <div id="page-content-wrapper">
        <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>
        <br>
        <br>

        <div class="header-style">
          <h1> Requests and Complaints </h1>
        </div>

        <br><br>

          <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-3 col-md-offset-2">

              <div class="information">

                    <div class="form-group">

                      <p> Full Name </p>
                      <input class="form-control" id="sel1" type="text" value="<?php echo $this->session->userdata('firstname') . " " . $this->session->userdata('lastname');;?>" disabled>

                      <br>

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

                  <br>
                  <div class="form-group">
                    <p>Attach file</p>
                    <input type="file" id="exampleInputFile">
                    <p class="help-block">Formats accepted: .png, .jpg </p>
                  </div>
                  <br><br>
                  <a href="user-tracking.html"><button type="button" class="btn btn-custom">Send</button></a>
              </div>

              <br>
              <br>

            </div>

            <div class="clearfix visible-md-block"></div>
            <div class="clearfix visible-sm-block"></div>

            <div class="col-xs-12 col-sm-12 col-md-5">

              <div class="information">
                  <div class="form-group">
                  <p> Message </p>
                  <textarea class="form-control" id="user-message" placeholder="Kindly explain your reason for requesting..." rows="15" reseize="none"></textarea>
                </div>
              </div>

              <br><br>

            </div>
          </div>
        </div>

      </div>
