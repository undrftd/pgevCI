<div id="page-content-wrapper">

  <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>

  <span class="dropdown sign-out">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="dot-style">&#8226;</span> &nbsp;Hello, <?php echo $this->session->userdata('firstname'); ?><span class="badge"> <?php echo $count + $reserve + $forms;?> </span></a>
    <ul class="dropdown-menu pull-right">
      <li class="dropdown-header"><strong><a>Activities</a></strong></li>
      <li><a href="<?php echo base_url("admin_announcements/post_announcements"); ?>">+ &nbsp;Post an Announcement</a></li>
      <li><a href="<?php echo base_url("admin_ticketing/new_tickets"); ?>">New Tickets &nbsp;<span class="badge"> <?php echo $count; ?> </span> </a></li>
      <li><a href="<?php echo base_url("admin_reservation/court_one"); ?>">New Reservations &nbsp;<span class="badge"> <?php echo $reserve; ?> </span> </a></li>
      <li><a href="<?php echo base_url("admin_forms/car_sticker"); ?>">New Online Application &nbsp;<span class="badge"> <?php echo $forms; ?> </span> </a></li>
      <li role="separator" class="divider"></li>
      <li class="dropdown-header"><strong><a>Account</a></strong></li>
      <li><a href="<?php echo base_url("admin_profile/"); ?>"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>&nbsp; Edit Account</a></li>
      <li><a href="<?php echo base_url("login/signout/"); ?>">Sign Out</a></li>
    </ul>
  </span>

  <hr class="colored-hr">
  <br><br>

  <div class="header-style">
    <h1> Ticketing</h1>
  </div><br>

  <div class="portlet nopadding">

    <div class="portlet-header">

    <form action="<?php echo base_url();?>admin_ticketing/search_closedtickets" method="GET">
      <div id="search-group">
        <input class="form-control" name="search" id="sel1" type="text" placeholder="Search for a ticket...">
          <button type="submit" class="btn btn-custom-8"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
        </input>
      </div>
    </form>
    <br><br>

    </div>

    <div class="portlet-title">

      <ul class="nav nav-tabs">
        <li>
					<a href="<?php echo site_url()?>admin_ticketing/new_tickets">
				  New <span class="badge"> <?php echo $count;?> </span> </a>
				</li>
        <li>
          <a href="<?php echo site_url(); ?>admin_ticketing/progress_tickets">
          In Progress </a>
        </li>
        <li class="active">
          <a href="<?php echo site_url(); ?>admin_ticketing/closed_tickets">
          Closed </a>
        </li>
      </ul>

    </div>

     <?php if ($this->session->flashdata('closedticketsuccess')){ ?>
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
                <th><br>Date Closed</th>
                <th><br>Resolution Time</th>
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
                  <td><?php echo date("m/d/Y g:i A", $row->date_closed); ?></td>
                  <td><?php echo timespan($row->date_opened, $row->date_closed, 3); ?></td>
                  <td class="action-button">
                    <a href="<?php echo site_url() . "admin_ticketing/ticketdetails/" . $row->ticketid; ?>"><button type="button" class="btn btn-custom-2" aria-hidden="true">View Details</button>
                  </td>
              </tr>
            <?php endforeach; ?>
            </table>
             <center><?php echo $closedticketlinks; ?></center>
          </div>

        </div>

      </div>

    </div>

  </div>

</div>
