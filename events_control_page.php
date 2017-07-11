<!doctype html>	
<html>
<head>
	<title>Edit Events</title>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Luckiest Guy" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Bangers" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Paprika" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
	
	<style type="text/css">
	    .btn:hover
	    {
	        cursor: pointer;
	    }
	    
	</style>
</head>
<body>	

	<nav class=" navbar sticky-top navbar-toggleable-md navbar-inverse bg-inverse">				
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand" href="#" style="font-family: ;"><img src="RSVP_IMAGES/logo.png" width="180" height="45" class="d-inline-block align-top" alt=""></a>
		<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
			<ul class="navbar-nav">
				<li class="nav-item active">
					<a role="button" class="btn btn-outline-warning" href="index.php" style="font-family: 'Oswald'; font-size: 17px;">
						<i class="fa fa-home" aria-hidden="true"></i>&nbsp;HOME<span class="sr-only">(current)</span>
					</a>
				</li>&nbsp;
				<li class="nav-item active">
					<a role="button" class="btn btn-outline-warning" href="guests_control_page.php" style="font-family: 'Oswald'; font-size: 17px;">GUESTS<span class="sr-only">(current)</span></a>
				</li>
			</ul>
		</div>
	</nav>	

	<div class="container-fluid">		
		<div class="container">
		<div class="row">
		<div class="col-lg-6">
			<h1 style="font-family: 'Oswald'; font-size: 50px; padding-top: 10px;">
				<span>Events Management</span>
				
			</h1>
			</div>
			<div class="col-lg-6" style="padding-top: 10px;">
				<button type="button" class="btn btn-primary  pull-right" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" id="d">Add New Event</button>
			</div>
			</div>
		</div>
		<hr>
		<br>
		<div class="container">

			<center>			
				
				<div style="font-family: Paprika; color: black; font-size: ;">
					<h3 class="text-primary" style="font-family: Bangers; font-size: 40px;">Current Event</h3>
					<?php
					require_once("functions.php");
					show_events();
					?>
				</div>			
			</center>
			
		</div>
		<hr>
		<br><br><br>
		<div class="container" style="font-family: 'Open Sans'; font-size: 17px;">
			
			<h3 class="text-primary" style="font-family: 'Bangers'; font-size: 40px;"><center>All Events</center></h3>
		<hr>
		</div>
		
		<div class="container">
			<div id="all_events"></div>
		</div>
		<div class="container">				
			<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h3 class="modal-title" id="editModalLabel" style="font-family: 'Bangers'; font-size: 30px;">&nbsp;&nbsp;&nbsp;Edit Event</h3>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body" style="background-color: whitesmoke;">
							<form id="edit_event">
								<div class="form-group">
								    <label for="event-name" class="form-control-label">
									    <h6>&nbsp;&nbsp;&nbsp;Event Name:</h6>
								    </label>
								    <div class="col-lg-8">
									    <input type="text" class="form-control" placeholder="" name="update_event_name" id="update_event_name" maxlength="25" required>
								    </div>
								</div>
								<div class="form-group">
									<label for="event-date" class="form-control-label">
										<h6>&nbsp;&nbsp;&nbsp;Event Date:</h6>
									</label>
								    <div class="col-lg-8">
									    <input type="date" class="form-control" placeholder="" name="update_event_date" id="update_event_date" min='<?php echo date('Y-m-d'); ?>' required>
								    </div>
								</div> 
								<div class="form-group">
								    <label for="event-venue" class="form-control-label">
									    <h6>&nbsp;&nbsp;&nbsp;Event Venue:</h6>
								    </label>
								    <div class="col-lg-8">
									    <input type="text" class="form-control" placeholder="" name="update_event_venue" id="update_event_venue" maxlength="25" required>
								    </div>
								</div>
							  	<input type="hidden" name="update_event_id" id="update_event_id">
								<div class="modal-footer pull-left">
									<button type="button" class="btn btn-success" data-dismiss="modal" name="update_event" id="update_event">Update</button>
								</div>
							</form>			    
						</div>
					</div>
				</div>
			</div>
		</div>



		<div class="container">				
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h3 class="modal-title" id="exampleModalLabel" style="font-family: 'Bangers'; font-size: 30px;">&nbsp;&nbsp;&nbsp;New Event</h3>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body" style="background-color: whitesmoke;">
							
							<form id="event_form">
								<div class="form-group">
									<p id="msg1"></p>
									<label for="event-name" class="form-control-label">
										<h6>&nbsp;&nbsp;&nbsp;Event Name:</h6>
									</label>
								    <div class="col-lg-8">
								    	<input type="text" class="form-control" placeholder="" name="event_name" id="event_name" maxlength="25" required>
								    </div>
								</div>
							  	<div class="form-group">
								  	<label for="event-date" class="form-control-label">
									  	<h6>&nbsp;&nbsp;&nbsp;Event Date:</h6>
								  	</label>
								    <div class="col-lg-8">
								    	<input type="date" class="form-control" name="event_date" id="event_date" min='<?php echo date('Y-m-d'); ?>' required> 	
								    </div>
							  	</div>
							  	<div class="form-group">
								    <label for="event-venue" class="form-control-label">
									    <h6>&nbsp;&nbsp;&nbsp;Event Venue:</h6>
								    </label>
								    <div class="col-lg-8">
								    	<input type="text" class="form-control" placeholder="" name="event_venue" id="event_venue" maxlength="25" required>
								    </div>
							  	</div>							  
								<div class="modal-footer pull-left">
									<button type="button" class="btn btn-success" name="Submit" id="Submit_event">Add</button>
									
								</div>
							</form>			    
						</div>
					</div>
				</div>
			</div>				
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>				
</body>
	<script type="text/javascript" src="main.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</html>