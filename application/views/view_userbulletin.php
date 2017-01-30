<div id="page-content-wrapper">

  <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>

  <br><br><br>

  <div class="header-style">
    <h1> Bulletin </h1>
  </div>

  <div class="portlet">

    <div class="portlet-header">

      <form action="<?php echo base_url(); ?>user_announcements/search_bulletin" method="GET">
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
          <a href="<?php echo base_url(); ?>user_announcements/announcements">
        Announcements </a>
        </li>

        <li class="active">
          <a href="<?php echo base_url(); ?>user_announcements/bulletin">
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
                <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button>
              </div>
          <?php } ?>

          <?php if ($this->session->flashdata('bulletinfail')){ ?>
            <div class="error-message text-center" id="prompt-message">
              <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3>
              <p> <?php echo $this->session->flashdata('bulletinfail'); ?> </p><br>
              <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button>
            </div>
          <?php } ?>

          <div class="announcement-message">

            <br>

            <div class="row the-list">

              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 box nopadding">

                <div class="information-add text-center">

                  <a href="<?php echo site_url(); ?>user_announcements/post_bulletin">+ &nbsp;Post a new one</a>

                </div>

              </div>

              <?php foreach($order as $row): ?>

              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 box nopadding">

                  <div class="information-1">

                    <h4><?php echo $row->post_title ?> </h4>
                    <p><?php echo date("F d, Y", strtotime($row->post_date)) . " " . date("g:i A", $row->post_time);?> </p>
                    <p class="date-posted"> <?php if($row->user_id == $this->session->userdata('userid')) { echo "You said "; } else { echo $row->firstname . " " . $row->lastname .  " said"; }?> </p>
                    <hr>
                    <p> <?php echo substr($row->post_content, 0, 250); if(strlen($row->post_content) > 250) {echo "..."; } else { echo ""; } ?> </p>
                    <hr>

                    <div class="more-link">

                     <a href="<?php echo site_url() . "user_announcements/viewmore_bulletin/" . $row->post_id; ?>"><p>Read More<span class="glyphicon glyphicon-chevron-right btn-sm" aria-hidden="true"></span></p></a>

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
