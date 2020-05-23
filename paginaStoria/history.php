<?php /* Controllo sessione */session_start(); ?>

<html>
  <head>
    <link rel="stylesheet" href="../paginaIniziale/homePage.css">
    <link rel="stylesheet" href="css/modal.css" rel="stylesheet">

    <script src="../paginaIniziale/HomePageScript.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" charset="utf-8"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>


    <script src="js/jquery.min.js"></script>
	  <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.mousewheel.min.js"></script>
    
    <!-- Plugin della scrollbar -->
    <script src="js/jquery.mCustomScrollbar.js"></script>
    <script>

      $(function(){
      
        $(window).load(function(){
    
          $(".slider").mCustomScrollbar({
            horizontalScroll:true,
            scrollInertia:1100,
            
            advanced:{
              autoExpandHorizontalScroll:true
            },
            
          });
    
          /* Navigazione */
          $(".menu a").click(function(){
          
            var myid= $(this).attr("href");
            
            $(".menu a").removeClass('selected');
            $(this).addClass('selected');
      
            $(".slider").mCustomScrollbar("scrollTo","" + myid + "");
            
          });
    
        });
          
          
      })(jQuery);
    
      </script>

<script>
    $(document).ready(function(){

      $('#iconaProfilo').css({
                "background-image" : "url('<?php echo $_SESSION['user-pic'] ?>')",
                "background-size" : "cover"
            });
    });
  </script>
      

      <link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
      <link href="css/stile.css" rel="stylesheet" type="text/css" />
      <link href="css/modal.css" rel="stylesheet" type="text/css" />



      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700' rel='stylesheet' type='text/css'>
      <link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>

  </head>
  <body link="white" vlink="white">

    <div class="overlay" id="overlay" style="display:none;"></div>
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
      <div class="titolo"><a href="../paginaIniziale/homePage.php">Passione Ferrari</a></div>
    </div>
    <div style="text-align: center;"></div>

    <div style="text-align: center; margin-top: 30px; font-family: calibri;  font-size: 45px;"> History </div>
    <!-- PRIMO BOX -->
    <div id="container">
      <div class="slider content">
          <div class="my_container">
              <div class="line-element" id="page-1">
                  <div class="cont-page">
                    <div class="caption" >
                      <figure class="nomeClasse" data-effect="fade-in">
                        <img src="img/enzo.jpg" alt="" width="200%" height="90%"/>
                        <figcaption>
                        <h2 style="text-align: center; margin-top: 50px; font-size:xx-large;"></a>Enzo Ferrari</a></h2>
                        <h2 style="text-align: center; margin-top: 50px; font-size: small;"><a href="#win1">>scopri di più</a></h2>
                        </figcaption>
                        </figure>
                   </div>
                  </div>
      </div>
      
      <!-- SECONDO BOX -->

               <div class="line-element" id="page-2">
                  <div class="cont-page">
                    <div class="caption">
                      <figure class="nomeClasse" data-effect="fade-in">
                        <img src="img/ascari.jpg" alt="" width="110%" height="90%"/>
                        <figcaption>
                        <u><h2 style="text-align: center; margin-top: 50px; font-size: xx-large;">Prime Vittorie</a></h2></u>
                        <h2 style="text-align: center; margin-top: 50px; font-size: small;"><a href="#win2">>scopri di più</a></h2>
                        </figcaption>
                        </figure>
                   </div> 
                  </div>
      </div>
      
      <!-- TERZO BOX -->

              <div class="line-element" id="page-3">
                  <div class="cont-page">
                    <div class="caption">
                      <figure class="nomeClasse" data-effect="fade-in">
                        <img src="img/azioni.jpg" alt="" width="110%" height="90%"/>
                        <figcaption>
                        <u><h2 style="text-align: center; margin-top: 50px; font-size: xx-large;">Crescita Aziendale</a></h2></u>
                        <h2 style="text-align: center; margin-top: 50px; font-size: small;"><a href="#win3">>scopri di più</a></h2>
                        </figcaption>
                        </figure>
                   </div> 
              </div>
              </div>
              
        <!-- QUARTO BOX -->

              <div class="line-element" id="page-3">
                <div class="cont-page">
                  <div class="caption">
                    <figure class="nomeClasse" data-effect="fade-in">
                      <img src="img/monte.jpg" alt="" width="110%" height="90%"/>
                      <figcaption>
                      <u><h2 style="text-align: center; margin-top: 50px; font-size: xx-large;">Luca Cordero di Montezemolo</a></h2></u>
                      <h2 style="text-align: center; margin-top: 50px; font-size: small;"><a href="#win4">>scopri di più</a></h2>
                      </figcaption>
                      </figure>
                 </div> 
            </div>
            </div>

          <!-- QUINTO BOX -->

            <div class="line-element" id="page-3">
              <div class="cont-page">
                <div class="caption">
                  <figure class="nomeClasse" data-effect="fade-in">
                    <img src="img/niki.webp" alt="" width="110%" height="90%"/>
                    <figcaption>
                    <u><h2 style="text-align: center; margin-top: 50px; font-size: xx-large;">Niki Lauda</a></h2></u>
                    <h2 style="text-align: center; margin-top: 50px; font-size: small;"><a href="#win5">>scopri di più</a></h2>
                    </figcaption>
                    </figure>
               </div> 
          </div>
          </div>


        <!-- SESTO BOX -->

              <div class="line-element" id="page-3">
                <div class="cont-page">
                  <div class="caption">
                    <figure class="nomeClasse" data-effect="fade-in">
                      <img src="img/f40.jpg" alt="" width="110%" height="90%"/>
                      <figcaption>
                      <u><h2 style="text-align: center; margin-top: 50px; font-size: xx-large;">L'ultima vettura di Enzo Ferrari</a></h2></u>
                      <h2 style="text-align: center; margin-top: 50px; font-size: small;"><a href="#win6">>scopri di più</a></h2>
                      </figcaption>
                      </figure>
                 </div> 
            </div>
            </div>

            <!-- SETTIMO BOX -->

            <div class="line-element" id="page-3">
              <div class="cont-page">
                <div class="caption">
                  <figure class="nomeClasse" data-effect="fade-in">
                    <img src="img/sciumi.jpg" alt="" width="110%" height="90%"/>
                    <figcaption>
                    <u><h2 style="text-align: center; margin-top: 50px; font-size: xx-large;">Michael Schumacher</a></h2></u>
                    <h2 style="text-align: center; margin-top: 50px; font-size: small;"><a href="#win7">>scopri di più</a></h2>
                    </figcaption>
                    </figure>
               </div> 
          </div>
          </div>

          <!-- OTTAVO BOX -->

          <div class="line-element" id="page-3">
            <div class="cont-page">
              <div class="caption">
                <figure class="nomeClasse" data-effect="fade-in">
                  <img src="img/kimi.jpg" alt="" width="110%" height="90%"/>
                  <figcaption>
                  <u><h2 style="text-align: center; margin-top: 50px; font-size: xx-large;">L'ultimo Mondiale</a></h2></u>
                  <h2 style="text-align: center; margin-top: 50px; font-size: small;"><a href="#win8">>scopri di più</a></h2>
                  </figcaption>
                  </figure>
             </div> 
        </div>
        </div>

        <!-- NONO BOX -->

        <div class="line-element" id="page-3">
          <div class="cont-page">
            <div class="caption">
              <figure class="nomeClasse" data-effect="fade-in">
                <img src="img/team.jpg" alt="" width="110%" height="90%"/>
                <figcaption>
                <u><h2 style="text-align: center; margin-top: 50px; font-size: xx-large;">Aria di Rivoluzione</a></h2></u>
                <h2 style="text-align: center; margin-top: 50px; font-size: small;"><a href="#win9">>scopri di più</a></h2>
                </figcaption>
                </figure>
           </div> 
      </div>
      </div>

      <!-- DECIMO BOX -->

      <div class="line-element" id="page-3">
        <div class="cont-page">
          <div class="caption">
            <figure class="nomeClasse" data-effect="fade-in">
              <img src="img/scudo.png" alt="" width="110%" height="90%"/>
              <figcaption>
              <u><h2 style="text-align: center; margin-top: 50px; font-size: xx-large;">La Ferrari è Unica</a></h2></u>
              <h2 style="text-align: center; margin-top: 50px; font-size: small;"><a href="#win10">>scopri di più</a></h2>
              </figcaption>
              </figure>
         </div> 
    </div>
    </div>


          </div>
      </div>
