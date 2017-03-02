<div id="page-content-wrapper">

  <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>

  <span class="dropdown sign-out">
    <span class="mobile-title">Parkwood Greens</span>
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
      <span class="user-account"><i class="material-icons md-26 gray400">more_vert</i></span>
      <span class="main-title"><span class="dot-style">&#8226;</span> &nbsp;Hello, <?php echo $this->session->userdata('firstname'); ?></span>
    </a>
    <ul class="dropdown-menu pull-right">
      <li class="dropdown-header"><strong><a>Activities</a></strong></li>
      <li><a onclick="myFunction()">Create an Emergency Ticket</a></li>
      <li><a href="<?php echo base_url("user_announcements/post_bulletin"); ?>">Post a Bulletin</a></li>
      <li><a href="<?php echo base_url("user_reservation/reservations_courtone"); ?>">View My Reservation</a></li>
      <li role="separator" class="divider"></li>
      <li class="dropdown-header"><strong><a>Account</a></strong></li>
      <li><a href="<?php echo base_url("user_accounts/"); ?>" style="display: block;"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>&nbsp; Edit Account</a></li>
      <li><a href="<?php echo base_url("login/signout/"); ?>">Sign Out</a></li>
    </ul>
  </span>

  <hr class="colored-hr">
  <br><br>

  <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 nopadding">

      <div class="header-style">
        <h1> Edit Bulletin </h1>
      </div>

      <br>

      <div class="information">

        <form action="<?php echo site_url() . "user_announcements/save_bulletin/" . $select->post_id; ?>" method="POST">

          <fieldset id="myFieldset" disabled>

            <div class="form-group">

              <p> Bulletin Title </p>
              <input class="form-control" id="sel1" type="text" name="post_title" value="<?php echo $select->post_title; ?>" pattern=".{8,}" title="Bulletin Title should at least be 8 characters long." required>
              <p class="error"> <?php echo form_error('post_title');  ?></p>
              <br>

              <p> Date </p>
              <input class="form-control" id="sel1" type="text" name="post_date" value="<?php echo date('F d, Y', strtotime($select->post_date)); ?>" readonly>
              <p class="error"> <?php echo form_error('post_date');  ?>
              <br>

              <p> Current Bulletin: </p>
              <textarea class="form-control" id="user-message" placeholder="" name="post_content" rows="15" required><?php echo $select->post_content; ?></textarea>
              <p class="error"> <?php echo form_error('post_content');  ?>

              <br><br>

          </fieldset>

              <input class="btn btn-custom-5" type="submit" id="saveButton" value="Save Changes" style="display: none;"></a>

        </form>

              <button type="button" onclick="undisableField()" class="btn btn-custom-5" id="edit-button">Edit</button>

            </div>

          <br>

      </div>

      <br>
      <br>

    </div>

  </div>

</div>
