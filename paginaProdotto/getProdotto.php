<?php 
    // Query che restituisce tutte le informazioni relative al prodotto con id uguale a quello appeso alla richiesta
    $dbconn = pg_connect("host=localhost port=5432 dbname=PassioneFerrari user=postgres password=password ")or 
    die ( ' Could not connect : ' . pg_last_error( ) ) ;
    $query  = "SELECT * 
                FROM prodotti WHERE idprodotto =".$_GET['idprodotto']."";
    $data = pg_query ($query) or die ( ' Query failed : ' .pg_last_error( ) ) ;
    $response = array();
    while ($row = pg_fetch_array ($data , null , PGSQL_ASSOC ) ) {
        $response[] = $row;
    }

    echo json_encode($response);
    exit;
?>