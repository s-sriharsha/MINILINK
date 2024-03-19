<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	$mysqli = mysqli_connect("localhost","u197704904_minilink","Minilink@sksh11","u197704904_minilink");
	if (mysqli_connect_errno()) {
            echo "Sorry! Our systems are offline. Please try after some time.";
            exit();
        }
	$code = mysqli_real_escape_string($mysqli,$_GET["code"]);
	$query = "select * from urllist where shorturl = '".$code."'";
	
	$result = mysqli_query($mysqli,$query);
	$numrows = mysqli_num_rows($result);
	if ($numrows == 1) {
		$row = mysqli_fetch_assoc($result);
		$url = "Location: ".$row["urlinput"]."";
		
		header($url,true,301);
		exit;
	}
	else {
		echo "The URL you have entered doesnot exist.";
	}
	mysqli_close($mysqli);
?>