<?php /* Controllo sessione */session_start(); ?>

<html>
  <head>
    <link rel="stylesheet" href="homePage.css">
    <link rel="shortcut icon" type="img/png" href="../favicon.png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" charset="utf-8"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="HomePageScript.js" type="text/javascript"></script>
    <title> Passione Ferrari </title>
  </head>

  <?php include '../templates/jquerySessioni.php'; ?>

  <body>
    
    <?php include '../templates/header-sideBar.php'; ?>

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
    
    
  <?php include '../templates/footer.html'; ?>
    

  </body>
</html>