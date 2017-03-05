<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	    <title>Parkwood Greens Executive Village CRM Administrator</title>

	    <!-- Bootstrap -->
	    <!-- Latest compiled and minified CSS -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	    <!-- Optional theme -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	    <!-- Latest compiled and minified JavaScript -->
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i|Rubik:300,300i,400,400i,700" rel="stylesheet">
			<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/main.css">
			<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/mobile.css">
			<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/bootstrap-datetimepicker.min.css">
 	</head>


   <body>

  	<div id="wrapper">

      <div id="sidebar-wrapper">
        <ul class="sidebar-nav text-center">
          <li>
              <a href="<?php echo site_url("admin_ticketing/new_tickets"); ?>" class="<?php if($this->uri->segment(1) == 'admin_ticketing') { echo 'active'; } ?>">Ticketing</a>
          </li>
          <li>
              <a href="<?php echo site_url("admin_announcements/announcements");	?>" class="<?php if($this->uri->segment(1) == 'admin_announcements') { echo 'active'; } ?>">Announcements</a>
          </li>
          <li>
              <a href="<?php echo site_url("admin_reservation/court_one"); ?>" class="<?php if($this->uri->segment(1) == 'admin_reservation') { echo 'active'; } ?>">Reservation</a>
          </li>
          <li>
              <a href="<?php echo site_url("admin_forms/car_sticker"); ?>" class="<?php if($this->uri->segment(1) == 'admin_forms') { echo 'active'; } ?>">Online Applications</a>
          </li>
          <li>
              <a href="<?php echo site_url("admin_dues/homeowner"); ?>" class="<?php if($this->uri->segment(1)  == 'admin_dues') { echo 'active'; } ?>">Dues</a>
          </li>
          <li>
              <a href="<?php echo site_url("admin_accounts/homeowner"); ?>" class="<?php if($this->uri->segment(1) == 'admin_accounts') { echo 'active'; } ?>">Accounts</a>
          </li>
          <li class="sidebar-brand">
              <a href="<?php echo site_url("admin_statistics"); ?>" class="<?php if($this->uri->segment(1) == 'admin_statistics') { echo 'active'; } ?>">Statistics</a>
          </li>
          <li>
              <a href="<?php echo site_url("admin_audit/logs");?>" class="<?php if($this->uri->segment(1) == 'admin_audit') { echo 'active'; } ?>"> Audit Trail</a>
          </li>
        </ul>
      </div>

			<div class="icon-pg">
				<a href="#" id="back-to-top" title="Back to top"><span class="glyphicon glyphicon-tree-deciduous btn-lg" aria-hidden="true"></span></a>
			</div>

   		<div id="contents"><?= $contents ?></div>

			<footer class="mobile-nav">
				<ul>
					<li class="<?php if($this->uri->segment(1) == 'admin_ticketing') { echo 'active'; } ?>">
						<a href="<?php echo site_url("admin_ticketing/new_tickets"); ?>">Tickets
							<?php
								if ($count >= 1) {
								echo "<span class='badge'>$count</span>";
								}
				        ?>
						</a>
					</li>
					<li class="reserve-badge <?php if($this->uri->segment(1) == 'admin_reservation') { echo 'active'; } ?>">
						<a href="<?php echo site_url("admin_reservation/court_one"); ?>">Reservation
						 <?php
			          if ($reserve >= 1) {
			            echo "<span class='badge'>$reserve</span>";
			          }
			          ?>
						</a>
					</li>
					<li class="forms-badge <?php if($this->uri->segment(1) == 'admin_forms') { echo 'active'; } ?>">
						<a href="<?php echo site_url("admin_forms/car_sticker"); ?>">Forms</a>
						<?php
							if ($forms >= 1) {
						 		echo "<span class='badge'>$forms</span>";
					 		}
		          ?>
					</li>
					<li class="forms-badge <?php if($this->uri->segment(1) == 'admin_announcements') { echo 'active'; } else if($this->uri->segment(1) == 'admin_announcements') { echo 'active'; } else if($this->uri->segment(1) == 'admin_dues') { echo 'active'; } else if($this->uri->segment(1) == 'admin_accounts') { echo 'active'; } else if($this->uri->segment(1) == 'admin_statistics') { echo 'active'; } else if($this->uri->segment(1) == 'admin_audit') { echo 'active'; } else if($this->uri->segment(1) == 'admin_profile') { echo 'active'; }?>"> <a href="#" onclick="openNav1()"><i class="material-icons">menu</i></a> </li>
				</ul>
			</footer>

			<div id="myNav1" class="overlay">
				<a href="javascript:void(0)" class="closebtn" onclick="closeNav1()">&times;</a>
				<div class="overlay-content">
					<div class="overlay-header">
						<i class="material-icons md-48 gray400">account_circle</i>
						<h4>
							<?php echo $this->session->firstname ;?> <?php echo $this->session->lastname ;?>
							<span>Administrator</span>
							<div class="account-actions">
								<span> <a href="<?php echo base_url("admin_profile/"); ?>" style="display: block;">Edit Account &nbsp; <span class="dot-style">&#8226;</span> &nbsp;</a> </span>
								<span> <a href="<?php echo base_url("login/signout/"); ?>">Sign Out</a> </span>
							</div>
						</h4>
					</div>
					<hr>
					<a href="<?php echo site_url("admin_announcements/announcements");	?>">Announcements</a>
					<hr>
					<a href="<?php echo site_url("admin_dues/homeowner"); ?>">Dues</a>
					<hr>
					<a href="<?php echo site_url("admin_accounts/homeowner"); ?>">Accounts</a>
					<hr>
					<a href="<?php echo site_url("admin_statistics"); ?>">Statistics</a>
					<hr>
					<a href="<?php echo site_url("admin_audit/logs");?>">Audit Trail</a>
					<hr>
					<span class="overlay-footer"> &copy; 2017 Parkwood Greens </span>
				</div>
			</div>

   	 	<div id="footer">
   	 		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
				<script type="text/javascript" src="<?php echo base_url('/public/js/main.js'); ?>"></script>
				<script type="text/javascript" src="<?php echo base_url('/public/js/bootstrap-show-password.js'); ?>"></script>
    		        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
				<script type="text/javascript" src="<?php echo base_url('/public/js/moment.min.js'); ?>"></script>
				<script type="text/javascript" src="<?php echo base_url('/public/js/bootstrap-datetimepicker.min.js'); ?>"></script>
    		<!-- Include all compiled plugins (below), or include individual files as needed -->
    	</div>

    </div>

	</body>

</html>
