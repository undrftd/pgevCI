<div id="page-content-wrapper">
        <a href="#menu-toggle" class="btn btn-default btn-sm" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</a>
        <br>
        <br>

        <br>

          <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-4 col-md-offset-2">

              <div class="header-style">
                <h1> Add a User </h1>
              </div><br>

              <div class="admin-message">

                  <p> Note: Be sure to input the correct user credentials so that the user won't have any problems signing in.
                  </p>
                  <br>

              </div>

              <br>

            </div>

            <div class="clearfix visible-md-block"></div>
            <div class="clearfix visible-sm-block"></div>

            <div class="col-xs-12 col-sm-12 col-md-4">

              <div class="information">
                  <div class="form-group">
                  <form action="<?php echo base_url(); ?>admin_accounts/createuser" method="POST">
                  
                  <h4> User Credentials </h4>
                  <br>
                  <p> First Name </p>
                  <input name="firstname" class="form-control" id="sel1" type="text" placeholder="">
                  <br>
                  <p> Last Name </p>
                  <input name="lastname" class="form-control" id="sel1" type="text" placeholder="">
                  <br>
                  <p> Username </p>
                  <input name="username" class="form-control" id="sel1" type="text" placeholder="">
                  <?php if(!empty($message)){ ?>
                  <center><p style="color:red"><?php echo $message; ?></p>
                  <?php } ?>
                  <p> Password </p>
                  <input name="password" class="form-control" id="sel1" type="password" placeholder="">
                  <br>
                  <p> Address </p>
                  <input name="address" class="form-control" id="sel1" type="text" placeholder="">
                  <br>
                  <p> E-mail Address </p>
                  <input name="email" class="form-control" id="sel1" type="email" placeholder="">
                  <br>
                  <p> Contact Number </p>
                  <input name="contactnum" class="form-control" id="sel1" type="text" placeholder="">
                  <br>
                  <p> Role </p>
                  <select name="role" class="form-control" id="sel1">
                    <option>Choose a role</option>
                    <option value= "0">Homeowner</option>
                    <option value= "1">Administrator</option>
                  </select>
                  <br><br>
                  <button type="submit" class="btn btn-custom">Add user</button></a>
                </div>
              </div>
              <br>
              <br>

            </div>


          </div>
        </div>

      </div>

    </div>