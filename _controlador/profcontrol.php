<?php
    include 'controlador.php';//CONTROLADOR
    class prof_control extends controlador()
    {
        //CONSTRUTOR É HERDADO IMPLICITAMENTE

        public function get_disc()
        {
            $arr = $this->db->disc_qry();
            return $arr;
        }
    }
    $profcontrol = new prof_control($db);
    $ret = $profcontrol->get_disc();
    //TESTE
	$f = fopen("jsontest.txt","w");
	fwrite($f,$ret);
	fclose($f);
	//FIM DO TESTE
    $ret = json_encore($ret);
    echo $ret;
?>