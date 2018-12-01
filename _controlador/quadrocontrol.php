<?php
    include 'controlador.php';//CONTROLADOR
    class querie_control extends controlador{

         //CONSTRUTOR É HERDADO IMPLICITAMENTE

         public function get_horario($dia)//Retorna os horarios do dia pro view
		{
			$numrows;
			$arr = $this->db->qry_all($numrows,$dia);//Passa por referencia pra pegar 2 valores
			return $arr;//Todas as aulas do dia
			for($row = 0; $row<$numrows;$row++)
			{
				for($col = 0; $col<4; $col++)// SALA HORA DISC PROF
				{
					echo $arr[$row][$col];
				}
				echo "<br>";
			}
		}

    }

	$queriecontrol = new querie_control($db);
	$ret = $queriecontrol->get_horario($_REQUEST['dia']+2);//dia = 0~5 em JS,dia = 2~6 no BD
	$ret = json_encode($ret);
	//TESTE
	//$f = fopen("jsontest.txt","w");
	//fwrite($f,$ret);
	//fclose($f);
	//FIM DO TESTE
	echo $ret;

?>
