<?php /* Controllo sessione */session_start(); ?>

<html>
<head>
	<title>quiz</title>
	<link rel="stylesheet" href="css/quiz.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" charset="utf-8"></script>
	<script src="../paginaIniziale/HomePageScript.js"></script>

	<link rel="shortcut icon" type="img/png" href="favicon.png">

	<style type="text/css">

 
		@font-face { 
			font-family: FontFerrari; 
			src: url("css/FerroRosso.ttf"); 
		};
	 
	 
	</style>

<script>
    $(document).ready(function(){

      $('#iconaProfilo').css({
                "background-image" : "url('<?php echo $_SESSION['user-pic'] ?>')",
                "background-size" : "cover"
            });
    });
  </script>

</head>
<body>
    
	<div class="quiz_wrapper">
           
           <div class="question" id="questionBox">
           	
           </div>
           
           <div class="options">
           	  <ul id="ul">
           	  	  <li id="op1" onclick="button(this)"></li>
           	  	  <li id="op2" onclick="button(this)"></li>
           	  	  <li id="op3" onclick="button(this)"></li>
           	  	  <li id="op4" onclick="button(this)"></li>
           	  </ul>
           </div>
           <div class="score">
           	   <div class="next">
           	   	  <button type="button" onclick="next()" id="button"><b>Successiva</b></button>
           	   </div>
           	   <div class="score-card">
           	   	  <b>Score : </b><span id="scoreCard">0</span>
				</div>
				<div class="home">
				<div class="loginbtn">
					<?php if(isset($_SESSION['email']))
					echo "<div id=\"profile\"><a href=\"../paginaProfilo/paginaProfilo.php\"><div id=\"iconaProfilo\"></div><div id=\"username\">".$_SESSION['nome']."</div></div></a></div></div>";
					?>
					<?php if(!isset($_SESSION['email']))
					echo "<a href=\"../paginaLogin/Login.html\">LOGIN</a>";
					?>
					</div>
				</div>

           </div>

	</div>
<script src="js/script.js"></script>


</html>