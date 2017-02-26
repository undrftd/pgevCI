<div id="page-content-wrapper">

  <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>

  <span class="dropdown sign-out">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="dot-style">&#8226;</span> &nbsp;Hello, <?php echo $this->session->userdata('firstname'); ?></a>
    <ul class="dropdown-menu pull-right">
      <li class="dropdown-header"><strong><a>Activities</a></strong></li>
      <li><a href="<?php echo base_url("admin_announcements/post_announcements"); ?>">+ &nbsp;Post an Announcement</a></li>
      <li><a href="<?php echo base_url("admin_ticketing/new_tickets"); ?>">New Tickets &nbsp;<span class="badge"> <?php echo $count; ?> </span> </a></li>
      <li><a href="<?php echo base_url("admin_reservation/court_one"); ?>">New Reservations &nbsp;<span class="badge"> <?php echo $reserve; ?> </span> </a></li>
      <li><a href="<?php echo base_url("admin_forms/car_sticker"); ?>">New Online Application &nbsp;<span class="badge"> <?php echo $forms; ?> </span> </a></li>
      <li role="separator" class="divider"></li>
      <li class="dropdown-header"><strong><a>Account</a></strong></li>
      <li><a href="<?php echo base_url("admin_profile/"); ?>"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>&nbsp; Edit Account</a></li>
      <li><a href="<?php echo base_url("login/signout/"); ?>">Sign Out</a></li>
    </ul>
  </span>

  <hr class="colored-hr">
  <br><br>

  <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 nopadding">

      <div class="header-style">
        <h1> Account Information </h1>
      </div>
      <br>

      <div class="admin-message">

          <p> Note: Be sure to use your own and correct information in order to avoid conflict with other users.
          </p>

      </div>

      <?php if ($this->session->flashdata('profilefeedback')){ ?>
        <div class="success-message text-center" id="prompt-message">
          <h3> Hello, <?php echo $this->session->userdata('firstname');?>. </h3>
          <p> <?php echo $this->session->flashdata('profilefeedback'); ?>  </p><br>
          <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
        </div>
      <?php } ?>

      <?php if ($this->session->flashdata('profilefail')){ ?>
        <div class="error-message text-center" id="prompt-message">
          <h3> Hello, <?php echo $this->session->userdata('firstname');?>. </h3>
          <p> <?php echo $this->session->flashdata('profilefail'); ?> </p><br>
          <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
        </div>
      <?php } ?>

        <br>

      <div class="information">
        <form action="<?php echo base_url() ."admin_profile/update_account/" . $this->session->userdata('username') ;?>" method="POST">
          <fieldset id="myFieldset" disabled>
          <div class="form-group">
            <h4> User Credentials </h4>
                <br>
                <p> First Name </p>
                <input name ="firstname" class="form-control" id="sel1" type="text" placeholder="" value= "<?php echo $this->session->userdata('firstname');?>" pattern="[a-z A-Z]{2,30}" title="First Name must include a minimum of 2 and a maximum of 30 alphabetical characters only." required>
                <p class="error"><?php echo form_error('firstname'); ?> </p>
                <br>

                <p> Last Name </p>
                <input name="lastname" class="form-control" id="sel1" type="text" placeholder="" value="<?php echo $this->session->userdata('lastname');?>" pattern="[a-z A-Z ]{2,30}" title="Last Name must include a minimum of 2 and a maximum of 30 alphabetical characters only." required>
                <p class="error"><?php echo form_error('lastname'); ?></p>
                <br>

                <p> Username </p>
                <input name="username" class="form-control" id="sel1" type="text" placeholder="" value="<?php echo $this->session->userdata('username');?>" pattern="[0-9]{8,12}" title="Username must include a minimum of 8 numbers only." required>
                <p class="error"><?php echo form_error('username'); ?></p>
                <br>

                <p> Password </p>
                <input name="password" class="form-control" id="user-password" type="password" placeholder="" value="<?php echo $this->session->userdata('password');?>" pattern=".{8,}" title="Password should at least be 8 characters long." required>
                <p class="error"><?php echo form_error('password'); ?></p>
                <br>

                <p> Confirm Password </p>
                <input name="passconf" class="form-control" id="confirm-password" type="password" placeholder="" value="<?php echo $this->session->userdata('password');?>" pattern=".{8,}" title="Password should at least be 8 characters long." required>
                <p class="error"><?php echo form_error('passconf'); ?></p>
                <br>

                <p> Address </p>
                <input name="address" class="form-control" id="sel1" type="text" placeholder="" value="<?php echo $this->session->userdata('address');?>" pattern="[a-z,. A-Z 0-9 \-]{10,}" title="Address should contain alphanumeric characters with commas and periods, with a minimum of 10 characters." required>
                <p class="error"><?php echo form_error('address'); ?></p>
                <br>

                <p> E-mail Address </p>
                <input name="email" class="form-control" id="sel1" type="email" placeholder="" value="<?php echo $this->session->userdata('email');?>">
                <p class="error"><?php echo form_error('email'); ?> </p>
                <br>

                <p> Contact Number </p>
                <input name="contactnum" class="form-control" id="sel1" type="text" placeholder="" value="<?php echo $this->session->userdata('contactnum');?>" pattern="[-0-9()]{7,}" title="Contact number should contain numbers and parentheses only, with a minimum of 7 characters." required>
                <p class="error"><?php echo form_error('contactnum'); ?> </p>
                <br>
              </fieldset>
              <input class="btn btn-custom-5" type="submit" id="saveButton" value="Save Changes" style="display: none;"></a>
            </form>
                <button class="btn btn-custom-5" onclick="undisableField()" id="edit-button">Edit</button>
        </div>

      </div>

    </div>

    <br>
    <br>

  </div>

</div>
