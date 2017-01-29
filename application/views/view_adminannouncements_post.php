<div id="page-content-wrapper">

  <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>

  <br><br><br>

  <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">

      <div class="header-style">
        <h1> Post an announcement </h1>
      </div>

      <br>

      <div class="information">

        <div class="form-group">

          <form action="<?php echo site_url() . "admin_announcements/post_announcements_admin/"?>" method="POST">

          <p>  Announcement Title </p>
          <input class="form-control" id="sel1" name="post_title" type="text" placeholder="What's the title?">
          <p class="error" > <?php echo form_error('post_title'); ?></p>
          <br>

          <p> Date </p>
          <input class="form-control  "name="post_date" id="sel1" type="text" value="<?php $date = date('F d, Y'); echo date('F d, Y', strtotime($date)); ?>"readonly>
          <p class="error" > <?php echo form_error('post_date'); ?> </p>
          <br>

          <p> Kindly put the details of your announcement here: </p>
          <textarea class="form-control"name="post_content" id="user-message" placeholder="What do you want to say to the community?" rows="15"></textarea>
          <p class="error" name="post_content"> <?php echo form_error('post_content'); ?></p>


          <br><br>

          <button type="submit" class="btn btn-custom-5">Post</button></a>

          </form>

        </div>

      </div>

      <br>
      <br>

    </div>

  </div>

</div>
