<?php
    /* Controllo sessione */
    session_start();
    if(isset($_SESSION['email'])){
        header("Location: ../paginaProfilo/paginaProfilo.php");
    }
    else{
        $dbconn = pg_connect("host=localhost port=5432 dbname=ProjectDB user=postgres password=password")
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
                echo "<h1>Sorry, you are already a register user</h1>
                    <a href=../paginaLogin/login.html>Click here to login</a>";
            }
            else{
                $name= $_POST['inputName'];
                $surname = $_POST['inputSurname'];
                $email = $_POST['inputEmail'];
                $password = md5($_POST['inputPassword']);
                $q2 = "insert into utenze values ($1,$2,$3,$4)";
                $data = pg_query_params($dbconn,$q2,array($email,$name,$surname,$password));
                if($data){
                    $_SESSION['email'] = $email;
                    $_SESSION['user-pic'] = '../Flat avatars icons pack/PNG/256x256/256_1.png';
                    header("Location: ../paginaProfilo/paginaProfilo.php");
                }
            }
        }
    }
?>
 
