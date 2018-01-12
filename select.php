<html>
<head>
<title> Pokemon FourFetch'd </title>
<style>
body{
	background-color: #4a518c; 
}
.select-buttons{
	margin-top: 15%;
}
#reg-button{
	margin-top: 4px;
}
</style>
<link rel="stylesheet" src="css/bootstrap.min.css">
</head>
<body>
<div class="container" hidden>
	<div class="row select-buttons">
		<div class="row">
			<center><img id="login-btn" src="img/login_selected.png"></center>
		</div>
		<div class="row" id="reg-button">
			<center><img id="register-btn" src="img/register_deselected.png"></center>
		</div>
	</div>
</div>
</body>
</html>
<script src="js/jquery-3.1.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
var isLoginSelected = true; // true = login; false = register
var isRedirecting = false;
var isSelectPlaying = false;
var select = document.createElement("audio");
select.setAttribute("src", "audio/sfx/select.mp3");
$.get();

function selectLogin(){
	if(!isRedirecting){
		$("#login-btn").attr("src", "img/login_selected.png");
		$("#register-btn").attr("src", "img/register_deselected.png");
		if(!isLoginSelected && !isSelectPlaying){
			isLoginSelected = true;
			playSound();
		}
	}	
}

function selectRegister(){
	if(!isRedirecting){
		$("#register-btn").attr("src", "img/register_selected.png");
		$("#login-btn").attr("src", "img/login_deselected.png");
		if(isLoginSelected && !isSelectPlaying){
			isLoginSelected = false;
			playSound();
		}
	}	
}

function playSound(){
	if(select.currentTime != 0){
		select.pause();
		select.currentTime = 0;
	}
	select.play();
}

function selectOption(link){
	if(!isSelectPlaying){
		isRedirecting = true;
		playSound();
		isSelectPlaying = true;
	}
	$('body').delay(100).fadeOut(500, function(){
		window.location = link;
	});
}

$(document).ready(function(){
	$('div').show();
	$('body').css('display', 'none').fadeIn(500);
	
	if(!isRedirecting){
		$("#register-btn").hover(selectRegister);
		$("#login-btn").hover(selectLogin);
		$("#login-btn").click(function(){
			selectOption("login.php");
		});
		$("#register-btn").click(function(){
			selectOption("register.php");
		});
		$('body').keydown(function(key){
			console.log(key.keyCode);
			if(key.keyCode == 38 || key.keyCode == 40){
				isLoginSelected ? selectRegister() : selectLogin();
			}else if(key.keyCode == 13){
				selectOption(isLoginSelected ? "login.php" : "register.php");
			}
		});
	}
});
</script>