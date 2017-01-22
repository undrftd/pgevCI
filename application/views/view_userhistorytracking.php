     <div id="page-content-wrapper">
        <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>
        <br>
        <br>

        <div class="header-style">
          <h1> Ticket History </h1>
        </div>

        <br>

            <div class="table-responsive">

              <table class="table table-hover" id="tracking-table">

                <tr>
                    <th><br>Ticket ID</th>
                    <th><br>Status</th>
                    <th><br>Date Created</th>
                    <th><br>Date Resolved</th>
                </tr>

            <?php foreach($result as $row): ?>
                <tr>
                    <td><?php echo $row->request_type . "-" . $row->ticketid; ?> </td>
                    <td><?php if($row->status == 0) { echo "Resolved"; } else if($row->status == 1){ echo "Work in Progress"; } else if($row->status == 2){ echo "Unaddressed";}  ?></td>
                    <td><?php echo unix_to_human($row->date_requested); ?> </td>
                    <td><?php if($row->status != 0) { echo "Awaiting Resolution"; } else { echo unix_to_human($row->date_closed); } ?></td>
                </tr>
            <?php endforeach; ?>

              </table>

            </div>
             <center><?php echo $ticketlinks; ?></center>

            <br>
            <a href="<?php site_url(); ?>recent"><button type="button" class="btn btn-custom">Recent Tickets</button></a>
            <br><br>

          </div>

        </div>

        <br>

      </div>

    </div>
