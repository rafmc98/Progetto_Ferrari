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
    <link rel="shortcut icon" type="img/png" href="../favicon.png">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" charset="utf-8"></script>
    <script src="../paginaIniziale/HomePageScript.js"></script>
    
    <!-- Dropdown Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <?php include '../templates/jquerySessioni.php'; ?>
    
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

            // setta l'immagine dell'avatar relativo all'utente
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

                // Invia una richiesta Ajax per associare l'avatar scelto alla sessione corrente
                $.post('backend.php',{iconcina : icon});
            });

            $('.card-link').click(function(){
                if($('#freccia').attr('class')=='fas fa-angle-down') $('#freccia').attr('class','fas fa-angle-up');
                else $('#freccia').attr('class','fas fa-angle-down');
            });


            $('.card-body').click(function(){
                var idprodotto = $(this).attr('id');
                window.location.href = "../paginaProdotto/paginaProdotto.php?idprodotto=" + idprodotto;
            });

        });
    </script>

    <title>Profile page</title>

</head>
<body>


    <?php include '../templates/header-sideBar.php'; ?>
    
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
                    Visualizza riepilogo ordini <div class="arrow"><i id="freccia" class="fas fa-angle-down"></i></div>
                </div>
            </div>
            
            <div id="collapseOne" class="collapse" data-parent="#accordion">
                <!-- Riepilogo ordini php -->
                <?php
                    $email = $_SESSION['email'];
                    $q = "select * from ordini where email = '$email' ";
                    $result = pg_query($q) or die('Query failed: '.pg_last_error());
                    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)){
                ?>
                    <div class="card-body"  id='<?php echo $line["idprodotto"]?>'>
                        <p><?php echo $line["nomeprodotto"];?></p> 
                        <p>Qty: <?php echo $line["quantità"];?></p> 
                        <p>Costo: <?php echo $line["prezzo"]; ?>€</p>
                        <footer class="blockquote-footer">
                            <?php echo $line["data"]; ?>
                        </footer>
                    </div>
                
                <?php
                    }
                    pg_free_result($result);
                    pg_close($dbconn);
                ?>
            </div>
        </div>
    </div>

    
    <?php include '../templates/footer.html'; ?>
    
</body>
</html>