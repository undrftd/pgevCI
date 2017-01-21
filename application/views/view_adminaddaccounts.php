      <div id="page-content-wrapper">
        <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>
        <br>
        <br>

        <br>

          <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 nopadding">

              <div class="header-style">
                <h1> Add a User </h1>
              </div><br>

              <div class="admin-message">

                  <p> Note: Be sure to input the correct user credentials so that the user won't have any problems signing in.
                  </p>

              </div>

              <br>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 nopadding">

              <div class="information">
                  <div class="form-group">
                  <form action="<?php echo base_url(); ?>admin_accounts/createuser" method="POST">

                  <h4> User Credentials </h4>
                  <hr>
                  <p> First Name </p>
                  <input name="firstname" class="form-control" id="sel1" type="text" placeholder="">
                     <p class="error"><?php echo form_error('firstname'); ?> </p>
                  <br>

                  <p> Last Name </p>
                  <input name="lastname" class="form-control" id="sel1" type="text" placeholder="">
                      <p class="error"><?php echo form_error('lastname'); ?></p>
                  <br>

                  <p> Username </p>
                  <input name="username" class="form-control" id="sel1" type="text" placeholder="">
                      <p class="error"><?php echo form_error('username'); ?></p>
                  <br>

                  <p> Password </p>
                  <input name="password" class="form-control" id="sel1" type="password" placeholder="">
                     <p class="error"><?php echo form_error('password'); ?> </p>
                  <br>

                  <p> Address </p>
                  <input name="address" class="form-control" id="sel1" type="text" placeholder="">
                      <p class="error"><?php echo form_error('address'); ?></p>
                  <br>

                  <p> E-mail Address </p>
                  <input name="email" class="form-control" id="sel1" type="email" placeholder="">
                    <p class="error"><?php echo form_error('email'); ?> </p>
                  <br>

                  <p> Contact Number </p>
                  <input name="contactnum" class="form-control" id="sel1" type="text" placeholder="">
                      <p class="error"><?php echo form_error('contactnum'); ?> </p>
                  <br>

                  <p> Role </p>
                  <select name="role" class="form-control" id="sel1">
                    <option value= "" selected hidden>Choose a role</option>
                    <option value= "0">Homeowner</option>
                    <option value= "1">Administrator</option>
                  </select>
                    <p class="error"> <?php echo form_error('role'); ?></p>
                  <br>
                  <br>

                  <button type="submit" class="btn btn-custom-5">Add user</button></a>
                  </form>
                </div>
              </div>
              <br>
              <br>
            </div>
          </div>
        </div>

      </div>

    </div>
