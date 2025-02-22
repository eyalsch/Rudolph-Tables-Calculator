<?php
	require 'db.php';

	function clean($data)
	{
	    $data = htmlspecialchars($data);
	    $data = stripslashes($data);
	    $data = trim($data);
	    return $data;
	}
	if (isset($_GET['year'], $_GET['gender'], $_GET['age'], $_GET['event'], $_GET['points'])) {
		$year = intval(mysqli_real_escape_string($dbc,$_GET['year']));
		$gender = mysqli_real_escape_string($dbc,$_GET['gender'][0]);
		$age = intval(mysqli_real_escape_string($dbc,$_GET['age']));
		$event = clean(mysqli_real_escape_string($dbc,$_GET['event']));
		$points = intval(mysqli_real_escape_string($dbc,$_GET['points']));
		
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
	}
	else {
		echo "error";
	}	
?>
