<div id="page-content-wrapper">

  <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>

  <span class="dropdown sign-out">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="dot-style">&#8226;</span> &nbsp;Hello, <?php echo $this->session->userdata('firstname'); ?></a>
    <ul class="dropdown-menu pull-right">
      <li class="dropdown-header"><strong><a>Activities</a></strong></li>
      <li><a href="<?php echo base_url("user_ticketing/requests_complaints"); ?>"><strong>+</strong> &nbsp;Create a Complaint</a></li>
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

      <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 nopadding">
        <?php if ($this->session->flashdata('accountsfeedback')){ ?>
        <div class="success-message text-center" id="prompt-message">
          <h3> Hello, <?php echo $this->session->userdata('firstname');?>. </h3>
          <p> <?php echo $this->session->flashdata('accountsfeedback'); ?>  </p><br>
          <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
        </div>
        <br>
      <?php } ?>

        <div class="header-style">
          <h1> Account Information </h1>
        </div><br>

        <div class="admin-message">

            <p> Note: Kindly call us through this number (887-8888) for additional assitance if you want to change a
              certain credential that is not editable.
            </p>

        </div>

        <br>

      </div>

      <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 nopadding">

        <div class="information">
            <div class="form-group">

              <form action="<?php echo base_url() . "user_accounts/update_useraccount/" . $this->session->userdata('username'); ?>" method="POST">

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

    <br><br>

  </div>
