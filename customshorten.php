<!DOCTYPE html>
<html lang='en'>
	<head>
		<meta charset='utf-8'>
        <meta content="width=device-width, initial-scale=1" name="viewport" />
		<title>Minilink - Shorten your URLs</title>
		<style>
            *{
                background: #F1EDEE;
                font-family: monospace;
                color: #3D5467;
            }
            
            #headerSection{
                display: flex;
                justify-content: space-around;
            }

            #mainSection{
                display: flex;
                justify-content: space-around;
                align-items: center;
                height: 80vh;
            }
            #slogan {
                width: 50%;
                text-align: center;
            }
            #slogan img {
                width: 50%;
            }
            #footerSection{
                background: #3a3a3a;
                position:fixed;
                bottom: 0;
                left: 0;
                display: flex;
                justify-content: center;
                width: 100%;
            }
            
            #copyright-text{
                background: #3a3a3a;
                color: #ffffff;
                font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                font-size: 14px;
            }
            
            @media screen and (max-width: 1000px){
                #slogan{
                    display: none;
                }
                
                
            }
		</style>
	</head>
	<body >
		<header id="headerSection">
			<h1>Mini Link</h1>
		</header>
		<main id="mainSection">
			<div id="shortenedUrl">
<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $mysqli = new mysqli("localhost","u197704904_minilink","Minilink@sksh11","u197704904_minilink");
	if (mysqli_connect_errno()) {
        echo "<center><p>server looks to be offline. Please try after some time</p></center>";
        exit();
    }
	mysqli_query($mysqli,"CREATE TABLE IF NOT EXISTS urllist (
        id int(11) NOT NULL,
        urlinput text NOT NULL,
        shorturl text NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");
	$urlinput=mysqli_real_escape_string($mysqli,$_POST['urlname']);
    $shorturl=mysqli_real_escape_string($mysqli,$_POST['urlshortcode']);
    if ($result = mysqli_query($mysqli,"SELECT * FROM urllist WHERE `shorturl` = '$shorturl'")) {
        $row_cnt = mysqli_num_rows($result);
        mysqli_free_result($result);
        if ($row_cnt == 0){
            mysqli_query($mysqli,"insert into urllist values('$id','$urlinput','$shorturl')");
            echo "<center><h3><a href='http://minilink.pulsemusicai.in/". $shorturl ."' target='_blank'>http://minilink.pulsemusicai.in/".$shorturl."</a></h3></center>";
        } else {
            echo "<center><h3>URL already exists, please try with other custom URL.</h3></center>";
        }
    }
	mysqli_close($mysqli);
?> 
    </div>
            <div id="slogan">
            <img src="linkimage.svg">
            </div>
		</main>
		<footer id="footerSection">
            <p id="copyrightText">copyright &copy; minilink.in</p>
		</footer>
        <script>
            
        </script>
	</body>
</html>   