<div id="page-content-wrapper">

  <div class="web-header">

    <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>

    <div class="overlay-header">
      <span class="icon-main">
        <i class="material-icons md-36 gray400">account_circle</i>
        <?php
          $notif = $count + $reserve + $forms;

          if ($notif >= 1) {
            echo "<span class='badge'>$notif</span>";
          }
          else {
            echo "";
          }

        ?>
      </span>
      <h4>
        <?php echo $this->session->firstname ;?> <?php echo $this->session->lastname ;?>
        <span class="dropdown sign-out">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <span>Administrator <span class="caret"></span></span>
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
      </h4>
    </div>
  </div>

  <hr class="colored-hr">
  <br>

  <div class="modal fade" id="cleardues-modal" role="dialog">

    <div class="modal-dialog">
        <!-- Modal content-->
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Clear Dues</h4>
        </div>

        <br>

        <div class="signin">

          <div class="modal-body text-center">
              <p> <?php echo $this->session->userdata('firstname');?>, are you sure you want to clear this user's dues? </p><br>
              <a href="<?php echo base_url() ."admin_dues/cleardues_user/" . $view->userid?>"> <button type="submit" class="btn btn-custom-1">Yes</button></a>
              <button type="button" class="btn btn-custom" data-dismiss="modal">Cancel</button>
          </div>

        </div>

      </div>

    </div>

  </div>

  <div class="modal fade" id="cleararrears-modal" role="dialog">

    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Clear Arrears</h4>
          </div>

          <br>

          <div class="signin">
              <div class="modal-body text-center">
                  <p> <?php echo $this->session->userdata('firstname');?>, are you sure you want to clear this user's arrears? </p><br>
                  <a href="<?php echo base_url() ."admin_dues/cleararrears_user/" . $view->userid?>"> <button type="submit" class="btn btn-custom-1">Yes</button></a>
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
        <h1> Homeowner's Monthly Dues </h1>
      </div><br>

      <div class="admin-message">

          <p> Note: Before editing another user's account, be sure to inform them of what you are about to change for them to be aware.
          </p>

      </div>

      <?php if ($this->session->flashdata('duesmorefeedback')){ ?>
        <div class="success-message text-center" id="prompt-message">
          <h3> Hello, <?php echo $this->session->userdata('firstname');?>. </h3>
          <p> <?php echo $this->session->flashdata('duesmorefeedback'); ?> </p><br>
          <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
        </div>
      <?php } ?>

      <?php if ($this->session->flashdata('duesmorefail')){ ?>
        <div class="error-message text-center" id="prompt-message">
          <h3> Hello, <?php echo $this->session->userdata('firstname');?>. </h3>
          <p> <?php echo $this->session->flashdata('duesfail'); ?> </p><br>
          <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
        </div>
      <?php } ?>

      <br>

      <div class="information">
        <form action="<?php echo base_url() ."admin_dues/updatedues_user/" . $view->userid ;?>" method="POST">

          <fieldset id="myFieldset" disabled>
          <div class="form-group">
            <h4> Billing Information </h4>
                <br>
                <p> Homeowner's Name </p>
                <input disabled name ="firstname" class="form-control" id="sel1"type="text" placeholder="" value="<?php echo $view->firstname . " " . $view->middlename . " " . $view->lastname ?>">
                <p class="error"><?php echo form_error('firstname'); ?> </p>
                <br>
                <p> Address </p>
                <input disabled name="address" class="form-control" id="sel1" type="text" placeholder="" value="<?php echo $view->address; ?>">
                <p class="error"><?php echo form_error('address'); ?></p>
                <br>
                <p> Monthly Dues (₱) </p>
                <input name="monthly_dues" class="form-control" id="sel1" type="text" placeholder="" pattern="[0-9.]{1,}" title="Monthly Dues field may only contain numbers and periods." value="<?php echo $view->monthly_dues ?>" required>
                <p class="error"><?php echo form_error('monthly_dues'); ?> </p>
                <br>

                <p> Arrears (₱) </p>
                <input name="arrears" class="form-control" id="sel1" type="text" placeholder="" value="<?php echo $view->arrears; ?>" pattern="[0-9.]{1,}" title="Arrears field may only contain numbers and periods." required>
                <p class="error"><?php echo form_error('arrears'); ?> </p>

              </fieldset>
              <br><br>
              <input class="btn btn-custom-12" type="submit" id="saveButton" value="Save Changes" style="display: none;"></a>
            </form>
                <button class="btn btn-custom-12" onclick="undisableField()" id="edit-button"> Edit</button>
                <br>
                <button type="button" class="btn btn-custom-6" data-toggle="modal" data-target="#cleardues-modal"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>  &nbsp;Clear Dues </button><br><br>
                <button type="button" class="btn btn-custom-7" data-toggle="modal" data-target="#cleararrears-modal"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> &nbsp;Clear Arrears </button><br><br>
        </div>

      </div>

    </div>

    <br>
    <br>

  </div>

</div>
