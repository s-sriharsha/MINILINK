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
            
            #headerSection{
                display: flex;
                justify-content: space-around;
            }
            
            #mainSection{
                display: flex;
                justify-content: center;
                align-items: center;
                height: 80dvh;
            }

            #slogan {
                width: 50%;
                text-align: center;
            }
            #slogan img {
                width: 50%;
            }

            .urlName{
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

            #urlFormContainer {
                width: 50%;
                position: relative;
            }

            .urlForm {
                width: 50%;
                min-width: 280px;
                margin: 0 auto;
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
            
            .urlName::placeholder{
                color: #3D5467;
                opacity: 0.8;
                font-size: 18px;
                outline: none;
            }
            
            .shortenButton{
                border: solid;
                border-radius: 5px;
                padding: 10px 15px 10px 15px;
                margin: 10px 0 10px 0;
                border-color: #3D5467;
                background-color: #3D5467;
                color: #F1EDEE;
            }

            .shortenButton:hover{
                cursor: pointer;
                transform: scale(1.05);
                transition: all;
            }
            
            .shortenButton:active{
                transform: scale(1);
                transition: transform;
            }
            
            #copyrightText{
                background: #3a3a3a;
                color: #ffffff;
                font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                font-size: 14px;
            }

            #customButton {
                padding: 30px 0;
            }

            #customForm {
                display: none;
            }

            #note {
                display: none;
            }

            .switch {
                position: relative;
                display: inline-block;
                width: 30px;
                height: 17px;
            }

            .switch input {
                opacity: 0;
                width: 0;
                height: 0;
            }

            .slider {
                position: absolute;
                cursor: pointer;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: #ccc;
                transition: .4s;
            }

            .slider:before {
                position: absolute;
                content: "";
                height: 13px;
                width: 13px;
                left: 2px;
                bottom: 2px;
                background-color: white;
                transition: .4s;
            }

            input:checked + .slider {
                background-color: #3D5467;
            }

            input:focus + .slider {
                box-shadow: 0 0 1px #3D5467;
            }

            input:checked + .slider:before {
                transform: translateX(13px);
            }

            .slider.round {
                border-radius: 17px;
            }

            .slider.round:before {
                border-radius: 50%;
            }
            @media screen and (max-width: 1000px){
                #slogan{
                    display: none;
                }
            }
		</style>
	</head>
	<body OnLoad="document.shortenform.urlname.focus();">
		<header id="headerSection">
			<h1>Mini Link</h1>
		</header>
		<main id="mainSection">
			<div id="urlFormContainer">
                <form method="post" name="shortenform" class="urlForm" id="defaultForm">
                    <input type="url" name="urlname" class="urlName" placeholder="Paste a URL here" required><br>
                    <input type="submit" formaction="shorten.php" value="Shorten URL" class="shortenButton"><br>
                </form>
                <form method="post" name="shortenform" class="urlForm" id="customForm">
                    <input type="url" name="urlname" class="urlName" placeholder="Paste a URL here" required><br>
                    <input type="text" name="urlshortcode" class="urlName" placeholder="Enter the custom URL text" id="urlShortCode" maxlength="20" minlength="6" required>
                    <p id="note" style="color: #D64933">*Please enter only alphabets and numbers.</p>
                    <br>
                    <input type="submit" formaction="customshorten.php" value="Shorten URL" class="shortenButton"><br>
                </form>
                <div id="customButton" class="urlForm"><label>Generate a custom URL <div class="switch">
                    <input type="checkbox" name="customurl" id="customUrl">
                    <span class="slider round"></span></div>
                </label></div>
            </div>
            <div id="slogan">
                <img src="linkimage.svg">
            </div>
		</main>
		<footer id="footerSection">
            <p id="copyrightText">copyright &copy; minilink.in</p>
		</footer>
        <script>
            const customUrlTag = document.querySelector("#customUrl");
            customUrlTag.addEventListener('change', ()=>{
                let toggleState = customUrlTag.checked;
                if (toggleState===true) {
                    console.log('on');
                    document.querySelector("#customForm").style.display = 'block';
                    document.querySelector("#defaultForm").style.display = 'none';
                } else {
                    console.log('off');
                    document.querySelector("#customForm").style.display = 'none'
                    document.querySelector("#defaultForm").style.display = 'block';
                }
            });

            function isAlphanumeric(inputString) {
                const regex = /^[a-zA-Z0-9]+$/;
                return regex.test(inputString);
            }

            document.querySelector("#urlShortCode").addEventListener('input', ()=>{
                const shortCodeValue = document.querySelector("#urlShortCode").value;
                if (isAlphanumeric(shortCodeValue)) {
                    document.querySelector("#note").style.display = 'none';
                    document.querySelector("#urlShortCode").style.borderBottom = 'solid #3D5467';
                } else {
                    document.querySelector("#note").style.display = 'block';
                    document.querySelector("#urlShortCode").style.borderBottom = 'solid #D64933';
                }
            })

        </script>
	</body>
</html>