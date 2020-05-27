
<?php 
	$dbconn = pg_connect("host=localhost port=5432 dbname=PassioneFerrari user=postgres password=password ")or 
				die ( ' Could not connect : ' . pg_last_error( ) ) ;
	$query  = "SELECT email,punteggio,img
				FROM utenze
				WHERE punteggio>=0
				order by punteggio desc
				LIMIT 5;
				";
				$result = pg_query ($query) or die ( ' Query failed : ' .pg_last_error( ) ) ;
				$pos=1;
				echo "<table class=classifica><tr><td><h3 class=title><strong>Posizione</strong></h3></td> <td> </td><td><h3 class=title><strong>Email</strong></h3> </td> <td><h3 class=title><strong>Score</strong></h3></td> </tr>";
				while ($line = pg_fetch_array ($result , null , PGSQL_ASSOC ) ) {
?>					<tr>
						<td heigth=70>
							<?php echo $pos?>
						</td>
						<td height=70>
							<img src='<?php echo $line["img"]?>' width="30px">
						</td>
						<td height=70>
							<?php echo $line['email']?>
						</td>
						<td height=70> 
							<?php echo $line["punteggio"] ?>
						</td>
						<?php $pos=$pos+1 ?>
					</tr>
					<?php
				}
						pg_free_result($result);
						pg_close($dbconn);  
					?>
					</table>