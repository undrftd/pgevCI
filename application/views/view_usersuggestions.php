    <div id="page-content-wrapper">
        <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>
        <br>
        <br>

        <div class="header-style">
        
          <h1> Suggestions Form</h1>
        </div>

        <br><br>

        <?php if ($this->session->flashdata('suggestfeedback')){ ?>
            <div class="success-message text-center" id="prompt-message">
              <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3>
              <p> <?php echo $this->session->flashdata('suggestfeedback'); ?> </p><br>
              <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button>
            </div>
        <?php } ?>

        <br><br>

        <div class="row">

          <div class="col-xs-12 col-sm-12 col-md-3 col-md-offset-2">

            <div class="information">
                <form action="<?php echo site_url(); ?>user_suggestions/send_email" method="POST">
                  <div class="form-group">

                    <p> Name </p>
                    <input name ="fullname" class="form-control" id="sel1" type="text" placeholder="" value= "<?php echo $this->session->userdata('firstname') . " " .$this->session->userdata('lastname') ;?>" readonly>
                    <br>
                    <p> Email Address </p>
                    <input name="email" class="form-control" id="sel1" type="email" placeholder="" value="<?php echo $this->session->userdata('email');?>" readonly>
                      
                    <br>


                  </div>

                <button type="submit" class="btn btn-custom">Send</button></a>
            </div>
                
            <br>
            <br>

          </div>

          <div class="clearfix visible-md-block"></div>
          <div class="clearfix visible-sm-block"></div>

          <div class="col-xs-12 col-sm-12 col-md-5">

            <div class="information">
                <div class="form-group">
                <p> Message </p>  <p class="error"><?php echo form_error('message'); ?> </p>
                <textarea name="message" class="form-control" id="user-message" placeholder="Kindly leave us a message for suggestions within our community... " rows="15" reseize="none"></textarea>
              </div>
            </div>
</form>
            <br><br>

          </div>

        </div>
        </div>

      </div>

    </div>

   