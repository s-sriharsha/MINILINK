<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	$mysqli = mysqli_connect("localhost","a1621wtt_minilink","}V_Eb!h8dwal","a1621wtt_minilink");
	if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
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
		echo "Error";
	}
	mysqli_close();
?>