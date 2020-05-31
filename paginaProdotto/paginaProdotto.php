<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="../vue.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js" type="text/javascript"></script>
    <link href="../paginaF1/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="../paginaIniziale/homePage.css" rel="stylesheet">
    <link href="paginaProdotto.css" rel="stylesheet">
    <link rel="shortcut icon" type="img/png" href="../favicon.png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" charset="utf-8"></script>
    <script src="../paginaIniziale/homePageScript.js"></script>
    <title>Prodotto</title>


    <!--JQUERY-->
    <script>
        $(document).ready(function(){
            $('#iconaProfilo').css({
                "background-image" : "url('<?php echo $_SESSION['user-pic']?>')",
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
    <div id="app" class="product-wrapper">
        <section v-for="p in prodotto" class="prodotto">
            <div class="card">
                <img :src="'../paginaStore/' + p.imgprodotto" class="card-img-top foto-prodotto">
                <div class="card-body">
                <h4 class="card-title">{{p.nomeprodotto}}</h4>
                <p>Price: {{p.prezzo}}</p>
                <p class="card-text">{{p.descrizione}}</p>
                </div>
            </div>
        </section>
        <section  class="recensioni">
            <div class="card">
                <div class="card-header">
                    <input class="titolo-recensione" type="text" v-model="titolo" placeholder="titolo recensione">
                    <select v-model="stars">
                        <option disabled selected>Giudizio</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option> 
                        <option>4</option> 
                        <option>5</option> 
                    </select>
                    <button class="btn btn-default send-button" v-if="mostraInvio" @click="insertFeedback" onClick="window.location.reload();">Invia</button>
                </div>
                <div class="card-body">
                    <textarea class="textarea" v-model='descrizione' placeholder="Inserisci una recensione"></textarea>
                </div>
            </div>
            <section class="recensioni-db">
                <div v-for="x in recensioni" class="card text-white bg-dark mb-3" style="margin-top:20px">
                    <div class="card-header">
                        {{x.titolo}}
                        <div style="float:right;" v-for="i in parseInt(x.stelle)">
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        {{x.descrizione}} 
                        <footer class="blockquote-footer">{{x.email}} ({{x.data}})</footer>   
                    </div>
                </div>
            </section>
        </section>
    </div>
    
    <script>
        var app=new Vue({
            el:'#app',
            data:{
                prodotto: '',
                idprodotto: '<?php echo $_GET['idprodotto']  ?>',
                titolo: '',
                descrizione: '',
                stars: '',
                recensioni:''
            },
            methods:{
                getProdotto: function(){
                    axios.get('getProdotto.php',{
                        params:{
                            idprodotto: this.idprodotto
                        }
                    })
                    .then(function(response){
                        app.prodotto = response.data;
                    }).catch(function(error){
                        console.log(error);
                    });
                },
                insertFeedback: function(){
                    axios.get('inserisciRecensione.php',{
                        params:{
                            titolo: this.titolo,
                            descrizione: this.descrizione,
                            stars: this.stars,
                            idprodotto: this.idprodotto 
                        }
                    })
                    .then(function(response){
                        if(response.data!="true") alert("devi prima effettuare il login");
                    }).catch(function(error){
                        console.log(error);
                    });
                },
                stampa: function(){
                    axios.get('cercaRecensioni.php',{
                        params:{
                            idprodotto: this.idprodotto
                        }
                    })
                    .then(function(response){
                        app.recensioni = response.data;
                    }).catch(function(error){
                        console.log(error);
                    });
                }
            },
            created: function(){
                this.getProdotto();
                this.stampa();
            },
            computed:{
                mostraInvio(){
                    if( this.titolo != '' && this.descrizione != '' && this.stars != '') return true;
                    else return false;
                }
            }
        });
    </script>

    <!--Footer-->
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


