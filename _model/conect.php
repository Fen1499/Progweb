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
			$this->dbname = "quadro";
			$this->conn = new mysqli($this->servername,$this->user,$this->password,$this->dbname);
			$this->conn->set_charset("utf8"); //Passa tudo que vem do db pra utf8
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

		public function disc_qry(){ //Retorna um vetor no formato [Id1Nome1,Id2Nome2,...,IdXNomeX]
			$arr = array();
			$qstr = "SELECT * FROM disciplina";
			$result = $this->conn->query($qstr);
			while($row = $result->fetch_assoc()){
				array_push($arr,$row['disc_id']." ".$row['disc_nome']);
			}
			$result->free();
			return $arr;
		}

		public function prof_qry(){ //Retorna um vetor no formato [Id1Nome1,Id2Nome2,...,IdXNomeX]
			$arr = array();
			$qstr = "SELECT * FROM professor";
			$result = $this->conn->query($qstr);
			while($row = $result->fetch_assoc()){
				array_push($arr,$row['prof_id']." ".$row['prof_nome']);
			}
			$result->free();
			return $arr;
		}

		public function add_horario($disc_id,$prof_id,$dia,$sala,$hora){
			$qstr = "INSERT INTO aula(aula_dia,aula_sala,aula_hora,disc_id,prof_id)
			VALUES($dia,$sala,$hora,$disc_id,$prof_id)";
			return $this->conn->query($qstr);
		}

		public function add_disc($disc_nome){
			$qstr = "INSERT INTO disciplina(disc_nome) VALUES($disc_nome)";
			return $this->conn->query($qstr);
		}

		public function get_error()
		{
			return $this->conn->error;
		}
	}
?>