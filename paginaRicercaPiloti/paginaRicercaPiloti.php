<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../paginaIniziale/homePage.css" rel="stylesheet">
    <link href="paginaRicercaPiloti.css" rel="stylesheet">
    <link rel="shortcut icon" type="img/png" href="../favicon.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="../paginaIniziale/HomePageScript.js"></script>
    <title>Ricerca Piloti</title>
</head>
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
        $(".seeAll").click(function(){
            $(".intestazione").fadeIn(500);
        });

        $(".search-button").click(function(){
            $(".intestazione").fadeIn(500);
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
      <a href="../paginaRicercaMacchine/paginaRicercamacchine.php">Ricerca auto</a>
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

    <div class="titolo-pagina">Ricerca piloti</div>
    
    

    <div class="content">
        <div id="app" class="finestra">
            <div class="barra">
                <!-- Select record by name -->
                <input type="text" v-model='parametro' placeholder="Search by name.." class="search" size="50" autocomplete="off">
                <button class="search-button" @click='recordByName()'><i class="fas fa-search"></i></button>
                <!-- Select all records -->
                <button class="search-button seeAll" @click='allRecords()'>See All</button>
            </div>
            <!-- risultato ricerca -->
            <div class="search-result">
                <div class="intestazione">
                    <div>Nome</div>
                    <div>Cognome</div>
                    <div>Nazionalità</div>
                </div>
                <div v-for= "x in piloti" class="riga-pilota" @click='goToPilota(x.cognome)'>
                        <div>{{x.nome}}</div>
                        <div>{{x.cognome}}</div>
                        <div>{{x.nazionalità}}</div>
                </div>
            </div>
        </div>
        <!-- Script -->
        <script>
            var app=new Vue({
                el:'#app',
                data:{
                    piloti:'',
                    parametro:''
                },
                methods:{
                    allRecords: function(){ 
                        axios.get('ricercaPiloti.php')
                            .then(function (response) {
                                app.piloti = response.data;
                            }).catch(function (error) {
                                console.log(error);
                            });
                    },
                    recordByName: function(){
                        axios.get('ricercaPiloti.php',{
                            params:{
                                parametro: this.parametro
                            }
                        })
                        .then(function(response){
                            app.piloti = response.data;
                        }).catch(function(error){
                            console.log(error);
                        });
                    },
                    goToPilota: function(param){
                        window.location.href = "../paginaPiloti/piloti.php?cognome=" + param;
                    }
                }
            });
        </script>
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