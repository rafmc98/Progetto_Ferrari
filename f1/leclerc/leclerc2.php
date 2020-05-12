<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../paginaIniziale/homePage.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js" type="text/javascript"></script>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <link href="piloti.css" rel="stylesheet">
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


        <div class="tabella-pilota"></div>
    </div>
</body>
</html>