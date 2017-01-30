<div id="page-content-wrapper">

  <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>

  <br><br><br>

  <div class="modal fade" id="delete-modal" role="dialog">

      <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Delete Announcement</h4>
            </div>

            <br>

              <div class="signin">
                  <div class="modal-body text-center">
                      <p> Are you sure you want to remove this announcement? </p><br><br>
                    <a class ="deleteclass"><button type="submit" class="btn btn-custom-1">Yes</button></a>
                      <button type="button" class="btn btn-custom" data-dismiss="modal">Cancel</button>

                  </div>
              </div>
          </div>

      </div>
  </div>

  <div class="header-style">
    <h1> Announcements </h1>
  </div>

  <div class="portlet">

    <div class="portlet-header">

      <form action="<?php echo base_url(); ?>admin_announcements/search_announcement" method="GET">
      <div id="search-group">

        <input id='datetimepicker4' type='text' name="search" class="form-control" placeholder="Search for an announcement">
          <button type="submit" class="btn btn-custom-8"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
        </input>

      </div>
      </form>
    </div>

    <br><br>

    <div class="portlet-title">

      <ul class="nav nav-tabs">

        <li class="active">
          <a href="<?php echo base_url(); ?>admin_announcements/announcements">
        Announcements </a>
        </li>

        <li>
          <a href="<?php echo base_url(); ?>admin_announcements/bulletin">
          Bulletin </a>
        </li>

      </ul>

    </div>

    <div class="portlet-body">

      <div class="tab-content">

        <div class="tab-pane fade in active">

         <?php if ($this->session->flashdata('announcementfeedback')){ ?>
              <div class="success-message text-center" id="prompt-message">
                <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3>
                <p> <?php echo $this->session->flashdata('announcementfeedback'); ?> </p><br>
                <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
              </div>
          <?php } ?>

          <?php if ($this->session->flashdata('announcementfail')){ ?>
            <div class="error-message text-center" id="prompt-message">
              <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3>
              <p> <?php echo $this->session->flashdata('announcementfail'); ?> </p><br>
              <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
            </div>
          <?php } ?>

          <br>

          <div class="announcement-message">

            <div class="row the-list">

              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 box nopadding">

                <div class="information-add text-center">

                  <a href="<?php echo site_url(); ?>admin_announcements/post_announcements">+ &nbsp;Post a new one</a>

                </div>

              </div>

              <?php foreach($order as $row): ?>

              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 box nopadding">

                <div class="information-1">

                  <h4><?php echo $row->post_title; ?> </h4>
                  <p><?php echo date("F d, Y", strtotime($row->post_date)) . " " . date("g:i A", $row->post_time);?> </p>
                  <hr>
                  <p> <?php echo substr($row->post_content, 0, 250); if(strlen($row->post_content) > 250) {echo "..."; } else { echo ""; } ?> </p>
                  <hr>

                  <div class="more-link">

                    <div class="row">

                      <div class="col-xs-6 col-lg-6 nopadding">

                      <a href="<?php echo site_url() . "admin_announcements/edit_announcements/" . $row->post_id ?>"><p>Edit</p></a>

                      </div>

                      <div class="col-xs-6 col-lg-6 nopadding">

                      <a data-href="<?php echo base_url() . "admin_announcements/delete_announcements/" . $row->post_id ?>" data-toggle="modal" data-target="#delete-modal"><p><span class="glyphicon glyphicon-trash btn-sm" aria-hidden="true"></span> Delete</p></a>

                      <!--<button type="submit" class="btn btn-custom-3" data-toggle="modal"  data-target="#delete-modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  Delete </button>-->

                      </div>

                    </div>

                  </div>

                </div>

              </div>

              <div class="box-wrap clearfix"></div>

            <?php endforeach; ?>

            </div>

            <center><div id="pagination-link"><?php echo $announcementslinks; ?></div></center>

          </div>

        </div>

      </div>

    </div>

  </div>

</div>
