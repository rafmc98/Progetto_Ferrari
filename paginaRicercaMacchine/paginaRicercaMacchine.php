<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../paginaIniziale/homePage.css" rel="stylesheet">
    <link href="../paginaRicercaPiloti/paginaRicercaPiloti.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="../paginaIniziale/HomePageScript.js"></script>
    <title>Ricerca Macchine</title>
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
    });
</script>  
<body>
    <div id="mySidebar" class="sidebar" >
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
    
    

    <div class="content">
        <div id="app" class="finestra">
            <div class="titoletto">
                <h2 class="scegli"> Quale tipo di vetture vuoi ricercare? </h2>
            </div>
            <div class="scelta">
                <input type="radio" id="corsa" name="sc" value="corsa" v-model='type'>
                <label for="corsa" class="tipo">Corsa</label>
                <br>
                <input type="radio" id="strada" name="sc" value="strada" v-model='type'>
                <label for="strada" class="tipo">Strada</label>
            </div>
            <div class="barra">
                <!-- Select record by name -->
                <input type="text" v-model='parametro' placeholder="Search by name.." id="search" size="50" autocomplete="off">
                <button class="search-button" @click='recordByName()'><i class="fas fa-search"></i></button>
                <!-- Select all records -->
                <button class="search-button seeAll" @click='allRecords()'>See All</button>
            </div>
            <!-- risultato ricerca -->
            <div class="search-result">
                <div class="intestazione">
                    <div>Nome</div>
                    <div>Tipo</div>
                    <div>Anno</div>
                </div>
                <div v-for= "x in macchine" class="riga-pilota" @click='goToMacchina(x.nome)'>
                        <div>{{x.nome}}</div>
                        <div>{{x.tipo}}</div>
                        <div>{{x.anno}}</div>
                </div>
            </div>
        </div>
        <!-- Script -->
        <script>
            var app=new Vue({
                el:'#app',
                data:{
                    macchine:'',
                    parametro:'',
                    type:'corsa',
                },
                methods:{
                    allRecords: function(){ 
                        axios.get('ricercaMacchine.php',{
                            params:{
                                type:this.type
                            }
                        })
                            .then(function (response) {
                                app.macchine = response.data;
                            }).catch(function (error) {
                                console.log(error);
                            });
                    },

                    recordByName: function(){
                        axios.get('ricercaMacchine.php',{
                            params:{
                                parametro: this.parametro,
                                type: this.type
                            }
                        })
                        .then(function(response){
                            app.macchine = response.data;
                        }).catch(function(error){
                            console.log(error);
                        });
                    },

                    goToMacchina: function(param){
                        window.location.href = "../paginaMacchine/macchine.php?nome=" + param;
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