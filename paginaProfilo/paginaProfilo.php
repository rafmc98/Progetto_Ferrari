<?php 
    session_start();
    if(!isset($_SESSION['email']))
        header("Location: ../paginaIniziale/homePage.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../paginaIniziale/homePage.css" rel="stylesheet">
    <link href="paginaProfilo.css" rel="stylesheet">
    <script src="../paginaIniziale/HomePageScript.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="../vue.min.js"></script>
    
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
                var pic = $(this).attr("name");
                var icon = $("img",this).attr("src");
                pic = '../Flat avatars icons pack/PNG/'+ pic;
                $('#immagine').css({
                    "background-image" : "url('" + pic + "')",
                    "background-size" : "cover"
                });

                // Send Ajax request to backend.php, with src set as "icon" in the POST data
                $.post('backend.php',{iconcina : icon});
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
    <div class="titolo">Profile</div>
    </div>

    <!--Riepilogo info utente-->
    <div class="box-info">

        <!-- Sezione avatar-->
        <div id="app" class="profile-pic">
            <div class="img-box">
                <div id="immagine"></div>
            </div>
            <div class="select-box">
                <div class="select-button">Choose avatar</div>
                <div class="select-content">
                    <div class="avatar" name="128x128/128_1.png"><img src="../Flat avatars icons pack/PNG/128x128/128_1.png">Avatar 1</div>
                    <div class="avatar" name="128x128/128_2.png"><img src="../Flat avatars icons pack/PNG/128x128/128_2.png">Avatar 2</div>
                    <div class="avatar" name="128x128/128_3.png"><img src="../Flat avatars icons pack/PNG/128x128/128_3.png">Avatar 3</div>
                    <div class="avatar" name="128x128/128_4.png"><img src="../Flat avatars icons pack/PNG/128x128/128_4.png">Avatar 4</div>
                    <div class="avatar" name="128x128/128_5.png"><img src="../Flat avatars icons pack/PNG/128x128/128_5.png">Avatar 5</div>
                    <div class="avatar" name="128x128/128_6.png"><img src="../Flat avatars icons pack/PNG/128x128/128_6.png">Avatar 6</div>
                    <div class="avatar" name="128x128/128_7.png"><img src="../Flat avatars icons pack/PNG/128x128/128_7.png">Avatar 7</div>
                    <div class="avatar" name="128x128/128_8.png"><img src="../Flat avatars icons pack/PNG/128x128/128_8.png">Avatar 8</div>
                    <div class="avatar" name="128x128/128_9.png"><img src="../Flat avatars icons pack/PNG/128x128/128_9.png">Avatar 9</div>
                    <div class="avatar" name="128x128/128_10.png"><img src="../Flat avatars icons pack/PNG/128x128/128_10.png">Avatar 10</div>
                    <div class="avatar" name="128x128/128_11.png"><img src="../Flat avatars icons pack/PNG/128x128/128_11.png">Avatar 11</div>
                    <div class="avatar" name="128x128/128_12.png"><img src="../Flat avatars icons pack/PNG/128x128/128_12.png">Avatar 12</div>
                    <div class="avatar" name="128x128/128_13.png"><img src="../Flat avatars icons pack/PNG/128x128/128_13.png">Avatar 13</div>
                    <div class="avatar" name="128x128/128_14.png"><img src="../Flat avatars icons pack/PNG/128x128/128_14.png">Avatar 14</div>
                    <div class="avatar" name="128x128/128_15.png"><img src="../Flat avatars icons pack/PNG/128x128/128_15.png">Avatar 15</div>
                    <div class="avatar" name="128x128/128_16.png"><img src="../Flat avatars icons pack/PNG/128x128/128_16.png">Avatar 16</div>
                </div>
            </div>
        </div> 
        
        <!-- Sezione informazioni utente dal db -->
        <div class="user-info">
            <?php
                $dbconn = pg_connect("host=localhost port=5432 dbname=ProjectDB user=postgres password=password")
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


    <!--Footer-->
    <div class="footer">
        <ul class="footerContent">
          <li><i class="fab fa-instagram"></i></li>
          <li><i class="fab fa-facebook"></i></li>
          <li><i class="fab fa-twitter"></i></li>
        </ul>
    </div>
    
</body>
</html>