<?php /* Controllo sessione */session_start(); ?>
<?php 
    $dbconn = pg_connect("host=localhost port=5432 dbname=PassioneFerrari user=postgres password=password ")or 
                die ( ' Could not connect : ' . pg_last_error( ) ) ;
    $pilota = $_GET['cognome'];
    $query  = "SELECT * 
                FROM piloti
                WHERE cognome ='$pilota'";
    $result = pg_query ($query) or die ( ' Query failed : ' .pg_last_error( ) ) ;
    while ($line = pg_fetch_array ($result , null , PGSQL_ASSOC ) ) {
?>       
    
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../paginaIniziale/homePage.css" rel="stylesheet">
    <link href="piloti.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js" type="text/javascript"></script>
    <link href=".../bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="javascript/scriptPiloti.js" type="text/javascript"></script>
    
    <title><?php echo $line["nome"];?> <?php echo $line["cognome"]; ?></title>
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
            $(".box").click(function(){
                $(".foto-evento, .evento").slideDown(700);

            });
        });
    </script>
    <!--FINE JQUERY-->
</head>
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

    <div class="nome-pilota">
        <h1 class="titolo-pagina"><?php echo $line["nome"];?> <?php echo $line["cognome"]; ?></h1>
    </div>

    <div class="description-box">
        <div class="testo">
            <div class="descrizione">
                <p class="testo-pilota">
                        <?php echo $line["descrizione"];?>
                </p>
            </div>
        </div>
        <div class="foto-pilota"><div style="background-image:url('<?php echo $line['img']; ?>'); background-size:cover;"></div></div>
    </div>

    <div class="contenuto">
        <div class="eventi">
            <div id="app">
                <!-- sezione foto eventi --> 
                <h1 class="titolo-evento"> EVENTI PILOTA </h1>
                <div class="foto-evento">
                        <p class="centra"><img v-bind:src="image" /></p>
                </div>

                <!-- sezione eventi a scomparsa-->
                <div class="evento">
                    <div class="contenitore-titolo">
                        <p class="centra">
                            <h2 class="scritta">{{titolo}}</h2>
                            <h2 class="angolo"><i id="freccia" class="fas fa-angle-down"></i></h2>
                        </p>
                    </div>
                    
                    <div class="scomparsa" id="sparisci">
                        <div class="testo-evento">{{description}}</div>
                        <div class="box-video">
                            <p class="centra">
                                <video width="500px" height="300px" controls :src="video" style="outline:none;"></video>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- bottoni eventi -->
                <div class="box">
                    <ul>
                        <li v-for = "x in variants" v-on:click="updateAll(x.img_evento,x.descrizione_evento,x.titolo,x.video)" class="color-box">
                            {{x.titolo}}
                        </li>
                    <ul>
                </div>
            </div>
            <!-- Script -->
            <script>
                var app=new Vue({
                    el:'#app',
                    data:{
                        cognome: '<?php echo $pilota ?>',
                        image:'',
                        description: '',
                        video: '',
                        titolo: '',
                        variants:''
                    },
                    methods:{
                        updateAll:function(im,des,t,v){
                            this.image=im;
                            this.description=des;
                            this.titolo=t;
                            this.video=v;
                        },
                        getQuery: function(){   
                            axios.get('ajaxfile.php',{
                                params:{
                                    cognome: this.cognome
                            }
                            }).then(function (response) {
                                app.variants = response.data;
                            }).catch(function (error) {
                                console.log(error);
                            });
                        }
                    },
                    created: function(){
                        this.getQuery()
                    }
                });
            </script>
        </div>

        
        <div class="tabella-pilota">
            <div style="width:360px;">
                <p class="centra"> <h1 class="titolo-evento">DATI DEL PILOTA </h1></p>
                <div class="campi">
                    <p class="dati">Nome:</p>
                    <p class="dati">Cognome:</p>
                    <p class="dati">Data di Nascita:</p>
                    <p class="dati">Altezza:</p>
                    <p class="dati">Nazione:</p>
                    <p class="dati">GP:</p>
                    <p class="dati">Vittorie:</p>
                    <p class="dati">Mondiali vinti:</p>
                </div>

                        
                <div class="database">
                    <p class='data'><strong><?php echo $line["nome"];?></strong></p>
                    <p class='data'><strong><?php echo $line["cognome"];?></strong></p>
                    <p class='data'><strong><?php echo $line["data nascita"];?></strong></p>
                    <p class='data'><strong><?php echo $line["altezza"];?></strong></p>
                    <p class='data'><strong><?php echo $line["nazionalità"];?></strong></p>
                    <p class='data'><strong><?php echo $line["gare"];?></strong></p>
                    <p class='data'><strong><?php echo $line["vittorie"];?></strong></p>
                    <p class='data'><strong><?php echo $line["mondiali"];?></strong></p>
                </div>
            </div>
            
            <div class="macchineguidate">
                <div class="titolo-macchine">
                    <h2 class="scritta" style="font-family:formula1">VETTURE CARRIERA</h2>
                </div>
                <!-- Query per vedere macchine del pilota -->
                <div class="cardab">
                    <?php
                        $query = "SELECT macchine.nome, macchine.anno 
                                    FROM macchine, piloti, piloti_macchine
                                    WHERE cognome ='$pilota' and piloti.id = piloti_macchine.idpiloti and piloti_macchine.idmacchine = macchine.id";
                        $risultato = pg_query ($query) or die ( ' Query failed : ' .pg_last_error( ) ) ;
                        while ($macchine = pg_fetch_array ($risultato , null , PGSQL_ASSOC ) ) {
                    ?>
                        <div class="info">
                            <div class="namecar">
                                <?php echo $macchine["nome"]; ?>(<?php echo $macchine["anno"]; ?>)
                            </div>
                        </div>
                    <?php
                        }
                    ?>
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
