<?php //include 'quadro.php'?>
<div id="teste">RESERVADO PRA MENSAGENS DE TESTE</div>
<div class="boxquadro">
    <ul>
        <li><button onclick=showhidden() >ADICIONAR HORARIO</button></li>
    </ul>
    <div id="addhorario" >
        <p>
        Disciplina <select id ="disc" name="disc"></select>
        Professor <select id = "prof" name="prof"></select>
        </p>
        <p>
        Sala <select id="sala" name="sala"></select>
        Horario <select id="hora" name="hora"></select>
        </p>
        <p><button onclick="">ADD</button></p>
</div>


<script>
    function showhidden()
    {
        x = document.getElementById("addhorario");
        x.hidden = !x.hidden;
    }

    function addhora()
    {
        var x = document.createElement("INPUT");
        x.setAttribute("type", "text");
        x.setAttribute("min","7");
        x.setAttribute("max","21");
        x.setAttribute("size","2");
        document.getElementById("horap").appendChild(x);
    }

    function load_hora()
    {
        mySELECT = document.getElementById("hora");
        for(x=9;x<22;x++)
        {
            var y = document.createElement("OPTION");
             y.setAttribute("value",x);
             y.innerHTML = x+":00";
             mySELECT.appendChild(y);
        }
    }

    function load_sala()
    {
        mySELECT = document.getElementById("sala");
        for(x=1;x<11;x++)
        {
            var y = document.createElement("OPTION");
            y.setAttribute("value",x);
            y.innerHTML = "Sala"+x;
            mySELECT.appendChild(y);
        }
    }

    function load_datalist(tipo)
    {
        var request = new XMLHttpRequest();
		request.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
                var myJSON = JSON.parse(this.responseText);
                var mySELECT = document.getElementById(tipo);
                for(x in myJSON)
                {
                    var y = document.createElement("OPTION");
                    y.setAttribute("value",myJSON[x]);
                    y.innerHTML = myJSON[x];
                    mySELECT.appendChild(y);
                }
            }
        };
        request.open("GET", "../_controlador/profcontrol.php?qrytipo="+tipo, true);
        request.send();
    }
    load_datalist("disc");
    load_datalist("prof");
    load_hora();
    load_sala();
</script>