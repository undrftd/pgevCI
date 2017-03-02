<div id="page-content-wrapper">

  <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>

  <span class="dropdown sign-out">
    <span class="mobile-title">Parkwood Greens</span>
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
    <span class="user-account"><i class="material-icons md-26 gray400">more_vert</i></span>
    <span class="main-title"><span class="dot-style">&#8226;</span> &nbsp;Hello, <?php echo $this->session->userdata('firstname'); ?></span>
      <?php
        $notif = $count + $reserve + $forms;

        if ($notif >= 1) {
          echo "<span class='badge'>$notif</span>";
        }
        else {
          echo "";
        }

      ?>
    </a>
    <ul class="dropdown-menu pull-right">
      <li class="dropdown-header"><strong><a>Activities</a></strong></li>
      <li><a href="<?php echo base_url("admin_announcements/post_announcements"); ?> ">Post an Announcement</a></li>
      <li><a href="<?php echo base_url("admin_ticketing/new_tickets"); ?>">Tickets
        <span class="a-links">
          <?php
          if ($count >= 1) {
            echo $count;
          }
          else {
            echo "";
          }
          ?>
        </span>
      </a></li>
      <li><a href="<?php echo base_url("admin_reservation/court_one"); ?>">Reservations
        <span class="a-links">
          <?php
          if ($reserve >= 1) {
            echo $reserve;
          }
          else {
            echo "";
          }
          ?>
        </span> </a></li>
      <li><a href="<?php echo base_url("admin_forms/car_sticker"); ?>">Online Application
        <span class="a-links">
          <?php
          if ($forms >= 1) {
            echo $forms;
          }
          else {
            echo "";
          }
          ?>
        </span> </a></li>
      <li role="separator" class="divider"></li>
      <li class="dropdown-header"><strong><a>Account</a></strong></li>
      <li><a href="<?php echo base_url("admin_profile/"); ?>" style="display: block;"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>&nbsp; Edit Account</a></li>
      <li><a href="<?php echo base_url("login/signout/"); ?>">Sign Out</a></li>
    </ul>
  </span>

  <hr class="colored-hr">
  <br>

  <div class="header-style">
    <h1> Ticket Statistics </h1>
  </div><br>

  <?php
  $datatickets = array($totaltickets);
  $totalreservation = $courtone + $courttwo + $clubhouse;
  $datareservation = array($totalreservation);
  $totalforms = $carsticker + $workpermit + $renovation;
  $dataforms = array($totalforms);

  $datayear = array($countjanuary, $countfebruary, $countmarch, $countapril, $countmay, $countjune, $countjuly, $countaugust, $countseptember, $countoctober, $countnovember, $countdecember,)
  ?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

  <div class="portlet nopadding">

    <div class="portlet-header">

      <a href="<?php echo site_url("admin_statistics/export_pdf"); ?>"><button type="button" class="btn btn-custom-1">Export to PDF</button></a>

    </div>

    <div class="portlet-title">

      <ul class="nav nav-tabs" id="myTab">
        <li class="active">
          <a href="#portlet_tab1" data-toggle="tab">
          Ticket List </a>
        </li>
        <li>
          <a href="#portlet_tab2" data-toggle="tab" id="not-important">
           Ticket Activity</a>
        </li>
        <li>
          <a href="#portlet_tab3" data-toggle="tab" id="not-important">
          Overall Statistics</a>
        </li>
        <li class="dropdown" id="dropdown-mobile">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Graphs
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#portlet_tab2" data-toggle="tab">Ticket Activity </a></li>
            <li><a href="#portlet_tab3" data-toggle="tab">Overall Statistics </a></li>
          </ul>
        </li>
    </div>

    <div class="portlet-body">

      <div class="tab-content">

        <div class="tab-pane fade in active" id="portlet_tab1">

          <br>

          <div class="table-responsive">

            <table class="table table-hover" id="tracking-table">

              <tr>
                  <th><br>Type of Ticket</th>
                  <th><br>Total</th>
                  <th><br>In Progress</th>
                  <th><br>Closed</th>
              </tr>

              <tr>
                  <td>Fire</td>
                  <td><?php echo $totalfire; ?></td>
                  <td><?php echo $progressfire; ?></td>
                  <td><?php echo $closedfire; ?></td>
              </tr>

              <tr>
                  <td>Robbery</td>
                  <td><?php echo $totalrobbery; ?></td>
                  <td><?php echo $progressrobbery; ?></td>
                  <td><?php echo $closedrobbery; ?></td>
              </tr>

              <tr>
                  <td>Broken House Tube</td>
                  <td><?php echo $totalbrokentube; ?></td>
                  <td><?php echo $progressbrokentube; ?></td>
                  <td><?php echo $closedbrokentube; ?></td>
              </tr>

              <tr>
                  <td>Suspicious Person</td>
                  <td><?php echo $totalsuspiciousperson; ?></td>
                  <td><?php echo $progresssuspiciousperson; ?></td>
                  <td><?php echo $closedsuspiciousperson; ?></td>
              </tr>

              <tr>
                  <td>CCTV Retrieval</td>
                  <td><?php echo $totalcctv; ?></td>
                  <td><?php echo $progresscctv; ?></td>
                  <td><?php echo $closedcctv; ?></td>
              </tr>

              <tr>
                  <td>Grass Cutting</td>
                  <td><?php echo $totalgrasscutting; ?></td>
                  <td><?php echo $progressgrasscutting; ?></td>
                  <td><?php echo $closedgrasscutting; ?></td>
              </tr>
              <tr>
                  <td>Garbage Collecting</td>
                  <td><?php echo $totalgarbage; ?></td>
                  <td><?php echo $progressgarbage; ?></td>
                  <td><?php echo $closedgarbage; ?></td>
              </tr>
              <tr>
                  <td>Pest Control</td>
                  <td><?php echo $totalpest; ?></td>
                  <td><?php echo $progresspest; ?></td>
                  <td><?php echo $closedpest; ?></td>
              </tr>
              <tr>
                  <td>Malfunctioning Post Lights</td>
                  <td><?php echo $totalpost; ?></td>
                  <td><?php echo $progresspost; ?></td>
                  <td><?php echo $closedpost; ?></td>
              </tr>
              <tr>
                  <td>Water Pipeline Leakages</td>
                  <td><?php echo $totalpipeline; ?></td>
                  <td><?php echo $progresspipeline; ?></td>
                  <td><?php echo $closedpipeline; ?></td>
              </tr>
              <tr>
                  <td>Blocked Drainage</td>
                  <td><?php echo $totaldrainage; ?></td>
                  <td><?php echo $progressdrainage; ?></td>
                  <td><?php echo $closeddrainage; ?></td>
              </tr>
              <tr>
                  <td>Electrical Short Circuit</td>
                  <td><?php echo $totalshortcircuit; ?></td>
                  <td><?php echo $progressshortcircuit; ?></td>
                  <td><?php echo $closedshortcircuit; ?></td>
              </tr>
              <tr>
                  <td>Monthly Dues</td>
                  <td><?php echo $totalmonthlydues; ?></td>
                  <td><?php echo $progressmonthlydues; ?></td>
                  <td><?php echo $closedmonthlydues; ?></td>
              </tr>
              <tr>
                  <td>Other</td>
                  <td><?php echo $totalothers; ?></td>
                  <td><?php echo $progressothers; ?></td>
                  <td><?php echo $closedothers; ?></td>
              </tr>

            </table>

          </div>

        </div>

        <div class="tab-pane fade" id="portlet_tab2">

          <br>
          <div>
            <canvas id="myChart1"></canvas>
          </div>
          <br>

        </div>

        <div class="tab-pane fade" id="portlet_tab3">

          <br>
          <div>
            <canvas id="myChart"></canvas>
          </div>
          <br>

        </div>

      </div>

    </div>

  </div>

