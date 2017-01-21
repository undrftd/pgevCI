<div id="page-content-wrapper">
        <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>
        <br>
        <br>

        <div class="modal fade" id="clear-modal" role="dialog">

            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="signin">
                        <div class="modal-body text-center">
                            <p> <?php echo $this->session->userdata('firstname');?>, are you sure you want to clear this user's dues? </p><br>
                            <p class="warning-message"> WARNING: All records will be lost. This procedure cannot be undone. </p><br>
                            <a href="<?php echo base_url();?>admin_dues/clearrecords_admin"><button type="submit" class="btn btn-custom-1">Yes</button></a>
                            <button type="button" class="btn btn-custom" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="modal fade" id="start-modal" role="dialog">

            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="signin">
                        <div class="modal-body text-center">
                            <p> <?php echo $this->session->userdata('firstname');?>, are you sure you want to start billing the administrators? </p><br>
                            <a href="<?php echo base_url(); ?>admin_dues/billstart_admin"><button type="submit" class="btn btn-custom-1">Yes</button></a>
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

            <form action="<?php echo base_url();?>admin_dues/search_admin/" method="GET">
              <div id="search-group">
                <input class="form-control" name="search" id="sel1" type="text" placeholder="Search for a user...">
                  <button type="submit" class="btn btn-custom-8"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                </input>
              </div>
            </form>

            <br>

          <?php if ($this->session->flashdata('duesfeedback')){ ?>
            <div class="success-message text-center" id="prompt-message">
              <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3>
              <p> <?php echo $this->session->flashdata('duesfeedback'); ?> </p><br>
              <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button>
            </div>
          <?php } ?>

          <?php if ($this->session->flashdata('duesfail')){ ?>
            <div class="error-message text-center" id="prompt-message">
              <h3> Hello, <?php echo $this->session->userdata('firstname');?>.</h3>
              <p> <?php echo $this->session->flashdata('duesfail'); ?> </p><br>
              <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button>
            </div>
          <?php } ?>

          </div>
          <br>

          <div class="portlet-title">

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

              <div class="dues-buttons">

                <div class="col-xs-12 col-sm-4 col-md-4">
                  <button type="button" class="btn btn-custom-4" data-toggle="modal" data-target="#start-modal">Start Billing</button>
                </div>

                <div class="col-xs-12 col-sm-4 col-md-4">
                  <a href="<?php echo base_url();?>admin_dues/viewrates"> <button type="button" class="btn btn-custom-4">Edit Rates</button> </a>
                </div>

                <div class="col-xs-12 col-sm-4 col-md-4">
                  <button type="button" class="btn btn-custom-4" data-toggle="modal" data-target="#clear-modal">Clear Records</button>
                </div>

              </div>

            </div>
            </br>
            <div class="tab-content">

              <div class="tab-pane fade in active" id="portlet_tab1">

                <div class="table-responsive">

                  <table class="table table-hover" id="tracking-table">

                    <tr>
                        <th><br>Homeowner's Name</th>
                        <th class="not-important"><br>Address</th>
                        <th><br>Monthly Dues</th>
                        <th><br>Arrears</th>
                        <th><br>Total Balance</th>
                        <th><br>Month(s) Unpaid </th>
                        <th><br>Action</th>
                    </tr>

                    <?php foreach ($admin as $row):?>
                    <tr>
                        <td><?php echo $row->firstname . " " . $row->lastname; ?></td>
                        <td class="not-important"><?php echo $row->address; ?></td>
                        <td><?php echo "₱" . " " . $row->monthly_dues; ?></td>
                        <td><?php echo "₱" . " " . $row->arrears; ?></td>
                        <td><?php echo "₱" . " "; echo number_format($row->arrears + $row->monthly_dues, 2, '.', '');  ?></td>
                        <td><?php
                                  if(($row->arrears >  0 && $row->monthly_dues == 0) || ($row->arrears > 0 && $row->monthly_dues > 0 ) || ($row->arrears == 0 && $row->monthly_dues > 0 ))
                                  {
                                    echo ($row->arrears + $row->monthly_dues) / ($rate->securityfee + $rate->assocfee);
                                  }
                                  else
                                  {
                                    echo "0";
                                  }  ?>
                        </td>
                        <td class="action-button">
                          <a href="<?php echo base_url() ."admin_dues/viewdues_admin/" . $row->userid?>"> <button type="button" class="btn btn-custom-3"> View More </button>

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
