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

  <div class="header-style">
    <h1> Audit Trail </h1>
  </div>

<br>

<a href="<?php echo site_url();?>admin_export/exportdata"><button type="button" class="btn btn-custom-1">Export to Excel</button></a>

<br><br>

  <div class="table-responsive">

    <table class="table table-hover" id="tracking-table">

      <tr>
          <th><br>Time</th>
          <th><br>Username</th>
          <th><br>Full Name</th>
          <th><br>Page Accessed</th>
      </tr>

      <?php foreach ($log as $row): ?>
         <tr>
          <td><?php echo  date("m/d/Y g:i A",$row->timestamp); ?></td>
          <td><?php echo $row->session_id; ?></td>
          <td><?php echo $row->fullname; ?></td>
          <td><?php echo $row->request_uri; ?></td>
      </tr>
      <?php endforeach; ?>

    </table>

  </div>

  <center><?php echo $auditlinks; ?></center>

  <br><br>

</div>
