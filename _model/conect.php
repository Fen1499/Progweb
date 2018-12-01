<?php
	class accessdb{
		private $servername;
		private $user;
		private $password;
		private $dbname;
		private $conn;
		public static $instance;

		private function __construct()//Instancia os atributos quando o objeto é criado
		{							 //Não da pra instanciar métodos privados direto.
			$this->servername = "localhost";
			$this->user = "root";
			//$this->password = "felipe123";
			$this->dbname = "quadro";
			$this->conn = new mysqli($this->servername,$this->user,$this->password,$this->dbname);
		}

		private function Conec()//Conecta com o bd [N USADO, mudou para o construtor]
		{
			return new mysqli($this->servername,$this->user,$this->password,$this->dbname);
		}

		private function model_start()//[N USADO]
		{
			$this->conn = $this->Conec();
			if($this->conn->connect_error){return "BD ERRO";}
		}

		public static function getInstance()
		{
			if(!isset($instance))
			{
				$instance = new self;
			}
			return $instance;
		}

		public function login_qry($user,$pass)//Verifica se o usuario foi logado
		{
			$qstr = "SELECT userName, userPass FROM login";
			$result = $this->conn->query($qstr);
			while($row = $result->fetch_assoc())//RESULT É UMA PILHA, FETCH REMOVE DA PILHA
			{
				if($row['userName'] == $user)
				{
					if($row['userPass'] == $pass){
						$result->free_result();
						return 1;
					}

					else{
						$result->free_result();
						return 0;
					}
				}
			}
			$result->free();
			return 0;
		}

		public function loginprof_qry($user,$pass)
		{
			$qstr = "SELECT prof_id, profPass FROM professor";
			$result = $this->conn->query($qstr);
			while($row = $result->fetch_assoc())
			{
				if($row['prof_id'] == $user)
				{
					if($row['profPass'] == $pass){
						$result->free_result();
						return 1;
					}

					else{
						$result->free_result();
						return 0;
					}
				}
			}
			$result->free();
			return 0;
		}

		public function qry_all(&$rowsize,$dia)//SALA HORA DISC PROF
		{
			$qstr = "SELECT aula.aula_hora,aula.aula_sala,
			disciplina.disc_nome, professor.prof_nome
			FROM aula,professor,disciplina
			WHERE aula.disc_id = disciplina.disc_id
			AND aula.prof_id = professor.prof_id
			AND aula.aula_dia =".$dia."
			ORDER BY aula.aula_hora ASC,aula.aula_sala ASC";
			$result = $this->conn->query($qstr);
			$arr = $result->fetch_all(MYSQLI_ASSOC);//Pega tudo de numa vez
			$rowsize = $result->num_rows;//Numero de linhas da tabela
			$result->free();
			return $arr;
		}
	}
?>