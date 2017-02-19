<div id="page-content-wrapper">

  <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>

  <br><br><br>

  <div class="row">

    <div class="header-style">
      <h1> Community Bulletin </h1>
    </div>

    <br>

    <div class="col-xs-12 col-md-8 col-lg-9 nopadding">

      <div class="announcement-message">

        <h4> <?php echo $result->post_title; ?> </h4>
        <p> <?php echo date("F d, Y", strtotime($result->post_date)) . " " . date("g:i A", $result->post_time); ?> <p>
        <p class="date-posted"> <?php echo $result->firstname . " " . $result->lastname; ?> said </p>
        <hr>
        <p> <?php echo $result->post_content;  ?> </p>

        <br><br><br>

        <hr class="row-hr">
        <p> Hello, <?php echo $this->session->userdata('firstname');?>. Do you want to ask/say something to the community? <span class="a-links"> <a href="<?php echo site_url(); ?>admin_announcements/post_bulletin"> Post a bulletin now. </a></span> </p>
        <hr>

      </div>

      <br><br><br>

    </div>

    <div class="col-xs-12 col-md-4 col-lg-3 nopadding">

      <div class="archive-part">

        <div class="announcement-message text-center">

          <hr class="row-hr">
          <h4> Previous Bulletins </h4>
          <hr>
          <?php foreach ($previous as $row): ?>
          <a href="<?php echo site_url() . "user_announcements/viewmore_bulletin/" . $row->post_id; ?>"> <p> <span class="dot-style">&middot;</span> <?php echo $row->post_title; ?> <span class="date-archive"> <?php echo date('M Y', strtotime($row->post_date)); ?> </span></p>
          <hr>
          <?php endforeach ?>
          <a href="<?php echo site_url("user_announcements/bulletin"); ?>"><span class="glyphicon glyphicon-chevron-left btn-sm" aria-hidden="true"></span>Back to Bulletin</a>

          <br><br>

        </div>

      </div>

    </div>

  </div>

</div>
