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
            
            #header-section{
                display: flex;
                justify-content: space-around;
            }

            #main-section{
                display: flex;
                justify-content: space-around;
                align-items: center;
                height: 80vh;
            }
            
            #urlname{
                background: #F1EDEE;
                border-top: none;
                border-left: none;
                border-right: none;
                border-bottom: solid;
                border-bottom-color: #3D5467;
                
                width: 100%;
                height: 25px;
                margin: 5% 0 5% 0;
            }
            
            #footer-section{
                background: #3a3a3a;
                position:fixed;
                bottom: 0;
                left: 0;
                display: flex;
                justify-content: center;
                width: 100%;
            }
            
            #urlname::placeholder{
                color: #3D5467;
                opacity: 0.8;
                font-size: 18px;
            }
            
            #shortenbutton,#shortencustom{
                border: solid;
                border-radius: 5px;
                padding: 10px 15px 10px 15px;
                margin: 10px 0 10px 0;
            }
            
            #shortenbutton:hover,#shortencustom:hover{
                cursor: pointer;
                border: solid;
                border-color: #3D5467;
                background-color: #3D5467;
                color: #F1EDEE;
            }
            
            #shortenbutton:active,#shortencustom:active{
                transform: scale(1);
                transition: transform;
            }
            
            #copyright-text{
                background: #3a3a3a;
                color: #ffffff;
                
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
		<header id="header-section">
			<h1>Mini Link</h1>
		</header>
		<main id="main-section">
			<div id="shortened-url">
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
	echo "<center><h3><a href='http://minilink.pulsemusicai.in/". $shorturl ."' target='_blank'>http://minilink.pulsemusicai.in/".$shorturl."</a></h3></center>";
	mysqli_close($mysqli);
?> 
    </div>
            <div id="slogan">
                <h1>Make your URLs <u>mini</u>mized with Mini Link</h1>
            </div>
		</main>
		<footer id="footer-section">
            <p id="copyright-text">copyright &copy; minilink.in</p>
		</footer>
        <script>
            function disabledFeature(){
                alert("Custom URL feature is under development and will be released soon.");
            }
        </script>
	</body>
</html>   