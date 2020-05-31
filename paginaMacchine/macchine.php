<?php /* Controllo sessione */session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js" type="text/javascript"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="shortcut icon" type="img/png" href="../favicon.png">
    <link href="../paginaF1/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="../paginaF1/javascript/scriptF1.js" type="text/javascript"></script>
    <link href="../paginaIniziale/homePage.css" rel="stylesheet">
    <link href="macchine.css" rel="stylesheet">
    <script src="../paginaIniziale/homePageScript.js" type="text/javascript"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="../vue.min.js"></script>
    
    <title><?php echo $_GET["nome"];?></title>
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
        <div class="dropbtn">Formula 1 &nbsp<i id="menu-arrow" class="fas fa-caret-down"></i></div>
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

    <div class="nome-macchina">
        <div class="ricerca">
            <a href="../paginaRicercaMacchine/paginaRicercaMacchine.php" style="color:black;text-decoration:none"> Cerca macchine  <i style="color:black;" class="fas fa-search-plus"></i> </a>
        </div>
        <h1 class="titolo-pagina"><?php echo $_GET["nome"];?></h1>
    </div>



    <div id="app" class="contenitore">
        <div v-for="x in car" class="vue-for">
            <div class="tabella">
                <div class="datacar">
                    <h1 class="titolo-tabella">DATI VETTURA</h1>
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
                        <p class='data'><strong>{{x.nome}}</strong></p>
                        <p class='data'><strong>{{x.tipo}}</strong></p>
                        <p class='data'><strong>{{x.anno}}</strong></p>
                        <p class='data'><strong>{{x.lunghezza}}</strong></p>
                        <p class='data'><strong>{{x.larghezza}}</strong></p>
                        <p class='data'><strong>{{x.altezza}}</strong></p>
                        <p class='data'><strong>{{x.peso}}</strong></p>
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
                                <img :src='x.img' alt="First Slide" class="foto-slideshow">
                            </div>
                            <div class="carousel-item">
                                <img :src='x.img2' alt="Second Slide" class="foto-slideshow">
                            </div>
                            <div class="carousel-item">
                                <img :src='x.img3' alt="Third Slide" class="foto-slideshow">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var app=new Vue({
            el: '#app',
            data:{
                nome: '<?php echo $_GET['nome'] ?>',
                car: ''
            },
            methods:{
                getCar: function(){
                    axios.get('getCar.php',{
                        params:{
                            nome: this.nome
                        }
                    })
                    .then(function(response){
                        app.car = response.data;
                    }).catch(function(error){
                        console.log(error);
                    });
                }
            },
            created: function(){
                this.getCar();
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
