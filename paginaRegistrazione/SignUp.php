<?php
    /* Controllo sessione */
    session_start();
    if(isset($_SESSION['email'])){
        header("Location: ../paginaProfilo/paginaProfilo.php");
    }
    else{
        $dbconn = pg_connect("host=localhost port=5432 dbname=PassioneFerrari user=postgres password=password")
                    or die('Could not connect: '.pg_last_error());
        // questo isset impedisce di accedere a  questa pagina utilizzando direttamente l'url
        if(!(isset($_POST['registrationButton']))){
            header("Location: SignUp.html");
        }
        else{
            $email = $_POST['inputEmail'];
            $q1="select * from utenze where email = $1";
            $result = pg_query_params($dbconn,$q1,array($email));
            if($line=pg_fetch_array($result,null,PGSQL_ASSOC)){
                echo    '<script>
                                alert("Sei un utente già registrato");
                                window.location.href = "login.html";
                        </script>';
            }
            else{
                $name= $_POST['inputName'];
                $surname = $_POST['inputSurname'];
                $email = $_POST['inputEmail'];
                $password = md5($_POST['inputPassword']);
                $img = '../Flat avatars icons pack/PNG/256x256/256_13.png';
                $q2 = "insert into utenze values ($1,$2,$3,$4,$5,$6)";
                $data = pg_query_params($dbconn,$q2,array($email,$name,$surname,$password,null,$img));
                if($data){
                    $_SESSION['email'] = $email;
                    $_SESSION['nome'] = $name;
                    $_SESSION['user-pic'] = $img;
                    header("Location: ../paginaProfilo/paginaProfilo.php");
                }
            }
        }
    }
?>
 
