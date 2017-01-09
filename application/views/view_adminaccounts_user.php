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
                      <p> Are you sure you want to remove this user from the system? </p><br>
                      <button type="submit" class="btn btn-custom-1">Yes</button>
                      <button type="button" class="btn btn-custom" data-dismiss="modal">Cancel</button>
                  </div>
              </div>
          </div>

      </div>
  </div>

  <div class="modal fade" id="deactivate-modal" role="dialog">

      <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
              <div class="signin">
                  <div class="modal-body text-center">
                      <p> Are you sure you want to deactivate this user from the system? </p><br>
                      <a href="admin-accounts.html"><button type="submit" class="btn btn-custom-1">Yes</button></a>
                      <button type="button" class="btn btn-custom" data-dismiss="modal">Cancel</button>
                  </div>
              </div>
          </div>

      </div>
  </div>

  <div class="header-style">
    <h1> User Accounts </h1>
  </div>

  <div class="portlet">

    <div class="portlet-header">

    <form action="<?php echo base_url(); ?>admin_accounts/search_homeowner/" method="GET">
      <div class="form-group" id="search-group">
        <input class="form-control" name="search" id="sel1" type="text" placeholder="Search for a user...">
          <button type="submit" class="btn btn-custom-8"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
        </input>
      </div>
    </form>

    <br>

    <a href="<?php echo base_url(); ?>admin_accounts/adduser"><button type="button" class="btn btn-custom-1">+ Add a user</button></a>

    </div>

    <div class="portlet-title">

      <ul class="nav nav-tabs" id="myTab">
        <li class="active">
          <a href="<?php echo base_url(); ?>admin_accounts/homeowner">
          Homeowner </a>
        </li>
        <li>
          <a href="<?php echo base_url(); ?>admin_accounts/administrator" id="not-important">
          Administrator </a>
        </li>
        <li>
          <a href="<?php echo base_url(); ?>admin_accounts/deactivated" id="not-important">
          Deactivated </a>
        </li>
        <li class="dropdown" id="dropdown-mobile">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Others
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url(); ?>admin_accounts/administrator">Administrator </a></li>
            <li><a href="<?php echo base_url(); ?>admin_accounts/deactivated">Deactivated </a></li>
          </ul>
        </li>
      </ul>

    </div>

    <div class="portlet-body">

    <?php if ($this->session->flashdata('accountsfeedback')){ ?>
      <div class="success-message text-center" id="prompt-message">
        <h3> Hello, <?php echo $this->session->userdata('firstname');?>. </h3>
        <p> <?php echo $this->session->flashdata('accountsfeedback'); ?> </p><br>
        <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
      </div>
    <?php } ?>

    <?php if ($this->session->flashdata('accountsfail')){ ?>
      <div class="error-message text-center" id="prompt-message">
        <h3> Hello, <?php echo $this->session->userdata('firstname');?>. </h3>
        <p> <?php echo $this->session->flashdata('accountsfail'); ?> </p><br>
        <button type="button" class="btn btn-custom-2" id="close-button">Dismiss</button><br><br>
      </div>
    <?php } ?>
      <br>

      <div class="tab-content">

        <div class="tab-pane fade in active" id="portlet_tab1">

          <div class="table-responsive">

            <table class="table table-hover" id="tracking-table">

              <tr>
                  <th><br>First Name</th>
                  <th><br>Last Name</th>
                  <th><br>Username</th>
                  <th><br>Address</th>
                  <th class="not-important"><br>E-mail Address</th>
                  <th class="not-important"><br>Contact Number</th>
                  <th><br>Action</th>
              </tr>

              <?php foreach($users as $row): ?>
              <tr>
                  <td><?php echo $row->firstname; ?></td>
                  <td><?php echo $row->lastname; ?></td>
                  <td><?php echo $row->username; ?></td>
                  <td><?php echo $row->address; ?></td>
                  <td class="action-button not-important"><?php echo $row->email; ?></td>
                  <td class="action-button not-important"><?php echo $row->contactnum; ?></td>
                  <td class="action-button">
                    <a href="<?php echo base_url() ."admin_accounts/viewmore_user/". $row->userid ?>"> <button type="button" class="btn btn-custom-3">View More</button></a>
                  </td>

              <?php endforeach; ?>
              </tr>

            </table>
           <center><div id="pagination-link"><?php echo $homeownerlinks; ?></div></center>
          </div>

       </div>

      </div>

    </div>

  </div>

</div>
