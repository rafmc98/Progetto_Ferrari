<html>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../../paginaIniziale/homePage.css" rel="stylesheet">
    <link href="../f1.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js" type="text/javascript"></script>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <head>
        <!--JQUERY-->
        <script>
            $(document).ready(function() {
                $("#sparisci").hide();
                $(".eventi2").click(function() {
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
        <title>Charles Leclerc</title>
    </head>
    <body>
        <div class="header">
            <div id="mySidebar" class="sidebar">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
                <a href="../f1.html">Formula1</a>
                <a href="#">Services</a>
                <a href="#">Clients</a>
                <a href="#">Contact</a>
            </div>
  
            <div class="navbar">
                <div class="openbtn" onclick="openNav()">☰ MENU</div>
                <div class="loginbtn"><a href="#">LOGIN</a></div>
            </div>
            <div class="titolo">Passione Ferrari </div>
        </div>

            <div class="titoletto">
                <h1 class="title">CHARLES LECLERC</h1>
            </div>
        <div class="content" style="width:100%;height:150%;">
            <div id="descrizione" style="width:65%;height:150%;float:left;position:relative">
                <div id="descr" style="border:3px solid green;width:100%;height:27%;position:relative">
                </div>
                <div id="app">
                    <h1 class="title"> EVENTI PILOTA </h1>
                    <div class="immagini">
                        <p class="centra"><img class="imgpiloti" v-bind:src="image" /></p>
                    </div>
                    <div v-class="evento" style="margin-top:30px">
                        <div class="eventi1" style="width:90%;height:3%;position:relative;float:left">
                            <h2 class="descr"> {{description}}</h2>
                        </div>
                        <div class="eventi2" style="width:10%;height:3%;position:relative;float:right">
                            <h2 class="descr" style="text-align:center"><i id="freccia" class="fas fa-angle-down"></i></h2>
                        </div>
                        <div v-class="scomparsa" id="sparisci">
                            <h5 class="testo">{{desc}}</h5><br>
                            <div class="embed-responsive embed-responsive-16by9" style="width:100%; height:20%;">
                            <iframe v-bind:src="video" frameborder="0" style="margin-left:200px;width:500px;height:300px;" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <p class="centra"> <div v-for = "x in variants" :key="x.id" class="color-box" v-bind:style="{ backgroundColor: x.htmlColor}">
                            <p v-on:click="updateAll(x.image,x.description,x.desc,x.video)">{{x.testo}}</p> 
                    </div>
                    </div>
                </div>
            </div>
            <script src="javascript/script.js" type="text/javascript"></script>
            <div class="tabella" style="width:35%;height:110%;float:right;font-family:formula1;position:relative">
                <div class="immagine" style="width:100%;height:30%;position:relative">
                    <p class="centra"><img src="immagini/leclerc3.jpg" class="pagpil"></p>
                </div>
                <div class="spazietto"></div>
                <p class="centra"> DATI DEL PILOTA </p>
                <div style="float:left;position:relative;width:50%;height:45%;">
                        <p class="centra">Nome: </p>
                        <p class="centra">Cognome:</p>
                        <p class="centra">Data di Nascita: </p>
                        <p class="centra">Altezza:</p>
                        <p class="centra">Nazione:</p>
                        <p class="centra">GP:</p>
                        <p class="centra">Vittorie: </p>

                    </table>
                </div>
                <div class="database">
                    <?php
                        $dbconn = pg_connect("host=localhost port=5432
                        dbname=Formula1 user=postgres password=admin ")or die ( ' Could not connect : ' . pg_last_error( ) ) ;
                        $pilota="'Leclerc'";
                        $query='SELECT * FROM "Piloti" WHERE "Cognome"='."$pilota";
                        $result = pg_query ($query) or die ( ' Query failed : ' .
                        pg_last_error( ) ) ;
                        while ($line = pg_fetch_array ($result , null , PGSQL_ASSOC ) ) {
                            echo "\t<tr>\n" ;
                            foreach ( $line as $col_value) {
                                echo "\t\t<tr><td><p class='centra'>$col_value</p> </td></tr>" ;
                            }
                        echo "\t</tr>\n" ;
                        }
                    echo "</table>\n" ;
                    pg_free_result($result) ;
                    pg_close($dbconn) ;
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
        </ul>
    </div>
    </body> 
</html>