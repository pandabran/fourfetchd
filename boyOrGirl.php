<html>
<head>
<title> Pokemon FourFetch'd </title>
<style>
body{
	background-color: #4a518c; 
}
.question{
	margin-top: 5%;
}
.labels{
	margin-top: 2%;
}
.sprites{
	margin-top: 2%;
}
#girl-sprite{
	margin-left: 75px;
}
#girl-label{
	margin-left: 10px;
}
</style>
<link rel="stylesheet" src="css/bootstrap.min.css">
</head>
<body>
<div class="container" hidden>
	<div class="row question">
		<div class="row">
			<center><img id="bog-btn" src="img/boy_or_girl.png"></center>
		</div>
		<div class="row labels">
			<center><img id="boy-label" src="img/boy-deselected.png"><img id="girl-label" src="img/girl-deselected.png"></center>
		</div>
		<div class="row sprites">
			<center><img id="boy-sprite" src="img/boy_sprite-deselected.png"><img id="girl-sprite" src="img/girl_sprite-deselected.png"></center>
		</div>
	</div>
</div>
</body>
</html>
<script src="js/jquery-3.1.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
var isLoginSelected = true; // true = login; false = register
var song = document.createElement("audio");
song.setAttribute("src", "audio/sfx/select.mp3");
$.get();

function selectLogin(){
	$("#login-btn").attr("src", "img/login_selected.png");
	$("#register-btn").attr("src", "img/register_deselected.png");
	if(!isLoginSelected){
		isLoginSelected = true;
		playSound();
	}	
}

function selectRegister(){
	$("#register-btn").attr("src", "img/register_selected.png");
	$("#login-btn").attr("src", "img/login_deselected.png");
	if(isLoginSelected){
		isLoginSelected = false;
		playSound();
	}		
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


function selectBoy(){
	$("#boy-sprite").attr("src", "img/boy_sprite.png");
	$("#boy-label").attr("src", "img/boy-selected.png");
	playSound();
}

function deselectBoy(){
	$("#boy-sprite").attr("src", "img/boy_sprite-deselected.png");
	$("#boy-label").attr("src", "img/boy-deselected.png");
}

function selectGirl(){
	$("#girl-sprite").attr("src", "img/girl_sprite.png");
	$("#girl-label").attr("src", "img/girl-selected.png");
	playSound();
}

function deselectGirl(){
	$("#girl-sprite").attr("src", "img/girl_sprite-deselected.png");
	$("#girl-label").attr("src", "img/girl-deselected.png");
}
$(document).ready(function(){
	$('div').show();
	$('body').css('display', 'none').fadeIn(500);
	
	$("#boy-sprite").mouseover(function(){
		selectBoy();
	});

	$("#boy-sprite").mouseout(function(){
		deselectBoy();
	});

	$("#girl-sprite").mouseover(function(){
		selectGirl();
	});

	$("#girl-sprite").mouseout(function(){
		deselectGirl();
	});

	$('body').keydown(function(key){
		console.log(key.keyCode);
	});

// -----> add select and deselect triggers for the labels

	// $("#register-btn").hover(selectRegister);
	// $("#login-btn").hover(selectLogin);
	// $("#login-btn").click(function(){
	// 	selectOption("login.php");
	// });
	// $("#register-btn").click(function(){
	// 	selectOption("register.php");
	// });

	// $('body').keydown(function(key){
	// 	console.log(key.keyCode);
	// 	if(key.keyCode == 38 || key.keyCode == 40){
	// 		isLoginSelected ? selectRegister() : selectLogin();
	// 	}else if(key.keyCode == 13){
	// 		selectOption(isLoginSelected ? "login.php" : "register.php");
	// 	}
	// });
});
</script>