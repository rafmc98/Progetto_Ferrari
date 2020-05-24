<?php
    session_start();
    $ordine = json_decode(file_get_contents("php://input"));
    $nomeprodotto = $ordine -> nomeprodotto;
    $quantity = $ordine -> quantity;
    $idprodotto = $ordine -> idprodotto;
    $email = $_SESSION['email'];
    $data = date("Y/m/d");
    $dbconn = pg_connect("host=localhost port=5432 dbname=PassioneFerrari user=postgres password=password ")or 
        die ( ' Could not connect : ' . pg_last_error( ) ) ;
    $q2 = "insert into ordini values (DEFAULT,$1,$2,$3,$4,$5)";
    $data = pg_query_params($dbconn,$q2,array($email,$nomeprodotto,$quantity,$data,$idprodotto));
    exit;
?>