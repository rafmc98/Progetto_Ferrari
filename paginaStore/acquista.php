<?php
    session_start();
    // Insert nalla tabella ordini del prodotto con nome appeso alla richiesta
    $ordine = json_decode(file_get_contents("php://input"));
    $nomeprodotto = $ordine -> nomeprodotto;
    $quantity = $ordine -> quantity;
    $prezzo = $ordine -> prezzo;
    $idprodotto = $ordine -> idprodotto;
    $email = $_SESSION['email'];
    $data = date("Y/m/d");
    $dbconn = pg_connect("host=localhost port=5432 dbname=PassioneFerrari user=postgres password=password ")or 
        die ( ' Could not connect : ' . pg_last_error( ) ) ;
    $q2 = "insert into ordini values (DEFAULT,$1,$2,$3,$4,$5,$6)";
    $data = pg_query_params($dbconn,$q2,array($email,$nomeprodotto,$quantity,$data,$idprodotto,$prezzo));
    if($data) echo json_encode("true");
    exit;
?>