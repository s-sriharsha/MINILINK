<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $mysqli = new mysqli("localhost","a1621wtt_minilink","}V_Eb!h8dwal","a1621wtt_minilink");
	if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
	mysqli_query($mysqli,"CREATE TABLE IF NOT EXISTS urllist (
        id int(11) NOT NULL,
        urlinput text NOT NULL,
        shorturl text NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");
	$urlinput=mysqli_real_escape_string($mysqli,$_POST['urlname']);
	$check = 0;
	while($check == 0){
	    $id=rand(0,999999999);
        if ($result = mysqli_query($mysqli,"SELECT * FROM urllist WHERE `id` = '$id'")) {
            $row_cnt = mysqli_num_rows($result);
            mysqli_free_result($result);
            if ($row_cnt == 0){
                $check = 1;
            }
    	}
	}
	$shorturl=base_convert($id,10,36);
	mysqli_query($mysqli,"insert into urllist values('$id','$urlinput','$shorturl')");
	echo "<a href='http://minilink.scientifickernel.com/". $shorturl ."' target='_blank'>http://minilink.in/".$shorturl."</a>";
	mysqli_close($mysqli);
?>    