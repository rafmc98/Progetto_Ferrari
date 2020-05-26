<?php 
        $dbconn = pg_connect("host=localhost port=5432 dbname=PassioneFerrari user=postgres password=password ")or 
        die ( ' Could not connect : ' . pg_last_error( ) ) ;
        $score=$_GET['score'];
        $email=$_GET['email'];
        $img=$_GET['img'];
        $query  = "INSERT INTO record (email,punteggio,img) values ('$email',$score,'$img')";
        $result = pg_query ($query) or die ( ' Query failed : ' .pg_last_error( ) ) ;
        pg_free_result($result);
        pg_close($dbconn); 
?>