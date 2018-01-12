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
	<center><img id="animation" src="img/intro.gif"><center>
</div>
</body>
</html>
<script src="js/jquery-3.1.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
var song = document.createElement("audio");
song.setAttribute("src", "audio/bgm/intro.mp3");
$.get();

function redirect(){
	window.location = "startup.php";
}

$(document).ready(function(){
	$('div').show();
	$('body').css('display', 'none').fadeIn(3000);

	song.play();
	song.onended = function(){
		redirect();
	}

	$('body').click(redirect);
	$('body').keyup(redirect);
});
</script>