<!DOCTYPE html>
<html lang='en'>
	<head>
		<meta charset='utf-8'>
        <meta content="width=device-width, initial-scale=1" name="viewport" />
		<title>Minilink - Shorten your URLs</title>
		<style>
            *{
                background: #313D5A;
                font-family: monospace;
                color: #CBC5EA;
            }
            
            #header-section{
                display: flex;
                justify-content: space-around;
            }
            
            #navigation-menu-options{
                display: flex;
                justify-content: space-around;
            }
            
            #navigation-menu-options a{
                padding: 15px;
                margin: 0 10px 0 10px;
                text-decoration: none;
                border: solid;
                font-family: sans-serif;
            }
            
            #navigation-menu-options a:hover{
                background: #CBC5EA;
                color: #313D5A;
            }
            
            #navigation-menu-options li{
                list-style: none;
                margin: 15px;
            }
            
            #main-section{
                display: flex;
                justify-content: space-around;
                align-items: center;
                height: 80vh;
            }
            
            #urlname{
                background: #313D5A;
                border-top: none;
                border-left: none;
                border-right: none;
                border-bottom: solid;
                border-bottom-color: #e1f7f1;
                
                width: 100%;
                height: 25px;
                margin: 5% 0 5% 0;
            }
            
            #footer-section{
                background: #3a3a3a;
                position: absolute;
                bottom: 0;
                left: 0;
                display: flex;
                justify-content: center;
                width: 100%;
            }
            
            #urlname::placeholder{
                color: #e1f7f1;
                opacity: 0.8;
                font-size: 18px;
            }
            
            #shortenbutton,#shortencustom{
                border: solid;
                border-radius: 0;
                padding: 10px 15px 10px 15px;

            }
            
            #shortenbutton:hover,#shortencustom:hover{
                transform: scale(1.05);
                transition: transform;
                cursor: pointer;
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
            
            @media screen and (max-width: 720px){
                #slogan{
                    display: none;
                }
                
                
            }
		</style>
	</head>
	<body OnLoad="document.shortenform.urlname.focus();">
		<header id="header-section">
			<h1>Mini Link</h1>
			<!--<nav>
				<ul id="navigation-menu-options">
					<li><a href="https://minilink.in/">Home</a></li>
					<li><a href="https://minilink.in/linktrees.html">Link Trees</a></li>
					<li><a href="https://minilink.in/user.html">Log In/Sign Up</a></li>
				</ul>
			</nav>-->
		</header>
		<main id="main-section">
			<div id="url-form">
                <form method="post" name="shortenform">
                    <input type="url" name="urlname" id="urlname" placeholder="Paste a URL here" required><br>
                    <input type="submit" formaction="shorten.php" value="Shorten URL" id="shortenbutton">
                    <input type="submit" formaction="custom.php" value="Generate custom URL" id="shortencustom" disabled>
                </form>
            </div>
            <div id="slogan">
                <h1>Make your URLs <u>mini</u>mized with MiniLink</h1>
            </div>
		</main>
		<footer id="footer-section">
            <p id="copyright-text">copyright &copy; minilink.in</p>
		</footer>
	</body>
</html>