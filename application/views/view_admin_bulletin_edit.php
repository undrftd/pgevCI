<div id="page-content-wrapper">

  <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>
  <br>
  <br>





  <div class="header-style">
    <h1> Edit Bulletin </h1>
  </div>

  <br>

    <div class="row">

      <div class="col-xs-12 col-sm-12 col-md-3 col-md-offset-2">

        <div class="information">
            <form action="<?php echo site_url() . "Admin_bulletin/save_bulletin/" . $select->post_id; ?>" method="POST">
              <div class="form-group">

                <p> Bulletin Title </p>
                <p class="error"> <?php echo form_error('post_title');  ?>
                <input class="form-control" id="sel1" type="text" name="post_title" value="<?php echo $select->post_title; ?>"><br>
                <p> Date </p>
                <p class="error"> <?php echo form_error('post_date');  ?>
                <input class="form-control" id="sel1" type="text" name="post_date" value="<?php echo $select->post_date ?>" readonly>

              </div>

            <br>

            <button type="submit" class="btn btn-custom">Save changes</button>
        </div>

        <br>
        <br>

      </div>

      <div class="clearfix visible-md-block"></div>
      <div class="clearfix visible-sm-block"></div>

      <div class="col-xs-12 col-sm-12 col-md-5">

        <div class="information">
            <div class="form-group">
            <p> Current Bulletin: </p>
            <textarea class="form-control" id="user-message" placeholder="" name="post_content" rows="15">
            <?php echo $select->post_content ?> </textarea>
            <p class="error"> <?php echo form_error('post_content');  ?>
              </form>
          </div>
        </div>

      </div>


    </div>
  </div>

</div>

</div>
