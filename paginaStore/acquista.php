<?php
    session_start();
    $ordine = json_decode(file_get_contents("php://input"));
    $nomeProdotto = $ordine -> nomeProdotto;
    $quantity = $ordine -> quantity;
    $idProdotto = $ordine -> idProdotto;
    $email = $_SESSION['email'];
    $data = date("Y/m/d");
    $ordine = json_decode(file_get_contents("php://input"));
    

    $dbconn = pg_connect("host=localhost port=5432 dbname=PassioneFerrari user=postgres password=password ")or 
                die ( ' Could not connect : ' . pg_last_error( ) ) ;
        
        $q2 = "insert into ordini values (DEFAULT,$1,$2,$3,$4,$5)";
        $data = pg_query_params($dbconn,$q2,array($email,$nomeProdotto,$quantity,$data,$idProdotto));
    
?>