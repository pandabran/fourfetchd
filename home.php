<html>
<head>
<title> Pokemon FourFetch'd | Home </title>
<style>
body{
	background-color: #4a518c; 
}
h1{
	top: -5%;
	left: 33%;
	position: absolute;
	color: #aefcf5;
	font-size: 800%;
	text-shadow: 2px 2px 5px black;
	font-family: Pokémon Emerald Pro Regular;
}
#animation{
	margin-top: 1%;
	display: block;
	margin-left: auto;
	margin-right: auto;
	margin-bottom: 1%;
	height: 80%;
	border-radius: 5%;
	border: 3px solid #567d85;
}
#play-btn, #quit-btn{
	margin-left: 10px;
}
</style>
<link rel="stylesheet" src="css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<h1>FOURFETCH'D</h1>
	<img id="animation" src="img/pokemon_bg_1.gif">
	<div class="row fields">
		<div class="row buttons">
			<center><img id="instruction-btn" src="img/instructions_deselected.png"><img id="play-btn" src="img/play_deselected.png"><img id="quit-btn" src="img/quit_deselected.png"></center>
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

function selectInstruction(){
	if(!isRedirecting){
		$("#instruction-btn").attr("src", "img/instructions_selected.png");
		playSound();
	}
}

function selectPlay(){
	if(!isRedirecting){
		$("#play-btn").attr("src", "img/play_selected.png");
		playSound();
	}	
}

function selectQuit(){
	if(!isRedirecting){
		$("#quit-btn").attr("src", "img/quit_selected.png");
		playSound();
	}	
}

function selectOption(link){
	playSound();
	$('body').delay(100).fadeOut(500, function(){
		window.location = link;
	});
}

function playSound(){
	if(select.currentTime != 0){
		select.pause();
		select.currentTime = 0;
	}		
	select.play();
}

$(document).ready(function(){
	$('div').show();
	$('body').css('display', 'none').fadeIn(500);
	if(!isRedirecting){
		$("#instruction-btn").mouseover(selectInstruction);
		$("#instruction-btn").mouseout(function(){
			$("#instruction-btn").attr("src", "img/instructions_deselected.png");
		});
		$("#instruction-btn").click(function(){
			selectOption("#");
		});

		$("#play-btn").mouseover(selectPlay);
		$("#play-btn").mouseout(function(){
			$("#play-btn").attr("src", "img/play_deselected.png");
		});
		$("#play-btn").click(function(){
			selectOption("#");
		});

		$("#quit-btn").mouseover(selectQuit);
		$("#quit-btn").mouseout(function(){
			$("#quit-btn").attr("src", "img/quit_deselected.png");
		});
		$("#quit-btn").click(function(){
			selectOption("#");
		});
	}
});
</script>