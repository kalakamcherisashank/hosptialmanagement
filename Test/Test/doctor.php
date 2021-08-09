<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta name="keywords" content="Hospital,Hospital.COM,Hospital Website">
	<meta name="author" content="Hospital.COM">
	<title>Hospital Management System</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/fontawesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	
</head>
<body>
<!--start header-->
<header>
	<div class="menu">
        <!--start modules coding-->
        <div class="modules-name">
            <a href="index.html">
                <h2>
                    <i class="fa fa-hospital"></i>&nbsp;
                LifeShades Hospital</h2>
            </a>
        </div>
        <!--end modules coding-->
        <!--start nav & menu codding-->
    <nav>
            <ul>
                <li><a href="index.html">HOME</a></li>
                                    
                <li><a href="admin.html">REGISTRATION</a></li>
                <li><a href="doctor.php">DOCTOR</a></li>
                <li><a href="Appointment.html">APPOINTMENT</a></li> 
                <li><a href="#">ABOUT US</a>
                <div class="sub-menu">
                    <ul>
                    <li><a href="Introduction.html">Intoduction</a></li>
                    <li><a href="r&r.html">Rules & Regulations</a></li>
                    <li><a href="Staff_Info.html">Staff Info</a></li>
                    <li><a href="feedback.html">Feedback</a></li>
                    </ul>
                   </div>
                   </li> 
                   <li><a href="TRIAL.html">HELP</a>
            </ul>
        </nav>
        <!--end nav & menu codding-->
    </div>
<!--end header-->
<!--start section-->
<section>
	<div class="w-80">
		
<table border="4" id="display" style="text-align: center; background-color: skyblue; margin: auto;">

		<tr>
			<th style="padding: 3px 3px; color: black;">firstName</th>
			<th style="padding: 3px 3px; color: black;">lastName</th>
			<th style="padding: 3px 3px; color: black;">email</th>
			<th style="padding: 3px 3px; color: black;">Appointment_Date</th>
			<th style="padding: 3px 3px; color: black;">Contact_no</th>
			<th style="padding: 3px 3px; color: black;">Address Details</th>
            <th style="padding: 3px 3px; color: black;">Disease</th>
            <th style="padding: 3px 3px; color: black;">Operation</th>
		</tr>

	
	<?php 

include("display.php");
error_reporting(0);
$query = "select * from appointment";
$data = mysqli_query($conn,$query);
$total = mysqli_num_rows($data);


if ($total!=0) {

	
	while ($result=mysqli_fetch_assoc($data))
     {
		echo "
		<tr>
		<td>".$result[firstName]."</td>
		<td>".$result[lastName]."</td>
		<td>".$result[email]."</td>
		<td>".$result[Date]."</td>
		<td>".$result[contact_no]."</td>
		<td>".$result[Address_Details]."</td>
        <td>".$result[Disease]."</td>
        <td><a href='doctor.php?cn=$result[contact_no]'>Delete</td>
		";
	}
}
else{
	echo "<h3>no records found</h3>";
    }
?>


</table>
    
	</div>

    <?php 
        include("connection.php");
        error_reporting(0);
        $contact_no=$_GET['cn'];
        $query="delete from appointment where contact_no='$contact_no'";
        $data=mysqli_query($conn,$query);
     ?>
</section>
<!--end section-->

<!--start footer-->
<footer style="height: 200px;">
    
    <h4 style="padding-top: 10px;"><u>Contact Us :-</u></h4>
    <p>
        <h5>Email: lifeshades.hospital@gmail.com</h5>
        <h5>Contact No: 9712112917</h5>
        <h5>Address: Opp. Karnavati Club, Sarkhej - Gandhinagar Hwy

Ahmedabad Gujarat 380015

India</h5>

            </p>
    <div class="card-footer text-right">
                        <big>&copy; LifeShades Hospital</big>
                        </div>
</footer>
<!--end footer-->
 
</body>
</html>


