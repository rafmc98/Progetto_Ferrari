<?php /* Controllo sessione */session_start(); ?>

<html>
  <head>
    <link rel="stylesheet" href="homePage.css">
    <script src="HomePageScript.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" charset="utf-8"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <script>
    $(document).ready(function(){
      $(".parent div").mouseenter(function(){
        $(this).find("span").fadeIn(900);
      });
      $(".parent div").mouseleave(function(){
        $(this).find("span").fadeOut(600);
      });
    });
  </script>
  <body>

    <div id="mySidebar" class="sidebar">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
      <a href="#">About</a>
      <div class="dropdown">
        <div class="dropbtn">Formula 1</div>
        <div class="dropdown-content">
            <a href="#">Panoramica</a>
            <a href="#">Auto</a>
            <a href="#">Piloti</a>
        </div>
      </div>
      <a href="#">Clients</a>
      <a href="#">Contact</a>
    </div>

    <div class="navbar">
      <div class="openbtn" onclick="openNav()">☰ MENU</div>
      <div class="loginbtn">
        <?php if(isset($_SESSION['email']))
          echo "<a class=\"user\" href=\"../paginaProfilo/paginaProfilo.html\">USER</a>";?>
        <?php if(!isset($_SESSION['email']))
          echo "<a href=\"#\">LOGIN</a>"?>
      </div>
    </div>
    

    <div class="header">
      <div class="titolo">Passione Ferrari</div>
    </div>
   
    
    <div class="parent">
      <div class="div1">
        <span>
          <strong>Html</strong>
          In informatica l'HyperText Markup Language (HTML; traduzione letterale: linguaggio a marcatori per ipertesti) 
          è un linguaggio di markup.Nato per la formattazione e impaginazione di documenti ipertestuali disponibili nel web 1.0,
          oggi è utilizzato principalmente per il disaccoppiamento della struttura logica di una pagina web 
          (definita appunto dal markup) e la sua rappresentazione, gestita tramite gli stili CSS per adattarsi alle
          nuove esigenze di comunicazione e pubblicazione all'interno di Internet
        </span>
     </div>
      <div class="div2"> 
        <span>
          <strong>Html</strong>
          In informatica l'HyperText Markup Language (HTML; traduzione letterale: linguaggio a marcatori per ipertesti) 
          è un linguaggio di markup.Nato per la formattazione e impaginazione di documenti ipertestuali disponibili nel web 1.0,
          oggi è utilizzato principalmente per il disaccoppiamento della struttura logica di una pagina web 
          (definita appunto dal markup) e la sua rappresentazione, gestita tramite gli stili CSS per adattarsi alle
          nuove esigenze di comunicazione e pubblicazione all'interno di Internet
      </span>
      </div>
      <div class="div3">
        <span>
          <strong>Html</strong>
          In informatica l'HyperText Markup Language (HTML; traduzione letterale: linguaggio a marcatori per ipertesti) 
          è un linguaggio di markup.Nato per la formattazione e impaginazione di documenti ipertestuali disponibili nel web 1.0,
          oggi è utilizzato principalmente per il disaccoppiamento della struttura logica di una pagina web 
          (definita appunto dal markup) e la sua rappresentazione, gestita tramite gli stili CSS per adattarsi alle
          nuove esigenze di comunicazione e pubblicazione all'interno di Internet
      </span>  
      </div>
      <div class="div4"> 
        <span>
          <strong>Html</strong>
          In informatica l'HyperText Markup Language (HTML; traduzione letterale: linguaggio a marcatori per ipertesti) 
          è un linguaggio di markup.Nato per la formattazione e impaginazione di documenti ipertestuali disponibili nel web 1.0,
          oggi è utilizzato principalmente per il disaccoppiamento della struttura logica di una pagina web 
          (definita appunto dal markup) e la sua rappresentazione, gestita tramite gli stili CSS per adattarsi alle
          nuove esigenze di comunicazione e pubblicazione all'interno di Internet
      </span>
      </div>
      <div class="div5"> 
        <span>
          <strong>Html</strong>
          In informatica l'HyperText Markup Language (HTML; traduzione letterale: linguaggio a marcatori per ipertesti) 
          è un linguaggio di markup.Nato per la formattazione e impaginazione di documenti ipertestuali disponibili nel web 1.0,
          oggi è utilizzato principalmente per il disaccoppiamento della struttura logica di una pagina web 
          (definita appunto dal markup) e la sua rappresentazione, gestita tramite gli stili CSS per adattarsi alle
          nuove esigenze di comunicazione e pubblicazione all'interno di Internet
        </span>
      </div>
    </div>
    
    
    <div class="footer">
      <ul class="footerContent">
        <li><i class="fab fa-instagram"></i></li>
        <li><i class="fab fa-facebook"></i></li>
        <li><i class="fab fa-twitter"></i></li>
      </ul>
    </div>

  </body>
</html>