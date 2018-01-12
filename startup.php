<html>
<head>
<title> Pokemon FourFetch'd </title>
<style>
body{
	background-color: black; 
}
#animation{
	margin-top: 2%;
	height: 90%;
}
</style>
<link rel="stylesheet" src="css/bootstrap.min.css">
</head>
<body>
<div class="container" hidden>
	<center><img id="animation" src="img/startup.gif"><center>
</div>
</body>
</html>
<script src="js/jquery-3.1.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
var song = document.createElement("audio");
var cry = document.createElement("audio");
song.setAttribute("src", "audio/bgm/startup.mp3");
cry.setAttribute("src", "audio/sfx/charizard.mp3");
$.get();

function select(){
	cry.play();
	cry.onplay = function(){
		song.volume = 0.4;
	};
	cry.onended = function(){
		song.volume = 1.0;
		$('body').fadeOut(500, function(){
			song.pause();
			redirect("select.php");
		});
	};
	
}

function redirect(link){
	window.location = link;
}

$(document).ready(function(){
	$('div').show();
	$('body').css('display', 'none').fadeIn(3000);

	song.play();
	song.onended = function(){
		setTimeout(redirect("index.php"), 2500);
	}

	$('body').click(select);
	$('body').keyup(select);
});
</script>