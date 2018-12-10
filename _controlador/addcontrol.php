<?php
    include 'controlador.php';//CONTROLADOR
    class add_control extends controlador
    {
        //CONSTRUTOR É HERDADO IMPLICITAMENTE

        public function addhorario($vet){
            $aux = json_decode($vet,false);
            $discid = explode(" ",$aux[0])[0];
            $profid = explode(" ",$aux[1])[0];
            
            $this->db->add_horario($discid,$profid,$aux[2],$aux[3],$aux[4]);
        }
    }

    $addcontrol = new add_control($db);
    $ret = $addcontrol->addhorario($_REQUEST['auladata']);
    echo $ret;
?>