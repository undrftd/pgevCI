<div id="page-content-wrapper">
  <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>

  <br><br>

  <div class="modal fade" id="delete-modal" role="dialog">

      <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
              <div class="signin">
                  <div class="modal-body text-center">
                      <p> Are you sure you want to delete this ticket? </p><br><br>
                      <button type="submit" class="btn btn-custom-1">Yes</button>
                      <button type="button" class="btn btn-custom" data-dismiss="modal">Cancel</button>
                  </div>
              </div>
          </div>

      </div>
  </div>

  <div class="modal fade" id="view-message" role="dialog">

      <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Message</h4>
            </div>

            <div class="modal-body">
              <p> <?php echo $result->content; ?> </p>
            </div>

            <div class="modal-footer">
              <br>
              <button type="button" class="btn btn-custom-6" data-dismiss="modal">X &nbsp;Close</button>
            </div>

          </div>

      </div>

  </div>

  <div class="header-style">
    <h1> Ticket Details </h1>
  </div>

  <br>

    <div class="row">

      <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-1 nopadding">

        <div class="information">

            <div class="form-group">

              <h4> Ticket Information </h4>
              <br>
              <p> Ticket ID </p>
              <input class="form-control" id="sel1" type="text" value="<?php echo $result->request_type . " - " . $result->ticketid; ?>" readonly>

              <br>

              <p> Name </p>
              <input class="form-control" id="sel1" type="text" value="<?php echo $result->firstname . " " . $result->lastname; ?>" readonly>

              <br>

              <p> Contact Number </p>
              <input class="form-control" id="sel1" type="text" value="<?php echo $result->contactnum; ?>" readonly>

              <br>

              <p> Type of Request </p>
              <input class="form-control" id="sel1" type="text" value="<?php
                          if($result->request_type == 'RGC')
                          {
                            echo "Grass Cutting";
                          }
                          else if($result->request_type == 'RTC')
                          {
                            echo "Trash Collection";
                          }
                          else if($result->request_type == 'RPC')
                          {
                            echo "Pest Control";
                          }
                           else if($result->request_type == 'RMP')
                          {
                            echo "Malfunctioning Post Lights";
                          }
                          else if($result->request_type == 'RPL')
                          {
                            echo "Water Pipeline Leakages";
                          }
                           else if($result->request_type == 'RBD')
                          {
                            echo "Blocked Drainage";
                          }
                          else if($result->request_type == 'RSC')
                          {
                            echo "Electrical Short Circuit";
                          }
                           else if($result->request_type == 'RMD')
                          {
                            echo "Monthly Dues";
                          }
                          else if($result->request_type == 'ROT')
                          {
                            echo "Other";
                          }
                          else if($result->request_type == 'CTV')
                          {
                            echo "CCTV Retrieval Request";
                          }
                           else if($result->request_type == 'EFR')
                          {
                            echo "Fire";
                          }
                          else if($result->request_type == 'ERB')
                          {
                            echo "Robbery";
                          }
                          else if($result->request_type == 'EBT')
                          {
                            echo "Broken House Tube";
                          }
                          else if($result->request_type == 'ESP')
                          {
                            echo "Suspicious Person";
                          }  ?>" readonly>
              <br>

              <p> Status </p>
              <select name ="status" class="form-control" id="sel1">
                <option value ="" selected hidden>Set Status</option>
                <option value ="1">Work in Progress</option>
                <option value="0">Closed</option>
              </select>

              <br>

              <p> Date Created </p>
              <input class="form-control" id="sel1" type="text" value="<?php echo date("m/d/Y g:i A", $result->date_requested); ?>" readonly>

              <br>

              <p> Date and Time Requested </p>
              <input class="form-control" id="sel1" type="text" value="<?php if($result->request_type == 'CTV'){ echo $result->date_cctv; } else { echo " "; } ?>" readonly="">

              <p class="help-block">Exclusively for CCTV Retrieval Request</p>

          </div>

        </div>

      </div>

      <div class="col-xs-12 col-sm-12 col-md-4 nopadding">

        <div class="information">

          <div class="form-group">

            <p> Message </p>
            <button type="button" class="btn btn-custom-6" data-toggle="modal" data-target="#view-message">View</button>

            <br><br>

            <p> Attachment </p>
            <button type="button" class="btn btn-custom-11">Download</button>

            <br><br>

            <hr>

            <br>

            <button type="button" class="btn btn-custom-7" data-toggle="modal" data-target="#delete-modal">Delete</button>

            <br><br>

            <a href="admin-tickets.html"><button type="button" class="btn btn-custom-5">Save changes</button></a>

          </div>

        </div>

      </div>

    </div>

    <br>

  </div>
