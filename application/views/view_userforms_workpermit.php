  <div id="page-content-wrapper">

    <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>

    <span class="dropdown sign-out">
      <span class="mobile-title">Parkwood Greens</span>
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <span class="user-account"><i class="material-icons md-26 gray400">more_vert</i></span>
        <span class="main-title"><span class="dot-style">&#8226;</span> &nbsp;Hello, <?php echo $this->session->userdata('firstname'); ?></span>
      </a>
      <ul class="dropdown-menu pull-right">
        <li class="dropdown-header"><strong><a>Activities</a></strong></li>
        <li><a onclick="myFunction()">Create an Emergency Ticket</a></li>
        <li><a href="<?php echo base_url("user_announcements/post_bulletin"); ?>">Post a Bulletin</a></li>
        <li><a href="<?php echo base_url("user_reservation/reservations_courtone"); ?>">View My Reservation</a></li>
        <li role="separator" class="divider"></li>
        <li class="dropdown-header"><strong><a>Account</a></strong></li>
        <li><a href="<?php echo base_url("user_accounts/"); ?>" style="display: block;"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>&nbsp; Edit Account</a></li>
        <li><a href="<?php echo base_url("login/signout/"); ?>">Sign Out</a></li>
      </ul>
    </span>

    <hr class="colored-hr">
    <br><br>

    <div class="header-style">
      <h1> Homeowner's Association Forms </h1>
    </div>

    <br>

    <div class="portlet nopadding">

      <div class="portlet-title">

        <ul class="nav nav-tabs">
          <li>
            <a href="<?php echo base_url(); ?>user_forms/car_sticker">
            Car Sticker </a>
          </li>

          <li class ="active">
            <a href="<?php echo base_url(); ?>user_forms/work_permit">
            Work Permit </a>
          </li>

          <li>
            <a href="<?php echo base_url(); ?>user_forms/renovation">
            Renovation </a>
          </li>
        </ul>

      </div>

      <div class="portlet-body">

        <?php if ($this->session->flashdata('permitsuccess')){ ?>
		      <div class="success-message text-center" id="prompt-message">
		        <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3>
		        <p> <?php echo $this->session->flashdata('permitsuccess'); ?></p><br>
		        <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
		      </div>
		    <?php } ?>

		    <?php if ($this->session->flashdata('permitfail')){ ?>
		      <div class="error-message text-center" id="prompt-message">
		        <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3>
		        <p> <?php echo $this->session->flashdata('permitfail'); ?></p><br>
		        <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
		      </div>
		    <?php } ?>
        <br>

        <div class="tab-content">

          <div class="tab-pane fade in active" id="portlet_tab1">
            <div class="announcement-message">
              <p> If you are requesting for a Work Permit Form, kindly download the form we provided and answer it before uploading below. <span class="warning-user"> Please avoid uploading multiple form requests. Doing so will place you behind the queue. </span> Kindly attach the Work Permit Form you recently answered then we will contact you as soon as we have processed
                your request. The pick-up location will be at the Parkwood Greens Executive Village Administration building located at Phase 2. Thank you. If it does not download after a few seconds, click <?php $filename='Renovation.docx'; ?> <a href="<?php echo base_url(); ?>user_forms/download/<?php echo $filename; ?>" class="a-links">here</a>.</p><br>
            </div>

            <div class="court-message">
              <p> <?php $filename='Work_Permit.docx'; ?> <a href="<?php echo base_url(); ?>user_forms/download/<?php echo $filename; ?>" class="a-links"> Download Work Permit Form </a>
              </p>
              <div class="form-group">
                <p>Attachment Details</p>

                <div id="fileList"></div>
                <p class="help-block">Formats accepted: .doc, .docx, .pdf, .png, .jpg </p>
              </div>
            </div>

            <hr>

            <?php echo form_open_multipart('user_forms/upload_workpermit');?>

              <div class="form-group">

                <div class="user-buttons">

                  <input type="file" name="file" id="file" style="display: none;" multiple onchange="javascript:updateList()" />
                  <button type="button" onclick="document.getElementById('file').click();" class="btn btn-custom-1"><i class="material-icons">attach_file</i></button></a>
                  <button name ="upload" type="submit" class="btn btn-custom">Send</button></a>

                </div>

              </div>

            <?php echo form_close(); ?>


          </div>

        </div>

      </div>

    </div>

  </div>
