<div id="page-content-wrapper">
        <a href="#menu-toggle" class="btn btn-default btn-sm" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</a>
        <br>
        <br>
        <br>

          <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">

              <div class="header-style">
                <h1> Account Information </h1>
              </div><br>

              <div class="admin-message">

                  <p> Note: Before editing another user's account, be sure to inform them of what you are about to change for them to be aware.
                  </p>

              </div>

            </div>

            <div class="clearfix visible-md-block"></div>
            <div class="clearfix visible-sm-block"></div>

            <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">

            <?php if ($this->session->flashdata('feedback')){ ?>
              <div class="success-message text-center" id="prompt-message">
                <h3> Hello, <?php echo $this->session->userdata('firstname');?>. </h3>
                <p> You have successfully edited your account.  </p><br>
                <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
              </div>
            <?php } ?>

            <?php if ($this->session->flashdata('fail')){ ?>
              <div class="error-message text-center" id="prompt-message">
                <h3> Hello, <?php echo $this->session->userdata('firstname');?>. </h3>
                <p> <?php echo $this->session->flashdata('fail'); ?> </p><br>
                <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
              </div>
            <?php } ?>

              <br>

              <div class="information">
                <form action="<?php echo base_url() ."admin_profile/update_account/" . $this->session->userdata('userid') ;?>" method="POST">
                  <fieldset id="myFieldset" disabled>
                  <div class="form-group">
                    <h4> User Credentials </h4>
                        <br>
                        <p> First Name </p>
                        <input name ="firstname" class="form-control" id="sel1" type="text" placeholder="" value= "<?php echo $this->session->userdata('firstname');?>">
                        <p class="error"><?php echo form_error('firstname'); ?> </p>
                        <br>

                        <p> Last Name </p>
                        <input name="lastname" class="form-control" id="sel1" type="text" placeholder="" value="<?php echo $this->session->userdata('lastname');?>">
                        <p class="error"><?php echo form_error('lastname'); ?></p>
                        <br>

                        <p> Username </p>
                        <input name="username" class="form-control" id="sel1" type="text" placeholder="" value="<?php echo $this->session->userdata('username');?>">
                        <p class="error"><?php echo form_error('username'); ?></p>
                        <br>

                        <p> Password </p>
                        <input name="password" class="form-control" id="sel1" type="password" placeholder="" value="<?php echo $this->session->userdata('password');?>">
                        <p class="error"><?php echo form_error('password'); ?></p>
                        <br>

                        <p> Confirm Password </p>
                        <input name="passconf" class="form-control" id="sel1" type="password" placeholder="" value="<?php echo $this->session->userdata('password');?>">
                        <p class="error"><?php echo form_error('passconf'); ?></p>
                        <br>

                        <p> Address </p>
                        <input name="address" class="form-control" id="sel1" type="text" placeholder="" value="<?php echo $this->session->userdata('address');?>">
                        <p class="error"><?php echo form_error('address'); ?></p>
                        <br>

                        <p> E-mail Address </p>
                        <input name="email" class="form-control" id="sel1" type="email" placeholder="" value="<?php echo $this->session->userdata('email');?>">
                        <p class="error"><?php echo form_error('email'); ?> </p>
                        <br>

                        <p> Contact Number </p>
                        <input name="contactnum" class="form-control" id="sel1" type="text" placeholder="" value="<?php echo $this->session->userdata('contactnum');?>">
                        <p class="error"><?php echo form_error('contactnum'); ?> </p>
                        <br>
                      </fieldset>
                      <input class="btn btn-custom-5" type="submit" id="saveButton" value="Save Changes" style="display: none;"></a>
                    </form>
                        <button class="btn btn-custom-5" onclick="undisableField()" id="edit-button">Edit</button>
                </div>
              </div>
            </div>
            <br>
            <br>
          </div>
        </div>

      </div>
