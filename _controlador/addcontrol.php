<?php
    include 'controlador.php';//CONTROLADOR
    class add_control extends controlador
    {
        //CONSTRUTOR É HERDADO IMPLICITAMENTE

        public function addhorario($vet){
            $aux = explode(",",$vet);//Disc Prof Dia Sala Hora
            $discid = explode(" ",$aux[0]);
            $profid = explode(" ",$aux[1]);
             
            if($this->db->add_horario($discid[0],$profid[0],$aux[2]+2,$aux[3],$aux[4]))
            {
                return "Horario adicionado com sucesso";
            }
            else{return $this->db->get_error();}
        }

        public function adddisc($newdisc)
        {
            if($newdisc == null){return "Campo vazio";}
            $newdisc = "'".$newdisc."'";//TEM QUE POR ASPAS
         
            if($this->db->add_disc($newdisc))
            {
                return "Sucesso";
            }
            else{return $this->db->get_error();}
        }
    }

    $addcontrol = new add_control($db);
    switch($_REQUEST['addid'])
    {
        case "1":
            $ret = $addcontrol->addhorario($_REQUEST['auladata']);
            break;
        case "2":
            $ret = $addcontrol->adddisc($_REQUEST['newdisc']);
            break;

    }
    echo $ret;//Fora do escopo mas parece funcionar
?>