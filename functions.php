<?php


	function connection()
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "database_for_coloredcow";

		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) 
		{
		    die("Connection failed: " . $conn->connect_error);
		} 

		return $conn;

	}

	function events()
	{
		

	   	$event_name=  $_POST['event_name'];
	   	$event_theme= $_POST['event_theme'];
	   	$event_date=  $_POST['event_date'];
	   	$event_venue= $_POST['event_venue'];


		$conn = connection();


		$sql_insert_event = "INSERT INTO new_event (event_name, event_theme, event_date, event_venue)
				VALUES ('$event_name', '$event_theme', '$event_date', '$event_venue')";

		if ($conn->query($sql) === TRUE) 
		{
		    echo '<div class="alert alert-info" role="alert">"New Event has been successfully added."</div>';
		} 

		else 
		{
		    return "Error: " . $sql . "<br>" . $conn->error ;	
		}
		$conn->close();	
	}

	function guest_details()
	{
		
		$guest_name=    $_POST['guest_name'];
		$guest_emailid= $_POST['guest_emailid'];
		$phone_number=  $_POST['phone_number'];
		$guest_gender=  $_POST['guest_gender'];
		
		$conn = connection();
		
		$sql_select_guests="SELECT guest_emailid, phone_number FROM new_guests WHERE guest_emailid='$guest_emailid' OR phone_number='$phone_number' ";
		$sql_request_guests="SELECT request_emailid, phonenumber FROM new_guests_requests WHERE request_emailid='$guest_emailid' OR phonenumber='$phone_number' ";
		$result_select_guests=mysqli_query($conn,$sql_select_guests);
		$result_request_guests=mysqli_query($conn,$sql_request_guests);

		$sql_select_container=mysqli_num_rows($result_select_guests);
		$sql_request_container=mysqli_num_rows($result_request_guests);
		if ($sql_select_container>0)  
		{	
			die("This Person is already in our GUEST LIST.");
		}
		
		if ($sql_request_container>0) 
		{
			die("This person has already REQUESTED for the event");
		}	
		
		$sql_insert_guests = "INSERT INTO new_guests (guest_name, guest_emailid, phone_number, guest_gender,status)
				VALUES ('$guest_name', '$guest_emailid', '$phone_number', '$guest_gender','Pending')";

		if ($conn->query($sql) === TRUE) 
		{
		    echo '<div class="alert alert-info" role="alert">"New Guest has been successfully added."</div>';	
		} 
		else 
		{
		    return "Error:"  . $sql . "<br>" . $conn->error;
		}
		$conn->close();	
	}

	function requests()
	{
		

		$request_name=    $_POST['request_name'];
		$request_emailid= $_POST['request_emailid'];
		$request_gender=  $_POST['request_gender'];
		$phonenumber=     $_POST['phonenumber'];

		$conn = connection();

		$sql_select_guests="SELECT guest_emailid, phone_number FROM new_guests WHERE guest_emailid='$request_emailid' OR phone_number='$phonenumber' ";
		$sql_request_guests="SELECT request_emailid, phonenumber FROM new_guests_requests WHERE request_emailid='$request_emailid' OR phonenumber='$phonenumber' ";
		$result_select_guests=mysqli_query($conn,$sql_select_guests);
		$result_request_guests=mysqli_query($conn,$sql_request_guests);

		$sql_select_container=mysqli_num_rows($result_select_guests);
		$sql_request_container=mysqli_num_rows($result_request_guests);
		if ($sql_select_container>0)  
		{	
			die("This Person is already in our GUEST LIST.");
		}
		
		if ($sql_request_container>0) 
		{
			die("This person has already REQUESTED for the event");
		}

		$sql_insert_guests= "INSERT INTO new_guests_requests (request_name, request_emailid, phonenumber, request_gender,status)
				VALUES ('$request_name', '$request_emailid', '$phonenumber', '$request_gender','Requested')";

		if ($conn->query($sql_insert_guests) === TRUE) 
		{
		    echo '<div class="alert alert-info" role="alert">Thank you for showing interest. We will connect to you soon.</div>';
		} 
		else 
		{
		    return "Error:"  . $sql . "<br>" . $conn->error;
		}
		$conn->close();	
	}

	function update_details()
	{
		$conn = connection();
		
		$your_email=$_POST['user_email'];

		$sql_select_guests="SELECT * FROM new_guests WHERE guest_emailid='$your_email'";
		$result_select_guests=mysqli_query($conn,$sql_select_guests);
		$sql_select_container=mysqli_num_rows($result_select_guests);
		
		$sql_confirm_guests="SELECT * FROM new_guests WHERE status='Confirm' AND guest_emailid='$your_email'";
		$result_confirm_guests=mysqli_query($conn,$sql_confirm_guests);
		$sql_confirm_container=mysqli_num_rows($result_confirm_guests);
		if ($sql_confirm_container>0) 
		{
			die("YOU ARE ALREADY CONFIRMED IN OUR GUEST LIST. THANK YOU!!");
		}

		if ($sql_select_container>0) 
		{
			$row= $result->fetch_assoc();
			$uniquecode=md5(uniqid(rand()));
			$encryptuniquecode=base64_encode($uniquecode);
			
			echo "<a target='_blank' href='rsvp_confirmation_page.php/?passkey=$encryptuniquecode'>CLICK TO RSVP</a>";
			$sql="UPDATE new_guests SET random_token='$uniquecode' WHERE guest_emailid='$your_email'";
			mysqli_query($conn, $sql);
		}
		else
		{
			echo '<div class="alert alert-info" role="alert">"<strong>SORRY BUT YOU ARE NOT IN OUR GUEST LIST.</strong>HOPE TO SEE YOU ANOTHER TIME"</div>';
		}
		$conn->close();		
	}

	function rsvpconfirm()
	{
		$conn = connection();
		$id_guest=$_POST['guestid'];	
		$updatestatus=" UPDATE new_guests
						SET status='Confirm'
						WHERE guestid='$id_guest' ";				
		if(mysqli_query($conn,$updatestatus)===TRUE)
		{
			echo "<h4 style='color: green;'>Your Response is Successfully Updated !<br></h4>";
		}
		else
		{
			echo "error";
		}		
	}

	function show_events()
	{
		$conn = connection();

		$sql = "SELECT event_name, event_theme, event_date, event_venue FROM new_event ORDER BY `event_date` asc limit 1";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) 
		{
		    while($row = $result->fetch_assoc()) 
		    {   
		        echo "<span style='font-size:50px; '>" . $row["event_name"]. "</span><br> <br>
		        <span style='font-size:30px;'><i class='fa fa-calendar' style=' color:black;'aria-hidden='true'></i>&nbsp;" . $row["event_date"]. "</span><br><br> 
		        <span style='font-size:30px;'><i class='fa fa-map-marker fa-lg' style=' color:black;' aria-hidden='true'></i>&nbsp;" . $row["event_venue"]. "</span><br><br>";  
		    }
		} 
		else
		{
		    echo "NO EVENTS TO BE DISPLAYED....";
		}
		$conn->close();		
	}

	function rsvp()
	{
		$conn1 = connection();
		$output = ""; 
		$procedure = "
						CREATE PROCEDURE selectguest()
						BEGIN  
							SELECT * FROM new_guests ORDER BY guestid desc;
						END;
						";
			if(mysqli_query($conn1, "drop PROCEDURE IF EXISTS selectguest"))
			{
				if (mysqli_query($conn1,$procedure)) 
				{
					$query ="CALL selectguest()";
					$result1= mysqli_query($conn1,$query);
					$output .='<table class="table table-hover table-striped table-bordered table-responsive">';
					$output .='<thead>';
					$output .=	'<tr>';
					$output .=  '<th>#</th>';	
					$output .=	'<th>Name</th>';			
					$output .=	'<th>Email</th>';		
					$output .=	'<th>Phone No</th>';	
					$output .=	'<th>Gender</th>';
					$output .=	'<th>Status</th>';							
					$output .=	'</tr>';
					$output .=	'</thead>';
					$output .=	'<tbody>';	
					
					if (mysqli_num_rows($result1)>0) 
					{
						$x=1;
						while ($row=mysqli_fetch_array($result1)) 
						{
							$output .='<tr class="table-danger">'; 	
	 				        $output .='<th scope="row">'.$x.'</th>';
							$output .='<td width="20%">'.$row["guest_name"].'</td>';	
							$output .='<td width="20%">'.$row["guest_emailid"].'</td>';
							$output .='<td width="20%">'.$row["phone_number"].'</td>' ;
							$output .='<td width="20%">'.$row["guest_gender"].'</td>' ;
							
							if ($row['status']=='Confirm') 
							{
								$output .='<td width="20%" style="color : green">'.$row["status"].'</td>' ;
							}
							else
							{
								$output .='<td width="20%" style="color:red;">'.$row["status"].'</td>' ;	
							}	
							$output .='</tr>';
							$x=$x+1;		
						}
					}
					else
					{
						$output .='<tr class="table-info">';
						$output .='<td colspan="6">NO GUESTS IN THE LISTS</td>';
						$output .=	'</tr>';	
					}
						$output .='</tbody>';						
						$output .='</table>';
						echo $output;
				}
			}						
	}

	function submit_requests()
	{
		$conn1 = connection();
		$output = ''; 
		$procedure = "
						CREATE PROCEDURE select_requested_guest()
						BEGIN  
							SELECT * FROM new_guests_requests ORDER BY status DESC;
						END;
					";
			
			if(mysqli_query($conn1, "drop PROCEDURE IF EXISTS select_requested_guest"))
			{
				if (mysqli_query($conn1,$procedure)) 
				{
					$query ="CALL select_requested_guest()";
					$result3= mysqli_query($conn1,$query);
					$output .='
							<table class="table table-hover table-striped
							table-bordered table-responsive">
								<thead>
									<tr>	
										<th>#</th>
										<th>Name</th>
										<th>Email</th>
										<th>Phone No.</th>
										<th>Gender</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
							<tbody>';
				    			if (mysqli_num_rows($result3) > 0)
				    			{
									$y=1;
									while ($row2=mysqli_fetch_array($result3)) 
									{
										if($row2["status"]==="Requested"){
                        $output .='
                                <tr class="table-danger">
                                	<th scope="row">'.$y.'</th>
                                    <td width="15%">'.$row2["request_name"].'</td>
                                    <td width="20%">'.$row2["request_emailid"].'</td>
                                    <td width="15%">'.$row2["phonenumber"].'</td>
                                    <td width="15%">'.$row2["request_gender"].'</td>
                                    <td width="15%" style="color:blue;">'.$row2["status"].'</td>
                                    <td width="25%"><button type="button" name="add" id="'.$row2["request_id"].'" class="btn btn-success btn-sm approve">Approve</button> &nbsp; 
                                    <button type="button" name="reject" id="'.$row2["request_id"].'" class="btn btn-danger btn-sm reject">Reject</button></td>
                                </tr>
                        ';
                        }else{
                        $output .='
                                <tr class="table-danger">
   	                                <th scope="row">'.$y.'</th>
                                    <td width="15%">'.$row2["request_name"].'</td>
                                    <td width="20%">'.$row2["request_emailid"].'</td>
                                    <td width="15%">'.$row2["phonenumber"].'</td>
                                    <td width="15%">'.$row2["request_gender"].'</td> 	
                                    <td width="15%" style="color:red;">'.$row2["status"].'</td>
                                    <td width="25%"><button type="button" name="add" id="'.$row2["request_id"].'" class="btn btn-success btn-sm approve">Approve</button>
                                    </td>
                                </tr>';                            

                        }
                        $y=$y+1;
									}
									
								}
								else
								{
									$output .='
												<tr class="table-info">
													<td colspan="7"> NO REQUESTS YET !!!!!!!</td>
												</tr>
											';
								}
								$output .='</tbody>
										</table>';
								echo $output;
							}
						}						
					$conn1->close();
	}
	
	function showallevents()
	{
		$conn = connection();
		$output='';
		if ($conn->connect_error) 
		{
		    die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "SELECT * FROM new_event ORDER BY event_date asc";
		$result = $conn->query($sql);
		$output .='
							<table class="table table-hover table-striped
							table-bordered table-responsive">
								<thead>
									<tr>	
										<th>#</th>
										<th>Event Name</th>
										<th>Event Date</th>
										<th>Event Venue</th>
										<th>Action</th>
									</tr>
								</thead>
							<tbody>';
				    			if ($result->num_rows > 0)
				    			{
									$y=1;
									while ($row=$result->fetch_assoc()) 
									{
										$output .='
												<tr class="table-danger">
													<th scope="row">'.$y.'</th>	
													<td width="30%">'.$row["event_name"].'</td>
													<td width="25%">'.$row["event_date"].'</td>
													<td width="25%">'.$row["event_venue"].'</td>';
													
													$output .='<td width="20%">
													<button type="button" class="btn btn-success edit" id="'.$row["event_id"].'" data-toggle="modal" data-target="#editModal" data-whatever="@mdo">Edit</button> &nbsp; 
													<button type="button" class="delete btn btn-danger" id="'.$row["event_id"].'">Delete</button>
													</td>
												</tr>
											';
									$y=$y+1;
									}
								}
								else
								{
									$output .='
												<tr class="table-info">
													<td colspan="6"> 0 results!!!!</td>
												</tr>
											';
								}
								$output .='</tbody>
										</table>';
								echo $output;
		$conn->close();
	}

	if(isset($_POST["acton"])=="approve")
	{
		$conn1 = connection();

		$request_id= mysqli_real_escape_string($conn1, $_POST["request_id"]);	
		$result5= "SELECT * FROM new_guests_requests WHERE request_id='$request_id'";
		$result6= mysqli_query($conn1, $result5);
		$row= mysqli_fetch_assoc($result6);
		
		$name= $row['request_name'];
		$email= $row['request_emailid'];
		$phone= $row['phonenumber'];
		$gender= $row['request_gender'];

		$result7= "INSERT INTO new_guests(guest_name, guest_emailid, phone_number, guest_gender, status)
					VALUES('$name', '$email', '$phone', '$gender', 'Confirm')";
		if(mysqli_query($conn1, $result7)===TRUE)
		{
			echo $name."  REQUEST ACCEPTED";
			$result8= "DELETE FROM new_guests_requests WHERE request_id='$request_id'";
			mysqli_query($conn1, $result8);
		}
		else
		{
			echo "Error: " .$result7."<br>". $conn1->error;
		}
		$conn1->close();
	}

	function reject_guest()
	{
		$conn1 = connection();
		
		$request_id= mysqli_real_escape_string($conn1, $_POST["request_id"]);	
		$results=" SELECT status FROM new_guests_requests WHERE status='Rejected' AND request_id='$request_id'";
		$confirm=mysqli_query($conn1, $results);
		if (mysqli_num_rows($confirm)>0) 
		{
			die("ALREADY REJECTED");
		}
		else
		{
			$result9= "UPDATE new_guests_requests 
						SET status='Rejected' 
						WHERE request_id='$request_id'";
			
			if(mysqli_query($conn1, $result9)===TRUE)
			{
				echo "REJECTED";
			}	
			else
			{
				echo "Error: " .$result9."<br>". $conn1->error;
			}
		}
		$conn1->close();
	}

	function extract_event_data()
	{
		$conn = connection();
		$event_id=$_POST["event_id"];
		$sql = "SELECT * FROM new_event WHERE event_id='$event_id' ";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) 
		{
		    $row = $result->fetch_assoc();
		    echo $row["event_name"].",".$row["event_date"].",".$row["event_venue"].",".$row["event_id"];
		} 
		else
		{
		    echo "0 results";
		}
		$conn->close();
	}

	function update_event_data()
	{
		

	   	$event_name=  $_POST['update_event_name'];
	   	$event_date=  $_POST['update_event_date'];
	   	$event_venue= $_POST['update_event_venue'];
	   	$event_id=    $_POST["update_event_id"];
		
		$conn = connection();

		$sql = "UPDATE new_event
				SET event_name='$event_name',event_date= '$event_date',event_venue= '$event_venue'
				WHERE event_id='$event_id' ";
		
		if ($conn->query($sql) === TRUE) 
		{  
		    echo "Information has been successfully updated";
		} 
		else 
		{
		    return "Error: " . $sql . "<br>" . $conn->error ;
		}
		$conn->close();
	}

	function delete_event()
	{
		

		$event_id= $_POST["update_event_id"];
		$conn = connection();

		$sql = "DELETE FROM new_event
				WHERE event_id='$event_id' ";
		if ($conn->query($sql) === TRUE) 
		{	    
		    echo "Information has been successfully deleted";
		} 
		else 
		{
		    return "Error: " . $sql . "<br>" . $conn->error ;
		}
		$conn->close();
	}
?> 