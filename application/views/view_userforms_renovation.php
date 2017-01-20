	<div id="page-content-wrapper">

    <a href="#menu-toggle" class="btn btn-default btn-sm" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</a>
    <br>
    <br>

    <div class="header-style">
      <h1> Homeowner's Association Forms </h1>
    </div>

    <br>

    <div class="portlet">

			<div class="portlet-title">

			<ul class="nav nav-tabs">

	 	  	<li>
	        <a href="<?php echo base_url(); ?>user_forms/car_sticker">
	        Car Sticker </a>
	      </li>

	      <li>
	        <a href="<?php echo base_url(); ?>user_forms/work_permit">
	        Work Permit </a>
	      </li>

	      <li class="active">
	        <a href="<?php echo base_url(); ?>user_forms/renovation">
	        Renovation </a>
	      </li>

				</ul>

			  </div>

		  <div class="portlet-body">

				<?php if ($this->session->flashdata('renovatesuccess')){ ?>
		      <div class="success-message text-center" id="prompt-message">
		        <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3>
		        <p> <?php echo $this->session->flashdata('renovatesuccess'); ?></p><br>
		        <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
		      </div>
		    <?php } ?>

		    <?php if ($this->session->flashdata('renovatefail')){ ?>
		      <div class="error-message text-center" id="prompt-message">
		        <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3>
		        <p> <?php echo $this->session->flashdata('renovatefail'); ?></p><br>
		        <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
		      </div>
		    <?php } ?>
				<br>

			<div class="tab-content">

				<div class="tab-pane fade in active" id="portlet_tab1">

					<div class="announcement-message">
	          <p> If you are requesting for a Renovation Form, kindly download the form we provided in this <?php $filename='Renovation.docx'; ?> <a href="<?php echo base_url(); ?>user_forms/download/<?php echo $filename; ?>">link</a> and answer it before uploading below. <span class="warning-user"> Please avoid uploading multiple form requests. Doing so will place you behind the queue. </span> </p><br>
	          <p> Kindly attach the Renovation Form you recently answered then we will contact you as soon as we have processed
	          your request. The pick-up location will be at the Parkwood Greens Executive Village Administration building located at Phase 2. Thank you.</p><br>
					</div>
            <div class="form-group">

              <h4>Attach file</h4>

              <?php echo form_open_multipart('user_forms/upload_renovation');?>
              <input type="file" name="file" id="exampleInputFile">
              <p class="help-block">Formats accepted: .doc, .docx, .pdf, .png, .jpg  </p>


						</div>

						<br><br>

            <button name ="upload" type="submit" class="btn btn-custom">Send</button></a><br>

          </form>

				</div>

			</div>

		</div>

	</div>

</div>
