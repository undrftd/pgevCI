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

  <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 nopadding">

      <div class="header-style">
        <h1> Post an announcement </h1>
      </div>

      <br>

      <div class="information">

        <div class="form-group">

          <h4> Announcement Details </h4>
          <br>

          <form action="<?php echo site_url() . "admin_announcements/post_announcements_admin/"?>" method="POST">

          <p>  Announcement Title </p>
          <input class="form-control" id="sel1" name="post_title" type="text" placeholder="What's the title?" pattern=".{8,}" title="Announcement Title should at least be 8 characters long." required>
          <p class="error" > <?php echo form_error('post_title'); ?></p>
          <br>

          <p> Date </p>
          <input class="form-control" name="post_date" id="sel1" type="text" value="<?php $date = time(); $unix = unix_to_human($date, true, 'us'); echo date("F d, Y", strtotime($unix)); ?>"readonly>
          <p class="error" > <?php echo form_error('post_date'); ?> </p>
          <br>

          <p> Kindly put the details of your announcement here: </p>
          <textarea class="form-control" name="post_content" id="user-message" placeholder="What do you want to say to the community?" rows="15" pattern=".{20,}" title="Announcement Content should at least be 20 characters long." required></textarea>
          <p class="error" name="post_content"> <?php echo form_error('post_content'); ?></p>


          <br><br>

          <button type="submit" class="btn btn-custom-5">Post</button></a>

          <div class="send-mobile">
            <a href="#" onclick="$(this).closest('form').submit()">+ Post</a>
          </div>

          </form>

        </div>

      </div>

      <br><br><br>

    </div>

  </div>

</div>
