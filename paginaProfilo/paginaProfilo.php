<?php 
    session_start();
    if(!isset($_SESSION['email']))
        header("Location: ../paginaIniziale/homePage.php");
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../paginaF1/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="../paginaIniziale/homePage.css" rel="stylesheet">
    <link href="paginaProfilo.css" rel="stylesheet">
    <script src="../paginaIniziale/HomePageScript.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" charset="utf-8"></script>
    
    <!-- Dropdown Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    
    
    <script>
        $(document).ready(function(){

            $('.select-button').on('click', function() {
                $('.select-content').slideToggle(800);
            });
            $('.select-button').mouseenter(function(){
                $(this).css("background-color","#b62006")
            });
            $('.select-button').mouseleave(function(){
                $(this).css("background-color","#ff2800")
            });

            // setta l'immagine dell'avatar in base a quella di default
            $('#immagine').css({
                "background-image" : "url('<?php echo $_SESSION['user-pic'] ?>')",
                "background-size" : "cover"
            });

            
            $('.avatar').click(function(){
                var icon = $("img",this).attr("src");
                $('#immagine').css({
                    "background-image" : "url('" + icon + "')",
                    "background-size" : "cover"
                });

                // Send Ajax request to backend.php, with src set as "icon" in the POST data
                $.post('backend.php',{iconcina : icon});
            });

            $('.card-link').on("click", function (event) {
                $('.arrow').toggleClass('rotate');
                $('.arrow').toggleClass('rotate2');
            });


            
        });
    </script>

    <title>Profile page</title>
</head>
<body>
    <!--Siderbar-->
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
      
    <!--Navabar-->
    <div class="navbar">
    <div class="openbtn" onclick="openNav()">☰ MENU</div>
    </div>
    
    <!--Header-->
    <div class="header">
    <div class="titolo">Passione Ferrari</div>
    </div>
    
    <div class="titolo-pagina">Profilo</div>

    <!--Riepilogo info utente-->
    <div class="box-info">

        <!-- Sezione avatar-->
        <div class="profile-pic">
            <div class="img-box">
                <div id="immagine"></div>
            </div>
            <div class="select-box">
                <div class="select-button">Choose avatar</div>
                <div class="select-content">
                    <div class="avatar"><img src="../Flat avatars icons pack/PNG/256x256/256_1.png">Avatar 1</div>
                    <div class="avatar"><img src="../Flat avatars icons pack/PNG/256x256/256_2.png">Avatar 2</div>
                    <div class="avatar"><img src="../Flat avatars icons pack/PNG/256x256/256_3.png">Avatar 3</div>
                    <div class="avatar"><img src="../Flat avatars icons pack/PNG/256x256/256_4.png">Avatar 4</div>
                    <div class="avatar"><img src="../Flat avatars icons pack/PNG/256x256/256_5.png">Avatar 5</div>
                    <div class="avatar"><img src="../Flat avatars icons pack/PNG/256x256/256_6.png">Avatar 6</div>
                    <div class="avatar"><img src="../Flat avatars icons pack/PNG/256x256/256_7.png">Avatar 7</div>
                    <div class="avatar"><img src="../Flat avatars icons pack/PNG/256x256/256_8.png">Avatar 8</div>
                    <div class="avatar"><img src="../Flat avatars icons pack/PNG/256x256/256_9.png">Avatar 9</div>
                    <div class="avatar"><img src="../Flat avatars icons pack/PNG/256x256/256_10.png">Avatar 10</div>
                    <div class="avatar"><img src="../Flat avatars icons pack/PNG/256x256/256_11.png">Avatar 11</div>
                    <div class="avatar"><img src="../Flat avatars icons pack/PNG/256x256/256_12.png">Avatar 12</div>
                    <div class="avatar"><img src="../Flat avatars icons pack/PNG/256x256/256_13.png">Avatar 13</div>
                    <div class="avatar"><img src="../Flat avatars icons pack/PNG/256x256/256_14.png">Avatar 14</div>
                    <div class="avatar"><img src="../Flat avatars icons pack/PNG/256x256/256_15.png">Avatar 15</div>
                    <div class="avatar"><img src="../Flat avatars icons pack/PNG/256x256/256_16.png">Avatar 16</div>
                </div>
            </div>
        </div> 
        
        <!-- Sezione informazioni utente dal db -->
        <div class="user-info">
            <?php
                $dbconn = pg_connect("host=localhost port=5432 dbname=PassioneFerrari user=postgres password=password")
                or die('Could not connect: '.pg_last_error());
                $email = $_SESSION['email'];
                $q = "select * from utenze where email = '$email' ";
                $result = pg_query($q) or die('Query failed: '.pg_last_error());
                while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)){
            ?>
                    <div class="info">
                            <div class="user-field">
                                <div class="title-field">Name</div>
                                <div class="info-db"><?php echo $line["name"]; ?></div>
                            </div>
                            <div class="user-field">
                                <div class="title-field">Surname</div>
                                <div class="info-db"><?php echo $line["surname"]; ?></div>
                            </div>
                            <div class="user-field">
                                <div class="title-field">Email</div>
                                <div class="info-db"><?php echo $line["email"]; ?></div>
                            </div>
                            <div class="user-field" id="button-div">
                                <button onclick="window.location.href='logout.php'" class="logout-button">Logout</button>
                            </div>
                        </div>
                <?php
                    }
                ?>
            </div>
    </div>
    
   
    <div id="accordion">
        <div class="card text-white bg-dark mb-3">
            <div class="card-header">
                <div class="card-link btn text-white" data-toggle="collapse" href="#collapseOne">
                    Visualizza riepilogo ordini <div class="arrow"><i class="fas fa-chevron-up arrow"></i></div>
                </div>
                
                
                
            </div>
            
            <div id="collapseOne" class="collapse" data-parent="#accordion">
                <!-- Riepilogo ordini php -->
                <?php
                    $dbconn = pg_connect("host=localhost port=5432 dbname=PassioneFerrari user=postgres password=password")
                    or die('Could not connect: '.pg_last_error());
                    $email = $_SESSION['email'];
                    $q = "select * from ordini where email = '$email' ";
                    $result = pg_query($q) or die('Query failed: '.pg_last_error());
                    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)){
                ?>
                    <div class="card-body">
                        <p><?php echo $line["nomeprodotto"];?></p> 
                        <p>Qty: <?php echo $line["quantità"];?></p> 
                        <p>Costo: <?php echo $line["prezzo"]; ?>€</p>
                        <footer class="blockquote-footer">
                            <?php echo $line["data"]; ?>
                        </footer>
                    </div>
                
                <?php
                    }
                ?>
            </div>
        </div>
    </div>

    
    <!--Footer-->
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