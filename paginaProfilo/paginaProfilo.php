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
                <img v-bind:src="image" height="160px" widht="160px">
            </div>
            <div class="select-box">
                <div class="select-button">Choose avatar</div>
                <div class="select-content">
                    <div v-for="x in variants" v-on:Click="updateImage(x.image)" class="avatar">
                        <img v-bind:src="x.iconImage">
                        {{ x.name }}
                    </div>
                </div>
            </div>
        </div>
        <script  type="text/javascript" src="avatar.js" ></script>   
        
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