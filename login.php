<html>
<head>
<title> Pokemon FourFetch'd | Login </title>
<style>
body{
	background-color: #4a518c; 
}
.field{
	height: 154px;
}
.fields{
	margin-top: 5%;
}
.buttons, #password-row{
	margin-top: 20px;
}
#login-btn{
	margin-left: 10px;
}
.text-field{
	display: block;
	margin: auto;
	position: relative;
	height: 67px;
	width: 602px;
	top: -87px;
	background-color: #fffbff;
	border: none;
	font-size: 48;
	font-family: Pokémon Emerald Pro Regular;
}
#username-image, #password-image{
	display: block;
	margin: auto;
	position: static;
}
#password-field{
	letter-spacing: 10px;
	font-size: 64;
}
*:focus{
    outline: none;
}
</style>
<link rel="stylesheet" src="css/bootstrap.min.css">
</head>
<body>
<div class="container" hidden>
	<div class="row fields">
		<div id="username-row" class="row field">
			<img id="username-image" src="img/username_field.png"><input class="text-field" type="text" spellcheck="false" maxlength="18" id="username-field">
		</div>
		<div id="password-row" class="row field">
			<img id="password-image" src="img/password_field.png"><input class="text-field" type="password" maxlength="18" id="password-field">
		</div>
		<div class="row buttons">
			<center><img id="back-btn" src="img/back_deselected-small.png"><img id="login-btn" src="img/login_deselected-small.png"></center>
		</div>
	</div>
</div>
</body>
</html>
<script src="js/jquery-3.1.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
var song = document.createElement("audio");
var key = document.createElement("audio");
key.setAttribute("src", "audio/sfx/key.mp3");
song.setAttribute("src", "audio/sfx/select.mp3");
$.get();

function selectLogin(){
	$("#login-btn").attr("src", "img/login_selected-small.png");
	playSound();
}

function selectBack(){
	$("#back-btn").attr("src", "img/back_selected-small.png");
	playSound();
}

function playSound(){
	if(song.currentTime != 0){
		song.pause();
		song.currentTime = 0;
	}		
	song.play();
}

function selectOption(link){
	playSound();
	$('body').delay(100).fadeOut(500, function(){
		window.location = link;
	});
}

function isValidCharacter(value){
	var ret = false;
	switch(value){
		case 189:
		case 190:
		case 222: 	ret = true;
					break; 
	}
	return ret;
}

function isAlNum(value){
	if((value >= 65 && value <= 90) || (value >= 48 && value <= 57)){
		return true;
	}else{
		return false;
	}
}

function typeConditions(word, key){
	if(word.length >= 0){
		if((word.length == 0 && (isValidCharacter(key.keyCode) || isAlNum(key.keyCode))) || (word.length < 18 && word.length > 0)){
			type();
		}
	}else if(key.keyCode == 8 && word.length == 18){
		type();
		console.log("condition2");
	}
}

function type(){
	if(key.currentTime != 0){
		key.pause();
		key.currentTime = 0;
	}
	key.play();
}

$(document).ready(function(){
	$('div').show();
	$('body').css('display', 'none').fadeIn(500);

	$("#login-btn").mouseover(selectLogin);
	$("#login-btn").mouseout(function(){
		$("#login-btn").attr("src", "img/login_deselected-small.png");
	});
	$("#login-btn").click(function(){
		selectOption("index.php");
	});

	$("#back-btn").mouseover(selectBack);
	$("#back-btn").mouseout(function(){
		$("#back-btn").attr("src", "img/back_deselected-small.png");
	});
	$("#back-btn").click(function(){
		selectOption("select.php");
	});

	$("#username-field").keydown(function(key){
		typeConditions($("#username-field").val(), key);
	});

	$("#password-field").keydown(function(key){
		typeConditions($("#password-field").val(), key);
	});
});
</script>