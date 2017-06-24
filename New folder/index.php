<!doctypxe html>
<html>
	<head>
		<title>ColoredCow</title>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	</head>
		
			<body style="background-color:transparent;"><center>

				  
				<nav class="navbar sticky-top navbar-toggleable-md navbar-light bg-faded">
					
						<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
						</button>
						
						<a class="navbar-brand" href="#">ColoredCow</a>

							<div class="collapse navbar-collapse" id="navbarSupportedContent">
								<ul class="navbar-nav mr-auto">
									<li class="nav-item active">
										<a class="nav-link" href="host_control_page.php">NEW EVENT <span class="sr-only">(current)</span></a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#">Link</a>
									</li>
									<li class="nav-item">
										<a class="nav-link disabled" href="#">Disabled</a>
									</li>
								</ul>
							    
							</div>
				</nav>

					<div class="container-fluid">
						
						<div class="container">
							<h1>Latest Event <span class="badge badge-default">New</span></h1>
							<hr>
							<?php
								require("functions.php");
								show_events();

							?>
							<a href="allevents.php" class="btn btn-link" role="button">Show All Events</a>

						 <hr>
						</div>
	
							<div class="container">
								<div class="row">
									<div class="col-lg-6">
										<div class="alert alert-success" role="alert">
  											<strong>THANK YOU!</strong> FOR YOUR PRECIOUS TIME.
										</div>
											<center><h4>PLEASE ENTER YOUR DETAILS</h4></center>
										<form method="POST" id="rsvp_form">
												<div class="form-group row">
												  	<label for="email" class="col-2 col-form-label">YOUR EMAIL</label>
											  		<div class="col-10">
											    		<input type="email" class="form-control" placeholder="Enter your email-id" name="your_email" id="email-id" required>
													</div>
												</div>
											
									

												<div class="form-group row">
												
												<div class="col-10">
												<button class="btn btn-outline-success" type="button" id="Submit_rsvp">RSVP</button>
												</div>
												</div>
										</form>

									
									</div>
									
								
									<div class="col-lg-6">							
										 
										<div id="accordion" role="tablist" aria-multiselectable="true">
										  <div class="card">
										    <div class="card-header" role="tab" id="headingOne">
										      <h5 class="mb-0">
										        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										          WANT TO SEE WHO ELSE IS COMING?
										        </a>
										      </h5>
										    </div>

										    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
										      <div class="card-block">
											<div class="container">
											
  												
												<?php
												rsvp();
												?>
								
										      </div>
										    </div>
										  </div>


									  
									</div>
							</div>
						</div>
																	

						<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous">
						</script>
						
						<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous">
						</script>
						
						<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous">
							
						</script>
						
			</body>
						<script type="text/javascript" src="main.js"></script>
						<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</html>