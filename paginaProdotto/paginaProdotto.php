<?php session_start(); 
    $dbconn = pg_connect("host=localhost port=5432 dbname=PassioneFerrari user=postgres password=password ")or 
    die ( ' Could not connect : ' . pg_last_error( ) ) ;
    $query  = "SELECT * 
                FROM prodotti WHERE idprodotto =".$_GET['idprodotto']."";
    $data = pg_query ($query) or die ( ' Query failed : ' .pg_last_error( ) ) ;
    while ($line = pg_fetch_array ($data , null , PGSQL_ASSOC ) ) {
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="../vue.min.js"></script>
    <link href="paginaProdotto.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js" type="text/javascript"></script>
    <link href="../paginaF1/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <title>Document</title>
</head>
<body>

    <div class="product-wrapper">
        <section class="prodotto">
            <div class="card" style="width:400px">
                <img class="card-img-top foto-prodotto" src="../paginaStore/<?php echo $line['imgprodotto']?>" alt="Card image">
                <div class="card-body">
                <h4 class="card-title"><?php echo $line['nomeprodotto']?></h4>
                <p>Price: <?php echo $line['prezzo']?></p>
                <p class="card-text"><?php echo $line['descrizione']?></p>
                </div>
            </div>
        </section>
        <section id="app" class="recensioni">
            <div class="card">
                <div class="card-header">
                    <input class="titolo-recensione" type="text" v-model="titolo" placeholder="titolo recensione">
                    <select v-model="stars">
                        <option disabled>Voto</option>
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
    </div>
    
    <script>
        var app=new Vue({
            el:'#app',
            data:{
                idprodotto: '<?php echo $_GET['idprodotto']  ?>',
                titolo: '',
                descrizione: '',
                stars: '',
                recensioni:''
            },
            methods:{
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
                        console.log(response);
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
</body>
</html>

<?php
    }
    pg_free_result($data);
    pg_close($dbconn);
?>
