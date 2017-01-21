<div id="page-content-wrapper">
        <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>
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
          <h1> Ticketing System </h1>
        </div>

        <div class="portlet">

          <div class="portlet-header">

          </div>

          <div class="portlet-title">

            <ul class="nav nav-tabs">
              <li class="active">
								<a href="#portlet_tab1" data-toggle="tab">
							  New </a>
							</li>
              <li>
                <a href="#portlet_tab2" data-toggle="tab">
                In Progress </a>
              </li>
              <li>
                <a href="#portlet_tab3" data-toggle="tab">
                Closed </a>
              </li>
            </ul>

          </div>

          <div class="portlet-body">

            <div class="tab-content">

              <div class="tab-pane fade in active" id="portlet_tab1">

                <p class="ticket-summary"> Total: 3 pending tickets (1 emergency ticket) </p>

                <div class="table-responsive">

                  <table class="table table-hover" id="tracking-table">

                    <tr>
                      <th><br>Ticket ID</th>
                      <th><br>Type of Request</th>
                      <th class="not-important"><br>Homeowner's Name</th>
                      <th><br>Date Created</th>
                      <th><br>Action</th>
                    </tr>

                    <tr>
                        <td>0006</td>
                        <td>Monthly Dues</td>
                        <td class="not-important">Gemille Polintan</td>
                        <td>11/20/2016 13:48:00 PM</td>
                        <td class="action-button">
                          <a href="admin-tickets-open.html"><button type="button" class="btn btn-custom-2">Open</button></a>
                          <button type="button" class="btn btn-custom-3" data-toggle="modal" data-target="#delete-modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  Delete </button>
                        </td>
                    </tr>
                    <tr>
                        <td>0007</td>
                        <td>Lost and Found</td>
                        <td class="not-important">Mildred Duran </td>
                        <td>11/21/2016 8:52:00 AM</td>
                        <td class="action-button">
                          <a href="admin-tickets.html"><button type="button" class="btn btn-custom-2">Open</button></a>
                          <button type="button" class="btn btn-custom-3" data-toggle="modal" data-target="#delete-modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  Delete </button>
                        </td>
                    </tr>
                    <tr>
                        <td>0008</td>
                        <td>Robbery</td>
                        <td class="not-important">Dino Galapon </td>
                        <td>11/21/2016 2:12:00 PM</td>
                        <td class="action-button">
                          <a href="admin-tickets.html"><button type="button" class="btn btn-custom-9">Open</button></a>
                          <button type="button" class="btn btn-custom-3" data-toggle="modal" data-target="#delete-modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  Delete </button>
                        </td>
                    </tr>

                  </table>

                </div>

              </div>

              <div class="tab-pane fade" id="portlet_tab2">

                <p> Total: 3 on-going tickets </p>

                <div class="table-responsive">

                  <table class="table table-hover" id="tracking-table">

                    <tr>
                        <th><br>Ticket ID</th>
                        <th><br>Type of Request</th>
                        <th><br>Homeowner's Name</th>
                        <th><br>Date Opened</th>
                        <th><br>Action</th>
                    </tr>

                    <tr>
                        <td>0001</td>
                        <td>Lost and Found</td>
                        <td>Marc Jeanne Aliswag</td>
                        <td>11/02/2016 8:48:00 AM</td>
                        <td class="action-button">
                          <a href="admin-tickets-edit.html"><button type="button" class="btn btn-custom-2">More</button></a>
                          <button type="button" class="btn btn-custom-3" data-toggle="modal" data-target="#delete-modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  Delete </button>
                        </td>
                    </tr>
                    <tr>
                        <td>0002</td>
                        <td>Pest Control</td>
                        <td>Howell Henre Manongsong</td>
                        <td>11/05/2016 13:48:00 PM</td>
                        <td class="action-button">
                          <a href="admin-tickets-edit.html"><button type="button" class="btn btn-custom-2">More</button></a>
                          <button type="button" class="btn btn-custom-3" data-toggle="modal" data-target="#delete-modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  Delete </button>
                        </td>
                    </tr>
                    <tr>
                        <td>0005</td>
                        <td>Grass Cutting</td>
                        <td>Dino Angelo Galapon</td>
                        <td>11/10/2016 14:00:00 PM</td>
                        <td class="action-button">
                          <a href="admin-tickets-edit.html"><button type="button" class="btn btn-custom-2">More</button></a>
                          <button type="button" class="btn btn-custom-3" data-toggle="modal" data-target="#delete-modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  Delete </button>
                        </td>
                    </tr>
                    <tr>
                        <td>0006</td>
                        <td>Monthly Dues</td>
                        <td>Gemille Polintan</td>
                        <td>11/20/2016 14:00:00 PM</td>
                        <td class="action-button">
                          <a href="admin-tickets-edit.html"><button type="button" class="btn btn-custom-2">More</button></a>
                          <button type="button" class="btn btn-custom-3" data-toggle="modal" data-target="#delete-modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  Delete </button>
                        </td>
                    </tr>

                  </table>

                </div>

              </div>

              <div class="tab-pane fade" id="portlet_tab3">

                  <p> Total: 2 closed tickets </p>

                <div class="table-responsive">

                  <table class="table table-hover" id="tracking-table">

                    <tr>
                      <th><br>Ticket ID</th>
                      <th><br>Type of Request</th>
                      <th><br>Homeowner's Name</th>
                      <th><br>Date Closed</th>
                      <th><br>Action</th>
                    </tr>

                    <tr>
                        <td>0003</td>
                        <td>Other</td>
                        <td>Marc Jeanne Aliswag</td>
                        <td>11/08/2016 16:48:00 PM</td>
                        <td class="action-button">
                          <button type="button" class="btn btn-custom-3" data-toggle="modal" data-target="#delete-modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  Delete </button>
                        </td>
                    </tr>
                    <tr>
                        <td>0004</td>
                        <td>Monthly Dues</td>
                        <td>Mildred Duran </td>
                        <td>11/08/2016 14:48:00 PM</td>
                        <td class="action-button">
                          <button type="button" class="btn btn-custom-3" data-toggle="modal" data-target="#delete-modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  Delete </button>
                        </td>
                    </tr>
                    <tr>
                        <td>0006</td>
                        <td>Monthly Dues</td>
                        <td>Gemille Polintan</td>
                        <td>11/20/2016 15:04:20 PM</td>
                        <td class="action-button">
                          <button type="button" class="btn btn-custom-3" data-toggle="modal" data-target="#delete-modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  Delete </button>
                        </td>
                    </tr>

                  </table>

                </div>

              </div>

              <br>

            </div>

          </div>

        </div>

      </div>

    </div>
