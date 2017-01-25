<div id="page-content-wrapper">
        <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>
        <br>
        <br>

        <br>

          <div class="admin-statistics">

              <div class="header-style">
                <h1> Ticket Statistics </h1>
              </div>
              <br>
              <br>
              
            <br><br>

              <div class="admin-stat">

                <div class="table-responsive">

                  <table class="table table-hover" id="tracking-table">

                    <tr>
                        <th><br>Type of Ticket</th>
                        <th><br>Total</th>
                        <th><br>In Progress</th>
                        <th><br>Closed</th>
                        <th><br>Tickets Created after Cutoff Time</th>
                        <th><br>Average Resolution Time</th>
                    </tr>

                    <tr>
                        <td>Grass Cutting</td>
                        <td><?php echo $totalgrasscutting; ?></td>
                        <td><?php echo $progressgrasscutting; ?></td>
                        <td><?php echo $closedgrasscutting; ?></td>
                        <td>5</td>
                        <td>1 day(s)</td>
                    </tr>
                    <tr>
                        <td>Garbage Collecting</td>
                        <td>5</td>
                        <td>3</td>
                        <td>2</td>
                        <td>11</td>
                        <td>1 day(s)</td>
                    </tr>
                    <tr>
                        <td>Pest Control</td>
                        <td>5</td>
                        <td>1</td>
                        <td>1</td>
                        <td>8</td>
                        <td>2 day(s)</td>
                    </tr>
                    <tr>
                        <td>Malfunctioning Post Lights</td>
                        <td>7</td>
                        <td>3</td>
                        <td>7</td>
                        <td>9</td>
                        <td>1 day(s)</td>
                    </tr>
                    <tr>
                        <td>Water Pipeline Leakages</td>
                        <td>2</td>
                        <td>3</td>
                        <td>3</td>
                        <td>12</td>
                        <td>2 day(s)</td>
                    </tr>
                    <tr>
                        <td>Blocked Drainage</td>
                        <td>5</td>
                        <td>2</td>
                        <td>0</td>
                        <td>1</td>
                        <td>2 day(s)</td>
                    </tr>
                    <tr>
                        <td>Electrical Short Circuit</td>
                        <td>2</td>
                        <td>1</td>
                        <td>1</td>
                        <td>0</td>
                        <td>1 day(s)</td>
                    </tr>
                    <tr>
                        <td>Monthly Dues</td>
                        <td>8</td>
                        <td>5</td>
                        <td>3</td>
                        <td>2</td>
                        <td>1 day(s)</td>
                    </tr>
                    <tr>
                        <td>Other</td>
                        <td>6</td>
                        <td>1</td>
                        <td>1</td>
                        <td>2</td>
                        <td>2 day(s)</td>
                    </tr>

                  </table>

                </div>
                
                <br><br>
                <a href="user-announcements.html"><button type="button" class="btn btn-custom">Export to PDF</button></a>
                <br><br>

              </div>

            </div>