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
            <a href="admin-accounts-add.html"><button type="button" class="btn btn-custom-1">+ Add a user</button></a>
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
                        <th><br>Password</th>
                        <th><br>Address</th>
                        <th><br>E-mail Address</th>
                        <th><br>Contact Number</th>
                        <th><br>Action</th>
                    </tr>

                    <tr>
                        <td>Marc Jeanne</td>
                        <td>Aliswag</td>
                        <td>mhmmmarc</td>
                        <td>marc123</td>
                        <td>619 G. Cleveland St.</td>
                        <td>marcmaliswag@gmail.com</td>
                        <td>09174959064</td>
                        <td class="action-button">
                          <a href="admin-accounts-edit.html"><button type="button" class="btn btn-custom-2">Edit</button></a>
                          <button type="button" class="btn btn-custom-3" data-toggle="modal" data-target="#delete-modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  Delete </button>
                          <button type="button" class="btn btn-custom-4" data-toggle="modal" data-target="#deactivate-modal"> Deactivate </button>
                        </td>
                    </tr>
                    <tr>
                      <td>Dino Angelo</td>
                      <td>Galapon</td>
                      <td>onidchan</td>
                      <td>onid024</td>
                      <td>1876 G. Cleveland St.</td>
                      <td>dinoggalapon@gmail.com</td>
                      <td>09065715254</td>
                      <td class="action-button">
                        <a href="admin-accounts-edit.html"><button type="button" class="btn btn-custom-2">Edit</button></a>
                        <button type="button" class="btn btn-custom-3" data-toggle="modal" data-target="#delete-modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  Delete </button>
                        <button type="button" class="btn btn-custom-4" data-toggle="modal" data-target="#deactivate-modal"> Deactivate </button>
                      </td>
                    </tr>
                    <tr>
                      <td>Howell Henre</td>
                      <td>Manongsong</td>
                      <td>Alesana</td>
                      <td>alisana</td>
                      <td>158 G. Cleveland St.</td>
                      <td>howellhmanongson@gmail.com</td>
                      <td>09174959064</td>
                      <td class="action-button">
                        <a href="admin-accounts-edit.html"><button type="button" class="btn btn-custom-2">Edit</button></a>
                        <button type="button" class="btn btn-custom-3" data-toggle="modal" data-target="#delete-modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  Delete </button>
                        <button type="button" class="btn btn-custom-4" data-toggle="modal" data-target="#deactivate-modal"> Deactivate </button>
                      </td>
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
                        <th><br>Password</th>
                        <th><br>Address</th>
                        <th><br>E-mail Address</th>
                        <th><br>Contact Number</th>
                        <th><br>Action</th>
                    </tr>

                    <tr>
                        <td>Gemille</td>
                        <td>Polintan</td>
                        <td>G</td>
                        <td>gems123</td>
                        <td>456 G. Cleveland St.</td>
                        <td>gempolintan@gmail.com</td>
                        <td>09166321641</td>
                        <td class="action-button">
                          <a href="admin-accounts-edit.html"><button type="button" class="btn btn-custom-2">Edit</button></a>
                          <button type="button" class="btn btn-custom-3" data-toggle="modal" data-target="#delete-modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  Delete </button>
                        </td>
                    </tr>
                    <tr>
                      <td>Mildred</td>
                      <td>Duran</td>
                      <td>xiaoyu</td>
                      <td>dredlim</td>
                      <td>215 G. Cleveland St.</td>
                      <td>mildredduran@gmail.com</td>
                      <td>09156623589</td>
                      <td class="action-button">
                        <a href="admin-accounts-edit.html"><button type="button" class="btn btn-custom-2">Edit</button></a>
                        <button type="button" class="btn btn-custom-3" data-toggle="modal" data-target="#delete-modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  Delete </button>
                      </td>
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
                        <th><br>Password</th>
                        <th><br>Address</th>
                        <th><br>E-mail Address</th>
                        <th><br>Contact Number</th>
                        <th><br>Action</th>
                    </tr>

                    <tr>
                        <td>John</td>
                        <td>Aliswag</td>
                        <td>jaliswag</td>
                        <td>j123</td>
                        <td>1004 G. Cleveland St.</td>
                        <td>jmaliswag@gmail.com</td>
                        <td>09152264263</td>
                        <td class="action-button">
                          <a href="admin-accounts.html"><button type="button" class="btn btn-custom-2">Reactivate</button></a>
                          <button type="button" class="btn btn-custom-3" data-toggle="modal" data-target="#delete-modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  Delete </button>
                        </td>
                    </tr>
                    <tr>
                      <td>Dina Angeline</td>
                      <td>Smith</td>
                      <td>dangelie</td>
                      <td>angel123</td>
                      <td>413 G. Cleveland St.</td>
                      <td>dinasmith@gmail.com</td>
                      <td>0914565264</td>
                      <td class="action-button">
                        <a href="admin-accounts.html"><button type="button" class="btn btn-custom-2">Reactivate</button></a>
                        <button type="button" class="btn btn-custom-3" data-toggle="modal" data-target="#delete-modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  Delete </button>
                      </td>
                    </tr>

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

    </div>