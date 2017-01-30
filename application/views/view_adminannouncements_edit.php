<div id="page-content-wrapper">

  <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>

  <br><br><br>

  <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 nopadding">

      <div class="header-style">
        <h1> Edit announcement </h1>
      </div>

      <br>

      <div class="information">

        <form action="<?php echo site_url() . "admin_announcements/save_announcements/" . $select->post_id; ?>" method="POST">

          <fieldset id="myFieldset" disabled>

            <div class="form-group">

              <p> Announcement Title </p>
              <input class="form-control" id="sel1" type="text" name="post_title" value="<?php echo $select->post_title; ?>">
              <p class="error"> <?php echo form_error('post_title');  ?>
              <br>

              <p> Date </p>
              <input class="form-control" id="sel1" type="text" name="post_date" value="<?php echo date('F d, Y', strtotime($select->post_date)); ?>" readonly>
              <p class="error"> <?php echo form_error('post_date');  ?>
              <br>

              <p> Current Announcement: </p>
              <textarea class="form-control" id="user-message" placeholder="" name="post_content" rows="15"><?php echo $select->post_content; ?></textarea>
              <p class="error"> <?php echo form_error('post_content');  ?>

              <br><br>

          </fieldset>

              <input class="btn btn-custom-5" type="submit" id="saveButton" value="Save Changes" style="display: none;"></a>

        </form>

            <button type="button" onclick="undisableField()" class="btn btn-custom-5" id="edit-button">Edit</button>

            </div>

          <br>

      </div>

      <br>
      <br>

    </div>

  </div>

</div>
