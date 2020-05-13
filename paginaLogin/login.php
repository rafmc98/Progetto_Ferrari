<?php
    /* Controllo sessione */
    session_start();
    if(isset($_SESSION['email'])){
        header("Location: ../paginaProfilo/paginaProfilo.php");
    }
    else{
        $dbconn = pg_connect("host=localhost port=5432 dbname=PassioneFerrari user=postgres password=password")
                or die('Could not connect: '.pg_last_error());
            if(!(isset($_POST['loginButton']))){
                header("Location: login.html");
            }
            else{
                $email = $_POST['inputEmail'];
                $q1 = "select * from utenze where email = $1";
                $result = pg_query_params($dbconn,$q1,array($email));
                if(!($line = pg_fetch_array($result,null,PGSQL_ASSOC))){
                    echo    '<script>
                                alert("Non hai ancora effettuato la registrazione");
                                window.location.href = "login.html";
                            </script>';
                }
                else{
                    $password = md5($_POST['inputPassword']);
                    $q2 = "select * from utenze where email = $1 and password = $2";
                    $result = pg_query_params($dbconn,$q2,array($email,$password));
                    if (!($line = pg_fetch_array($result,null,PGSQL_ASSOC))){
                        echo "<h1> The password is erroneous </h1><a href=login.html> Click here to login</a>" ;
                    }
                    else{
                        $_SESSION['email'] = $email;
                        $_SESSION['user-pic'] = '../Flat avatars icons pack/PNG/256x256/256_1.png';
                        header("Location: ../paginaProfilo/paginaProfilo.php");
                    }
                }
            }
        }
    ?>
