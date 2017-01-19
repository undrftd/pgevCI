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
                            <p> Are you sure you want to remove this from the list? </p><br><br>
                            <button type="submit" class="btn btn-custom-1">Yes</button>
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

          <form class="form-inline">
            <div class="form-group">
              <input class="form-control" id="sel1" type="text" placeholder="Any category">
            </div>
            <a href="admin-tickets.html"><button type="button" class="btn btn-custom">Search</button></a><br><br><br>
          </form>

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
              <li class ="active">
                <a href="<?php echo base_url(); ?>admin_forms/renovation">
                Renovation </a>
              </li>
            </ul>

          </div>

          <div class="portlet-body">

            <div class="tab-content">

              <div class="tab-pane fade in active" id="portlet_tab1">

                <p> Total: 3 Requests for Renovation </p>

                <div class="table-responsive">

                  <table class="table table-hover" id="tracking-table">

                    <tr>
                        <th><br>Homeowner's Name</th>
                        <th><br>Address</th>
                        <th><br>Contact Number</th>
                        <th><br>Action</th>
                    </tr>

                     <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="action-button">
                          <a href="#"><button type="button" class="btn btn-custom-2">Download</button></a>
                          <button type="button" class="btn btn-custom-3" data-toggle="modal" data-target="#delete-modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  Delete </button>
                        </td>
                    </tr>

                  </table>

                </div>

            </div>

          </div>

        </div>