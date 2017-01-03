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
                            <button type="button" class="btn btn-custom-2" data-dismiss="modal">Cancel</button>
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
                            <button type="button" class="btn btn-custom-2" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <br>

          <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-4 col-md-offset-2">

              <div class="header-style">
                <h1> Account Information </h1>
              </div><br>

              <div class="admin-message">

                  <p> Note: Before editing another user's account, be sure to inform them of what you are about to change for them to be aware.
                  </p>
                  <br>

              </div>

              <br>

            </div>

            <div class="clearfix visible-md-block"></div>
            <div class="clearfix visible-sm-block"></div>

            <div class="col-xs-12 col-sm-12 col-md-4">

              <div class="information">
                <form>
                  <fieldset id="myFieldset" disabled>
                  <div class="form-group">
                    <h4> User Credentials </h4>
                        <br>
                        <p> First Name </p>
                        <input class="form-control" id="sel1" type="text" placeholder="" value="<?php echo $view->firstname ?>">
                        <br>
                        <p> Last Name </p>
                        <input class="form-control" id="sel1" type="text" placeholder="" value="<?php echo $view->lastname ?>">
                        <br>
                        <p> Username </p>
                        <input class="form-control" id="sel1" type="text" placeholder="" value="<?php echo $view->username; ?>">
                        <br>
                        <p> Address </p>
                        <input class="form-control" id="sel1" type="text" placeholder="" value="<?php echo $view->address; ?>">
                        <br>
                        <p> E-mail Address </p>
                        <input class="form-control" id="sel1" type="email" placeholder="" value="<?php echo $view->email ?>">
                        <br>
                        <p> Contact Number </p>
                        <input class="form-control" id="sel1" type="text" placeholder="" value="<?php echo $view->contactnum; ?>">
                        <br>
                        <p> Role </p>
                        <select class="form-control" id="sel1">
                          <option value="" selected hidden> <?php if($view->role == 0) { echo "Homeowner"; } else { echo "Administrator";  } ?> </option>
                          <option value="0">Homeowner</option>
                          <option value= "1">Administrator</option>
                        </select> 
                      </fieldset>
                    </form>
                        <br><br>
                        <input class="btn btn-custom" type="button" value="Edit" onclick="undisableField()" id="edit-button"></input><br>
                        <button type="button" class="btn btn-custom-3" data-toggle="modal" data-target="#delete-modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  Delete </button><br><br>
                        <button type="button" class="btn btn-custom-4" data-toggle="modal" data-target="#deactivate-modal"> Deactivate </button>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>