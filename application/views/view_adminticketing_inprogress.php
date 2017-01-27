<div id="page-content-wrapper">

  <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>

  <br><br><br>

  <div class="modal fade" id="delete-modal" role="dialog">

    <div class="modal-dialog">
        <!-- Modal content-->
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Delete</h4>
        </div>

        <br>

        <div class="signin">

          <div class="modal-body text-center">
              <p> Are you sure you want to remove this from the list? </p><br>
              <button type="submit" class="btn btn-custom-1">Yes</button>
              <button type="button" class="btn btn-custom" data-dismiss="modal">Cancel</button>
          </div>

        </div>

      </div>

    </div>

  </div>

  <div class="header-style">
    <h1> Ticketing</h1>
  </div>

  <div class="portlet">

    <div class="portlet-header">

    </div>

    <div class="portlet-title">

      <ul class="nav nav-tabs">
        <li>
          <a href="<?php echo site_url()?>admin_ticketing/new_tickets">
          New <span class="badge"> <?php echo $count;?> </span> </a>
        </li>
        <li class="active">
          <a href="<?php echo site_url(); ?>admin_ticketing/progress_tickets">
          In Progress </a>
        </li>
        <li>
          <a href="<?php echo site_url(); ?>admin_ticketing/closed_tickets">
          Closed </a>
        </li>
      </ul>

    </div>

    <?php if ($this->session->flashdata('progressticketsuccess')){ ?>
      <div class="success-message text-center" id="prompt-message">
        <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3>
        <p> <?php echo $this->session->flashdata('progressticketsuccess'); ?> </p><br>
        <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
      </div>
    <?php } ?>

    <br>

    <div class="portlet-body">

      <div class="tab-content">

        <div class="tab-pane fade in active" id="portlet_tab1">

          <div class="table-responsive">

            <table class="table table-hover" id="tracking-table">

              <tr>
                <th><br>Ticket ID</th>
                <th><br>Type of Request</th>
                <th><br>Homeowner's Name</th>
                <th><br>Date Created</th>
                <th><br>Homeowner Feedback </th>
                <th><br>Action</th>
              </tr>

              <?php foreach($result as $row): ?>
              <tr>
                  <td><?php echo $row->request_type . "-" .$row->ticketid; ?></td>
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
                  <td><?php echo $row->firstname . " " . $row->lastname; ?></td>
                  <td><?php echo date("m/d/Y g:i A", $row->date_requested); ?></td>
                  <td><?php if($row->homeowner_feedback == 1) { echo "Request Unfinished"; } else { echo "Request Finished"; } ?></td>
                  <td class="action-button">
                    <a href="<?php echo site_url() . "admin_ticketing/ticketdetails/" . $row->ticketid; ?>">
                    <button type="button" class="<?php if($row->request_type == 'EFR' || $row->request_type == 'ERB'|| $row->request_type == 'EBT' || $row->request_type == 'ESP') { echo "btn btn-custom-9"; } else { echo "btn btn-custom-2"; } ?> ">Open</button></a>
                    <button type="button" class="btn btn-custom-3" data-toggle="modal" data-target="#delete-modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> &nbsp;Delete </button>
                  </td>
              </tr>
            <?php endforeach; ?>
            </table>
             <center><?php echo $progressticketlinks; ?></center>
          </div>

        </div>

      </div>

    </div>

  </div>

</div>
