<div id="page-content-wrapper">

  <div class="web-header">

    <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>

    <div class="overlay-header">
      <span class="icon-main">
        <i class="material-icons md-36 gray400">account_circle</i>
        <?php
          $totalreserve = $deniedreserve + $approvedreserve;
          if ($totalreserve >= 1) {
            echo "<span class='badge'>$totalreserve</span>";
          }
          else if ($approvedreserve >= 1) {
            echo "<span class='badge'>$approvedreserve</span>";
          }
          else if ($deniedreserve >= 1) {
            echo "<span class='badge'>$deniedreserve</span>";
          }
        ?>
      </span>
      <h4>
        <?php echo $this->session->firstname ;?> <?php echo $this->session->lastname ;?>
        <span class="dropdown sign-out">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <span>Homeowner <span class="caret"></span></span>
          </a>
          <ul class="dropdown-menu pull-right">
            <li class="dropdown-header"><strong><a>Activities</a></strong></li>
            <li><a onclick="myFunction()">Create an Emergency Ticket</a></li>
            <li><a href="<?php echo base_url("user_announcements/post_bulletin"); ?>">Post a Bulletin</a></li>
            <li><a href="<?php echo base_url("user_reservation/reservations_courtone"); ?>">My Reservation
              <span class="a-links">
                <?php
                $totalreserve = $deniedreserve + $approvedreserve;
                if ($totalreserve >= 1) {
                  echo "<span>$totalreserve</span>";
                }
                else if ($approvedreserve >= 1) {
                  echo "<span>$approvedreserve</span>";
                }
                else if ($deniedreserve >= 1) {
                  echo "<span>$deniedreserve</span>";
                }
                ?>
              </span>
            </a></li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-header"><strong><a>Account</a></strong></li>
            <li><a href="<?php echo base_url("user_accounts/"); ?>" style="display: block;"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>&nbsp; Edit Account</a></li>
            <li><a href="<?php echo base_url("login/signout/"); ?>">Sign Out</a></li>
          </ul>
        </span>
      </h4>
    </div>

  </div>

  <hr class="colored-hr">
  <br>

    <div class="row">

      <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 nopadding">
        <?php if ($this->session->flashdata('accountsfeedback')){ ?>
        <div class="success-message text-center" id="prompt-message">
          <h3> Hello, <?php echo $this->session->userdata('firstname');?>. </h3>
          <p> <?php echo $this->session->flashdata('accountsfeedback'); ?>  </p><br>
          <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
        </div>
        <br>
      <?php } ?>

        <div class="header-style">
          <h1> Account Information </h1>
        </div><br>

        <div class="admin-message">

            <p> Note: Kindly call us through this number <strong>(576-4263)</strong> for additional assitance if you want to change a
              certain credential that is not editable.
            </p>

        </div>

        <br>

      </div>

      <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 nopadding">

        <div class="information">
            <div class="form-group">

              <form action="<?php echo base_url() . "user_accounts/update_useraccount/" . $this->session->userdata('userid'); ?>" method="POST">

                <fieldset id="myFieldset" disabled>

                  <h4> Account Details </h4>
                  <br>

                  <p> First Name </p>
                  <input class="form-control" id="sel1" type="text" placeholder="" value="<?php echo htmlentities($this->session->firstname) ;?>" readonly>
                  <p></p>
                  <br>

                  <p> Last Name </p>
                  <input class="form-control" id="sel1" type="text" placeholder="" value="<?php echo htmlentities($this->session->lastname) ;?>" readonly>
                  <p></p>
                  <br>

                  <p> Middle Name </p>
                  <input class="form-control" id="sel1" type="text" placeholder="" value="<?php echo htmlentities($this->session->middlename) ;?>" readonly>
                  <p></p>
                  <br>

                  <p> Birthdate </p>
                  <input name="birthdate" class="form-control" id="sel1" type="date" placeholder="" value="<?php echo $this->session->userdata('birthdate'); ?>"  pattern="[a-z A-Z ]{2,30}" title="Middle Name must include a minimum of 2 and a maximum of 30 alphabetical characters only." required>
                  <p class="error"><?php echo form_error('birthdate'); ?></p>
                  <br>

                  <p> User ID </p>
                  <input class="form-control" id="sel1" type="text" placeholder="" value="<?php echo htmlentities($this->session->username) ;?>" readonly>
                  <p></p>
                  <br>

                  <p> Password </p>
                  <input data-toggle="password" name="password" data-placement="after" class="form-control" id="user-password" type="password" placeholder="" value="<?php echo $this->session->userdata('password'); ?>">
                  <p class="error"> <?php echo form_error('password'); ?> </p>
                  <br>

                  <p>Confirm Password </p>
                  <input name="cpassword" class="form-control" id="confirm-password"  type="password" placeholder="" value="<?php echo $this->session->userdata('password'); ?>" pattern=".{8,}" title="Password should at least be 8 characters long." required>
                  <p class="error"> <?php echo form_error('cpassword'); ?>  </p>
                  <br>

                  <p>Email Address </p>
                  <input name="email" class="form-control" id="sel1" type="email" placeholder="" value="<?php echo htmlentities($this->session->userdata('email')); ?>">
                  <p class="error"> <?php echo form_error('email'); ?>  </p>
                  <?php if(!empty($message)){ ?>
                  <p class="error"> 
                     <div class="error"><?php echo $message; ?></div>
                  </p>
                <?php } ?>
                  <br>

                  <p> Address </p>
                  <input class="form-control" id="sel1" type="text" placeholder="" value="<?php echo htmlentities($this->session->address); ?>" readonly>
                  <p></p>
                  <br>

                  <p>Contact Number </p>
                  <input name="contactnum" class="form-control" id="sel1" type="text" placeholder="" value="<?php echo htmlentities($this->session->userdata('contactnum')); ?>" pattern="[-0-9()]{7,}" title="Contact number should contain numbers and parentheses only, with a minimum of 7 characters." required>
                  <p class="error"> <?php echo form_error('contactnum'); ?> </p>
                  <br><br>

                </fieldset>

                <input class="btn btn-custom-12" type="submit" id="saveButton" value="Save Changes" style="display: none;"></a>
              </form>
              <button class="btn btn-custom-12" onclick="undisableField()" id="edit-button">Edit</button>

          </div>

        </div>

      </div>

    </div>

    <br><br><br>

  </div>
