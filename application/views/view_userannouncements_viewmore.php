<div id="page-content-wrapper">

  <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>

  <br><br><br>

  <div class="row">

    <div class="header-style">
      <h1> Announcement Details </h1>
    </div>

<<<<<<< HEAD
    <br>
=======
      <div class="header-style">
        <h1> Community Announcement </h1>
      </div>
>>>>>>> 895ce26e9655ddb640ffcebd3e62f0778542b9ea

    <div class="col-xs-12 col-md-8 col-lg-9">

      <div class="announcement-message text-center">

        <h4> <?php echo $result->post_title; ?> </h4>
        <p> <?php echo date("F d, Y", strtotime($result->post_date)) . " " . date("g:i A", $result->post_time); ?> <p>
        <p class="date-posted"> Community Administrator </p>
        <hr>
        <p> <?php echo $result->post_content;  ?> </p>

        <br>

      </div>

      <br>

    </div>

    <div class="col-xs-12 col-md-4 col-lg-3">

      <div class="archive-part">

        <div class="announcement-message text-center">

          <h4> Previous Announcements </h4>
          <hr>
          <p> Chinese New Year <span class="date-archive"> Jan 2017 </span> <p>
          <hr>
          <p> New Year <span class="date-archive"> Jan 2017 </span> <p>
          <hr>
          <p> New Years Eve <span class="date-archive"> Dec 2016 </span> <p>
          <hr>
          <p> Christmas <span class="date-archive"> Dec 2016 </span> <p>
          <hr>
          <p> Gemille's Birthday <span class="date-archive"> Dec 2016 </span> <p>
          <hr>

          <a href="<?php echo site_url("user_announcements/announcements"); ?>"><span class="glyphicon glyphicon-chevron-left btn-sm" aria-hidden="true"></span>Back to Announcements</a>

          <br><br>

        </div>

      </div>

    </div>

  </div>

</div>
