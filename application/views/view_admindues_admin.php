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
                            <p> Are you sure you want to clear this user's dues? </p><br><br>
                            <button type="submit" class="btn btn-custom-1">Yes</button>
                            <button type="button" class="btn btn-custom" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="header-style">
          <h1> Homeowner's Monthly Dues </h1>
        </div>

        <div class="portlet">

          <div class="portlet-header">

            <form class="form-inline">
                <input class="form-control" id="sel1" type="text" placeholder="Search for a homeowner...">
                <a href="admin-accounts-add.html"><button type="button" class="btn btn-custom">Search</button></a><br><br>
            </form>

          </div>

          <br>

          <div class="portlet-title">

            <div class="caption caption-red">
              <span class="caption-subject bold font-yellow-crusta uppercase not-important">
              Balance </span>
            </div>

              <ul class="nav nav-tabs">
                <li>
                  <a href="<?php echo base_url(); ?>admin_dues/homeowner">
                  Homeowner </a>
                </li>
                <li class="active">
                  <a href="<?php echo base_url(); ?>admin_dues/administrator">
                  Administrator </a>
                </li>
              </ul>

          </div>

          <div class="portlet-body">

            <div class="row">

              <div class="col-xs-12 col-sm-12 col-md-4 col-md-offset-3">
                <button type="button" class="btn btn-custom-4">Start Billing</button>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-4">
                <button type="button" class="btn btn-custom-4">Edit Monthly Dues Rates</button>
              </div>

            </div>

            <?php if ($this->session->flashdata('feedback')){ ?>
              <div class="success-message text-center" id="prompt-message">
                <h3> Hello, <?php echo $this->session->userdata('firstname');?>. </h3>
                <p> <?php echo $this->session->flashdata('feedback'); ?> </p><br>
                <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
              </div>
            <?php } ?>

            <?php if ($this->session->flashdata('fail')){ ?>
              <div class="error-message text-center" id="prompt-message">
                <h3> Hello, <?php echo $this->session->userdata('firstname');?>. </h3>
                <p> <?php echo $this->session->flashdata('fail'); ?> </p><br>
                <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
              </div>
            <?php } ?>
              </br>
            <div class="tab-content">

              <div class="tab-pane fade in active" id="portlet_tab1">

                <div class="table-responsive">

                  <table class="table table-hover" id="tracking-table">

                    <tr>
                        <th><br>Homeowner's Name</th>
                        <th class="not-important"><br>Address</th>
                        <th class="not-important"><br>Monthly Dues</th>
                        <th class="not-important"><br>Arrears</th>
                        <th><br>Total Balance</th>
                        <th><br>Months Unpaid </th>
                        <th><br>Action</th>
                    </tr>

                    <?php foreach ($admin as $row):?>
                    <tr>
                        <td><?php echo $row->firstname . " " . $row->lastname; ?></td>
                        <td class="not-important"><?php echo $row->address; ?></td>
                        <td class="not-important"><?php echo "₱" . " " . $row->monthly_dues; ?></td>
                        <td class="not-important"><?php echo "₱" . " " . $row->arrears; ?></td>
                        <td><?php echo "₱" . " "; echo number_format($row->arrears + $row->monthly_dues, 2, '.', '');  ?></td>
                        <td>1</td>
                        <td class="action-button">
                          <a href="admin-dues-edit.html"><button type="button" class="btn btn-custom-2">Edit</button></a>
                          <button type="button" class="btn btn-custom-3" data-toggle="modal" data-target="#delete-modal"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>  Clear Dues </button>
                        </td>
                    </tr>
                  <?php endforeach; ?>

                  </table>
                  <center><div id="pagination-link"><?php echo $adminlinks; ?></div></center>

                  </table>

                </div>

              </div>

            </div>

          </div>

        </div>

        <br><br>

        <br><br>

          </div>

        </div>

        <br>

      </div>
