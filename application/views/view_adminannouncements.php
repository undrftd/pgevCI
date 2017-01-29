<div id="page-content-wrapper">
  <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>
  <br>
  <br>

  <div class="modal fade" id="delete-modal" role="dialog">

      <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
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

  <br>

  <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-5 col-md-offset-2">

      <div class="portlet">

        <div class="portlet-title">

          <ul class="nav nav-tabs">
            <li class="active">
              <a href="<?php echo base_url(); ?>admin_announcements/announcements">
          Announcements </a>
        </li>
        <li>
          <a href="<?php echo base_url(); ?>admin_announcements/bulletin">
          Bulletin </a>

        </div>

        <br>

        <div class="portlet-body">

          <div class="tab-content">

            <div class="tab-pane fade in active" id="portlet_tab1">

              <a href="<?php echo site_url(); ?>admin_announcements/post_announcements_admin"><button type="button" class="btn btn-custom-1">+ Post a new one</button></a><br>
             
              <?php foreach($order as $order): ?>
                  <h2> <?php echo $order->post_title ?> </h2>

                  <p class="article-date"> Date Posted: <?php echo date("F d, Y g:i A",$order->post_date);?> </p>
                  <p> "<?php echo substr($order->post_content, 0, 400); if(strlen($order->post_content) > 400) {echo "..."; } else { echo ""; } ?>" </p>
                  <br>

                  <a href="<?php echo site_url() . "admin_announcements/viewmore_announcements/" . $order->post_id ?>"><button type="submit" class="btn btn-custom-2">View More</button></a>

                  <button type="submit" class="btn btn-custom-3" data-toggle="modal" data-href="<?php  echo base_url() . "admin_announcements/delete_announcements/" . $order->post_id ?>" data-target="#delete-modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  Delete </button>


                  <br>
                  <br>
                  <br>
                  
              <?php endforeach; ?>

              <center><div id="pagination-link"><?php echo $announcementslinks; ?></div></center>

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
            <div class='input-group date' id='datetimepicker1'>
                            <input id="sel1" name ="datepick" type='text' class="form-control" placeholder="Click the calendar button to select a time and date"/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                          </div>

          </div>
            <a href="">
            <button type="submit" class="btn btn-custom">View</button>
            </a>
        </div>

      </div>

    </div>

  </div>
