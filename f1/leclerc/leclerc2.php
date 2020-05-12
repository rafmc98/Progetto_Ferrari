<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../paginaIniziale/homePage.css" rel="stylesheet">
    <link href="piloti.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js" type="text/javascript"></script>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    
    <title>Document</title>
    <!--JQUERY-->
    <script>
            $(document).ready(function() {
                $("#sparisci").hide();
                $(".angolo").click(function() {
                    if($("#freccia").attr('class')=='fas fa-angle-down'){
                        $("#sparisci").slideToggle(20);
                        $('#freccia').attr('class','fas fa-angle-up');
                    }
                    else{
                        $("#sparisci").hide();
                        $('#freccia').attr('class','fas fa-angle-down');
                    }
                });
            });
        </script>
        <!--FINE JQUERY-->
</head>
<body>
    
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

    <div class="navbar" style="position:absolute;">
        <div class="openbtn" onclick="openNav()">☰ MENU</div>
        <div class="loginbtn">
            <a href="#">LOGIN</a>
        </div>
    </div>
    

    <div class="header">
        <div class="titolo">Passione Ferrari</div>
    </div>

    <div class="nome-pilota">
        <h1 class="titoletto">CHARLES LECLERC</h1>
    </div>

    <div class="description-box">
        <div class="testo"><div class="descrizione"></div></div>
        <div class="foto-pilota"><div style="background-image:url('immagini/leclerc3.jpg'); background-size:cover;"></div></div>
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
                <div v-class="evento">
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
                                <iframe v-bind:src="video" frameborder="0" style="width:500px;height:300px;" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
            <script src="javascript/script.js" type="text/javascript"></script>
        </div>

        
        <div class="tabella-pilota">
            <div style="width:360px">
                <p class="centra"> DATI DEL PILOTA </p>
                <div class="campi">
                    <p>Nome: </p>
                    <p>Cognome:</p>
                    <p>Data di Nascita: </p>
                    <p>Altezza:</p>
                    <p>Nazione:</p>
                    <p>GP:</p>
                    <p>Vittorie: </p>
                </div>

                        
                <div class="database">
                    <?php
                        $dbconn = pg_connect("host=localhost port=5432
                        dbname=Formula1 user=postgres password=admin ")or die ( ' Could not connect : ' . pg_last_error( ) ) ;
                        $pilota="'Leclerc'";
                        $query='SELECT nome,cognome,"data nascita",altezza,nazionalità,gare,vittorie FROM "Piloti" WHERE "cognome"='."$pilota";
                        $result = pg_query ($query) or die ( ' Query failed : ' .
                        pg_last_error( ) ) ;
                        while ($line = pg_fetch_array ($result , null , PGSQL_ASSOC ) ) {
                            foreach ( $line as $col_value) {
                                echo "<p class='centra'>$col_value</p>";
                            }
                        }
                        pg_free_result($result);
                        pg_close($dbconn);
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>