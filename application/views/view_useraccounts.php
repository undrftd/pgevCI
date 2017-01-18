<div id="page-content-wrapper">
        <a href="#menu-toggle" class="btn btn-default btn-sm" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</a>
        <br>
        <br>

        <br>

          <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-4 col-md-offset-2">

              <div class="header-style">
                <h1> Account Information </h1>
              </div><br>

              <div class="admin-message">

                  <p> Note: Kindly call us through this number (887-8888) for additional assitance if you want to change a
                    certain credential not included in the editable information tab.
                  </p>

              </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-4">

              <div class="portlet">

      					<div class="portlet-title">

      						<ul class="nav nav-tabs">
                    <li class="active">
      								<a href="#portlet_tab1" data-toggle="tab">
      								Editable </a>
      							</li>
                    <li>
                      <a href="#portlet_tab2" data-toggle="tab">
                      Non-editable </a>
                    </li>

      					</div>

      					<div class="portlet-body">

      						<div class="tab-content">

      							<div class="tab-pane fade in active" id="portlet_tab1">

                      <div class="information">
                          <div class="form-group">

                            <form action="<?php echo base_url() . "user_accounts/update_useraccount/" . $this->session->userdata('userid'); ?>" method="POST">
                              <fieldset id="myFieldset" disabled>
                            <h4> Editable Information </h4>
                          <br>

                          <p> Password </p>
                          <input name="password" class="form-control" id="sel1" type="password" placeholder="" value="<?php echo $this->session->userdata('password'); ?>">
                          <p class="error"> <?php echo form_error('password'); ?> </p>
                          <br>

                          <p>Confirm Password </p>
                          <input name="cpassword" class="form-control" id="sel1"  type="password" placeholder="" value="<?php echo $this->session->userdata('password'); ?>">
                          <p class="error"> <?php echo form_error('cpassword'); ?>  </p>
                          <br>

                          <p>Email Address </p>
                          <input name="email" class="form-control" id="sel1" type="email" placeholder="" value="<?php echo $this->session->userdata('email'); ?>">
                          <p class="error"> <?php echo form_error('email'); ?>  </p>
                          <br>

                          

                          <p>Contact Number </p>
                          <input name="contactnum" class="form-control" id="sel1" type="text" placeholder="" value="<?php echo $this->session->userdata('contactnum'); ?>">
                          <p class="error"> <?php echo form_error('contactnum'); ?> </p>
                          <br><br>

                        </fieldset>
                        <input class="btn btn-custom-5" type="submit" id="saveButton" value="Save Changes" style="display: none;"></a>
                      </form>
                          <button class="btn btn-custom-5" onclick="undisableField()" id="edit-button">Edit</button>
                        </div>
                      </div>

      							</div>

      							<div class="tab-pane fade" id="portlet_tab2">

                      <div class="information">
                          <div class="form-group">
                            <h4> Non-editable Information</h4>
                          <br>
                          <p> First Name </p>
                          <input class="form-control" id="sel1" type="text" placeholder="" value="<?php echo $this->session->firstname ;?>" readonly>
                          <br>
                          <p> Last Name </p>
                          <input class="form-control" id="sel1" type="text" placeholder="" value="<?php echo $this->session->lastname ;?>" readonly>
                          <br>
                          <p> Username </p>
                          <input class="form-control" id="sel1" type="text" placeholder="" value="<?php echo $this->session->username ;?>" readonly>
                          <br>
                          <p> Address </p>
                          <input class="form-control" id="sel1" type="text" placeholder="" value="<?php echo $this->session->address ;?>" readonly>
                          <br>
                          <p> Role </p>
                          <input class="form-control" id="sel1" type="text" placeholder="" value="<?php if($this->session->role == 0 ){echo "Homeowner";} else {echo "Adminstrator";}  ;?>" readonly>

                        </div>
                      </div>

      							</div>

      						</div>

      					</div>

      				</div>

            </div>

          </div>
        </div>

      </div>
