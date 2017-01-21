<div id="page-content-wrapper">
  <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>
  <br>
  <br>

  <br>

    <div class="row">

      <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 nopadding">

        <div class="header-style">
          <h1> Account Information </h1>
        </div><br>

        <div class="admin-message">

            <p> Note: Kindly call us through this number (887-8888) for additional assitance if you want to change a
              certain credential not included in the editable information tab.
            </p>

        </div>

        <br>

      </div>

      <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 nopadding">

        <div class="information">
            <div class="form-group">

              <form action="<?php echo base_url() . "user_accounts/update_useraccount/" . $this->session->userdata('userid'); ?>" method="POST">

                <fieldset id="myFieldset" disabled>

                  <h4> Account Details </h4>
                  <br>

                  <p> First Name </p>
                  <input class="form-control" id="sel1" type="text" placeholder="" value="<?php echo $this->session->firstname ;?>" readonly>
                  <p></p>
                  <br>

                  <p> Last Name </p>
                  <input class="form-control" id="sel1" type="text" placeholder="" value="<?php echo $this->session->lastname ;?>" readonly>
                  <p></p>
                  <br>

                  <p> Username </p>
                  <input class="form-control" id="sel1" type="text" placeholder="" value="<?php echo $this->session->username ;?>" readonly>
                  <p></p>
                  <br>

                  <p> Password </p>
                  <input name="password" class="form-control" id="sel1" type="password" placeholder="" value="<?php echo $this->session->userdata('password'); ?>">
                  <p class="error"> <?php echo form_error('password'); ?> </p>
                  <br>

                  <p>Confirm Password </p>
                  <input name="cpassword" class="form-control" id="sel1"  type="password" placeholder="" value="<?php echo $this->session->userdata('password'); ?>">
                  <p class="error"> <?php echo form_error('cpassword'); ?>  </p>
                  <br>

                  <p>Email Address </p>
                  <input name="email" class="form-control" id="sel1" type="email" placeholder="" value="<?php echo $this->session->userdata('email'); ?>">
                  <p class="error"> <?php echo form_error('email'); ?>  </p>
                  <br>

                  <p> Address </p>
                  <input class="form-control" id="sel1" type="text" placeholder="" value="<?php echo $this->session->address ;?>" readonly>
                  <p></p>
                  <br>

                  <p>Contact Number </p>
                  <input name="contactnum" class="form-control" id="sel1" type="text" placeholder="" value="<?php echo $this->session->userdata('contactnum'); ?>">
                  <p class="error"> <?php echo form_error('contactnum'); ?> </p>
                  <br><br>

                </fieldset>

                <input class="btn btn-custom-5" type="submit" id="saveButton" value="Save Changes" style="display: none;"></a>
              </form>
              <button class="btn btn-custom-5" onclick="undisableField()" id="edit-button">Edit</button>

          </div>

        </div>

      </div>

    </div>

  </div>
