<div id="page-content-wrapper">
  <a href="#menu-toggle" class="btn btn-default btn-sm" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</a>
  <br>
  <br>

  <div class="modal fade" id="delete-modal" role="dialog">

      <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
              <div class="signin">
                  <div class="modal-body text-center">
                      <p> Are you sure you want to remove this announcement? </p><br><br>

                      <a href="<?php  echo base_url() . "admin_Announcements/delete_ann/" . $row->post_id ?>">
                      <button type="submit" class="btn btn-custom-1">Yes</button>
                      </a>
                      <button type="button" class="btn btn-custom" data-dismiss="modal">Cancel</button>

                  </div>
              </div>
          </div>

      </div>
  </div>

  <div class="header-style">
    <h1> Announcements </h1>
  </div>

  <br>

  <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-5 col-md-offset-2">

      <div class="portlet">

        <div class="portlet-title">

          <ul class="nav nav-tabs">
            <li class="active">
              <a href="<?php echo base_url(); ?>Admin_Announcements/">
          Announcements </a>
        </li>
        <li>
          <a href="<?php echo base_url(); ?>Admin_Announcements/admin_bulletin">
          Bulletin </a>

        </div>

        <br>

        <div class="portlet-body">

          <div class="tab-content">

            <div class="tab-pane fade in active" id="portlet_tab1">

              <a href="<?php echo site_url(); ?>Admin_Announcements/post_announcements_admin"><button type="button" class="btn btn-custom-1">+ Post a new one</button></a><br>
              <?php foreach($order as $row): ?>
              <h2> <?php echo $row->post_title ?> </h2>

              <p class="article-date"> Date Posted: <?php echo date('m/d/Y g:i A', strtotime($row->post_date)); ?> </p>
              <p> "<?php echo substr($row->post_content, 0, 400) ?>" </p>
              <br>

              <a href="<?php echo site_url() . "Admin_Announcements/select_ann/" . $row->post_id ?>"><button type="submit" class="btn btn-custom-2">Edit</button></a>

              <button type="submit" class="btn btn-custom-3" data-toggle="modal"
               data-target="#delete-modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  Delete </button>


              <br>
              <br>
              <br>
              <?php endforeach; ?>


              <a href="#" class="scrollToTop"><button type="button" class="btn btn-custom">Back to top</button></a>

              <br>
              <br>

              </div>



            </div>
          </div>
        </div>
      </div>

      <div class="clearfix visible-md-block"></div>
      <div class="clearfix visible-sm-block"></div>

      <div class="col-xs-12 col-sm-12 col-md-3">

        <div class="information">
            <p> Browse by date </p>
            <div class="form-group">
            <select class="form-control" id="sel1">

              <option>Select a date</option>
              <?php foreach($order as $row): ?>
              <option>Post Title: <?php echo $row->post_title . $row->post_date   ?> </option>
              <?php endforeach; ?>

            </select>
          </div>
            <a href="<?php echo site_url() . "Admin_Announcements/select_ann/" . $row->post_id ?>">
            <button type="submit" class="btn btn-custom">View</button>
            </a>
        </div>

      </div>


    </div>
  </div>

</div>

</div>
