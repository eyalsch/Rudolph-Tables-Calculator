<?php
	$dbc = mysqli_connect("localhost", "root", "", "rudolph");
	if (!$dbc) {
		die("Database connection failed: " . mysqli_error($dbc));
	}

	#get point
	$year = mysqli_real_escape_string($dbc,$_GET['year']);
	$gender = mysqli_real_escape_string($dbc,$_GET['gender']);
	$age = mysqli_real_escape_string($dbc,$_GET['age']);
	$event = mysqli_real_escape_string($dbc,$_GET['event']);
	$result = mysqli_real_escape_string($dbc,$_GET['result']);
	
	$SQLq = "SELECT point FROM `rudolphScore` WHERE year=".$year." AND gender='".$gender."' AND age=".$age." AND event='".$event."' AND result>='".$result."'";
	#echo $SQLq."<br>"; 
	$SQLresult = mysqli_query($dbc, $SQLq);
	$point = mysqli_num_rows($SQLresult);
	if ($point==0) {$point=1;}
	mysqli_close($dbc);
	echo $point;
?>
