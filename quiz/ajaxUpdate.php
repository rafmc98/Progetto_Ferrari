<?php 
        $dbconn = pg_connect("host=localhost port=5432 dbname=PassioneFerrari user=postgres password=password ")or 
        die ( ' Could not connect : ' . pg_last_error( ) ) ;
        $score=$_GET['score'];
        $email=$_GET['email'];
        $immagine=$_GET['immagine'];
        $query  = "UPDATE utenze set punteggio=$score WHERE (email='$email' and punteggio<$score) or (email='$email' and punteggio is null)";
        $query2= "UPDATE utenze set img='$immagine' WHERE email='$email' ";
        $result = pg_query ($query) or die ( ' Query failed : ' .pg_last_error( ) ) ;
        $result2=pg_query ($query2) or die ( ' Query failed : ' .pg_last_error( ) ) ;
        pg_free_result($result);
        pg_free_result($result2);
        pg_close($dbconn); 
?>

