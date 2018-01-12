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
#back-btn{
	margin-top: 30px;
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
		<div class="row back">
			<center><img id="back-btn" src="img/back-centered_deselected-small.png"></center>
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

function selectBack(){
	$("#back-btn").attr("src", "img/back-centered_selected-small.png");
	playSound();
}

function deselectBack(){
	$("#back-btn").attr("src", "img/back-centered_deselected-small.png");
}

function redirect(link){
	playSound();
	$('body').delay(100).fadeOut(500, function(){
		window.location = link;
	});
}

$(document).ready(function(){
	$('div').show();
	$('body').css('display', 'none').fadeIn(500);
	
	$("#boy-sprite").mouseover(selectBoy);
	$("#boy-label").mouseover(selectBoy);
	$("#boy-sprite").mouseout(deselectBoy);
	$("#boy-label").mouseout(deselectBoy);
	$("#girl-sprite").mouseover(selectGirl);
	$("#girl-label").mouseover(selectGirl);
	$("#girl-sprite").mouseout(deselectGirl);
	$("#girl-label").mouseout(deselectGirl);
	$('#back-btn').mouseover(selectBack);
	$('#back-btn').mouseout(deselectBack);

	$('#back-btn').click(function(){
		redirect("register.php");
	});
	$('body').keydown(function(key){
		console.log(key.keyCode);
	});	

});
</script>