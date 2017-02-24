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
              <a href="<?php echo base_url() ."admin_accounts/accdelete_admin/" . $view->username?>"> <button type="submit" class="btn btn-custom-1">Yes</button></a>
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

          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Deactivate</h4>
            </div>

            <br>

            <div class="signin">

                <div class="modal-body text-center">
                    <p> <?php echo $this->session->userdata('firstname');?>, are you sure you want to deactivate this user from the system? </p><br>
                    <a href="<?php echo base_url() ."admin_accounts/accdeact_admin/" . $view->username?>"> <button type="submit" class="btn btn-custom-1">Yes</button></a>
                    <button type="button" class="btn btn-custom" data-dismiss="modal">Cancel</button>
                </div>

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
        <form action="<?php echo base_url() ."admin_accounts/accupdate_admin/" . $view->username ;?>" method="POST">
          <fieldset id="myFieldset" disabled>
          <div class="form-group">
            <h4> User Credentials </h4>
                <br>
                <p> First Name </p>
                <input name ="firstname" class="form-control" id="sel1" type="text" placeholder="" value="<?php echo $view->firstname ?>">
                <p class="error"><?php echo form_error('firstname'); ?> </p>
                <br>

                <p> Last Name </p>
                <input name="lastname" class="form-control" id="sel1" type="text" placeholder="" value="<?php echo $view->lastname ?>">
                <p class="error"><?php echo form_error('lastname'); ?></p>
                <br>

                <p> Username </p>
                <input name="username" class="form-control" id="sel1" type="text" placeholder="" value="<?php echo $view->username; ?>">
                <p class="error"><?php echo form_error('username'); ?></p>
                <br>

                <p> Address </p>
                <input name="address" class="form-control" id="sel1" type="text" placeholder="" value="<?php echo $view->address; ?>">
                <p class="error"><?php echo form_error('address'); ?></p>
                <br>

                <p> E-mail Address </p>
                <input name="email" class="form-control" id="sel1" type="email" placeholder="" value="<?php echo $view->email ?>">
                <p class="error"><?php echo form_error('email'); ?> </p>
                <br>

                <p> Contact Number </p>
                <input name="contactnum" class="form-control" id="sel1" type="text" placeholder="" value="<?php echo $view->contactnum; ?>">
                <p class="error"><?php echo form_error('contactnum'); ?> </p>
                <br>

                <p> Role </p>
                <select name ="role" class="form-control" id="sel1">
                  <option value="<?php if($view->role == 0) { echo "0"; } else { echo "1";  } ?>" selected hidden> <?php if($view->role == 0) { echo "Homeowner"; } else { echo "Administrator";  } ?> </option>
                  <option value="0">Homeowner</option>
                  <option value= "1">Administrator</option>
                </select>
                <p class="error"> <?php echo form_error('role'); ?></p>
              </fieldset>
              <br><br>
              <input class="btn btn-custom-5" type="submit" id="saveButton" value="Save Changes" style="display: none;"></a>
            </form>
                <button class="btn btn-custom-5" onclick="undisableField()" id="edit-button">Edit</button>
                <br>
                <button type="button" class="btn btn-custom-6" data-toggle="modal" data-target="#delete-modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> &nbsp;Delete </button><br><br>
                <button type="button" class="btn btn-custom-7" data-toggle="modal" data-target="#deactivate-modal"> Deactivate </button>

        </div>

      </div>

    </div>

  </div>

  <br><br>

</div>
