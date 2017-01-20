    <div id="page-content-wrapper">
      <a href="#menu-toggle" class="btn btn-default btn-sm" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</a>
      <br>
      <br>

      <div class="header-style">
        <h1> Create a Ticket </h1>
      </div>

      <br>

        <div class="admin-message text-center">

          <p> Dear <?php echo $this->session->userdata('firstname'); ?>,<br><br>
            If you have any requests or complaints in our community, kindly choose between the provided options below this <br>message and we are going to find a solution
            for it.<br><br>
            Many thanks, <br>
            Parkwood Greens Executive Village Administrators
          </p>

        </div>

        <br><br><br>

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-4">

              <div class="information">
                  <p> Requests and Complaints </p>
              </div>
              </a>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-4">

              <div class="information">
                  <p> CCTV Retrieval Request</p>
              </div>
              </a>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-4">
              <div class="information" onclick="myFunction()">
                <p> Emergency Ticket</p>
              </div>

            </div>

      </div>

    </div>