     <div id="page-content-wrapper">
        <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>
        <br>
        <br>

        <div class="header-style">
          <h1> Ticket Tracking </h1>
        </div>

        <br><br>

        <div class="row">

          <div class="col-xs-12 col-sm-12 col-md-5 col-md-offset-1">

            <div class="table-responsive">

              <table class="table table-hover" id="tracking-table">

                <tr>
                    <th><br>Ticket ID</th>
                    <th><br>Request Type</th>
                    <th><br>Status</th>
                </tr>

                <?php foreach($result as $row): ?>
                <tr>
                    <td><?php echo $row->request_type . "-" . $row->ticketid; ?></td>
                    <td><?php 
                              if($row->request_type == 'GC') 
                              {
                                echo "Grass Cutting"; 
                              } 
                              else if($row->request_type == 'TC')
                              { 
                                echo "Trash Collection"; 
                              } 
                              else if($row->request_type == 'PC')
                              { 
                                echo "Pest Control";
                              }
                               else if($row->request_type == 'MP')
                              { 
                                echo "Malfunctioning Post Lights"; 
                              } 
                              else if($row->request_type == 'PL')
                              { 
                                echo "Water Pipeline Leakages";
                              }
                               else if($row->request_type == 'BD')
                              { 
                                echo "Blocked Drainage"; 
                              } 
                              else if($row->request_type == 'SC')
                              { 
                                echo "Electrical Short Circuit";
                              }
                               else if($row->request_type == 'MD')
                              { 
                                echo "Monthly Dues"; 
                              } 
                              else if($row->request_type == 'OT')
                              { 
                                echo "Other";
                              }
                               else if($row->request_type == 'FR')
                              { 
                                echo "Fire"; 
                              } 
                              else if($row->request_type == 'RB')
                              { 
                                echo "Robbery";
                              }
                              else if($row->request_type == 'BT')
                              { 
                                echo "Broken House Tube"; 
                              } 
                              else if($row->request_type == 'SP')
                              { 
                                echo "Suspicious Person";
                              }  ?>
                                

                              </td>
                    <td><?php if($row->status == 0) { echo "Resolved"; } else if($row->status == 1){ echo "Work in Progress"; } else if($row->status == 2){ echo "Unaddressed";}  ?></td>
                </tr>
              <?php endforeach; ?>
              </table>

            </div>

            <br>
            <a href="user-ticket-history.html"><button type="button" class="btn btn-custom">View History</button></a>
            <br><br>

          </div>

          <div class="clearfix visible-md-block"></div>
          <div class="clearfix visible-sm-block"></div>

          <div class="col-xs-12 col-sm-12 col-md-3 col-md-offset-1">

            <div class="information">

                <div class="form-group">

                  <h4> For further concerns, please contact: </h4>
                  <input class="form-control" id="sel1" type="text" placeholder="887-8888" readonly>

              </div>

            </div>
            <br>
            <br>

          </div>


        </div>

        <br>

      </div>

    </div>