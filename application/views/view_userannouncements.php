<div id="page-content-wrapper">

  <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>

  <br><br><br>

  <div class="header-style">
    <h1> Announcements </h1>
  </div>

  <div class="portlet">

    <div class="portlet-header">

      <div id="search-group">

        <input id='datetimepicker4' type='text' class="form-control" placeholder="Search for an announcement">
          <button type="submit" class="btn btn-custom-8"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
        </input>

      </div>

    </div>

    <br><br>

    <div class="portlet-title">

      <ul class="nav nav-tabs">

        <li class="active">
          <a href="<?php echo base_url(); ?>user_announcements/announcements">
        Announcements </a>
        </li>

        <li>
          <a href="<?php echo base_url(); ?>user_announcements/bulletin">
          Bulletin </a>
        </li>

      </ul>

    </div>

    <div class="portlet-body">

      <div class="tab-content">

        <div class="tab-pane fade in active">

          <div class="announcement-message">

            <br>

            <div class="row the-list">

              <?php foreach($order as $row): ?>

              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 box nopadding">

                  <div class="information-1">

                    <h4><?php echo $row->post_title ?> </h4>
                    <p> <?php echo date("F d, Y g:i A",$row->post_date);?> </p>
                    <hr>
                    <p> <?php echo substr($row->post_content, 0, 300); if(strlen($row->post_content) > 300) {echo "..."; } else { echo ""; } ?> </p>
                    <hr>

                    <div class="more-link">

                      <p>Read More<span class="glyphicon glyphicon-chevron-right btn-sm" aria-hidden="true"></span></p>

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
