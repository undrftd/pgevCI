<div id="page-content-wrapper">
  <a href="#menu-toggle" class="btn btn-default btn-sm" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</a>
  <br>
  <br>

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
                <a href="#portlet_tab1" data-toggle="tab">
                Announcements </a>
              </li>
              <li>
                <a href="#portlet_tab2" data-toggle="tab">
                Bulletin </a>
              </li>

          </div>

          <div class="portlet-body">

            <div class="tab-content">

              <div class="tab-pane fade in active" id="portlet_tab1">
                <?php foreach($order as $row): ?>
                <h2><?php echo $row->post_title ?></h2>
                <p class="article-date"> Date Posted: <?php echo date('m/d/Y g:i A', strtotime($row->post_date));?> </p>
                <p> "<?php echo $row->post_content ?>" </p>
                <br>
                <br>
                <?php endforeach; ?>
                <a href="#" class="scrollToTop"><button type="button" class="btn btn-custom">Back to top</button></a>



              </div>

              <div class="tab-pane fade" id="portlet_tab2">
                <?php #foreach($order as $row): ?>
                <h2> <?php #echo $row->post_title ?>Bulletin Title </h2>
                <p class="article-date"> <?php #echo $row->post_date ?></p>
                <p> <?php #echo $row->post_content ?>"Wait Lang" </p>
                <br>
                <?php #endforeach; ?>

                <br>

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
                <option><?php echo $row->post_date ?> </option>
                <?php endforeach; ?>

              </select>
          </div>
            <a href="<?php site_url() . "User_announcements/select_ann/" . $row->post_id ?>">
            <button type="button" class="btn btn-custom">View</button>
            <a>
        </div>

      </div>


    </div>
  </div>

</div>

</div>
