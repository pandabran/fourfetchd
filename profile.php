<?php
include("connector.php");

$res = mysqli_query($mysqli, "SELECT * FROM `user` WHERE userID=1;");
$user = mysqli_fetch_row($res);
	$username =  $user[1];
	$password =  $user[2];
	$gender = $user[3];
	$lcount = $user[6];
	$wcount = $user[7];
	$bcount = $user[8];

?>


<html>
<head>
<title> Pokemon FourFetch'd | Profile </title>
<style>
body{
	background-color: #4a518c;
}
#template{
	margin-top: 4em;
}
#char1{
	margin-top: -25.2em;
	margin-left: 25em;
}
p{
  font-size: 48;
	font-family: Pokémon Emerald Pro Regular;
}
#trainer_name{
	margin-top:-10em;
	margin-left:13.2em;
}
#updateUser{
	margin-top:-1.8em;
	margin-left:14.8em;
	height: 0.8em;
	width: 5.5em;
	border: none;
	background-color: #c0e8d0;
	visibility: hidden;
	padding: -2em -2em;
	font-size: 48;
	font-family: Pokémon Emerald Pro Regular;
}
/* .text-field{
	font-size: 48;
	font-family: Pokémon Emerald Pro Regular;
} */
#trainer_status{
	margin-left: 7.5em;
	margin-top: -0.7em;
}
#trainer_data{
	margin-left: 7.5em;
	margin-top:-0.5em;
}
#b1{
	visibility: hidden;
	margin-left: -23em;
	margin-top: 2em;
}
#b2{

	visibility: hidden;
	margin-left: -13.8em;
	margin-top: -4em;
}
#b3{
	visibility: hidden;
	margin-left: -5.1em;
	margin-top: -4em;
}
#b4{
	visibility: hidden;
	margin-left: 4em;
	margin-top: -4em;
}
#b5{
	visibility: hidden;
	margin-left: 12.95em;
	margin-top: -4em;
}
#b6{
	visibility: hidden;
	margin-left: 22em;
	margin-top: -4em;
}
#b7{
	visibility: hidden;
	margin-left: 31.3em;
	margin-top: -4em;
}
#b8{
	visibility: hidden;
	margin-left: 39.9em;
	margin-top: -3.8em;
}
#edit{
	margin-top: -27em;
	margin-left: 41em;
}

</style>
<link rel="stylesheet" src="css/bootstrap.min.css">
</head>
<body>
	<div class="row">
		<center>
		<div>
			<img id="template" src="img/trainer_template.png">
		</div>
		<div>
			<?php
			 if( $gender == 'female'){
				 echo("<img id='char1' src='img/character1.gif'>");
			 }else{
				 echo("<img id='char1' src='img/character2.gif'>");
			 }
			 ?>

		</div>
	</center>
		<div>
			<p id="trainer_name"> User: <?php echo("$username");?></p>
			<!-- <form action="profile.php" method="post"> -->
				<input class="text-field" type="text"  maxlength="12" id="updateUser">
				<!--<p id="trainer_name"> User Name: Mimi</p>-->
			<!-- </form> -->
		</div>

		<div>
			<p id="trainer_status"> Status</p>
		</div>

		<div>

			<p class="left-align>" id="trainer_data">
				 Region: Kanton<br>
				 Level: <?php echo("$bcount");?><br>
				 Win: <?php echo("$wcount");?><br>
				 Loss: <?php echo("$lcount");?><br>
			 </p>
		</div>
		<center>
		<div>
			<img id="b1" src="img/b1.gif">
		</div>
		<div>
			<img id="b2" src="img/b2.gif">
		</div>
		<div>
			<img id="b3" src="img/b3.gif">
		</div>
		<div>
			<img id="b4" src="img/b4.gif">
		</div>
		<div>
			<img id="b5" src="img/b5.gif">
		</div>
		<div>
			<img id="b6" src="img/b6.gif">
		</div>
		<div>
			<img id="b7" src="img/b7.gif">
		</div>
		<div>
			<img id="b8" src="img/b9.gif">
		</div>
		<div>
			<img id="edit" src="img/edit_deselect.gif">
		</div>

		</center>
	</div>
</body>
<html>
<script src="js/jquery-3.1.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
var editSelected = false;
var select = document.createElement("audio");
select.setAttribute("src", "audio/sfx/select.mp3");
$.get();

function playSound(){
	if(select.currentTime != 0){
		select.pause();
		select.currentTime = 0;
	}
	select.play();
}

function selectEdit(){
	if(!editSelected){
		$("#edit").attr("src", "img/edit.gif");
		playSound();
	}
}

$(document).ready(function(){
	if(!editSelected){
		$("#edit").mouseover(selectEdit);
		$("#edit").mouseout(function(){
			$("#edit").attr("src", "img/edit_deselect.gif");
		});
		$("#edit").click(function(){
			$("#updateUser").css('visibility','visible');
		});
	}
 });

//display badges
$(document).ready(function(){
	for($i = 1; $i <= <?php echo($bcount);?>;$i++){
		$('#b'+$i).css('visibility','visible');
	}

});

</script>
