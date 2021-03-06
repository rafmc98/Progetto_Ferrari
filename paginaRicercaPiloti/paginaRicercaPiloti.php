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
 

<?php include '../templates/jquerySessioni.php'; ?>


<!--JQUERY per effetti visualizzazione risultati della ricerca-->
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

    <?php include '../templates/header-sideBar.php'; ?>

    <div class="titolo-pagina">Ricerca piloti</div>
    
    

    <div class="content">
        <div id="app" class="finestra">
            <div class="barra">
                <!-- Ricerca per nome -->
                <input type="text" v-model='parametro' placeholder="Search by name.." class="search" size="50" autocomplete="off">
                <button class="search-button" @click='recordByName()'><i class="fas fa-search"></i></button>
                <!-- Ricerca tutti i record -->
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
                    allRecords: function(){  /*tramite richiesta axios ottiene tutti i record dei piloti presenti nel db */
                        axios.get('ricercaPiloti.php')
                            .then(function (response) {
                                app.piloti = response.data;
                            }).catch(function (error) {
                                console.log(error);
                            });
                    },
                    recordByName: function(){  /*tramite richiesta axios ottiene i piloti ricercati per nome */
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
                    goToPilota: function(param){   /* redirect alla pagina del pilota */
                        window.location.href = "../paginaPiloti/piloti.php?cognome=" + param;
                    }
                }
            });
        </script>
    </div>
    <?php include '../templates/footer.html'; ?>
</body>
</html>