<?php
    include 'controlador.php';//CONTROLADOR
    class login_control extends controlador{

        //ESSA CONSTRUTOR N PARECE LEGAL, MAS FUNCIONA
        function __construct($database)
        {
            parent::__construct($database);
            $this->login = $_POST["login"];
			$this->pass = $_POST["pass"];
        }

        public function checklogin($tipo)
        {
            if($tipo == "aluno")
            {
                if($this->db->login_qry($this->login,$this->pass))
                {
                    require_once('../_view/quadro.php'); //Abre a página do quadro de horários.
                }
                else
                {
                    echo "User os pass errado<br>";//USER OS PASS ERRADO
                }  
            }
            if($tipo =="prof")
            {
                if($this->db->loginprof_qry($this->login,$this->pass))
                {
                    require_once('../_view/profview.php');
                   
                }                    
                else
                {
                    echo "User ou pass errado<br>";
                }
            }
                
        }
    }

    $logincontrol = new login_control($db);
    $logincontrol->checklogin($_GET['tipo']);
    

?>