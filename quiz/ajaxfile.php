<?php 
        $dbconn = pg_connect("host=localhost port=5432 dbname=PassioneFerrari user=postgres password=password ")or 
        die ( ' Could not connect : ' . pg_last_error( ) ) ;
        $score=$_GET['score'];
        $email=$_GET['email'];
        $img=$_GET['img'];
        $query  = "UPDATE utenze set punteggio=$score WHERE (email='$email' and punteggio<$score) or (email='$email' and punteggio is null)";
        $result = pg_query ($query) or die ( ' Query failed : ' .pg_last_error( ) ) ;
        pg_free_result($result);
        pg_close($dbconn); 
?>

