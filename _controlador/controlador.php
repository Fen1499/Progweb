<?php
	include '../_model/conect.php'; //MODEL

	class controlador{
		protected $db;//Usa esse cara pra acessar os metodos publicos do model

		function __construct($database)
		{
			
			$this->db = $database;
		}

		//ESSA CLASSE SÓ SERVE PRA SER HERDADA
	}
	$db = accessdb::getInstance();//FORA DA CLASSE
?>