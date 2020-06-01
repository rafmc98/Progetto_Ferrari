<?php /* Controllo sessione */session_start(); ?>

<html>
  <head>
    <link rel="stylesheet" href="../paginaIniziale/homePage.css">
    <link rel="stylesheet" href="css/modal.css" rel="stylesheet">

    <link rel="shortcut icon" type="img/png" href="../favicon.png">

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" charset="utf-8"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="../vue.min.js"></script>
    <script src="../paginaIniziale/HomePageScript.js"></script>
    <title> History </title>

    
    <?php include '../templates/jquerySessioni.php'; ?>
      

      
      
      <link href="css/modal.css" rel="stylesheet" type="text/css" />
      <link href="paginaStoria.css" rel="stylesheet" type="text/css">




      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700' rel='stylesheet' type='text/css'>
      <link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>

</head>
<body link="white" vlink="white">

<?php include '../templates/header-sideBar.php'; ?>

    <div class="sottotitolo"> History </div>
    
    
    <div class="orizzontale" id="app">
      <div v-for="x in storia">

        <!-- BOX -->
        <div class="line-element">
          <div class="cont-page">
            <div class="caption">
              <figure class="nomeClasse" data-effect="fade-in">
                <img :src="x.sfondo" height="90%">
                <figcaption>
                  <h2 style="text-align: center; margin-top: 50px; font-size:xx-large;"></a>{{x.titolo}}</a></h2>
                  <h2 style="text-align: center; margin-top: 50px; font-size: small;"><a :href="x.box">>scopri di più</a></h2>
                </figcaption>
              </figure>
            </div>
          </div>
        </div>

        <!-- POPUP -->
        <a href="#x" class="overlay" :id="x.pop"></a>
        <div class="popup">
          <div class="pic-left">
              <img :src="x.image">
          </div>
          <h2>{{x.titolo}}</h2>
          <p>{{x.descrizione}}</p>
          <a class="close" title="chiudere" href="#close">×</a>
            <video v-if="x.video" width="100%" height="350px" :src="x.video" style="outline:none;" controls></video>
        </div>
      
      </div>
    </div>
  <script>
    var app=new Vue({
        el:'#app',
        data:{
          storia: ''
        },
        methods:{
          stampa: function(){
              axios.get('getStoria.php',{
              })
              .then(function(response){
                app.storia = response.data;
              }).catch(function(error){
                console.log(error);
            });
          }
        },
        created: function(){
          this.stampa();
        }
      });
  </script>
  
  <?php include '../templates/footer.html'; ?>

  </body>
</html>