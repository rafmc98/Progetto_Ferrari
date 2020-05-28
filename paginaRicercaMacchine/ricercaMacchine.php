<?php
    
    $dbconn = pg_connect("host=localhost port=5432 dbname=PassioneFerrari user=postgres password=password ")or 
                die ( ' Could not connect : ' . pg_last_error( ) ) ;

    $tipo= $_GET['type'];
    if(isset($_GET['parametro'])){
        $condition = $_GET['parametro']; 
        $query = "select nome,tipo,anno
                from macchine 
                where nome ilike '%".$condition."%' and tipo='$tipo'
                order by anno desc";
    }
    else{
        $query = "SELECT nome,tipo,anno
            FROM macchine
            WHERE tipo='$tipo'
            order by anno desc";
        }

        
    $data = pg_query ($query) or die ( ' Query failed : ' .pg_last_error( ) ) ;
    $response = array();
    while ($row = pg_fetch_array ($data , null , PGSQL_ASSOC ) ) {
        $response[] = $row;
        }

    echo json_encode($response);
    exit;
?>