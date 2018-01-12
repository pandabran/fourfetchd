<html>
<head>
<title> Pokemon FourFetch'd | Register </title>
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
#next-btn{
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
#username-image, #password-image, #confirm-image{
	display: block;
	margin: auto;
	position: static;
}
#password-field, #confirm-field{
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
		<div id="password-row" class="row field">
			<img id="confirm-image" src="img/confirm-password_field.png"><input class="text-field" type="password" maxlength="18" id="confirm-field">
		</div>
		<div class="row buttons">
			<center><img id="back-btn" src="img/back_deselected-small.png"><img id="next-btn" src="img/next_deselected.png"></center>
		</div>
	</div>
</div>
</body>
</html>
<script src="js/jquery-3.1.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
var isRedirecting = false;
var select = document.createElement("audio");
var key = document.createElement("audio");
key.setAttribute("src", "audio/sfx/key.mp3");
select.setAttribute("src", "audio/sfx/select.mp3");
$.get();

function selectNext(){
	if(!isRedirecting){
		$("#next-btn").attr("src", "img/next_selected.png");
		playSound();
	}	
}

function selectBack(){
	if(!isRedirecting){
		$("#back-btn").attr("src", "img/back_selected-small.png");
		playSound();
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
	isRedirecting = true;
	playSound();
	$('body').delay(100).fadeOut(500, function(){
		window.location = link;
	});
}

function typeConditions(word, key){
	if(word.length == 18 && key.keyCode == 8){
		type();
	}else if(word.length >= 0){
		if((word.length == 0 && (isValidCharacter(key.keyCode) || isAlNum(key.keyCode))) || (word.length < 18 && word.length > 0)){
			type();
		}
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
	if(!isRedirecting){
		$("#next-btn").mouseover(selectNext);
		$("#next-btn").mouseout(function(){
			$("#next-btn").attr("src", "img/next_deselected.png");
		});
		$("#next-btn").click(function(){
			selectOption("boyOrGirl.php");
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

		$("#confirm-field").keydown(function(key){
			typeConditions($("#confirm-field").val(), key);
		});
	}
});
</script>