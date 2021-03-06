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

  <div class="header-style nopadding">
    <h1> Ticketing  <?php if($this->uri->segment(2) == 'newtickets_priorityone') { echo "- Priority 1"; } else if($this->uri->segment(2) == 'newtickets_prioritytwo') { echo "- Priority 2"; } else { echo " "; } ?>
      <span class="dropdown">
        <a class="dropdown-toggle sort-button" type="button" data-toggle="dropdown"> Filter list <span class="caret"></span> </a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo site_url('admin_ticketing/new_tickets'); ?>">All Tickets</a></li>
          <li><a href="<?php echo site_url('admin_ticketing/newtickets_priorityone'); ?>">Priority 1</a></li>
          <li><a href="<?php echo site_url('admin_ticketing/newtickets_prioritytwo'); ?>">Priority 2</a></li>
        </ul>
      </span>
    </h1>
  </div><br>

  <div class="portlet nopadding">

    <div class="portlet-header">

    </div>

    <div class="portlet-title">

      <ul class="nav nav-tabs">
        <li class="active">
          <a href="<?php echo site_url()?>admin_ticketing/new_tickets">
          New <span class="badge"> <?php echo $count;?> </span> </a>
        </li>
        <li>
          <a href="<?php echo site_url(); ?>admin_ticketing/progress_tickets">
          In Progress </a>
        </li>
        <li>
          <a href="<?php echo site_url(); ?>admin_ticketing/closed_tickets">
          Closed </a>
        </li>
      </ul>

    </div>

    <?php if ($this->session->flashdata('newticketsuccess')){ ?>
      <div class="success-message text-center" id="prompt-message">
        <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3>
        <p> <?php echo $this->session->flashdata('newticketsuccess'); ?> </p><br>
        <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
      </div>
    <?php } ?>

    <?php if ($this->session->flashdata('newticketfail')){ ?>
      <div class="error-message text-center" id="prompt-message">
        <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3>
        <p> <?php echo $this->session->flashdata('newticketfail'); ?> </p><br>
        <button type="button" class="btn btn-custom-10" id="close-button">Dismiss</button><br><br>
      </div>
    <?php } ?>

    <br>

    <div class="portlet-body">

      <div class="tab-content">

        <div class="tab-pane fade in active" id="portlet_tab1">

          <div class="table-responsive">

            <table class="table table-hover" id="tracking-table">

              <tr>
                <th><br>Priority</th>
                <th><br>Ticket ID</th>
                <th><br>Type of Request</th>
                <th><br>Homeowner's Name</th>
                <th><br>Date Created</th>
                <th><br>Action</th>
              </tr>

              <?php foreach($result as $row): ?>
              <tr>
                  <td><?php if($row->request_type == 'EFR' || $row->request_type == 'ERB' || $row->request_type == 'ESP' || $row->request_type == 'EBT' || $row->request_type == 'EOT') { echo "1"; } else { echo "2"; } ?> </td>
                  <td><?php echo $row->request_type . "-" .$row->ticketid; ?></td>
                  <td><?php
                        if($row->request_type == 'RGC')
                        {
                          echo "Grass Cutting";
                        }
                        else if($row->request_type == 'RTC')
                        {
                          echo "Trash Collection";
                        }
                        else if($row->request_type == 'RPC')
                        {
                          echo "Pest Control";
                        }
                         else if($row->request_type == 'CMP')
                        {
                          echo "Malfunctioning Post Lights";
                        }
                        else if($row->request_type == 'CPL')
                        {
                          echo "Water Pipeline Leakages";
                        }
                         else if($row->request_type == 'CBD')
                        {
                          echo "Blocked Drainage";
                        }
                        else if($row->request_type == 'CSC')
                        {
                          echo "Electrical Short Circuit";
                        }
                         else if($row->request_type == 'CMD')
                        {
                          echo "Monthly Dues";
                        }
                        else if($row->request_type == 'ROT')
                        {
                          echo "Other Request";
                        }
                        else if($row->request_type == 'COT')
                        {
                          echo "Other Complaint";
                        }
                        else if($row->request_type == 'CTV')
                        {
                          echo "CCTV Retrieval Request";
                        }
                         else if($row->request_type == 'EFR')
                        {
                          echo "Fire";
                        }
                        else if($row->request_type == 'ERB')
                        {
                          echo "Robbery";
                        }
                        else if($row->request_type == 'EBT')
                        {
                          echo "Broken House Tube";
                        }
                        else if($row->request_type == 'ESP')
                        {
                          echo "Suspicious Person";
                        }
                        else if($row->request_type == 'EOT')
                        {
                          echo "Other Emergency";
                        }  ?>
                  </td>
                  <td><?php echo $row->firstname . " " . $row->middlename . " " . $row->lastname; ?></td>
                  <td><?php echo date("m/d/Y g:i A", $row->date_requested); ?></td>
                  <td class="action-button">
                    <a href="<?php echo site_url() . "admin_ticketing/ticketdetails/" . $row->ticketid; ?>">
                    <button type="button" class="<?php if($row->request_type == 'EFR' || $row->request_type == 'ERB'|| $row->request_type == 'EBT' || $row->request_type == 'ESP' || $row->request_type == 'EOT') { echo "btn btn-custom-9"; } else { echo "btn btn-custom-2"; } ?> ">Open</button></a>
                  </td>
              </tr>
            <?php endforeach; ?>
            </table>
             <center><?php echo $newticketlinks; ?></center>
          </div>

        </div>

      </div>

    </div>

  </div>

  <br><br><br><br>

</div>
