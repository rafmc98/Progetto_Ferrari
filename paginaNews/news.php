<?php  session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>News section</title>
    <link href="../paginaF1/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../paginaIniziale/homePage.css" rel="stylesheet">
    <link href="news.css" rel="stylesheet">
    <link rel="shortcut icon" type="img/png" href="../favicon.png">
    <script src="../paginaF1/bootstrap/js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" charset="utf-8"></script>
    <script src="../paginaIniziale/homePageScript.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <?php include '../templates/jquerySessioni.php'; ?>
    
</head>
<body>
  <!-- Decodifica il file Json restituito dall'url dell'API  -->
  <?php
    $url = 'http://newsapi.org/v2/everything?qInTitle=Ferrari+f1&sortBy=publishedAt&language=it&apiKey=250d309974014125a29d1bbcba131d36';
    $response = file_get_contents($url);
    $NewsData = json_decode($response);
  ?>

  <?php include '../templates/header-sideBar.php'; ?>

  <div class="titolo-pagina" >News Section</div>

  <!-- News  -->
  <div class="container-fluid">
    <!-- Itera sugli elementi del file json-->
    <?php
      foreach($NewsData->articles as $News)
      {
    ?>
      <!-- Per ogni News prendo le sezioni che mi interessano ($News -> sezione) -->
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
          <h6><!--PublishiedAt:--> <?php echo $News->publishedAt ?><h6>
        </div>
      </div>
    <?php
      }
    ?>
  </div>
  <?php include '../templates/footer.html'; ?>
</body>
</html>