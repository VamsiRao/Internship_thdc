<?php
require_once 'functions.php';
if (isset($_POST["action"])) 
{	
	switch ($_POST["action"]) 
	{	
		case 'events':  		events();
								break;
		
		case 'guest_details':  	guest_details();
								break;
		
		case 'update_details':  update_details();
								break;
								
		case 'requests':        requests();
								break;

		case 'showallguests':	rsvp();
								break;

		case 'transferguests': submit_requests();
								break;

		case 'rsvpconfirm': 	rsvpconfirm();
								break;

		case 'allevents':		showallevents();
								break;
		
		case 'reject':			reject_guest();
								break;
		
		case 'edit_event': 		extract_event_data();
								break;

		case 'update_event':    update_event_data();
								break;

		case 'delete_event':    delete_event();
								break;													
		
		default:				echo "Invalid";
								break;
	}
} else {
	
		conole.error('No Post Action Received');
		return;
}
?>