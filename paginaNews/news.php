<?php  session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Implement Google API</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="../paginaIniziale/homePage.css" rel="stylesheet">
    <link href="news.css" rel="stylesheet">
    <script src="js/bootstrap.js"></script>
    <script src="../paginaIniziale/homePageScript.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
  <?php
    $url = 'http://newsapi.org/v2/everything?qInTitle=ferrari&sortBy=publishedAt&language=it&apiKey=250d309974014125a29d1bbcba131d36';
    $response = file_get_contents($url);
    $NewsData = json_decode($response);
  ?>

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
    <div class="titolo">News Section</div>
  </div>
  <div class="container-fluid">
    <?php
      foreach($NewsData->articles as $News)
      {
    ?>
    <div class="row NewsGrid">
        <div class="col-md-3">
          <img src="<?php echo $News->urlToImage ?>" alt="News thumbnail">
        </div>
        <div class="col-md-9">
          <h2 class="news-title"><!--Title:--> <?php echo $News->title ?></h2>
          <h5><!--Description: --><?php echo $News->description ?></h5>
          <p><!--Content:--> <?php echo $News->content ?></p>
          <h6><!--URL:--><?php  echo "<a href=$News->url>Click to see more</a>"; ?></h6>
          <h6><!--Aurther:--> <?php echo $News->author ?><h6>
          <h6><!--Publishied:--> <?php echo $News->publishedAt ?><h6>
        </div>
    </div>
    <?php
      }
    ?>
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