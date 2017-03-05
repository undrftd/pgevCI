<div id="page-content-wrapper">

  <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>

  <span class="dropdown sign-out">
    <span class="mobile-title">Parkwood Greens</span>
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
    <span class="user-account"><i class="material-icons md-26 gray400">account_circle</i></span>
    <span class="main-title"><span class="dot-style">&#8226;</span> &nbsp;Hello, <?php echo $this->session->userdata('firstname'); ?></span>
      <?php
        $notif = $count + $reserve + $forms;

        if ($notif >= 1) {
          echo "<span class='badge'>$notif</span>";
        }
        else {
          echo "";
        }

      ?>
    </a>
    <ul class="dropdown-menu pull-right">
      <li class="dropdown-header"><strong><a>Activities</a></strong></li>
      <li><a href="<?php echo base_url("admin_announcements/post_announcements"); ?> ">Post an Announcement</a></li>
      <li><a href="<?php echo base_url("admin_ticketing/new_tickets"); ?>">Tickets
        <span class="a-links">
          <?php
          if ($count >= 1) {
            echo $count;
          }
          else {
            echo "";
          }
          ?>
        </span>
      </a></li>
      <li><a href="<?php echo base_url("admin_reservation/court_one"); ?>">Reservations
        <span class="a-links">
          <?php
          if ($reserve >= 1) {
            echo $reserve;
          }
          else {
            echo "";
          }
          ?>
        </span> </a></li>
      <li><a href="<?php echo base_url("admin_forms/car_sticker"); ?>">Online Application
        <span class="a-links">
          <?php
          if ($forms >= 1) {
            echo $forms;
          }
          else {
            echo "";
          }
          ?>
        </span> </a></li>
      <li role="separator" class="divider"></li>
      <li class="dropdown-header"><strong><a>Account</a></strong></li>
      <li><a href="<?php echo base_url("admin_profile/"); ?>" style="display: block;"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>&nbsp; Edit Account</a></li>
      <li><a href="<?php echo base_url("login/signout/"); ?>">Sign Out</a></li>
    </ul>
  </span>

  <hr class="colored-hr">
  <br>

  <div class="modal fade" id="delete-modal" role="dialog">

      <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Delete</h4>
            </div>

            <br>

            <div class="signin">
                <div class="modal-body text-center">
                    <p> <?php echo $this->session->userdata('firstname');?>, are you sure you want to remove this user from the system? </p><br>
                    <a href="<?php echo base_url() ."admin_accounts/accdelete_deact/" . $view->userid?>"> <button type="submit" class="btn btn-custom-1">Yes</button></a>
                    <button type="button" class="btn btn-custom" data-dismiss="modal">Cancel</button>
                </div>
            </div>

          </div>

      </div>
  </div>

  <div class="modal fade" id="deactivate-modal" role="dialog">

    <div class="modal-dialog">
        <!-- Modal content-->
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Reactivate</h4>
        </div>

        <br>

        <div class="signin">

          <div class="modal-body text-center">
              <p> <?php echo $this->session->userdata('firstname');?>, are you sure you want to reactivate this user from the system? </p><br>
              <a href="<?php echo base_url() ."admin_accounts/acc_reactivate/" . $view->userid?>"> <button type="submit" class="btn btn-custom-1">Yes</button></a>
              <button type="button" class="btn btn-custom" data-dismiss="modal">Cancel</button>
          </div>

        </div>

      </div>

    </div>

  </div>

  <br>

  <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 nopadding">

      <div class="header-style">
        <h1> Account Information </h1>
      </div><br>

      <div class="admin-message">

          <p> Note: Before editing another user's account, be sure to inform the user of what you are about to change for him/her to be aware.
          </p>

      </div>

      <br>

      <div class="information">
        <form action="<?php echo base_url() ."admin_accounts/accupdate_deact/" . $view->userid ;?>" method="POST">
          <fieldset id="myFieldset" disabled>
          <div class="form-group">
            <h4> User Credentials </h4>
                <br>
                <p> First Name </p>
                <input name ="firstname" class="form-control" id="sel1" type="text" placeholder="" value="<?php echo htmlentities($view->firstname); ?>" pattern="[a-z A-Z]{2,30}" title="First Name must include a minimum of 2 and a maximum of 30 alphabetical characters only." required>
                <p class="error"><?php echo form_error('firstname'); ?> </p>
                <br>

                <p> Last Name </p>
                <input name="lastname" class="form-control" id="sel1" type="text" placeholder="" value="<?php echo htmlentities($view->lastname); ?>" pattern="[a-z A-Z ]{2,30}" title="Last Name must include a minimum of 2 and a maximum of 30 alphabetical characters only." required>
                <p class="error"><?php echo form_error('lastname'); ?></p>
                <br>

                <p> Username </p>
                <input name="username" class="form-control" id="sel1" type="text" placeholder="" value="<?php echo htmlentities($view->username); ?>" pattern="[0-9]{8,12}" title="Username must include a minimum of 8 and a maximum of 12 numbers only." required>
                <p class="error"><?php echo form_error('username'); ?></p>
                <br>

                <p> Address </p>
                <input name="address" class="form-control" id="sel1" type="text" placeholder="" value="<?php echo htmlentities($view->address); ?>" pattern="[a-z A-Z,. 0-9 \-]{10,}" title="Address should contain alphanumeric characters with commas and periods, with a minimum of 10 characters." required>
                <p class="error"><?php echo form_error('address'); ?></p>
                <br>

                <p> E-mail Address </p>
                <input name="email" class="form-control" id="sel1" type="email" placeholder="" value="<?php echo htmlentities($view->email); ?>" required>
                <p class="error"><?php echo form_error('email'); ?> </p>
                <br>

                <p> Contact Number </p>
                <input name="contactnum" class="form-control" id="sel1" type="text" placeholder="" value="<?php echo htmlentities($view->contactnum); ?>" pattern="[-0-9()]{7,}" title="Contact number should contain numbers and parentheses only, with a minimum of 7 characters." required>
                <p class="error"><?php echo form_error('contactnum'); ?> </p>
                <br>

                <p> Role </p>
                <select name ="role" class="form-control" id="sel1" required>
                  <option value="<?php if($view->role == 0) { echo "0"; } else { echo "1";  } ?>" selected hidden> <?php if($view->role == 0) { echo "Homeowner"; } else { echo "Administrator";  } ?> </option>
                  <option value="0">Homeowner</option>
                  <option value= "1">Administrator</option>
                </select>
                <p class="error"> <?php echo form_error('role'); ?></p>
              </fieldset>
              <br><br>
              <input class="btn btn-custom-12" type="submit" id="saveButton" value="Save Changes" style="display: none;"></a>
            </form>
                <button class="btn btn-custom-12" onclick="undisableField()" id="edit-button">Edit</button>
                <br>
                <button type="button" class="btn btn-custom-6" data-toggle="modal" data-target="#delete-modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  &nbsp;Delete </button><br><br>
                <button type="button" class="btn btn-custom-7" data-toggle="modal" data-target="#deactivate-modal"> Reactivate </button>

        </div>

      </div>

    </div>

  </div>

  <br><br>

</div>