</div>

<!-- finestra popup 1 -->
<a href="#x" class="overlay" id="win1"></a>
<div class="popup">
    <div class="pic-left">
        <img src="img/enzo2.jpg" /></a>
    </div>
    <h2>Enzo Ferrari</h2>
<p>Enzo Ferrari nasce a Modena, il 18 febbraio 1898, è lui che darà vita al marchio più famoso del mondo. La prima vettura della “rossa” nasce nel 1947 ed è la 125 S, una vettura frutto della passione e della determinazione di Enzo. Un uomo che ha dedicato tutto per la sua creazione, tutto per le auto sportive.</p>
<a class="close" title="chiudere" href="#close"></a>
<br>
<div class="video">
  <iframe width="853" height="480" src="img/enzovideo.mp4" ></iframe>
      </div>
</div> 

<!-- finestra popup 2 -->
<a href="#x" class="overlay" id="win2"></a>
<div class="popup">
    <div class="pic-left">
        <img src="img/ascari2.jpg" /></a>
    </div>
    <h2>Prime Vittorie</h2>
<p>Alberto Ascari diventa Campione del Mondo di Formula 1 con la Ferrari nel 1952 e nel 1953 dopo aver vinto la sua prima Mille Miglia nel 1948, la prima 24 Ore di Le Mans nel 1949 e il primo Gran Premio valido per il Campionato del Mondo di Formula 1 nel 1951.</p>
<a class="close" title="chiudere" href="#close"></a>
</div> 

