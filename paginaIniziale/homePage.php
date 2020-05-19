<?php /* Controllo sessione */session_start(); ?>

<html>
  <head>
    <link rel="stylesheet" href="homePage.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" charset="utf-8"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="HomePageScript.js"></script>
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
   
    
    <div class="parent">
      <div class="div1">
        <span>
          <strong>La Rossa</strong><br>
          Date a un bambino un foglio di carta, dei colori e chiedetegli di disegnare un automobile, 
          sicuramente la farà rossa
        </span>
     </div>
      <div class="div2"> 
        <span>
        <strong>Michael Shumacher</strong><br>
          Non sei un vero campione del mondo finchè non vinci con la ferrari
      </span>
      </div>
      <div class="div3">
        <span>
        <strong>Enzo Ferrari</strong><br>
          Una macchina è come una figlia, quando 
          vince una corsa mi sento come il padre che sa 
          che la propria figlia ha preso un bel voto a scuola
      </span>  
      </div>
      <div class="div4"> 
        <span>
        <strong>Gilles Villeneuve</strong><br>
          C’è chi valutava Gilles Villeneuve uno svitato, ma con 
          il suo ardimento, e con la capacità distruttiva che 
          aveva nel pilotare auto macinando semiassi, cambi e freni 
          ci ha insegnato cosa fare. È stato campione di combattività e ha 
          regalato tanta notorietà alla Ferrari. Io gli volevo bene
      </span>
      </div>
      <div class="div5"> 
        <span>
          <strong>Niki Lauda</strong><br>
          L'ambiguità appartiene alla Ferrari come il motore a dodici cilindri.
        </span>
      </div>
    </div>
    
    
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