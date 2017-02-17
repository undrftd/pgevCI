<div id="page-content-wrapper">

  <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>

  <br><br><br>

  <div class="admin-statistics">

    <div class="header-style">
      <h1> Ticket Statistics </h1>
    </div>

  <br>

  <a href="user-announcements.html"><button type="button" class="btn btn-custom-1">Export to PDF</button></a>
  <br><br>

    <?php
    $datatickets = array($totaltickets);
    $totalreservation = $courtone + $courttwo + $clubhouse;
    $datareservation = array($totalreservation);
    $totalforms = $carsticker + $workpermit + $renovation;
    $dataforms = array($totalforms);
    ?>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <center><div style="height:100%; width: 100%;">
    <canvas id="myChart" width="1000" height="400"></canvas>

    </div>
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
            backgroundColor: "rgba(72,72,72,0.4)",
            borderColor: "rgba(72,72,72,1)",
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
            data: <?php echo json_encode($datatickets) ?>,
            spanGaps: false,
        },
        {
            label: "Reservations",
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
            data: <?php echo json_encode($datareservation) ?>,
            spanGaps: false,
        },
        {
            label: "Online Application Requests",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "rgba(129,149,2,0.4)",
            borderColor: "rgba(129,149,2,1)",
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
            data: <?php echo json_encode($dataforms) ?>,
            spanGaps: false,
        }
    ]
}
});
    </script>

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

    <br>

  </div>

</div>
