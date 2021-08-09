<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$gender= $_POST['gender'];
	$password = $_POST['password'];
	$weight = $_POST['weight'];
	$email = $_POST['email'];
	$contact_no = $_POST['contact_no'];
	$address = $_POST['address'];

	//Database connection
	$conn = new mysqli('localhost','root','','hmsdb');
	if($conn->connect_error)
	{
		die('connection Failed : '.$conn->connect_error);
	}	
	else
		{
			$stmt = $conn->prepare("insert into registration(firstName, lastName, gender, password, weight, email, contact_no, address)
				values(?, ?, ?, ?, ?, ?, ?, ?)");
			$stmt->bind_param("sssiisis",$firstName, $lastName, $gender, $password, $weight, $email, $contact_no, $address);
			$stmt->execute();
			echo "<h2>Registration Successfully...</h2>";
			$stmt->close();
			$conn->close();
		}
	
?>
<?php

$to_email = $email;
$subject = "Registration at Lifeshades";
$body = "Welcome ".$firstName.", You are Registered with us ";
$headers = "From: sender email";

if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}

 ?>