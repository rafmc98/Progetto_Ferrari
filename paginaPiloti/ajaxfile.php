<?php
    
    $dbconn = pg_connect("host=localhost port=5432 dbname=PassioneFerrari user=postgres password=password ")or 
                die ( ' Could not connect : ' . pg_last_error( ) ) ;
    $pilota = 'Leclerc';
    $query  = "SELECT * 
                FROM   piloti, eventi
                WHERE piloti.id = eventi.pilota and cognome ='$pilota'";
    $res = pg_query ($query) or die ( ' Query failed : ' .pg_last_error( ) ) ;
    while ($row = pg_fetch_array ($res , null , PGSQL_ASSOC ) ) {
        $res[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($res);
    exit;
?>