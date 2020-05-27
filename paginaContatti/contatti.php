<?php /* Controllo sessione */session_start(); ?>

<html>
    <head>
<!-- UTILIZZO DI BOOTSTRAP 4 -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" charset="utf-8"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="../paginaIniziale/HomePageScript.js"></script>
<link rel="stylesheet" href="../paginaIniziale/homePage.css">
<link rel="stylesheet" href="contatti.css">
</head>

<script>
    $(document).ready(function(){

      $('#iconaProfilo').css({
                "background-image" : "url('<?php echo $_SESSION['user-pic'] ?>')",
                "background-size" : "cover"
            });
    });
</script>

<body>
    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="#">Home</a>
        <div class="dropdown">
          <div class="dropbtn">Formula 1</div>
          <div class="dropdown-content">
              <a href="../f1/formula1.html">Panoramica</a>
              <a href="#">Auto</a>
              <a href="../f1/piloti.html">Piloti</a>
          </div>
        </div>
        <a href="../paginaNews/news.php">News section</a>
        <a href="#">Contact</a>
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


    <section class="team-area">
        <div class="container">
            <h5 class="section-heading">Membri del team</h5>
    <div class="row">
                <!-- Team member -->
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="team-single">
                        <div class="content-area">
                            <div class="side-one">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <div class="img-area">
    <img src="donatiAvatar.png" alt=""></div>
    <h4>
    Donati Riccardo</h4>
    <p>
    Studente</p>
    </div>
    </div>
    </div>
    <div class="side-two">
    <div class="card">
    <div class="card-body text-center mt-4">
    <h4>Donati Riccardo</h4>
    <br><br>
    <p class="mail">donati.1797895@studenti.uniroma1.it</p>
    <br>
    <ul class="list-inline">
        <li class="list-inline-item">
            <a class="social-icon" target="_blank" >
                <i class="fas fa-envelope" style="font-size:40px"></i>
            </a>
        </li>
    </ul>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <!-- ./Team member -->

                <!-- Team member -->
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="team-single">
                        <div class="content-area">
                            <div class="side-one">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <div class="img-area">
    <img src="avatarMarco.png" alt=""></div>
    <h4>
    Raffaele Marco</h4>
    <p>
    Studente</p>
    </div>
    </div>
    </div>
    <div class="side-two">
                                <div class="card">
                                    <div class="card-body text-center mt-4">
                                        <h4>Raffaele Marco</h4>
    <br><br>
    <p class="mail" >raffaele.1799912@studenti.uniroma1.it</p>
    <br>
    <ul class="list-inline">
    <li class="list-inline-item">
        <a class="social-icon" target="_blank" >
            <i class="fas fa-envelope" style="font-size:40px"></i>
        </a>
    </li>
    </ul>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <!-- ./Team member -->

                <!-- Team member -->
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="team-single">
                        <div class="content-area">
                            <div class="side-one">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <div class="img-area">
    <img src="avatarSilvio.png" alt=""></div>
    <h4>
    Silvestri Daniele</h4>
    <p>
    Studente</p>
    </div>
    </div>
    </div>
    <div class="side-two">
        <div class="card">
            <div class="card-body text-center mt-4">
                <h4>Silvestri Daniele</h4>
                <br><br>
                <p class="mail">silvestri.1799313@studenti.uniroma.it</p>
    <br>
    <ul class="list-inline">
    <li class="list-inline-item">
        <a class="social-icon" target="_blank" >
            <i class="fas fa-envelope" style="font-size:40px"></i>
        </a>
    </li>
    </ul>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <!-- ./Team member -->            
    
            </div>
    </div>
    </section>

    <div class="footer">
      <ul class="footerContent">
        <li><i class="fab fa-instagram"></i></li>
        <li><i class="fab fa-facebook"></i></li>
        <li><i class="fab fa-twitter"></i></li>
        <li><i class="fab fa-youtube"></i></li>
      </ul>
    </div>
    
</body>
</html>