<?php 
    $nome = $_GET["nome"];
    $dbconn = pg_connect("host=localhost port=5432 dbname=PassioneFerrari user=postgres password=password ")or 
    die ( ' Could not connect : ' . pg_last_error( ) ) ;
    $query  = "SELECT * 
                FROM macchine WHERE nome ='$nome'";
    $data = pg_query ($query) or die ( ' Query failed : ' .pg_last_error( ) ) ;
    $response = array();
    while ($row = pg_fetch_array ($data , null , PGSQL_ASSOC ) ) {
        $response[] = $row;
    }

    echo json_encode($response);
    exit;
?>