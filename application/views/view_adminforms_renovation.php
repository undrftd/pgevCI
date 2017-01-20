<div id="page-content-wrapper">

    <a href="#menu-toggle" class="btn btn-default btn-sm" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</a>
    <br>
    <br>

    <div class="modal fade" id="delete-modal" role="dialog">

        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="signin">
                    <div class="modal-body text-center">
                        <p> <?php echo $this->session->userdata('firstname');?>, are you sure you want to remove this form request? </p><br>
                        <p class="warning-message"> WARNING: The form request will be lost. Please check if the form has been downloaded before deleting. </p><br>
                        <a class ="deleteclass"><button type="submit" class="btn btn-custom-1">Yes</button></a>
                        <button type="button" class="btn btn-custom" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="header-style">
      <h1> Homeowner's Association Request Forms </h1>
    </div>

    <div class="portlet">

      <div class="portlet-header">

        <form action="<?php echo base_url();?>admin_forms/search_renovation" method="GET">
          <div class="form-group" id="search-group">
            <input class="form-control" name="search" id="sel1" type="text" placeholder="Search for a document...">
              <button type="submit" class="btn btn-custom-8"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
            </input>
          </div>
        </form>

        <br>

      </div>

      <div class="portlet-title">

        <ul class="nav nav-tabs">
          <li>
            <a href="<?php echo base_url(); ?>admin_forms/car_sticker">
            Car Sticker </a>
          </li>
          <li>
            <a href="<?php echo base_url(); ?>admin_forms/work_permit">
            Work Permit </a>
          </li>
          <li class="active">
            <a href="<?php echo base_url(); ?>admin_forms/renovation">
            Renovation </a>
          </li>
        </ul>

      </div>

      <div class="portlet-body">

        <div class="tab-content">

          <div class="tab-pane fade in active" id="portlet_tab1">

            <p class="ticket-summary"> Total: <?php echo $count ?> request<?php if($count <= 1) { echo ' '; } else { echo 's ';}?> for Renovation </p>

            <div class="table-responsive">

              <table class="table table-hover" id="tracking-table">

                <tr>
                    <th><br>Homeowner's Name</th>
                    <th><br>Address</th>
                    <th><br>Contact Number</th>
                    <th><br>Status</th>
                    <th><br>Action</th>
                </tr>

                <?php foreach ($renovation as $row): ?>
                <tr>
                    <td><?php echo $row->firstname . " " . $row->lastname?></td>
                    <td><?php echo $row->address?></td>
                    <td><?php echo $row->contactnum?></td>
                    <td><?php if($row->status == 1){ echo "Not Downloaded"; } else { echo "Downloaded"; } ?></td>
                    <td class="action-button">
                      <a href="<?php echo base_url() . "admin_forms/download_renovation/" . $row->formid; ?>"><button type="button" class="btn btn-custom-2">Download</button></a>
                      <button type="button" class="btn btn-custom-3" data-href="<?php echo base_url() . 'admin_forms/delete_renovation/' . $row->formid; ?>" data-toggle="modal" data-target="#delete-modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  Delete </button>
                    </td>
                </tr>
              <?php endforeach;?>
              </table>
             <center><div id="pagination-link"><?php echo $renovationlinks; ?></div></center>
            </div>

        </div>

      </div>

    </div>

  </div>

</div>
