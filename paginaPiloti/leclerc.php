<?php /* Controllo sessione */session_start(); ?>

<!DOCTYPE html>
<html lang="en">
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
    
    <title>Charles Leclerc</title>
    <!--JQUERY-->
    <script>
    $(document).ready(function(){
        $('#iconaProfilo').css({
            "background-image" : "url('<?php echo $_SESSION['user-pic'] ?>')",
            "background-size" : "cover"
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
        <h1 class="titolo-pagina">CHARLES LECLERC</h1>
    </div>

    <div class="description-box">
        <div class="testo">
            <div class="descrizione">
                <div class="carriera">
                    <p class="testo-pilota">
                        Charles Leclerc è un pilota automobilistico monegasco, campione della GP3 2016 e della Formula 2 2017, pilota della Scuderia Ferrari dal 2019. Ha fatto parte dal 2016 al 2018 della Ferrari Driver Academy e nel 2018 ha corso in Formula 1 per la scuderia Alfa Romeo Sauber F1 Team.
                        È il primo pilota monegasco ad aver vinto un Gran Premio di Formula 1, nonché il pilota più giovane della storia ad aver vinto un Gran Premio al volante di una vettura della scuderia di Maranello.
                        Il suo numero di gara è il 16.
                    </p>
                </div>
                <div class="macchineguidate">
                    <div class="titolo-macchine">
                        <h2 class="scritta" style="font-family:formula1">LE MACCHINE FERRARI GUIDATE</h2>
                    </div>
                    <!-- Query per vedere macchine del pilota -->
                    <div class="cardab">
                        <?php
                            $dbconn = pg_connect("host=localhost port=5432
                            dbname=PassioneFerrari user=postgres password=password ")or die ( ' Could not connect : ' . pg_last_error( ) ) ;
                            $pilota="'Leclerc'";
                            $q='and "Piloti".id="Piloti_Macchine".idpiloti and "Piloti_Macchine".idmacchine="Macchine".id';
                            $query='SELECT "Macchine".nome,"Macchine".anno FROM "Piloti","Macchine","Piloti_Macchine" WHERE "Piloti".cognome='."$pilota".$q;
                            $result = pg_query ($query) or die ( ' Query failed : ' .
                            pg_last_error( ) ) ;
                            while ($line = pg_fetch_array ($result , null , PGSQL_ASSOC ) ) {
                        ?>        
                                <div class="info">
                                    <div class="namecar">
                                        <?php echo $line["nome"]; ?>(<?php echo $line["anno"]; ?>)
                                    </div>
                                </div>
                            <?php
                                }
                            ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="foto-pilota"><div style="background-image:url('leclerc/immagini/leclerc3.jpg'); background-size:cover;"></div></div>
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
                            <h2 class="scritta"> {{description}}</h2>
                            <h2 class="angolo"><i id="freccia" class="fas fa-angle-down"></i></h2>
                        </p>
                    </div>
                    
                    <div class="scomparsa" id="sparisci">
                        <div class="testo-evento">{{desc}}</div>
                        <div class="box-video">
                            <p class="centra">
                                <video width="500px" height="300px" controls :src="video"></video>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- bottoni eventi -->
                <div class="box">
                        <div v-for = "x in variants" :key="x.id" class="color-box" v-on:click="updateAll(x.image,x.description,x.desc,x.video)">
                            {{x.testo}}
                        </div>
                </div>
            </div>
            <script src="javascript/scriptPiloti.js" type="text/javascript"></script>
        </div>

        
        <div class="tabella-pilota">
            <div style="width:360px">
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
                    <?php
                        $dbconn = pg_connect("host=localhost port=5432
                        dbname=PassioneFerrari user=postgres password=password ")or die ( ' Could not connect : ' . pg_last_error( ) ) ;
                        $pilota="'Leclerc'";
                        $query='SELECT nome,cognome,"data nascita",altezza,nazionalità,gare,vittorie,mondiali FROM "Piloti" WHERE "cognome"='."$pilota";
                        $result = pg_query ($query) or die ( ' Query failed : ' .
                        pg_last_error( ) ) ;
                        while ($line = pg_fetch_array ($result , null , PGSQL_ASSOC ) ) {
                            foreach ( $line as $col_value) {
                                echo "<p class='data'><strong>$col_value</strong></p>";
                            }
                        }
                        pg_free_result($result);
                        pg_close($dbconn);
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