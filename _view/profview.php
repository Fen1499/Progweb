<?php //include 'quadro.php'?>
<div id="teste">RESERVADO PRA MENSAGENS DE TESTE</div>
<div class="boxquadro">
    <ul>
        <li><button onclick=showhidden() >ALTERAR HORARIO</button></li>
    </ul>
    <div id="addhorario" >
        <p>
        Disciplina <select id ="disc" name="disc"></select>
        Professor <select name="prof"></select>
        </p>
        <p>
        Sala <select name="sala"></select>
        Horario <select name="hora"></select>
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

    function aaa()
    {
        var request = new XMLHttpRequest();
		request.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
                var myJSON = JSON.parse(this.responseText);
                var mySELECT = document.getElementById("disc");
                for(x in myJSON)
                {
                    var y = document.createElement("OPTION")
                    y.setAttribute("value",myJSON[x]);
                    y.innerHTML = myJSON[x];
                    mySELECT.appendChild(y);
                }
            }
        };
        request.open("GET", "../_controlador/profcontrol.php", true);
        request.send();
    }
    aaa();
</script>