<div id="page-content-wrapper">
  <a href="#menu-toggle" class="btn btn-default btn-sm" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</a>
  <br><br>

  <div class="row">

      <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 nopadding">

        <div class="header-style">
          <h1> Create a Ticket </h1>
        </div>

        <div class="admin-message text-center">

          <p> Note: <?php echo $this->session->userdata('firstname'); ?>, If you have any requests or complaints in our community, kindly choose between the provided options below this message and we are going to find a solution
            for it.
          </p>

        </div>

        <div class="row">

            <div class="col-xs-12 nopadding">

              <div class="ticket-type text-center">
                  <h4> Requests and Complaints </h4><hr>
                  <p> This option is for requests or complaints which can be found on this list: Lost and Found, Grass Cutting, Garbage Collecting, Pest Control, Malfunctioning Post Lights, Water Leakages, Blocked Drainage, Electrical Short Circuit, and Monthly Dues. </p><br>
                  <button type="button" class="btn btn-custom-2" id="close-button">+ Create</button><br><br>
              </div>
              </a>

            </div>

            <div class="col-xs-12 nopadding">

              <div class="ticket-type text-center">
                  <h4> CCTV Retrieval Request</h4><hr>
                  <p> This option is for homeowners who want a copy of a their preferred CCTV footage. </p><br>
                  <button type="button" class="btn btn-custom-2" id="close-button">+ Create</button><br><br>
              </div>
              </a>

            </div>

            <div class="col-xs-12 nopadding">
              <div class="ticket-type text-center" onclick="myFunction()">
                <h4> Emergency Ticket</h4><hr>
                <p> This option is solely used for emergencies that may cause trouble to you or within the community. </p><br>
                <button type="button" class="btn btn-custom-10" id="close-button">+ Create</button><br><br>
              </div>

            </div>

      </div>

    </div>

  </div>

</div>
