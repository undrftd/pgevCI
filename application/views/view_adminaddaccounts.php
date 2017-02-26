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
        <h1> Add a User </h1>
      </div><br>

      <div class="admin-message">

          <p> Note: Be sure to input the correct user credentials so that the user won't have any problems signing in.
          </p>

      </div>

      <br>

      <div class="information">
          <div class="form-group">
          <form action="<?php echo base_url(); ?>admin_accounts/createuser" method="POST">

          <h4> User Credentials </h4>
          <br>
          <p> First Name </p>
          <input name="firstname" class="form-control" id="sel1" type="text" placeholder="" pattern="[a-z A-Z ]{2,30}" title="First Name must include a minimum of 2 and a maximum of 30 alphabetical characters only." required>
             <p class="error"><?php echo form_error('firstname'); ?> </p>
          <br>

          <p> Last Name </p>
          <input name="lastname" class="form-control" id="sel1" type="text" placeholder="" pattern="[a-z A-Z ]{2,30}" title="Last Name must include a minimum of 2 and a maximum of 30 alphabetical characters only." required>
              <p class="error"><?php echo form_error('lastname'); ?></p>
          <br>

          <p> Username </p>
          <input name="username" class="form-control" id="sel1" type="text" placeholder="Must contain numbers only" pattern="[0-9]{8,12}" title="Username must include a minimum of 8 and a maximum of 12 numbers only." required>
              <p class="error"><?php echo form_error('username'); ?></p>
          <br>

          <p> Password </p>
          <input data-toggle="password" data-placement="after" name="password" class="form-control" id="user-password" type="password" placeholder="Must be at least 8 characters long" pattern=".{8,}" title="Password should at least be 8 characters long." required>
          <p class="error"><?php echo form_error('password'); ?> </p>
          <br>

          <p> Confirm Password </p>
          <input name="confpassword" class="form-control" id="confirm-password" type="password" placeholder="Must be at least 8 characters long" pattern=".{8,}" title="Password should at least be 8 characters long." required>
          <p class="error"><?php echo form_error('confpassword'); ?> </p>
          <br>

          <p> Address </p>
          <input name="address" class="form-control" id="sel1" type="text" placeholder="" pattern="[a-z,. 0-9 \-]{10,}" title="Address should contain alphanumeric characters with commas and periods, with a minimum of 10 characters." required>
              <p class="error"><?php echo form_error('address'); ?></p>
          <br>

          <p> E-mail Address </p>
          <input name="email" class="form-control" id="sel1" type="email" placeholder="e.g. someone@gmail.com" required>
            <p class="error"><?php echo form_error('email'); ?> </p>
          <br>

          <p> Contact Number </p>
          <input name="contactnum" class="form-control" id="sel1" type="text" placeholder="" pattern="[-0-9()]{7,}" title="Contact number should contain numbers and parentheses only, with a minimum of 7 characters." required>
              <p class="error"><?php echo form_error('contactnum'); ?> </p>
          <br>

          <p> Role </p>
          <select name="role" class="form-control" id="sel1" required>
            <option value= "" selected hidden>Choose a role</option>
            <option value= "0">Homeowner</option>
            <option value= "1">Administrator</option>
          </select>
            <p class="error"> <?php echo form_error('role'); ?></p>
          <br>
          <br>

          <button type="submit" class="btn btn-custom-5">+ &nbsp;Add user</button></a>
          </form>

        </div>

      </div>

      <br>
      <br>

    </div>

  </div>

</div>
