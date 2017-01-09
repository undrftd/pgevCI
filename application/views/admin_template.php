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
	    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/main.css">
 	</head>


   <body>

    	<div id="wrapper">
            <div id="sidebar-wrapper">
              <ul class="sidebar-nav text-center">
                <li>
                    <a href="<?php echo site_url("admin_ticketing"); ?>" class="<?php if($this->uri->segment(1) == 'admin_ticketing') { echo 'active'; } ?>">Ticketing System</a>
                </li>
                <li class="sidebar-brand">
                    <a href="admin-home.html">
                        Statistics
                    </a>
                </li>
                <li>
                    <a href="admin-announcement.html">Announcements</a>
                </li>
                <li>
                    <a href="<?php echo site_url("admin_dues/homeowner"); ?>" class="<?php if($this->uri->segment(1)  == 'admin_dues') { echo 'active'; } ?>">Dues</a>
                </li>
                <li>
                    <a href="admin-court.html">Reservation</a>
                </li>
                <li>
                    <a href="admin-forms.html">Forms</a>
                </li>
                <li>
                    <a href="<?php echo site_url("admin_accounts/homeowner"); ?>" class="<?php if($this->uri->segment(1) == 'admin_accounts') { echo 'active'; } ?>">Accounts</a>
                </li>
                <li>
                    <a href="<?php echo site_url("admin_profile/");?>" class="<?php if($this->uri->segment(1) == 'admin_profile') { echo 'active'; } ?>"> Profile</a>
                </li>
                <li>
                    <a href="<?php echo site_url("login/signout"); ?>">Sign Out</a>
                </li>
              </ul>
            </div>

       		<div id="contents"><?= $contents ?></div>

       	 	<div id="footer">
       	 		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
						<script type="text/javascript" src="<?php echo base_url('/public/js/main.js'); ?>"></script>
        		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        		<!-- Include all compiled plugins (below), or include individual files as needed -->
        	</div>

        </div>
	</body>

</html>
