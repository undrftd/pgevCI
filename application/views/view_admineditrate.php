<div id="page-content-wrapper">

    <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>

    <span class="dropdown sign-out">
      <span class="mobile-title">Parkwood Greens</span>
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">
      <span class="user-account"><i class="material-icons md-26 gray400">more_vert</i></span>
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

    <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 nopadding">

      <div class="header-style">
        <h1> Edit Dues Rate </h1>
      </div><br>

      <div class="admin-message">

          <p> Note: Before editing the rate of the monthly dues, be sure to inform the homeowners of the changes to be implemented for them to be aware.
          </p>

      </div>

    <?php if ($this->session->flashdata('ratefeedback')){ ?>
      <div class="success-message text-center" id="prompt-message">
        <h3> Hello, <?php echo $this->session->userdata('firstname'); ?>. </h3>
        <p> <?php echo $this->session->flashdata('ratefeedback'); ?>  </p><br>
        <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
      </div>
    <?php } ?>

    <?php if($this->session->flashdata('ratefail')){ ?>
      <div class="error-message text-center" id="prompt-message">
        <h3> Hello, <?php echo $this->session->userdata('firstname'); ?> </h3>
        <p> <?php echo $this->session->flashdata('ratefail'); ?> </p><br>
        <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
      </div>
    <?php } ?>

      <br>

      <div class="information">
        <form action="<?php echo base_url();?>admin_dues/updaterates" method="POST">
          <fieldset id="myFieldset" disabled>
          <div class="form-group">
            <h4> Dues details </h4>
                <br>
                <p> Security Fee (₱) </p>
                <input name ="securityfee" class="txt form-control" id="sel1" type="number" step="0.01" placeholder="" value= "<?php echo $rate->securityfee; ?>" required>
                <p class="error"><?php echo form_error('securityfee'); ?> </p>
                <br>

                <p> Association Fee (₱) </p>
                <input name="assocfee" class="txt form-control" id="sel1" type="number" step="0.01" placeholder="" value="<?php echo $rate->assocfee; ?>" required>
                <p class="error"><?php echo form_error('assocfee'); ?></p>
                <br>

                <p> Total Monthly Dues Rate (₱) </p>
                <input name="total" class="form-control" id="sum" type="number"  placeholder="" value="<?php echo number_format($rate->securityfee + $rate->assocfee, 2, '.', ''); ?>" readonly>
                <p class="error"><?php echo form_error('total'); ?></p>
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
