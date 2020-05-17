<?php
    
    $dbconn = pg_connect("host=localhost port=5432 dbname=PassioneFerrari user=postgres password=password ")or 
                die ( ' Could not connect : ' . pg_last_error( ) ) ;

               
    if(isset($_GET['parametro'])){
        $condition = $_GET['parametro']; 
        $query = "select nome, cognome, nazionalità
                  from piloti 
                  where cognome like '%".$condition."%'
                  or nome like '%".$condition."%'";
    }
    else{
        $query = "SELECT nome, cognome, nazionalità
                FROM piloti";
    }

    
    $data = pg_query ($query) or die ( ' Query failed : ' .pg_last_error( ) ) ;
    $response = array();
    while ($row = pg_fetch_array ($data , null , PGSQL_ASSOC ) ) {
        $response[] = $row;
    }

    echo json_encode($response);
    exit;
?>