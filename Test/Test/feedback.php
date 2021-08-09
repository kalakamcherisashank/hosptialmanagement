<?php
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$mailid= $_POST['mailid'];
	$subject = $_POST['subject'];
	
	//Database connection
	$conn = new mysqli('localhost','root','','hmsdb');
	if($conn->connect_error)
	{
		die('connection Failed : '.$conn->connect_error);
	}	
	else
		{
			$stmt = $conn->prepare("insert into feedback(firstname, lastname, mailid, subject)
				values(?, ?, ?, ?)");
			$stmt->bind_param("ssss",$firstname, $lastname, $mailid, $subject);
			$stmt->execute();
			echo "<h2>Thank You for filling this Feedback...</h2>";
			$stmt->close();
			$conn->close();
		}
	
?>