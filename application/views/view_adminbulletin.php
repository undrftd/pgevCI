<div id="page-content-wrapper">

  <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>

  <span class="dropdown sign-out">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="dot-style">&#8226;</span> &nbsp;Hello, <?php echo $this->session->userdata('firstname'); ?><span class="badge"> <?php echo $count + $reserve + $forms;?> </span></a>
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
              <h4 class="modal-title">Delete Bulletin</h4>
            </div>

            <br>

              <div class="signin">
                  <div class="modal-body text-center">
                      <p> Are you sure you want to remove this bulletin? </p><br><br>
                    <a class ="deleteclass"><button type="submit" class="btn btn-custom-1">Yes</button></a>
                      <button type="button" class="btn btn-custom" data-dismiss="modal">Cancel</button>

                  </div>
              </div>
          </div>

      </div>
  </div>

  <div class="header-style">
    <h1> Bulletin </h1>
  </div><br>

  <div class="portlet nopadding">

    <div class="portlet-header">

      <form action="<?php echo base_url(); ?>admin_announcements/search_bulletin" method="GET">
      <div id="search-group">

        <input id='datetimepicker4' type='text' name="search" class="form-control" placeholder="Search for a bulletin">
          <button type="submit" class="btn btn-custom-8"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
        </input>

      </div>
      </form>
    </div>

    <br><br>

    <div class="portlet-title">

      <ul class="nav nav-tabs">

        <li>
          <a href="<?php echo base_url(); ?>admin_announcements/announcements">
        Announcements </a>
        </li>

        <li class="active">
          <a href="<?php echo base_url(); ?>admin_announcements/bulletin">
          Bulletin </a>
        </li>

      </ul>

    </div>

    <div class="portlet-body">

      <div class="tab-content">

        <div class="tab-pane fade in active">

        <?php if ($this->session->flashdata('bulletinfeedback')){ ?>
              <div class="success-message text-center" id="prompt-message">
                <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3>
                <p> <?php echo $this->session->flashdata('bulletinfeedback'); ?> </p><br>
                <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
              </div>
          <?php } ?>

          <?php if ($this->session->flashdata('bulletinfail')){ ?>
            <div class="error-message text-center" id="prompt-message">
              <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3>
              <p> <?php echo $this->session->flashdata('bulletinfail'); ?> </p><br>
              <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
            </div>
          <?php } ?>

          <div class="announcement-message">

            <br>

            <div class="row the-list">

              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 box nopadding">

                <div class="information-add text-center">

                  <a href="<?php echo site_url(); ?>admin_announcements/post_bulletin">+ &nbsp;Post a new one</a>

                </div>

              </div>

              <?php foreach($order as $row): ?>

              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 box nopadding">

                <div class="information-1">

                  <h4><?php echo $row->post_title ?> </h4>
                  <p><small class="date-archive"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>&nbsp;  <?php echo date("F d, Y", strtotime($row->post_date)) . " at " . date("g:i A", $row->post_time);?></small> </p>
                  <p class="date-posted"> <?php if($row->userid == $this->session->userdata('userid')) { echo "You said "; } else { echo $row->firstname . " " . $row->lastname .  " said"; }?> </p>
                  <hr>
                  <p> <?php echo substr($row->post_content, 0, 250); if(strlen($row->post_content) > 250) {echo "..."; } else { echo ""; } ?> </p>
                  <hr>

                  <div class="more-link">

                    <?php

                      if ($row->userid !== $this->session->userdata('userid'))
                      {
                        echo "<a href='" . site_url() . "admin_announcements/viewmore_bulletin/" . $row->post_id ."'><p>Read More</p></a>";
                      }
                      else
                      {
                        echo '<div class="user-buttons">';
                        echo "<a href='" . site_url() . "admin_announcements/edit_bulletin/" . $row->post_id . "'><p><i class='material-icons'>create</i></p></a>";
                        echo "<a data-href='" . site_url() . "admin_announcements/delete_bulletin/" . $row->post_id . "' data-toggle='modal' data-target='#delete-modal'><p><i class='material-icons'>delete</i></p></a>";
                        echo '</div>';
                      }

                      ?>

                  </div>

                </div>

              </div>

              <div class="box-wrap clearfix"></div>

            <?php endforeach; ?>

            </div>

            <center><div id="pagination-link"><?php echo $bulletinlinks; ?></div></center>

          </div>

        </div>

      </div>

    </div>

  </div>

</div>
