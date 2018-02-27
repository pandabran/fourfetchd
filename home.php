<html>
<head>
<title> Pokemon FourFetch'd | Home </title>
<style>
body{
	background-color: #4a518c; 
}
h1{
	top: -2%;
	left: 33%;
	position: absolute;
	color: #aefcf5;
	font-size: 8em;
	text-shadow: 2px 2px 5px black;
	font-family: Pokémon Emerald Pro Regular;
}
#animation{
	margin-top: 3%;
	display: block;
	margin-left: auto;
	margin-right: auto;
	margin-bottom: 1.5%;
	height: 35em;
	border-radius: 5%;	
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.profile{
	margin-top: -42%;
	margin-left: 91%;
	width: 5em;
	height: 5em;
	border-radius: 50%;
	border: 3px solid grey;
	position: absolute;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.profile:hover{
	box-shadow: none;
}
#play-btn, #quit-btn{
	margin-left: 1%;
}
</style>
<link rel="stylesheet" src="css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<h1>FOURFETCH'D</h1>
	<img id="animation" src="img/pokemon_bg_1.gif">
	<input type="image" id="profile-btn" class="profile" src="img/profile_girl.png">
	<div class="row fields">
		<div class="row buttons">
			<center><img id="instruction-btn" src="img/instruction_deselected.png"><img id="play-btn" src="img/plays_deselected.png"><img id="quit-btn" src="img/quits_deselected.png"></center>
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
		$("#instruction-btn").attr("src", "img/instruction_selected.png");
		playSound();
	}
}

function selectPlay(){
	if(!isRedirecting){
		$("#play-btn").attr("src", "img/plays_selected.png");
		playSound();
	}	
}

function selectQuit(){
	if(!isRedirecting){
		$("#quit-btn").attr("src", "img/quits_selected.png");
		playSound();
	}	
}

function selectProfile(){
	if(!isRedirecting){
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
			$("#instruction-btn").attr("src", "img/instruction_deselected.png");
		});
		$("#instruction-btn").click(function(){
			selectOption("#");
		});

		$("#play-btn").mouseover(selectPlay);
		$("#play-btn").mouseout(function(){
			$("#play-btn").attr("src", "img/plays_deselected.png");
		});
		$("#play-btn").click(function(){
			selectOption("#");
		});

		$("#quit-btn").mouseover(selectQuit);
		$("#quit-btn").mouseout(function(){
			$("#quit-btn").attr("src", "img/quits_deselected.png");
		});
		$("#quit-btn").click(function(){
			selectOption("index.php");
		});

		$("#profile-btn").mouseover(selectProfile);
		$("#profile-btn").click(function(){
			selectOption("index.php");
		});
	}
});
</script>
