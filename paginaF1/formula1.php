<?php /* Controllo sessione */session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js" type="text/javascript"></script>
    <link rel="shortcut icon" type="img/png" href="../favicon.png">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="javascript/scriptF1.js" type="text/javascript"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <link href="../paginaIniziale/homePage.css" rel="stylesheet">
    <link href="formula1.css" rel="stylesheet">

    <title>Formula 1</title>

    <!--JQUERY-->
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


  <body>


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
    
    <!--Header-->
    <div class="header">
        <div class="titolo">Passione Ferrari</div>
    </div>
    
    <div class="f1">
        <h1 class="titolo-pagina">FORMULA 1 E FERRARI</h1>
    </div>


    <div class="description-box">
        <div class="testo">
            <div class="descrizione">
                <div class="descr">
                    <p class="centra">
                        La Scuderia Ferrari è la squadra automobilistica più vincente della storia della Formula 1, visto che ha conquistato sedici campionati mondiali costruttori di Formula 1, a cui si aggiungono quindici campionati mondiali piloti.
                        Il debutto della Scuderia Ferrari nel Campionato mondiale di Formula 1 risale al 1950 al Gran Premio di Monaco, la seconda prova stagionale, dove giunse seconda grazie ad Alberto Ascari. Nella stessa stagione arrivò seconda anche nel Gran Premio d'Italia, sempre grazie ad Alberto Ascari. La prima pole position e la prima vittoria arrivarono invece l'anno seguente al Gran Premio di Gran Bretagna grazie a José Froilán González.
                        Il primo campionato del mondo piloti conquistato dalla Ferrari fu nella stagione 1952, quando Alberto Ascari si laureò campione del mondo su una Ferrari 500 F2. 
                        Il bellissimo video qui sotto è stato realizzato dalla F1 per celebrare le 1000 gare e la sua lunghissima storia dove la Ferrari è sempre stata ben presente.
                    </p>
                </div>
                <div class="cont">
                    <p style="text-align:center"><video controls playsinline autoplay muted loop width="400px" src="video/storia.mp4" type="video/mp4" style="outline:none;margin:10px;" controls autoplay></video> </p>
                </div>
            </div>
        </div>
        <div class="albo-oro">
            <div class="container-albo">
                <div class="titolo-albo">ALBO D'ORO</div>
                <div class="campionato">
                    <div class="titolo-campionato">Campionato costruttori</div>
                    <p class="dati">16 Titoli </p>
                    <p class="dati">1961,1964,1975,</p>
                    <p class="dati">1976,1977,1979,</p>
                    <p class="dati">1982,1983,1999,</p>
                    <p class="dati">2000,2001,2002,</p>
                    <p class="dati">2003,2004,2007,</p>
                    <p class="dati">2008.</p>
                </div>
                <div class="campionato">
                    <div class="titolo-campionato">Campionato piloti</div>
                    <p class="dati">15 Titoli </p>
                    <p class="dati">1952,1953,1956,</p>
                    <p class="dati">1958,1961,1964,</p>
                    <p class="dati">1975,1977,1979,</p>
                    <p class="dati">2000,2001,2002,</p>
                    <p class="dati">2003,2004,2007.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- sezione slideshow-->
    <div class="container-slide">
        <div class="titoletto">
            <h1 class="titoli">PILOTI FERRARI </h1>
        </div>
        <div id="carousel-pilota" class="carousel slide" data-ride="carousel" style="height: 500px;">
            <ol class="carousel-indicators">
                <li data-target="#carousel-pilota" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-pilota" data-slide-to="1"></li>
                <li data-target="#carousel-pilota" data-slide-to="2"></li>
                <li data-target="#carousel-pilota" data-slide-to="3"></li>
                <li data-target="#carousel-pilota" data-slide-to="4"></li>
                <li data-target="#carousel-pilota" data-slide-to="5"></li>
            </ol>
    
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <p class="centra"><img src="immagini/leclerc.jpg" alt="First Slide" class="foto-slideshow"></p>
                    <h3 class="nomepiloti"><a href="../paginaPiloti/piloti.php?cognome=Leclerc" class="nomepiloti" style="text-decoration:none; color:red;"> CHARLES LECLERC</a></h3>
                </div>
                <div class="carousel-item">
                    <p class="centra"><img src="immagini/vettel.jpg" alt="Second Slide" class="foto-slideshow"></p>
                    <h3 class="nomepiloti"><a href="../paginaPiloti/piloti.php?cognome=Vettel" class="nomepiloti " style="text-decoration:none; color:red;"> SEBASTIAN VETTEL</a></h3>
                </div>
                <div class="carousel-item">
                    <p class="centra"><img src="immagini/raikkonen.jpg" alt="Third Slide" class="foto-slideshow"></p>
                    <h3 class="nomepiloti"><a href="../paginaPiloti/piloti.php?cognome=Raikkonen" class="nomepiloti" style="text-decoration:none; color:red;">KIMI RAIKKONEN </a></h3>
                </div>
                <div class="carousel-item">
                    <p class="centra"><img src="immagini/alonso.jpg" alt="Four Slide" class="foto-slideshow"></p>
                    <h3 class="nomepiloti"><a href="../paginaPiloti/piloti.php?cognome=Alonso" class="nomepiloti" style="text-decoration:none; color:red;">FERNANDO ALONSO </a></h3>
                </div>
                <div class="carousel-item">
                    <p class="centra"><img src="immagini/massa.jpg" alt="Five Slide" class="foto-slideshow"></p>
                    <h3 class="nomepiloti"><a href="../paginaPiloti/piloti.php?cognome=Massa" class="nomepiloti" style="text-decoration:none; color:red;">FELIPE MASSA </a></h3>
                </div>
                <div class="carousel-item">
                    <p class="centra"><img src="immagini/schumacher.jpg" alt="Six Slide" class="foto-slideshow"></p>
                    <h3 class="nomepiloti"><a href="../paginaPiloti/piloti.php?cognome=Schumacher" class="nomepiloti" style="text-decoration:none; color:red;">MICHEAL SCHUMACHER </a></h3>
                </div>
            </div>
        </div>

        

        <!--SLIDESHOW MACCHINE-->
        <div class="titoletto" style="margin-top:100px">
            <h1 class="titoli"> VETTURE DEL PRESENTE E STORICHE</h1>
        </div>

        <div id="carouselcar" class="carousel slide" data-ride="carousel" style="height:500px">
            <ol class="carousel-indicators">
                <li data-target="#carouselcar" data-slide-to="0" class="active"></li>
                <li data-target="#carouselcar" data-slide-to="1"></li>
                <li data-target="#carouselcar" data-slide-to="2"></li>
                <li data-target="#carouselcar" data-slide-to="3"></li>
                <li data-target="#carouselcar" data-slide-to="4"></li>
                <li data-target="#carouselcar" data-slide-to="5"></li>
            </ol>

            <div class="carousel-inner" role="listbox"  style="position:relative">
                <div class="carousel-item active">
                    <p class="centra"><img src="immagini/sf1000.jpg" alt="First Slide" class="foto-slideshow" ; /></p>
                    <h3 class="nomepiloti"><a href="../paginaMacchine/macchine.php?nome=SF1000" class="nomepiloti"style="text-decoration:none; color:red;"> SF1000 (2020) </a></h3>
                </div>
                <div class="carousel-item">
                    <p class="centra"><img src="immagini/sf90.jpeg" alt="Second Slide" class="foto-slideshow" /></p>
                    <h3 class="nomepiloti"><a href="../paginaMacchine/macchine.php?nome=SF90" class="nomepiloti " style="text-decoration:none; color:red;"> SF90 (2019) </a></h3>
                </div>
                <div class="carousel-item">
                    <p class="centra"><img src="immagini/sf70h.jpg" alt="Third Slide" class="foto-slideshow" /></p>
                    <h3 class="nomepiloti"><a href="../paginaMacchine/macchine.php?nome=SF70H" class="nomepiloti " style="text-decoration:none; color:red;"> SF70H(2017) </a></h3>
                </div>
                <div class="carousel-item">
                    <p class="centra"><img src="immagini/f2012.jpg" alt="Four Slide" class="foto-slideshow" /></p>
                    <h3 class="nomepiloti"><a href="../paginaMacchine/macchine.php?nome=F2012" class="nomepiloti " style="text-decoration:none; color:red;"> F2012(2012) </a></h3>
                </div>
                <div class="carousel-item">
                    <p class="centra"><img src="immagini/f2007.jpg" alt="Five Slide" class="foto-slideshow" /></p>
                    <h3 class="nomepiloti"><a href="../paginaMacchine/macchine.php?nome=F2007" class="nomepiloti " style="text-decoration:none; color:red;"> F2007(2007) </a></h3>
                </div>
                <div class="carousel-item">
                    <p class="centra"><img src="immagini/f2004.jpg" alt="Six Slide" class="foto-slideshow" /></p>
                    <h3 class="nomepiloti"><a href="../paginaMacchine/macchine.php?nome=F2004" class="nomepiloti " style="text-decoration:none; color:red;"> F2004(2004) </a></h3>
                </div>

            </div>
        </div>
    </div>

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