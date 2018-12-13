<?php
    include 'controlador.php';//CONTROLADOR
    class prof_control extends controlador
    {
        //CONSTRUTOR É HERDADO IMPLICITAMENTE

        public function get_qry($tipo)
        {
            if($tipo == "disc"){
                $arr = $this->db->disc_qry();
            }
            else if($tipo == "prof"){
                $arr = $this->db->prof_qry();
            }
            return $arr;
        }
    }
    $profcontrol = new prof_control($db);
    $ret = $profcontrol->get_qry($_REQUEST['qrytipo']);
    $ret = json_encode($ret);//JSON_UNESCAPED_UNICODE
    echo $ret;
?>