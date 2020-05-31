<?php /* Controllo sessione */session_start(); ?>

<html>
  <head>
    <link rel="stylesheet" href="../paginaIniziale/homePage.css">
    <link rel="stylesheet" href="css/modal.css" rel="stylesheet">

    <link rel="shortcut icon" type="img/png" href="../favicon.png">

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" charset="utf-8"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="../vue.min.js"></script>
    <script src="../paginaIniziale/HomePageScript.js"></script>
    <title> History </title>

    
    

<script>
    $(document).ready(function(){

      $('#iconaProfilo').css({
                "background-image" : "url('<?php echo $_SESSION['user-pic'] ?>')",
                "background-size" : "cover"
            });
    });
  </script>

<script>
    $(document).ready(function(){
      $('#quiz').click(function() {
        if('<?php echo isset($_SESSION["email"]);?>'){
          window.location.replace("../quiz/quiz.php");
        }
        else{
          window.alert("Devi effettuare il login per accedere al quiz!");
        }
      });
    });
  </script>
      

      
      
      <link href="css/modal.css" rel="stylesheet" type="text/css" />
      <link href="paginaStoria.css" rel="stylesheet" type="text/css">




      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700' rel='stylesheet' type='text/css'>
      <link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>

</head>
<body link="white" vlink="white">

<div id="mySidebar" class="sidebar">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
      <a href="../paginaIniziale/homePage.php">Home</a>
      <div class="dropdown">
        <div class="dropbtn">Formula 1</div>
        <div class="dropdown-content">
            <a href="../paginaF1/formula1.php">Panoramica</a>
            <a href="../paginaRicercaPiloti/paginaRicercaPiloti.php">Ricerca piloti</a>
        </div>
      </div>
      <a href="../paginaRicercaMacchine/paginaRicercamacchine.php">Ricerca vetture</a>
      <a href="../paginaStoria/history.php"> Storia Ferrari </a>
      <a href="../paginaNews/news.php">News</a>
      <a href="../paginaStore/paginaStore.php"> Store </a>
      <a href='#' id="quiz"> Quiz </a>
      <a href="../paginaContatti/contatti.php">Contact</a>
    </div>

    <div class="navbar">
      <div class="openbtn" onclick="openNav()">☰ MENU</div>
      <div class="loginbtn">
        <?php if(isset($_SESSION['email']))
          echo "<div id=\"profile\"><div id=\"iconaProfilo\"></div><div id=\"username\"><a href=\"../paginaProfilo/paginaProfilo.php\">".$_SESSION['nome']."</a></div></div>";
        ?>
        <?php if(!isset($_SESSION['email']))
          echo "<a href=\"../paginaLogin/Login.html\">LOGIN</a>";
        ?>
        </div>
    </div>
    

    <div class="header">
      <div class="titolo">Passione Ferrari</div>
    </div>

    <div class="sottotitolo"> History </div>
    
    
    <div class="orizzontale" id="app">
      <div v-for="x in storia">

        <!-- BOX -->
        <div class="line-element">
          <div class="cont-page">
            <div class="caption">
              <figure class="nomeClasse" data-effect="fade-in">
                <img :src="x.sfondo" height="90%">
                <figcaption>
                  <h2 style="text-align: center; margin-top: 50px; font-size:xx-large;"></a>{{x.titolo}}</a></h2>
                  <h2 style="text-align: center; margin-top: 50px; font-size: small;"><a :href="x.box">>scopri di più</a></h2>
                </figcaption>
              </figure>
            </div>
          </div>
        </div>

        <!-- POPUP -->
        <a href="#x" class="overlay" :id="x.pop"></a>
        <div class="popup">
          <div class="pic-left">
              <img :src="x.image">
          </div>
          <h2>{{x.titolo}}</h2>
          <p>{{x.descrizione}}</p>
          <a class="close" title="chiudere" href="#close">×</a>
            <video v-if="x.video" width="100%" height="350px" :src="x.video" style="outline:none;" controls></video>
        </div>
      
      </div>
    </div>
  <script>
    var app=new Vue({
        el:'#app',
        data:{
          storia: ''
        },
        methods:{
          stampa: function(){
              axios.get('getStoria.php',{
              })
              .then(function(response){
                app.storia = response.data;
              }).catch(function(error){
                console.log(error);
            });
          }
        },
        created: function(){
          this.stampa();
        }
      });
  </script>
  
    <div class="footer">
      <ul class="footerContent">
        <li><a href="https://www.instagram.com/ferrari"> <i class="fab fa-instagram"></i></a></li>
        <li><a href="https://www.facebook.com/ScuderiaFerrari"> <i class="fab fa-facebook"></i></a></li>
        <li><a href="https://twitter.com/ScuderiaFerrari" > <i class="fab fa-twitter"></i></a></li>
        <li><a href="https://www.youtube.com/ferrari"> <i class="fab fa-youtube"></i></a></li>
      </ul>
    </div>

  </body>
</html>