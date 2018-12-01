<?php
	include '../_model/conect.php'; //MODEL

	class controlador{
		protected $id;//NAO USADO
		protected $db;//Usa esse cara pra acessar os metodos publicos do model

		function __construct($database)
		{
			
			$this->db = $database;
		}

		//ESSA CLASSE SÓ SERVE PRA SER HERDADA
	}
	$db = accessdb::getInstance();//FORA DA CLASSE S I N G L E T O N
?>