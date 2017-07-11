<!DOCTYPE html>
<html>
<head>
	<title>	SOIREE</title>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Margarine" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Luckiest Guy" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Bangers" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Paprika" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">


	<style type="text/css">
		.btn:hover
		{
			cursor: pointer;
		}
		.images_carousel{
			width: 900px;
			height: 500px;
			position: center;
		}
		
	</style>
</head>

	<nav class=" navbar fixed-top navbar-toggleable-md navbar-inverse bg-inverse">				
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand" href="#""><img src="RSVP_IMAGES/logo.png" width="180" height="45" class="d-inline-block align-top" alt=""></a>
		<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
			<ul class="navbar-nav">
				<li class="nav-item active">
					<a role="button" class="btn btn-outline-warning" href="guests_control_page.php" style="font-family: 'Oswald'; font-size: 17px;">GUESTS<span class="sr-only">(current)</span>
					</a>
				</li>&nbsp;
				<li class="nav-item active">
					<a role="button" class="btn btn-outline-warning" href="events_control_page.php" style="font-family: 'Oswald'; font-size: 17px;">EVENTS<span class="sr-only"></span>
					</a>
				</li>
			</ul>
		</div>
	</nav>
	
	<body  style="background-image: url('RSVP_IMAGES/background4.jpg'); padding-top: 100px; background-repeat: no-repeat; background-position:center 0 ;" >
	<div class="container">
		<div  style="font-family:">
			<center>
				<h1 style="font-family: Oswald; font-size: 60px; color: silver; padding-top: 20px;">Creating Memories Together <b style="font-size: 40px; color: bisque;">"Soiree"</b></h1>
			</center>
			<br>
				<div style=" font-family: Paprika; color:white;">
					<center>
						<h1 style="font-family: 'Oswald'; font-size: 15px; color: bisque; padding-top: 15px;">Coming Up...</h1>
						<div style="color: white;">
						<?php
							require_once("functions.php");
							show_events();
						?>
						</div>
					</center>
				</div>	
						<div class="container">				
						<div class="row text-center">
							<div class="col-6">
							<h5 style="font-family: 'Oswald'; font-size: 23px; padding-top:15px; color:bisque;">Please Confirm your Presence</h5>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">RSVP</button>		
							</div>
							<div class="col-6">
							<h5  class="" style="font-family: 'Oswald'; font-size: 23px; padding-top:15px;  color:bisque;">Want to join the party?</h5>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Request Invite</button>
							</div>
						</div>
		</div> 
		</div>
	
		<div class="container">
			<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content"> 
					  	<div class="modal-header">
							<h3 class="modal-title" id="exampleModalLongTitle" style="font-family: 'Bangers'; font-size: 30px;">RSVP</h3>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" id="closersvp">&times;</span></button>
					    </div>
					    <form class="form-group" id="rsvp_form">
					    <div class="modal-body" style="background-color: whitesmoke;">
							
								<label for="recipient-name" class="form-control-label">
									<h6>Enter the email address:</h6>
								</label>
								<input type="email" class="form-control" placeholder="someone@example.com" name="user_email" id="user_email" maxlength="30" required>
								<p id="msg"></p>
							
					    </div>
					    <div class="modal-footer pull-left">
							<button type="button" class="btn btn-success" id="Submit_rsvp">GET LINK</button>	
					    </div>
					    </form>
					</div>
			    </div>
			</div>
		</div>
			
		<div class="container">
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  	<div class="modal-dialog" role="document">
					<div class="modal-content">
					  	<div class="modal-header">
							<h3 class="modal-title" id="exampleModalLabel" style="font-family: 'Bangers'; font-size: 30px;">&nbsp;&nbsp;&nbsp;New Request</h3>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close"><span aria-hidden="true">&times;</span></button>
					  	</div>
					 	<form id="request_form">
						  	<div class="modal-body" style="background-color: whitesmoke;">
						  		<p id="msg2"></p>
							    <input type="hidden" class="form-control" name="request_id" id="request_id">
							    <div class="form-group">
									<label for="recipient-name" class="form-control-label">
										<h6>&nbsp;&nbsp;&nbsp;Your Name:</h6>
									</label>
									<div class="col-lg-8">
										<input type="text" class="form-control" placeholder="" name="request_name" id="request_name" maxlength="30" required>
									</div>
								 </div>
								<div class="form-group">
									<label for="recipient-name" class="form-control-label">
										<h6>&nbsp;&nbsp;&nbsp;Your Email:</h6>
									</label>
									<div class="col-lg-8">
										<input type="email" class="form-control" placeholder="someone@example.com" name="request_emailid" id="request_emailid" maxlength="30" required>
									</div>
								</div>
								<div class="form-group">
									<label for="recipient-number" class="form-control-label">
										<h6>&nbsp;&nbsp;&nbsp;Mobile Number:</h6>
									</label>
									<div class="col-lg-8">
										<input type="number" class="form-control"  placeholder="10 digit mobile no." name="phonenumber" id="phonenumber" max="9999999999" required>
									</div>
								</div>  
								<div class="form-group">
									<label for="recipient-name" class="form-control-label">
										<h6>&nbsp;&nbsp;&nbsp;Gender:</h6>
									</label>
									<label class="custom-control custom-radio">
										<input name="request_gender" value="Male" type="radio" class="custom-control-input" required>
										<span class="custom-control-indicator"></span>
										<span class="custom-control-description">Male</span>
									</label>
									<label class="custom-control custom-radio">
										<input name="request_gender" value="Female" type="radio" class="custom-control-input" required>
										<span class="custom-control-indicator"></span>
										<span class="custom-control-description">Female</span>
									</label>
								</div>
						  	</div>
						  	<div class="modal-footer pull-left">
							   	&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-success"  id="Submit_request">Request</button>
						  	</div>
						</form> 
					</div>
			    </div>
			</div>
		</div>
		<hr>
		<br><br><br><br><br>
		<div class="jumbotron" style="background-color: ghostwhite; font-style: Antic;">
		  	<center><h5 class="display-4" style="font-family: 'Bangers'; font-size: 50px;">About "Soiree"</h5></center>
		  	<br>
		  	<p class="lead">Hello People, Its already been 3 years of ColoredCow's fantastic journey so far and we have still a long way to go to reach our destination. We are very much dedicated to our work and build our products with passion. But along with the work, we make sure that we don't let go of our life without any enjoyment. So to make some enjoyable moments together we celebrate every first Saturday of the month which we call it "Soiree". There is music, food, drinks and moreover happiness all around. We know everyone is so busy in their life but if you can take a little time out of it and join this event, it can add some old days memories back to your life.</p>
		  	<hr class="my-4">
		  	<h4 class="text" style="">Come and join the  <b style="font-family: Margarine; color: crimson;">Party</b>. Lets make the day better together.</h4>
		</div>
		</div>
		<hr>
		
			<center>
				<h1 style="font-family: 'Bangers'; font-size: 50px; color: black; padding-top: 30px;"><i class="fa fa-camera-retro fa-1x"></i>&nbsp;Event Gallery</h1>
			</center>		
			<div class="container" style="width:900px;">
			<div id="carouselExampleIndicators" class="carousel slide"  data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1">	</li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2">	</li>
					<li data-target="#carouselExampleIndicators" data-slide-to="3">	</li>
					<li data-target="#carouselExampleIndicators" data-slide-to="4">	</li>
					<li data-target="#carouselExampleIndicators" data-slide-to="5">	</li>
					<li data-target="#carouselExampleIndicators" data-slide-to="6">	</li>
					<li data-target="#carouselExampleIndicators" data-slide-to="7">	</li>
					<li data-target="#carouselExampleIndicators" data-slide-to="8">	</li>
					<li data-target="#carouselExampleIndicators" data-slide-to="9">	</li>
					<li data-target="#carouselExampleIndicators" data-slide-to="10"> </li>
					<li data-target="#carouselExampleIndicators" data-slide-to="11"></li>
				</ol>
				<div class="carousel-inner" role="listbox">
					<div class="carousel-item active">
					  	<img class="d-block img-fluid images_carousel" src="RSVP_IMAGES/soiree1.jpg" alt="First slide">
					  	<div class="carousel-caption d-none d-md-block">
							<h3 style="font-family: Oswald; color: lavender;">#SOIREE 1.</h3>  
					  	</div>
					</div>
					<div class="carousel-item">
					  	<img class="d-block img-fluid images_carousel" src="RSVP_IMAGES/soiree2.jpg" alt="Second slide">
					  	<div class="carousel-caption d-none d-md-block">
							<h3 style="font-family: Oswald; color: lavender;">#SOIREE 2.</h3>  
					  	</div>
					</div>
					<div class="carousel-item">
					  	<img class="d-block img-fluid images_carousel" src="RSVP_IMAGES/soiree3.jpg" alt="Third slide">
					  	<div class="carousel-caption d-none d-md-block">
							<h3 style="font-family: Oswald; color: lavender;">#SOIREE 3.</h3>  
					  	</div>
					</div>
					<div class="carousel-item">
					  	<img class="d-block img-fluid images_carousel" src="RSVP_IMAGES/soiree4.jpg" alt="fourth slide">
					  	<div class="carousel-caption d-none d-md-block">
							<h3 style="font-family: Oswald; color: lavender;">#SOIREE 4.</h3>  
					  	</div>
					</div>
					<div class="carousel-item">
					  	<img class="d-block img-fluid images_carousel" src="RSVP_IMAGES/soiree5.jpg" alt="fifth slide">
					  	<div class="carousel-caption d-none d-md-block">
							<h3 style="font-family: Oswald; color: lavender;">#SOIREE 5.</h3>  
					  	</div>
					</div>
					<div class="carousel-item">
					  	<img class="d-block img-fluid images_carousel" src="RSVP_IMAGES/soiree6.jpg" alt="sixth slide">
					  	<div class="carousel-caption d-none d-md-block">
							<h3 style="font-family: Oswald; color: lavender;">#SOIREE 6.</h3>  
					  	</div>
					</div>
					<div class="carousel-item">
					  	<img class="d-block img-fluid images_carousel" src="RSVP_IMAGES/soiree7.jpg" alt="seventh slide">
					  	<div class="carousel-caption d-none d-md-block">
							<h3 style="font-family: Oswald; color: lavender;">#SOIREE 7.</h3>  
					  	</div>
					</div>
					<div class="carousel-item">
					  	<img class="d-block img-fluid images_carousel" src="RSVP_IMAGES/soiree8.jpg" alt="eighth slide">
					  	<div class="carousel-caption d-none d-md-block">
							<h3 style="font-family: Oswald; color: lavender;">#SOIREE 8.</h3>  
					  	</div>
					</div>
					<div class="carousel-item">
					  	<img class="d-block img-fluid images_carousel" src="RSVP_IMAGES/soiree9.jpg" alt="ninth slide">
					  	<div class="carousel-caption d-none d-md-block">
							<h3 style="font-family: Oswald; color: lavender;">#SOIREE 9.</h3>  
					  	</div>
					</div>
					<div class="carousel-item">
					  	<img class="d-block img-fluid images_carousel" src="RSVP_IMAGES/soiree10.jpg" alt="tenth slide">
					  	<div class="carousel-caption d-none d-md-block">
							<h3 style="font-family: Oswald; color: lavender;">#SOIREE 10.</h3>  
					  	</div>
					</div>
					<div class="carousel-item">
					  	<img class="d-block img-fluid images_carousel" src="RSVP_IMAGES/soiree11.jpg" alt="eleventh slide">
					  	<div class="carousel-caption d-none d-md-block">
							<h3 style="font-family: Oswald; color: lavender;">#SOIREE 11.</h3>  
					  	</div>
					</div>
					<div class="carousel-item">
					  	<img class="d-block img-fluid images_carousel" src="RSVP_IMAGES/soiree12.jpg" alt="twelveth slide">
					  	<div class="carousel-caption d-none d-md-block">
							<h3 style="font-family: Oswald; color: lavender;">#SOIREE 12.</h3>  
					  	</div>
					</div>
					
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
			<br>
	

	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
	<script type="text/javascript" src="main.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</html>