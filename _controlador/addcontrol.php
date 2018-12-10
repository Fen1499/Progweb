<?php
    include 'controlador.php';//CONTROLADOR
    class add_control extends controlador
    {
        //CONSTRUTOR É HERDADO IMPLICITAMENTE

        public function addhorario($vet){
            $aux = explode(",",$vet);//Disc Prof Dia Sala Hora
            $discid = explode(" ",$aux[0]);
            $profid = explode(" ",$aux[1]);

            //TESTE
            $f = fopen("explodetest.txt","w");
            fwrite($f,$discid[0]);
            fwrite($f,$profid[0]);
            fclose($f);
            //FIM DO TESTE
             
            
            if($this->db->add_horario($discid[0],$profid[0],$aux[2]+2,$aux[3],$aux[4]))
            {
                return true;
            }
            else{return false;}
        }
    }
    
    $addcontrol = new add_control($db);
    $ret = $addcontrol->addhorario($_REQUEST['auladata']);
    echo $ret;
?>