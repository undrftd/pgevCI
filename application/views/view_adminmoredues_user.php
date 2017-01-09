<div id="page-content-wrapper">
        <a href="#menu-toggle" class="btn btn-default btn-sm" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</a>
        <br>
        <br>

        <div class="modal fade" id="cleardues-modal" role="dialog">

            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="signin">
                        <div class="modal-body text-center">
                            <p> <?php echo $this->session->userdata('firstname');?>, are you sure you want to clear this user's dues? </p><br>
                            <a href="<?php echo base_url() ."admin_dues/cleardues_user/" . $view->userid?>"> <button type="submit" class="btn btn-custom-1">Yes</button></a>
                            <button type="button" class="btn btn-custom-2" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="modal fade" id="cleararrears-modal" role="dialog">

            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="signin">
                        <div class="modal-body text-center">
                            <p> <?php echo $this->session->userdata('firstname');?>, are you sure you want to clear this user's arrears? </p><br>
                            <a href="<?php echo base_url() ."admin_dues/cleararrears_user/" . $view->userid?>"> <button type="submit" class="btn btn-custom-1">Yes</button></a>
                            <button type="button" class="btn btn-custom-2" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <br>

          <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">

              <div class="header-style">
                <h1> Homeowner's Monthly Dues </h1>
              </div><br>

              <div class="admin-message">

                  <p> Note: Before editing another user's account, be sure to inform them of what you are about to change for them to be aware.
                  </p>
                  <br>

              </div>

              <br>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">

              <div class="information">
                <form action="#" method="POST">
                  
                  <fieldset id="myFieldset" disabled>
                  <div class="form-group">
                    <h4> Billing Information </h4>
                        <br>
                        <p> Homeowner's Name </p>
                        <input disabled name ="firstname" class="form-control" id="sel1"type="text" placeholder="" value="<?php echo $view->firstname . " " . $view->lastname ?>">
                        <p class="error"><?php echo form_error('firstname'); ?> </p>
                        <br>

                        <p> Address </p>
                        <input disabled name="address" class="form-control" id="sel1" type="text" placeholder="" value="<?php echo $view->address; ?>">
                        <p class="error"><?php echo form_error('address'); ?></p>
                        <br>
                        <p> Monthly Dues </p>
                        <input name="email" class="form-control" id="sel1" type="text" placeholder="" value="<?php echo "₱ " . $view->monthly_dues ?>">
                        <p class="error"><?php echo form_error('email'); ?> </p>
                        <br>

                        <p> Arrears </p>
                        <input name="contactnum" class="form-control" id="sel1" type="text" placeholder="" value="<?php echo "₱ " . $view->arrears; ?>">
                        <p class="error"><?php echo form_error('contactnum'); ?> </p>

                      </fieldset>
                      <br><br>
                      <input class="btn btn-custom" type="submit" id="saveButton" value="Save Changes" style="display: none;"></a>
                    </form>
                        <button class="btn btn-custom" onclick="undisableField()" id="edit-button">Edit</button>
                        <br>
                        <button type="button" class="btn btn-custom-3" data-toggle="modal" data-target="#cleardues-modal"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>   Clear Dues </button><br><br>
                        <button type="button" class="btn btn-custom-3" data-toggle="modal" data-target="#cleararrears-modal"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>   Clear Arrears </button><br><br>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
