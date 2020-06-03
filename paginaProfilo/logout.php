<?php
    session_start();
    // Aggiorna l'icona dell'utente all'interno del db e chiude la sessione
    if(isset($_SESSION['email'])){

        $dbconn = pg_connect("host=localhost port=5432 dbname=PassioneFerrari user=postgres password=password ")or 
        die ( ' Could not connect : ' . pg_last_error( ) ) ;
    
        $email = $_SESSION['email'];
        $img = $_SESSION['user-pic'];
        $query  = "UPDATE utenze SET img='$img' WHERE email='$email'";
        $result = pg_query ($query) or die ( ' Query failed : ' .pg_last_error( ) ) ;
        pg_free_result($result);
        pg_close($dbconn); 
        session_destroy();
    }
    header("Location: ../paginaLogout/paginaLogout.html");
?>