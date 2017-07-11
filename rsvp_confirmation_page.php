<!doctype html>
<html>
<head>
	<title>RSVP PAGE</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Luckiest Guy" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
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
		<a class="navbar-brand" href="#""><img src="RSVP_IMAGES/logo.png" width="180" height="45" class="d-inline-block align-top" alt=""></a>
		<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
			<ul class="navbar-nav">
				<li class="nav-item active">
					<a role="button" class="btn btn-outline-warning" href="http://localhost/CommonRsvp/Internship_thdc/index.php" style="font-family: 'Oswald'; font-size: 17px;">
						<i class="fa fa-home" aria-hidden="true"></i>&nbsp;HOME<span class="sr-only">(current)</span>
					</a>
				</li>
			</ul>
		</div>
	</nav>
		
		<?php
			$output='';
			$output .='<div class="container">';
			if(isset($_GET["passkey"]))
			{
				$receivedcode=$_GET['passkey'];
				$decryptcode=base64_decode($receivedcode);
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "database_for_coloredcow";

				$conn = new mysqli($servername, $username, $password, $dbname);
				if ($conn->connect_error) 
				{
				    die("Connection failed: " . $conn->connect_error);
				}

				$sql=" SELECT * FROM new_guests WHERE random_token='$decryptcode'";
				$result=mysqli_query($conn,$sql);
				$row = $result->fetch_assoc();	
			$output .='<br><center><h2 class="card-title text-center text-warning" style="font-family:Oswald;">Thank You! Looking forward to see you at the event.</h2>
                            <div class="card-block">
                                    <h2><span style="font-size:45px;"><i class="fa fa-user-circle-o" aria-hidden="true"></i></span>&nbsp;'.$row["guest_name"].'</h2><br>
                                    <h2><span style="font-size:45px;"><i class="fa fa-envelope-open-o" aria-hidden="true"></i>&nbsp;</span>'.$row["guest_emailid"].'</h2><br>
                                    <h2><span style="font-size:45px;"><i class="fa fa-mobile" aria-hidden="true"></i>&nbsp;</span>'.$row["phone_number"].'</h2>
                                    <form id="confirm_details_form"><br>
                                    <input type="hidden" id="guestid" name="guestid" value="'.$row["guestid"].'">
                                    <input type="button" class="btn btn-success" id="confirm_rsvp" value="Confirm">
                                </form>
                                <br>
                                <p id="msgconfirm"></p>
                            </div>
                        <center>';            
        }else {
            $output .='<center><h4 class="card-title text-danger">WARNING!</h4>
                            <p class="card-text text-warning">ONLY SPECIFIC USERS ARE AUTHORIZED TO THIS PAGE. THANK YOU<p>
                            <div class="card-block">
                                   <a class="btn btn-success" href="http://localhost/CommonRsvp/Internship_thdc/index.php">Get Back</a>
                            </div>
                        </center>';            
        }
			echo $output;
		?>

		<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
		<script type="text/javascript" src="http://localhost/CommonRsvp/Internship_thdc/main.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</html>

<script type="text/javascript">
	$(document).ready(function()
	{
		$("#confirm_rsvp").on("click",function()
		{
			var confirmForm= $('#confirm_details_form');
			var dataString = "action=rsvpconfirm&"+confirmForm.serialize();
			$.ajax(
			{
				type: "POST",
				url: "http://localhost/CommonRsvp/Internship_thdc/ajax.php",
				data: dataString,
				success: function(result)
				{
					$("#msgconfirm").html(result);
				}
			});
		});
	});
</script>