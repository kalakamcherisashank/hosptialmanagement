<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hmsdb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if($conn)
{

	echo "";
}
else
{
	echo "connection failed";
}

 ?>