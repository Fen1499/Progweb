<?php 
	//DEPRECATED 
	//DEPRECATED
	//DEPRECATED
	//DEPRECATED
	//DEPRECATED
	//DEPRECATED?>
<table id="tabelaspec">
	<tr>
		<th>HORA</th>
		<th>Sala 1</th>
		<th>Sala 2</th>
		<th>Sala 3</th>
		<th>Sala 4</th>
		<th>Sala 5</th>
		<th>Sala 6</th>
		<th>Sala 7</th>
		<th>Sala 8</th>
		<th>Lab. Comp.</th>
		<th>Lab. Eng.</th>
	</tr>
	<?php
	$aux = $GLOBALS['arr'];
	$row = array_pop($aux);
	for($hora = 7;$hora <22;$hora++)
	{
		echo "<tr>";
		echo "<th>".$hora.":00</th>";//Escreve a hora do lado
		for($sala = 1;$sala <11;$sala++)
		{
			if($row['aula_hora'] == $hora and $row['aula_sala'] == $sala){
			echo"<td>".$row['disc_nome']."<br>".$row['prof_nome']."</td>";
			$row = array_pop($aux);
			}
			else{
			echo "<th></th>";
			}
		}
		echo "</tr>";
	}
	 ?>
	 
</table>