<!-- finestra popup 3 -->
<a href="#x" class="overlay" id="win3"></a>
<div class="popup">
    <div class="pic-left">
        <img src="img/ferrari.png" /></a>
    </div>
    <h2>Crescita Aziendale</h2>
<p>Nel 1960 la società di Enzo Ferrari si trasforma in una Società per Azioni, lo sviluppo dell’azienda automobilistica italiana è enorme, nello stesso anno, l’Università di Bologna conferisce a Enzo Ferrari la Laurea honoris in ingegneria meccanica e nel 1969 il gruppo Fiat acquisisce 50% dei titoli azionari Ferrari.</p>
<a class="close" title="chiudere" href="#close"></a>
</div> 

<!-- finestra popup 4 -->
<a href="#x" class="overlay" id="win4"></a>
<div class="popup">
    <div class="pic-left">
        <img src="img/monte2.jpg" /></a>
    </div>
    <h2>Luca Cordero di Montezemolo</h2>
<p>Nel 1973 entra in Ferrari Luca Cordero di Montezemolo come assistente di Enzo Ferrari e responsabile della Squadra Corse. La squadra di Formula Uno, sotto la sua gestione, vince il Campionato mondiale costruttori di Formula 1 per tre anni di seguito, dal 1975 al 1977.</p>
<a class="close" title="chiudere" href="#close"></a>
</div> 

<!-- finestra popup 5 -->
<a href="#x" class="overlay" id="win5"></a>
<div class="popup">
    <div class="pic-left">
        <img src="img/niki2.jpg" /></a>
    </div>
    <h2>Niki Lauda</h2>
<p>Negli anni di Luca Cordero di Montezemolo c’è stato un pilota che ha fatto sognare e festeggiare milioni di appassionati e fan del Cavallino, Niki Lauda. L’austriaco ha vinto due campionati del mondo di Formula Uno nel 1974 e nel 1977, in totale ha collezionato 57 gran premi e ben 15 vittorie.</p>
<a class="close" title="chiudere" href="#close"></a>
<br>
<div class="video">
  <iframe width="853" height="480" src="img/nikivideo.mp4" ></iframe>
      </div>
