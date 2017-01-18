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
              <li class="active">
								<a href="<?php echo base_url(); ?>user_forms/car_sticker">
								Car Sticker </a>
							</li>
			              
	            <li>
                <a href="<?php echo base_url(); ?>user_forms/work_permit">
                Work Permit </a>
	            </li>
	              
	            <li>
                <a href="<?php echo base_url(); ?>user_forms/renovation">
                Renovation </a>
	            </li>

					</div>

					<div class="portlet-body">

						<div class="tab-content">

							<div class="tab-pane fade in active" id="portlet_tab1">
                <p> If you are requesting for a Car Sticker Form, kindly download the form we provided in this <?php $filename='Car_Sticker.docx'; ?> <a href="<?php echo base_url(); ?>user_forms/download/<?php echo $filename; ?>">link</a> and answer it before uploading below. </p><br>
                <p> Kindly attach the Car Sticker Form you recently answered then we will contact you as soon as we have processed
                your request. The pick-up location will be at the Parkwood Greens Executive Village Administration building located at Phase 2. Thank you.</p><br>
                <br>
               
                <?php echo $this->session->flashdata('msg'); ?>
                
                <div class="form-group">
                  <p>Attach file</p>

                  <form action="<?php echo base_url() . 'user_forms/do_upload'; ?>" method="POST" enctype="multipart/form-data">
                  <input type="file" name="file" size="20" />
                  <p class="help-block">Formats accepted: .png, .jpg, .pdf  </p>
                </div> <br>

                <button name = "upload" type="submit" class="btn btn-custom">Send</button></a> <br>
                
                </form>
							
              </div>

            </div>

				  </div>

				</div>

				