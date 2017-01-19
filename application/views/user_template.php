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
	    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i|Rubik:400,400i,700" rel="stylesheet">
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/main.css">
 	</head>


   <body>
     <div id="wrapper">

       <div id="sidebar-wrapper">
           <ul class="sidebar-nav text-center">
             <li class="sidebar-brand">
                    <a href="<?php echo site_url("user_home"); ?>" class="<?php if($this->uri->segment('1') == 'user_home') { echo 'active'; } ?>">
                     Home
                 </a>
             </li>
             <li>
                 <a href="<?php echo site_url("user_announcements");	?>"class="<?php if($this->uri->segment('1') == 'user_announcements')  {echo	'active';	}	?>">Announcements</a>
             </li>
             <li>
                 <a href="user-tickets.html">Create a Ticket</a>
             </li>
             <li>
                 <a href="<?php echo site_url("user_dues");	?>"	class="<?php if($this->uri->segment('1') == 'user_dues') {echo 'active'; } ?>">View Dues</a>
             </li>
             <li>
                 <a href="user-tracking.html">Track Tickets</a>
             </li>
             <li>
                 <a href="user-court.html">Reservation</a>
             </li>
             <li>
                 <a href="<?php echo site_url("user_forms/car_sticker"); ?>" class="<?php if($this->uri->segment('1') == 'user_forms') { echo 'active'; } ?>">Forms</a>
             </li>
             <li>
                 <a href="user-contact-form.html">Suggestions</a>
             </li>
             <li>
                 <a href="<?php echo site_url("user_accounts"); ?>" class="<?php if($this->uri->segment('1') == 'user_accounts') { echo 'active'; } ?>">Account</a>
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