</div>

<!-- finestra popup 6 -->
<a href="#x" class="overlay" id="win6"></a>
<div class="popup">
    <div class="pic-left">
        <img src="img/f402.jpg" /></a>
    </div>
    <h2>L'ultima vettura di Enzo Ferrari</h2>
<p>La Ferrari F40, nata nel 1987, è stata l’ultima auto realizzata sotto la gestione del fondatore Enzo Ferrari. Il genio che ha dato un’anima alle automobili marchiate dal cavallino rampante ottiene un’altra Laurea honoris causa in fisica da parte dell’Università di Modena, prima di scomparire all’età di 90 anni il 14 agosto del 1988.</p>
<a class="close" title="chiudere" href="#close"></a>
<br>
<div class="video">
  <iframe width="853" height="480" src="img/evolution.mp4" ></iframe>
      </div>
</div>


<!-- finestra popup 7 -->
<a href="#x" class="overlay" id="win7"></a>
<div class="popup">
    <div class="pic-left">
        <img src="img/sciumi2.jpg" /></a>
    </div>
    <h2>Michael Schumacher</h2>
<p>Dopo quasi vent’anni dall’ultimo mondiale di Formula Uno vinto da Niki Lauda la Ferrari torna alla vittoria grazie ad uno dei piloti migliori della storia dell’automobilismo, Michael Schumacher. Il pilota tedesco riporta in auge la Ferrari diretta dal team principal Jean Todt, vincendo 5 titoli consecutivi, dal 2000 al 2004. Schumacher ha ottenuto, nelle stagioni in Ferrari 170 gran premi e 72 vittorie all’attivo.</p>
<a class="close" title="chiudere" href="#close"></a>
</div>


<!-- finestra popup 8 -->
<a href="#x" class="overlay" id="win8"></a>
<div class="popup">
    <div class="pic-left">
        <img src="img/kimi2.jpg" /></a>
    </div>
    <h2>L'ultimo Mondiale</h2>
<p>Nel 2007 il finlandese Kimi Raikkonen vince il campionato di F1 ed è attualmente l’ultimo iridato della Ferrari. In quell’anno Michael Schumacher si ritira dopo 16 anni di attività e la rosso lo sostituisce con Raikkönen mentre ha esordito nella massima categoria il britannico Lewis Hamilton.</p>
<a class="close" title="chiudere" href="#close"></a>
</div>

<!-- finestra popup 9 -->
<a href="#x" class="overlay" id="win9"></a>
<div class="popup">
    <div class="pic-left">
        <img src="img/marc2.webp" /></a>
    </div>
    <h2>Aria di Rivoluzione</h2>
<p>La Ferrari decide di spodestare Luca Cordero di Montezemolo, un personaggio che ha fatto la storia della scuderia, dalla figura di Presidente, al suo posto Sergio Marchionne. Cambio anche della parte tecnica, il nuovo team principal diventa Maurizio Arrivabene e Sebastian Vettel prende il posto di Fernando Alonso come primo pilota. La rivoluzione Ferrari da i suoi frutti ma il Mondiale rimane in mano alla Mercedes.</p>
<a class="close" title="chiudere" href="#close"></a>
</div>

<!-- finestra popup 10 -->
<a href="#x" class="overlay" id="win10"></a>
<div class="popup">
    <div class="pic-left">
        <img src="img/scudo2.png" /></a>
    </div>
    <h2>La Ferrari è Unica</h2>
<p>La Ferrari è l’unico costruttore di automobili che abbia preso parte a tutte le edizioni del Campionato di Formula Uno a partire dalla sua creazione, nel 1950. E’ stato per molti anni l’unico team a realizzare per le sue monoposto, dal telaio al motore, passando per cambio e sospensioni. Nella sua carriera in F1 ha conquistato 15 titoli mondiali Piloti e 16 Costruttori e detiene i record di vittorie, di pole position e giri più veloci in gara.</p>
<a class="close" title="chiudere" href="#close"></a>
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