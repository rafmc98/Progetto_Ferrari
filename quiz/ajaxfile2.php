<?php 
	$dbconn = pg_connect("host=localhost port=5432 dbname=PassioneFerrari user=postgres password=password ")or 
				die ( ' Could not connect : ' . pg_last_error( ) ) ;
	$query  = "SELECT email,punteggio
				FROM utenze
				WHERE punteggio>0
				order by punteggio desc
				LIMIT 5;
				";
				$result = pg_query ($query) or die ( ' Query failed : ' .pg_last_error( ) ) ;
				$pos=1;
				while ($line = pg_fetch_array ($result , null , PGSQL_ASSOC ) ) {
?>
					<p class="classifica">
						<?php echo $pos?>
						<?php echo $line["email"]; ?>
						<?php echo $line["punteggio"]; ?>
						<?php $pos=$pos+1 ?>
					</p>
					<?php
				}
						pg_free_result($result);
						pg_close($dbconn);  
					?>