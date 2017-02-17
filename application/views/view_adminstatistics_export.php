<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/main.css">
			<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/mobile.css">
			<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/bootstrap-datetimepicker.min.css">
	</head>
	<body>

	<?php
    $datatickets = array($totaltickets);
    $totalreservation = $courtone + $courttwo + $clubhouse;
    $datareservation = array($totalreservation);
    $totalforms = $carsticker + $workpermit + $renovation;
    $dataforms = array($totalforms);

    $datayear = array($countjanuary, $countfebruary, $countmarch, $countapril, $countmay, $countjune, $countjuly, $countaugust, $countseptember, $countoctober, $countnovember, $countdecember,)
    ?>
	
	<center><h1> Parkwood Greens Executive Village - CRM Statistics </h1>
	<p> Pasig, City; Manila, Philippines </p>
	<p> Phone number: 091234567890 </p>
	<hr>
    <center><h2> Ticket Category Report </h2>

	<div class="table-responsive">

      <table style="width: 725px;">

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

      <br><br>

      <center><h2>Ticket Activity Report</h2>
		
      <div class="table-responsive">

      <table style="height:10px; width: 725px;">

        <tr>
            <th><br>Month</th>
            <th><br>Total</th>
        </tr>

        <tr>
            <td>January</td>
            <td><?php echo $countjanuary; ?></td>
        </tr>

        <tr>
            <td>February</td>
            <td><?php echo $countfebruary; ?></td>
        </tr>

        <tr>
            <td>March</td>
            <td><?php echo $countmarch; ?></td>
        </tr>

        <tr>
            <td>April</td>
            <td><?php echo $countapril; ?></td>
        </tr>

        <tr>
            <td>May</td>
            <td><?php echo $countmay; ?></td>
        </tr>

        <tr>
            <td>June</td>
            <td><?php echo $countjune; ?></td>
        </tr>

        <tr>
            <td>July</td>
            <td><?php echo $countjuly; ?></td>
        </tr>

        <tr>
            <td>August</td>
            <td><?php echo $countaugust; ?></td>
        </tr>

        <tr>
            <td>September</td>
            <td><?php echo $countseptember; ?></td>
        </tr>

        <tr>
            <td>October</td>
            <td><?php echo $countoctober; ?></td>
        </tr>

        <tr>
            <td>November</td>
            <td><?php echo $countnovember; ?></td>
        </tr>

        <tr>
            <td>December</td>
            <td><?php echo $countdecember; ?></td>
        </tr>
      </table>

     </div>

     <br><br>

      <center><h2>Overall Statistics</h2>
		
      <div class="table-responsive">

      <table style="height:10px; width: 725px;">

        <tr>
            <th><br>Category</th>
            <th><br>Total</th>
        </tr>

		<tr>
            <td>Tickets</td>
            <td><?php echo $totaltickets; ?></td>
        </tr>

        <tr>
            <td>Reservations</td>
            <td><?php echo $totalreservation; ?></td>
        </tr>

        <tr>
            <td>Online Application Requests</td>
            <td><?php echo $totalforms; ?></td>
        </tr>

       </table>

       </div>


	</body>
</html>