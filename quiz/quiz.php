<?php /* Controllo sessione */session_start(); ?>

<html>
<head>
	<title>quiz</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
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

		   <div id="sparisci" >
				<div class="titolo-class">
					<p style="text-align:center"><h3 class="punti"> TOP 5 SCORE </h3></p>
				</div>
				<div class="punteggi">
					<script type="text/javascript">
                        refresh_div();
					</script>
				</div>
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
<script type="text/javascript">
	   
	   var ul=document.getElementById('ul');
   var btn=document.getElementById('button');
   var scoreCard=document.getElementById('scoreCard');
   var quizBox=document.getElementById('questionBox');
  var op1=document.getElementById('op1');
  var op2=document.getElementById('op2');
  var op3=document.getElementById('op3');
  var op4=document.getElementById('op4');
  var mail="<?php echo $_SESSION['email']; ?>"
  var immagine="<?php echo $_SESSION['user-pic']; ?>"

      var app={
                questions:[
                          {q:'Qual è stato l ultimo pilota italiano ad iniziare una stagione da pilota titolare Ferrari?', 
                          options:['Giancarlo Fisichella','Ivan Capelli','Nicola Larini','Nessuno di questi'],answer:2},

                          {q:'Quanti GP ha vinto in totale Schumacher con la Ferrari?',options:['64','68','72','76'],answer:3},

                          {q:'Quale pilota brasiliano ha ottenuto più vittorie con la Ferrari?',options:['Rubens Barrichello','Felipe Massa','Nelson Piquet','Nessuno di questi'],answer:2},

                          {q:'In quale anno venne fondata la Scuderia Ferrari?',options:['1929','1925','1930','1922'],answer:1},

                          {q:'In quale città è nato Fernando Alonso?',options:['Madrid','Oviedo','Saragozza','Barcellona'],answer:2},

                          {q:'Quale è stato il primo GP vinto da Schumacher con la Ferrari?',options:['Italia 1996','Francia 1996','Spagna 1996','Nessuna delle precedenti'],answer:3},

                          {q:'Chi ha vinto il primo GP della storia della Ferrari?',options:['Nino Farina','Jose Froilàn Gonzàlez','Felipe Massa','Alberto Ascari'],answer:2},

                          {q:'Quanti campionati piloti ha vinto in totale la Ferrari?',options:['16','12','15','18'],answer:3},

                          {q:'Quale è stato il primo campione del mondo con la Ferrari?',options:['Ascari 1952','Farina 1950','Gonzales 1953','Nessuna delle precedenti'],answer:1},

                          {q:'Quale pilota brasiliano ha ottenuto più vittorie con la Ferrari?',options:['Rubens Barrichello','Nelson Piquet','Felipe Massa','Nessuna delle precedneti'],answer:3}

                          ],
               index:0,
			   email:mail,
			   img:immagine,
                load:function(){
                	   if(this.index<=this.questions.length-1){
                        quizBox.innerHTML=this.index+1+" - "+this.questions[this.index].q;      
                        op1.innerHTML=this.questions[this.index].options[0];
                        op2.innerHTML=this.questions[this.index].options[1];
                        op3.innerHTML=this.questions[this.index].options[2];
                        op4.innerHTML=this.questions[this.index].options[3];
                        this.scoreCard();
						sparisci.style.display="none";
                     }
                     else{
                        app.getQuery();
                        quizBox.innerHTML="Complimenti! Hai completato il quiz.";      
                        op1.style.display="none";
                        op2.style.display="none";
                        op3.style.display="none";
                        op4.style.display="none";
                        btn.style.display="none";
						sparisci.style.display="";
						
						}
                },

                 next:function(){
                    this.index++;
					this.load();
					
                 },


                check:function(ele){
                   
                         var id=ele.id.split('');
                         
                         if(id[id.length-1]==this.questions[this.index].answer){
                         	this.score++;
                         	ele.className="correct";
                         	ele.innerHTML="GIUSTO!";
                         	this.scoreCard();
                         }
                         else{
                         	ele.className="wrong";
                            ele.innerHTML="SBAGLIATO";
                           

                         }
                },
                notClickAble:function(){
                       for(let i=0;i<ul.children.length;i++){
                       	    ul.children[i].style.pointerEvents="none";
                       }
                },

                clickAble:function(){
                       for(let i=0;i<ul.children.length;i++){
                       	    ul.children[i].style.pointerEvents="auto";
                       	    ul.children[i].className=''

                       }
                },
                score:0,
                scoreCard:function(){
                   scoreCard.innerHTML=this.score+"/"+this.questions.length;
                },
               
                getQuery: function(){   
                  axios.get('ajaxfile.php',{
                      params:{
                          score: this.score,
                          email: this.email,
                  }

                  }).then(function (response) {
                      app.variants = response.data;
                  }).catch(function (error) {
                      console.log(error);
                  });
                },
                
            }

            window.onload=app.load();

           function button(ele){
           	     app.check(ele);
           	     app.notClickAble();
           }

         function  next(){
              app.next();
              app.clickAble();
         } 

		 function refresh_div() {
        	jQuery.ajax({
            url:'ajaxfile2.php',
            type:'GET',
            success:function(results) {
                jQuery(".punteggi").html(results);
            }
        });
    }

    t = setInterval(refresh_div,1000);

</script>
</html>