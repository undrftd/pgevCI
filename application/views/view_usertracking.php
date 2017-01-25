     <div id="page-content-wrapper">
        <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>
        <br>
        <br>

        <div class="header-style">
          <h1> Ticket Tracking </h1>
        </div>

        <br>

        <div class="row">

          <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="admin-message text-center">

              <p> Note: Below are the last five tickets you have recently submitted. In order to have a detailed history of your ticket submissions, click the "View History" button below. For further concerns, kidnly contact
                us through the number given below.
                <p> <strong> <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> &nbsp; Parkwood Greens Executive Village Administrators (Gemille): (02) 887-8888 </strong> </p>
              </p>

            </div>

            <br>

            <div class="table-responsive">

              <table class="table table-hover" id="tracking-table">

                <tr>
                    <th><br>Ticket ID</th>
                    <th><br>Request Type</th>
                    <th><br>Status</th>
                    <th><br>Set Status</th>
                </tr>

                <?php foreach($result as $row): ?>
                <tr>
                    <td><?php echo $row->request_type . "-" . $row->ticketid; ?></td>
                    <td><?php
                              if($row->request_type == 'RGC')
                              {
                                echo "Grass Cutting";
                              }
                              else if($row->request_type == 'RTC')
                              {
                                echo "Trash Collection";
                              }
                              else if($row->request_type == 'RPC')
                              {
                                echo "Pest Control";
                              }
                               else if($row->request_type == 'RMP')
                              {
                                echo "Malfunctioning Post Lights";
                              }
                              else if($row->request_type == 'RPL')
                              {
                                echo "Water Pipeline Leakages";
                              }
                               else if($row->request_type == 'RBD')
                              {
                                echo "Blocked Drainage";
                              }
                              else if($row->request_type == 'RSC')
                              {
                                echo "Electrical Short Circuit";
                              }
                               else if($row->request_type == 'RMD')
                              {
                                echo "Monthly Dues";
                              }
                              else if($row->request_type == 'ROT')
                              {
                                echo "Other";
                              }
                              else if($row->request_type == 'CTV')
                              {
                                echo "CCTV Retrieval Request";
                              }
                               else if($row->request_type == 'EFR')
                              {
                                echo "Fire";
                              }
                              else if($row->request_type == 'ERB')
                              {
                                echo "Robbery";
                              }
                              else if($row->request_type == 'EBT')
                              {
                                echo "Broken House Tube";
                              }
                              else if($row->request_type == 'ESP')
                              {
                                echo "Suspicious Person";
                              }  ?>
                    </td>
                    <td><?php if($row->status == 0) { echo "Resolved"; } else if($row->status == 1){ echo "Work in Progress"; } else if($row->status == 2){ echo "Unaddressed";}  ?></td>
                    <td><?php if($row->status == 0) { echo "Closed"; } else { echo '<button type="button" class="btn btn-custom-3">Close ticket</button>'; } ?> </td>
                </tr>
              <?php endforeach; ?>
              </table>

            </div>

            <br>
            <a href="<?php site_url();?>view_history"><button type="button" class="btn btn-custom">View History</button></a>
            <br><br>

          </div>

          <div class="clearfix visible-md-block"></div>
          <div class="clearfix visible-sm-block"></div>


        </div>

        <br>

      </div>

    </div>
