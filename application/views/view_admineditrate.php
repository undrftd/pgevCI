   <div id="page-content-wrapper">
        <a href="#menu-toggle" class="btn btn-default btn-sm" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</a>
        <br>

      <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 nopadding">

          <div class="header-style">
            <h1> Edit Dues </h1>
          </div><br>

          <div class="admin-message">

              <p> Note: Before editing another user's account, be sure to inform them of what you are about to change for them to be aware.
              </p>

          </div>

        </div>

        <div class="clearfix visible-md-block"></div>
        <div class="clearfix visible-sm-block"></div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 nopadding">

        <?php if ($this->session->flashdata('ratefeedback')){ ?>
          <div class="success-message text-center" id="prompt-message">
            <h3> Hello, <?php echo $this->session->userdata('firstname'); ?>. </h3>
            <p> <?php echo $this->session->flashdata('ratefeedback'); ?>  </p><br>
            <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
          </div>
        <?php } ?>

        <?php if($this->session->flashdata('ratefail')){ ?>
          <div class="error-message text-center" id="prompt-message">
            <h3> Hello, <?php echo $this->session->userdata('firstname'); ?> </h3>
            <p> <?php echo $this->session->flashdata('ratefail'); ?> </p><br>
            <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
          </div>
        <?php } ?>

          <br>

          <div class="information">
            <form action="<?php echo base_url();?>admin_dues/updaterates" method="POST">
              <fieldset id="myFieldset" disabled>
              <div class="form-group">
                <h4> Dues details </h4>
                    <br>
                    <p> Security Fee (₱) </p>
                    <input name ="securityfee" class="txt form-control" id="sel1" type="number" step="0.01" placeholder="" value= "<?php echo $rate->securityfee; ?>">
                    <p class="error"><?php echo form_error('securityfee'); ?> </p>
                    <br>

                    <p> Association Fee (₱) </p>
                    <input name="assocfee" class="txt form-control" id="sel1" type="number" step="0.01" placeholder="" value="<?php echo $rate->assocfee; ?>">
                    <p class="error"><?php echo form_error('assocfee'); ?></p>
                    <br>

                    <p> Total Monthly Dues Rate (₱) </p>
                    <input name="total" class="form-control" id="sum" type="number"  placeholder="" value="<?php echo number_format($rate->securityfee + $rate->assocfee, 2, '.', ''); ?>" readonly>
                    <p class="error"><?php echo form_error('total'); ?></p>
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
