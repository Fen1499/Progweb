<?php
	include '../_model/conect.php'; //MODEL

	class controlador{
		protected $id;//NAO USADO
		protected $login;//DO SISTEMA, N DO DB
		protected $pass;//DO SISTEMA, N DO DB
		protected $db;//Usa esse cara pra acessar os metodos publicos do model

		function __construct($database)
		{
			$this->login = $_POST["login"];
			$this->pass = $_POST["pass"];
			$this->db = $database;
		}

		

		public function show_horario($dia)//Retorna os horarios do dia pro view
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
		//AQUI PODEM TER OUTRAS COISAS QUE VÃO ACONTECER QUANDO O USUARIO CONSEGUIR LOGAR
		//TEM QUE TER UM HTML DEPOIS QUE FECHA ESSE PHP, QUE SERIA O VIEW.
	}
	$db = accessdb::getInstance();//FORA DA CLASSE S I N G L E T O N
	$usuario = new userqualquer($db);//Passa o objeto que acessa o db pro controller, pelo construtor
?>