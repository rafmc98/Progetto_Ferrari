<?php /* Controllo sessione */session_start(); ?>
<?php 
    $dbconn = pg_connect("host=localhost port=5432 dbname=PassioneFerrari user=postgres password=password ")or 
                die ( ' Could not connect : ' . pg_last_error( ) ) ;
    $macchina = $_GET['nome'];
    $query  = "SELECT * 
                FROM macchine
                WHERE nome ='$macchina'";
    $result = pg_query ($query) or die ( ' Query failed : ' .pg_last_error( ) ) ;
    while ($line = pg_fetch_array ($result , null , PGSQL_ASSOC ) ) {

?>  

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../paginaIniziale/homePage.css" rel="stylesheet">
    <link href="macchine.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js" type="text/javascript"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="../paginaF1/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="../paginaF1/javascript/scriptF1.js" type="text/javascript"></script>
    
    <title><?php echo $line["nome"];?></title>
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
        $(document).ready(function() {
            $('.carousel').carousel({
            interval: 2500
            });
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


</head>
<body>


    <div id="mySidebar" class="sidebar">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
      <a href="../paginaIniziale/homePage.php">Home</a>
      <div class="dropdown">
        <div class="dropbtn">Formula 1</div>
        <div class="dropdown-content">
            <a href="../paginaF1/formula1.php">Panoramica</a>
            <a href="../paginaRicercaPiloti/paginaRicercaPiloti.php">Cerca piloti Ferrari</a>
        </div>
      </div>
      <a href="../paginaRicercaMacchine/paginaRicercamacchine.php">Cerca auto</a>
      <a href="../paginaStoria/history.php"> Storia Ferrari </a>
      <a href="../paginaNews/news.php">News</a>
      <a href="../paginaStore/paginaStore.php"> Store </a>
      <a href='#' id="quiz"> Quiz </a>
      <a href="../paginaContatti/contatti.php">Contact</a>
    </div>

    <div class="navbar" style="position:absolute">
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

    <div class="nome-macchina">
        <div class="ricerca">
            <a href="../paginaRicercaMacchine/paginaRicercaMacchine.php" style="color:black;text-decoration:none"> Cerca macchine  <i style="color:black;" class="fas fa-search-plus"></i> </a>
        </div>
        <h1 class="titolo-pagina"><?php echo $line["nome"];?></h1>
    </div>



    <div class="contenitore">
        <div class="tabella">
            <div class="datacar">
                <h1 class="titolo-tabella">DATI VETTURA </h1>
                <div class="campi">
                    <p class="dati">Nome:</p>
                    <p class="dati">Tipo:</p>
                    <p class="dati">Anno:</p>
                    <p class="dati">Lunghezza:</p>
                    <p class="dati">Larghezza:</p>
                    <p class="dati">Altezza:</p>
                    <p class="dati">Peso:</p>
                </div>

                <div class="database">
                    <p class='data'><strong><?php echo $line["nome"];?></strong></p>
                    <p class='data'><strong><?php echo $line["tipo"];?></strong></p>
                    <p class='data'><strong><?php echo $line["anno"];?></strong></p>
                    <p class='data'><strong><?php echo $line["lunghezza"];?></strong></p>
                    <p class='data'><strong><?php echo $line["larghezza"];?></strong></p>
                    <p class='data'><strong><?php echo $line["altezza"];?></strong></p>
                    <p class='data'><strong><?php echo $line["peso"];?></strong></p>
                </div>
            </div>
        </div>

        <div class="foto-macchina">
            <div class="foto">
                <div id="carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel" data-slide-to="1"></li>
                        <li data-target="#carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox"  style="position:relative">
                        <div class="carousel-item active">
                            <img src='<?php echo $line['img']; ?>' alt="First Slide" class="foto-slideshow" ; />
                        </div>
                        <div class="carousel-item">
                            <img src='<?php echo $line['img2']; ?>' alt="Second Slide" class="foto-slideshow" />
                        </div>
                        <div class="carousel-item">
                            <img src='<?php echo $line['img3']; ?>' alt="Third Slide" class="foto-slideshow" />
                        </div>
                    </div>
                </div>
            </div>
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

<?php
    }
    pg_free_result($result);
    pg_close($dbconn);
?>