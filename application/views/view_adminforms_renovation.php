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
                <p> <?php echo $this->session->userdata('firstname');?>, are you sure you want to remove this form request? </p><br>
                <p class="warning-message"> WARNING: The form request will be lost. Please check if the form has been downloaded before deleting. </p><br>
                <a class ="deleteclass"><button type="submit" class="btn btn-custom-1">Yes</button></a>
                <button type="button" class="btn btn-custom" data-dismiss="modal">Cancel</button>
            </div>

          </div>

        </div>

      </div>

    </div>

    <div class="header-style">
      <h1> Renovation Request Forms </h1>
    </div><br>

    <div class="portlet nopadding">

      <div class="portlet-header">

        <form action="<?php echo base_url();?>admin_forms/search_renovation" method="GET">
          <div class="form-group" id="search-group">
            <input class="form-control" name="search" id="sel1" type="text" placeholder="Search for a document...">
              <button type="submit" class="btn btn-custom-8"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
            </input>
          </div>
        </form>

        <br>

      </div>

      <div class="portlet-title">

        <ul class="nav nav-tabs">
          <li>
						<a href="<?php echo base_url(); ?>admin_forms/car_sticker">
						Car Sticker <span class="badge"> <?php echo $countsticker; ?> </span> </a>
					</li>
          <li>
            <a href="<?php echo base_url(); ?>admin_forms/work_permit" id="not-important">
            Work Permit <span class="badge"> <?php echo $countpermit; ?> </span> </a>
          </li>
          <li class="active">
            <a href="<?php echo base_url(); ?>admin_forms/renovation" id="not-important">
            Renovation <span class="badge"> <?php echo $countrenovation; ?> </span> </a>
          </li>
          <li class="dropdown" id="dropdown-mobile">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Others <span class="badge"> <?php echo $countrenovation + $countpermit; ?> </span></a>
            <ul class="dropdown-menu">
              <li>
                <a href="<?php echo base_url(); ?>admin_forms/work_permit">
                Work Permit <span class="a-links"> <?php echo $countpermit; ?> </span> </a>
              </li>
              <li>
                <a href="<?php echo base_url(); ?>admin_forms/renovation">
                Renovation <span class="a-links"> <?php echo $countrenovation; ?> </span> </a>
              </li>
            </ul>
          </li>
        </ul>

      </div>

      <div class="portlet-body">

        <?php if ($this->session->flashdata('renovatedeletesuccess')){ ?>
          <div class="success-message text-center" id="prompt-message">
            <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3>
            <p> <?php echo $this->session->flashdata('renovatedeletesuccess'); ?></p><br>
            <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
          </div>
        <?php } ?>

        <?php if ($this->session->flashdata('renovationfail')){ ?>
          <div class="error-message text-center" id="prompt-message">
            <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3>
            <p> <?php echo $this->session->flashdata('renovationfail'); ?></p><br>
            <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
          </div>
        <?php } ?>

        <br>

        <div class="tab-content">

          <div class="tab-pane fade in active" id="portlet_tab1">

            <div class="table-responsive">

              <table class="table table-hover" id="tracking-table">

                <tr>
                    <th><br>Homeowner's Name</th>
                    <th><br>Address</th>
                    <th><br>Contact Number</th>
                    <th><br>Status</th>
                    <th><br>Action</th>
                </tr>

                <?php foreach ($renovation as $row): ?>
                <tr>
                    <td><?php echo $row->firstname . " " . $row->lastname?></td>
                    <td><?php echo $row->address?></td>
                    <td><?php echo $row->contactnum?></td>
                    <td><?php if($row->status == 1){ echo "Not Downloaded"; } else { echo "Downloaded"; } ?></td>
                    <td class="action-button">
                      <a href="<?php echo base_url() . "admin_forms/download_renovation/" . $row->formid; ?>"><button type="button" class="btn btn-custom-2"><span class="glyphicon glyphicon-save" aria-hidden="true"></span>  &nbsp;Download</button></a>
                      <button type="button" class="btn btn-custom-3" data-href="<?php echo base_url() . 'admin_forms/delete_renovation/' . $row->formid; ?>" data-toggle="modal" data-target="#delete-modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  &nbsp;Delete </button>
                    </td>
                </tr>
              <?php endforeach;?>
              </table>
             <center><div id="pagination-link"><?php echo $renovationlinks; ?></div></center>
            </div>

        </div>

      </div>

    </div>

  </div>

</div>
