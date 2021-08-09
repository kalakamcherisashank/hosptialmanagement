<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$gender= $_POST['gender'];
	$Appointment_Date = $_POST['Appointment_Date'];
	$email = $_POST['email'];
	$contact_no = $_POST['contact_no'];
	$Address_Details = $_POST['Address_Details'];
	$Disease = $_POST['Disease'];

	//Database connection
	$conn = new mysqli('localhost','root','','hmsdb');
	if($conn->connect_error)
	{
		die('connection Failed : '.$conn->connect_error);
	}	
	else
		{ 
			$theDate    = new DateTime($Appointment_Date);
			$stringDate = $theDate->format('Y-m-d');
			$stmt = $conn->prepare("insert into appointment(firstName, lastName, gender, Date, email, contact_no, Address_Details, Disease)
				values(?, ?, ?, ?, ?, ?, ?, ?)");
			$stmt->bind_param("sssssiss",$firstName, $lastName, $gender, $stringDate, $email,  $contact_no, $Address_Details, $Disease);
			$stmt->execute();
			echo "<h2>Your Appointment successfully booked...</h2>";
			$stmt->close();
			$conn->close();
		}
	

?>


<?php

$to_email = $email;
$subject = "Appointment at Lifeshades";
$body = "Hello ".$firstName.", Your appointment is booked at ".$stringDate.". ";
$headers = "From: sender email";

if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}

 ?>