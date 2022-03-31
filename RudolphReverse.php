<?php
	$dbc = mysqli_connect("localhost", "root", "", "rudolph");
	if (!$dbc) {
		die("Database connection failed: " . mysqli_error($dbc));
	}

	$year = mysqli_real_escape_string($dbc,$_GET['year']);
	$gender = mysqli_real_escape_string($dbc,$_GET['gender']);
	$age = mysqli_real_escape_string($dbc,$_GET['age']);
	$event = mysqli_real_escape_string($dbc,$_GET['event']);
	$points = mysqli_real_escape_string($dbc,$_GET['points']);
	
	if ($event=="ALL" ) {
		$SQLq = "SELECT event, result, SUBSTR(event, POSITION(' ' IN event)) AS style, CAST(SUBSTRING_INDEX(event, ' ', 1) AS DECIMAL) AS distance FROM `rudolphScore` WHERE year=".$year." AND gender='".$gender."' AND age=".$age." AND point=".$points." ORDER BY style, distance";
		$SQLresult = mysqli_query($dbc, $SQLq);
		$all = "<table><tbody>";
		while($row = mysqli_fetch_assoc($SQLresult)) {
			$all = $all."<tr><td>".$row['event']."&nbsp;</td><td>".substr($row['result'], 3)."</td></tr>";
		}
		echo $all."</tbody></table>";
	}
	else {
		$SQLq = "SELECT result FROM `rudolphScore` WHERE year=".$year." AND gender='".$gender."' AND age=".$age." AND event='".$event."' AND point=".$points;
		$SQLresult = mysqli_query($dbc, $SQLq);
		$row = mysqli_fetch_assoc($SQLresult);
		echo substr($row['result'], 3);
	}

	mysqli_close($dbc);
	
?>
