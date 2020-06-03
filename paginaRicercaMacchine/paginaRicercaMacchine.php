<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <link href="../paginaF1/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="shortcut icon" type="img/png" href="../favicon.png">
    <script src="../paginaIniziale/HomePageScript.js"></script>
    <link href="../paginaIniziale/homePage.css" rel="stylesheet">
    <link href="../paginaRicercaPiloti/paginaRicercaPiloti.css" rel="stylesheet">
    <title>Ricerca Macchine</title>
</head>
<style>
    .navbar{
        padding: 0;
    }
    
    #iconaProfilo{
        margin-top: 5px;
    }
</style>
 <!--JQUERY-->

<?php include '../templates/jquerySessioni.php'; ?>

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

<body style="background-repeat:repeat;">

    <?php include '../templates/header-sideBar.php'; ?>

    <div class="titolo-pagina">Ricerca vetture</div>
    
    

    <div class="content">
        <div id="app" class="finestra">
            <div class="barra">
                <!-- Selezione tipo della vettura-->
                <select v-model="type" class="selectpicker" style="border:none;">
                    <option selected disabled> Tipo vettura </option>
                    <option value="corsa">Corsa</option>
                    <option value="strada">Strada</option>
                </select>
                <!-- Ricerca per nome -->
                <input type="text" v-model='parametro' placeholder="Search by name.." class="search" size="50" autocomplete="off">
                <button class="search-button" @click='recordByName()'><i class="fas fa-search" style="outline:none;"></i></button>
                <!-- Ricerca tutti i record -->
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
                    type:'corsa', /* tipo della vettura da cercare */
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
    <?php include '../templates/footer.html'; ?>
</html>