</div>

<br>

<script>

  var ctx = document.getElementById("myChart");
  var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
  labels: ["Statistics"],
  datasets: [
      {
          label: "Tickets",
          fill: false,
          lineTension: 0.1,
          backgroundColor: "rgba(255, 99, 132, 0.2)",
          borderColor: "rgba(255,99,132,1)",
          borderWidth: 2,
          data: <?php echo json_encode($datatickets) ?>,
      },
      {
          label: "Reservations",
          fill: false,
          lineTension: 0.1,
          backgroundColor: "rgba(54, 162, 235, 0.2)",
          borderColor: "rgba(54, 162, 235, 1)",
          borderWidth: 2,
          data: <?php echo json_encode($datareservation) ?>,
      },
      {
          label: "Online Application Requests",
          fill: false,
          lineTension: 0.1,
          backgroundColor: "rgba(255, 206, 86, 0.2)",
          borderColor: "rgba(255, 206, 86, 1)",
          borderWidth: 2,
          data: <?php echo json_encode($dataforms) ?>,
      }
  ]
  },
  options: {
      scales: {
          yAxes: [{
                  display: true,
                  ticks: {
                      beginAtZero: true,
                      steps: 10,
                      stepValue: 5,
                      suggestedMax: 50
                  }
              }]
          }
      }
});

</script>

<script>

  var ctx = document.getElementById("myChart1");
  var myLineChart1 = new Chart(ctx, {
  type: 'line',
  data:   {
  labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
  datasets: [
      {
          label: "Ticket Count Activity",
          fill: false,
          lineTension: 0.1,
          backgroundColor: "rgba(75,192,192,0.4)",
          borderColor: "rgba(75,192,192,1)",
          borderCapStyle: 'butt',
          borderDash: [],
          borderDashOffset: 0.0,
          borderJoinStyle: 'miter',
          pointBorderColor: "rgba(75,192,192,1)",
          pointBackgroundColor: "#fff",
          pointBorderWidth: 1,
          pointHoverRadius: 5,
          pointHoverBackgroundColor: "rgba(75,192,192,1)",
          pointHoverBorderColor: "rgba(220,220,220,1)",
          pointHoverBorderWidth: 2,
          pointRadius: 1,
          pointHitRadius: 10,
          data: <?php echo json_encode($datayear) ?>,
          spanGaps: false,
      }
  ]
  },
  options: {
      scales: {
          yAxes: [{
                  display: true,
                  ticks: {
                      beginAtZero: true,
                      steps: 10,
                      stepValue: 5,
                      suggestedMax: 50

                  }
              }]
          }
      }
});

</script>
