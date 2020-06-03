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
    <?php include '../templates/jquerySessioni.php'; ?>
    </head>
  <body>

    <?php include '../templates/header-sideBar.php'; ?>

    <div class="store"><a href="../paginaStore/paginaStore.php"><b>Store</b> <i class="fas fa-shopping-basket"></i></a></div>

    <div id="app" class="product-wrapper">
        <!-- Prodotto -->
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
        <!--  Componenti per l'inserimento di una nuova recensione -->
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
                    <textarea class="corpo-recensione" v-model='descrizione' placeholder="Inserisci una recensione"></textarea>
                </div>
            </div>
            <!--  Recensioni relative al prodotto -->
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
                    // Richiesta axios per recuperare i dati dal db relativi al prodotto passato come parametro
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
                    // Richiesta axios per l'inserimento di una nuova recensione relativa al prodotto passato come parametro
                    axios.get('inserisciRecensione.php',{
                        params:{
                            titolo: this.titolo,
                            descrizione: this.descrizione,
                            stars: this.stars,
                            idprodotto: this.idprodotto 
                        }
                    })
                    .then(function(response){
                        // Se la richiesta non va a buon fine, significa che l'utente non ha ancora effettuato il login
                        if(response.data!="true") alert("devi prima effettuare il login");
                    }).catch(function(error){
                        console.log(error);
                    });
                },
                stampa: function(){
                    // Richiesta axios per recuperare le recensioni relative al prodotto passato come parametro
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
                // Al momento dell'apertura della pagina vengono richiamate le funzioni per recuperare i dati del prodotto e le sue relative recensioni
                this.getProdotto();
                this.stampa();
            },
            computed:{
                // Il tasto per inserire la recensione all'interno del db viene mostrato solo se tutti i campi della recensione sono completi
                mostraInvio(){
                    if( this.titolo != '' && this.descrizione != '' && this.stars != '') return true;
                    else return false;
                }
            }
        });
    </script>

    <?php include '../templates/footer.html'; ?>
</body>
</html>


