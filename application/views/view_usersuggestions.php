<div id="page-content-wrapper">
  <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>
  <br>
  <br>

  <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">

      <div class="header-style">
        <h1> Suggestions Form</h1>
      </div>

      <br>

      <div class="admin-message text-center">


          <p> Note:
            If you have any ideas that would help our community be a better and safer place. Kindly explain it in the suggestion form below and we will think of it. Thank you, <?php echo $this->session->userdata('firstname');?>!
          </p>

      </div>

      <?php if ($this->session->flashdata('suggestfeedback')){ ?>
        <div class="success-message text-center" id="prompt-message">
          <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3>
          <p> <?php echo $this->session->flashdata('suggestfeedback'); ?> </p><br>
          <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
        </div>
      <?php } ?>

      <br>

      <div class="information">


          <div class="form-group">

            <h4> Suggestions Box </h4><br>

            <form action="<?php echo site_url(); ?>user_suggestions/send_email" method="POST">

              <p> Name </p>
              <input name ="fullname" class="form-control" id="sel1" type="text" placeholder="" value= "<?php echo $this->session->userdata('firstname') . " " .$this->session->userdata('lastname') ;?>" readonly>
              <br>
              <p> Email Address </p>
              <input name="email" class="form-control" id="sel1" type="email" placeholder="" value="<?php echo $this->session->userdata('email');?>" readonly>

              <br>

              <p> Message </p>

              <textarea name="message" class="form-control" id="user-message" placeholder="Kindly leave us a message for suggestions within our community... " rows="15" reseize="none"></textarea>

              <p class="error"><?php echo form_error('message'); ?> </p>

              <br><br>

              <button type="submit" class="btn btn-custom-5">Send message</button></a>

          </form>

        </div>

      </div>

      <br><br>

    </div>

  </div>

</div>
