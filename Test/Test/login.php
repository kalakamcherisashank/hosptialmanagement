<?php 
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	//data base connection
	$conn = new mysqli('localhost','root','','hmsdb');
	if($conn->connect_error)
	{
		die('connection Failed : '.$conn->connect_error);
	}
	else{
		$stmt = $conn->prepare("select * from registration where email = ?");
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$stmt_result = $stmt->get_result();
		if($stmt_result->num_rows > 0){
			$data = $stmt_result->fetch_assoc();
			if($data['password'] == $password){
				echo "<h2>Login Successfully...</h2>";
			} else{
				echo "<h2>Something want's wrong, Please check email or password</h2>";
			}
		}else{
			echo "<h2>Something want's wrong, Please check email or password</h2>";
		}
	}
 ?>