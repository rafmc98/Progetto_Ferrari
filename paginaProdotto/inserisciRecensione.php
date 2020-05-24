<?php
    session_start();
    
    $titolo = $_GET['titolo'];
    $descrizione = $_GET['descrizione'];
    $stars = $_GET['stars'];
    $idprodotto = $_GET['idprodotto'];
    $email = $_SESSION['email'];
    $data = date("Y/m/d");
    

    $dbconn = pg_connect("host=localhost port=5432 dbname=PassioneFerrari user=postgres password=password ")or 
                die ( ' Could not connect : ' . pg_last_error() ) ;
    $q2 = "insert into recensioni values (DEFAULT,$1,$2,$3,$4,$5,$6)";
    $data = pg_query_params($dbconn,$q2,array($titolo,$descrizione,$stars,$data,$email,$idprodotto));
?>