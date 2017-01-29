<div id="page-content-wrapper">

  <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>

  <br><br>

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
                <a href="<?php echo base_url(); ?>user_announcements/announcements">
              Announcements </a>
          </li>

          <li>
            <a href="<?php echo base_url(); ?>user_announcements/bulletin">
            Bulletin </a>


          </div>

          <div class="portlet-body">

            <div class="tab-content">

              <div class="tab-pane fade in active" id="portlet_tab1">
                <?php foreach($order as $row): ?>
                  <h2><?php echo $row->post_title ?></h2>
                  <p class="article-date"> Date Posted: <?php echo date("F d, Y g:i A",$row->post_date);?> </p>
                  <p> "<?php echo substr($row->post_content, 0, 400); if(strlen($row->post_content) > 400) {echo "..."; } else { echo ""; } ?>" </p>
                  <br>
                  <br>
                <?php endforeach; ?>

                <center><div id="pagination-link"><?php echo $announcementslinks; ?></div></center>
                
              </div>


                <br>
                <br>
                <br>




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

</div>

</div>
