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

    <form class="form-inline">
      <a href="<?php echo base_url(); ?>admin_accounts/adduser"><button type="button" class="btn btn-custom-1">+ Add a user</button></a>
      <div class="form-group">
        <input class="form-control" id="sel1" type="text" placeholder="Search for a user...">
      </div>
      <a href="admin-accounts.html"><button type="button" class="btn btn-custom">Search</button></a><br><br><br>
    </form>

    </div>

    <div class="portlet-title">

      <ul class="nav nav-tabs">
        <li class="active">
          <a href="#portlet_tab1" data-toggle="tab">
          Homeowner </a>
        </li>
        <li>
          <a href="#portlet_tab2" data-toggle="tab">
          Administrator </a>
        </li>
        <li>
          <a href="#portlet_tab3" data-toggle="tab">
          Deactivated </a>
        </li>
      </ul>

    </div>

    <div class="portlet-body">

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
                  <th class="not-important"><br>Action</th>
                  <th class="mobile-important"><br>Action</th>
              </tr>

              <?php foreach($users as $row): ?>
              <tr>
                  <td><?php echo $row->firstname; ?></td>
                  <td><?php echo $row->lastname; ?></td>
                  <td><?php echo $row->username; ?></td>
                  <td><?php echo $row->address; ?></td>
                  <td class="action-button not-important"><?php echo $row->email; ?></td>
                  <td class="action-button not-important"><?php echo $row->contactnum; ?></td>
                  <td class="action-button not-important">
                    <a href="admin-accounts-edit.html"><button type="button" class="btn btn-custom-2">Edit</button></a>
                    <button type="button" class="btn btn-custom-3" data-toggle="modal" data-target="#delete-modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  Delete </button>
                    <button type="button" class="btn btn-custom-4" data-toggle="modal" data-target="#deactivate-modal"> Deactivate </button>
                  </td>
                  <td class="action-button mobile-important">
                    <a href="admin-accounts-edit.html"><button type="button" class="btn btn-custom-3">View More</button></a>
                  </td>

              <?php endforeach; ?>
              </tr>

            </table>

          </div>

        </div>


        <div class="tab-pane fade" id="portlet_tab2">

          <div class="table-responsive">

            <table class="table table-hover" id="tracking-table">

              <tr>
                  <th><br>First Name</th>
                  <th><br>Last Name</th>
                  <th><br>Username</th>
                  <th><br>Address</th>
                  <th class="not-important"><br>E-mail Address</th>
                  <th class="not-important"><br>Contact Number</th>
                  <th class="not-important"><br>Action</th>
                  <th class="mobile-important"><br>Action</th>
              </tr>

              <?php foreach($admin as $row): ?>
              <tr>
                  <td><?php echo $row->firstname; ?></td>
                  <td><?php echo $row->lastname; ?></td>
                  <td><?php echo $row->username; ?></td>
                  <td><?php echo $row->address; ?></td>
                  <td class="action-button not-important"><?php echo $row->email; ?></td>
                  <td class="action-button not-important"><?php echo $row->contactnum; ?></td>
                  <td class="action-button not-important">
                    <a href="admin-accounts-edit.html"><button type="button" class="btn btn-custom-2">Edit</button></a>
                    <button type="button" class="btn btn-custom-3" data-toggle="modal" data-target="#delete-modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  Delete </button>
                    <button type="button" class="btn btn-custom-4" data-toggle="modal" data-target="#deactivate-modal"> Deactivate </button>
                  </td>
                  <td class="action-button mobile-important">
                    <a href="admin-accounts-edit.html"><button type="button" class="btn btn-custom-3">View More</button></a>
                  </td>

                <?php endforeach; ?>
              </tr>

            </table>

          </div>

        </div>


        <div class="tab-pane fade" id="portlet_tab3">

          <div class="table-responsive">

            <table class="table table-hover" id="tracking-table">

              <tr>
                  <th><br>First Name</th>
                  <th><br>Last Name</th>
                  <th><br>Username</th>
                  <th><br>Address</th>
                  <th class="not-important"><br>E-mail Address</th>
                  <th class="not-important"><br>Contact Number</th>
                  <th class="not-important"><br>Action</th>
                  <th class="mobile-important"><br>Action</th>
              </tr>

              <?php foreach($deact as $row): ?>
              <tr>
                  <td><?php echo $row->firstname; ?></td>
                  <td><?php echo $row->lastname; ?></td>
                  <td><?php echo $row->Username; ?></td>
                  <td><?php echo $row->address; ?></td>
                  <td class="action-button not-important"><?php echo $row->email; ?></td>
                  <td class="action-button not-important"><?php echo $row->contactnum; ?></td>
                  <td class="action-button not-important">
                    <a href="admin-accounts-edit.html"><button type="button" class="btn btn-custom-2">Edit</button></a>
                    <button type="button" class="btn btn-custom-3" data-toggle="modal" data-target="#delete-modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  Delete </button>
                    <button type="button" class="btn btn-custom-4" data-toggle="modal" data-target="#deactivate-modal"> Deactivate </button>
                  </td>
                  <td class="action-button mobile-important">
                    <a href="admin-accounts-edit.html"><button type="button" class="btn btn-custom-3">View More</button></a>
                  </td>

              <?php endforeach; ?>
              </tr>

            </table>

          </div>

        </div>

      </div>

    </div>

  </div>

</div>
