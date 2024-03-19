<!DOCTYPE html>
<html lang='en'>
	<head>
		<meta charset='utf-8'>
        <meta content="width=device-width, initial-scale=1" name="viewport">
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
                outline: none;
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
                outline: none;
            }
            
            #shortencustom{
                border: solid;
                border-radius: 5px;
                padding: 10px 15px 10px 15px;
                margin: 10px 0 10px 0;
            }
            
            #shortenbutton{
                border: solid;
                border-radius: 5px;
                padding: 10px 15px 10px 15px;
                margin: 10px 0 10px 0;
                border-color: #3D5467;
                background-color: #3D5467;
                color: #F1EDEE;
            }

            #shortenbutton:hover,#shortencustom:hover{
                cursor: pointer;
                transform: scale(1.05);
                transition: all;
            }
            
            #shortenbutton:active,#shortencustom:active{
                transform: scale(1);
                transition: transform;
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
	<body OnLoad="document.shortenform.urlname.focus();">
		<header id="header-section">
			<h1>Mini Link</h1>
		</header>
		<main id="main-section">
			<div id="url-form">
                <form method="post" name="shortenform">
                    <input type="url" name="urlname" id="urlname" placeholder="Paste a URL here" required><br>
                    <input type="submit" formaction="shorten.php" value="Shorten URL" id="shortenbutton">
                    <input type="submit" onclick="disabledFeature()" value="Generate custom URL" id="shortencustom">
                </form>
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