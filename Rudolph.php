<?php
	require 'db.php';

	function clean($data)
	{
	    $data = htmlspecialchars($data);
	    $data = stripslashes($data);
	    $data = trim($data);
	    return $data;
	}
	if (isset($_GET['year'], $_GET['gender'], $_GET['age'], $_GET['event'], $_GET['result'])) {
		$year = intval(mysqli_real_escape_string($dbc,$_GET['year']));
		$gender = mysqli_real_escape_string($dbc,$_GET['gender'][0]);
		$age = intval(mysqli_real_escape_string($dbc,$_GET['age']));
		$event = clean(mysqli_real_escape_string($dbc,$_GET['event']));
		$result = preg_replace("([^0-9:.])", "", mysqli_real_escape_string($dbc,$_GET['result']));
		
		$SQLq = "SELECT point FROM `rudolphScore` WHERE year=".$year." AND gender='".$gender."' AND age=".$age." AND event='".$event."' AND result>='".$result."'";
		#echo $SQLq."<br>"; 
		$SQLresult = mysqli_query($dbc, $SQLq);
		$point = mysqli_num_rows($SQLresult);

		mysqli_close($dbc);
		echo $point;
	} 
	else {
		echo "error";
	}
?>
