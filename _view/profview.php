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
        Dia <select id="dia" name="dia"></select>
        Sala <select id="sala" name="sala"></select>
        Horario <select id="hora" name="hora"></select>
        </p>
        <p><button onclick=tryADD()>ADD</button></p>
</div>


<script>
    function showhidden()
    {
        x = document.getElementById("addhorario");
        x.hidden = !x.hidden;
    }

    function tryADD()
    {
        /*prof_id = document.getElementById("prof").value;
        prof_id = prof_id.split(" ")[0];

        disc_id = document.getElementById("disc").value;
        disc_id = disc_id.split(" ")[0];*/
        
        var x = document.getElementsByTagName("SELECT");
        var vet = [];
        for(aux=0;aux<5;aux++)//Disc Prof Dia Sala Hora
        {
            vet.push(x[aux].value);
        }
        JSON.stringify(vet);
        console.log(vet);

        var request = new XMLHttpRequest();
		request.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
               alert("O horario foi adicionado, ou n :v")
            }
        };
        request.open("GET", "../_controlador/addcontrol.php?auladata="+vet, true);
        request.send();

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

    function load_dia()
    {
        var semana =["Segunda","Terça","Quarta"
	    ,"Quinta","Sexta"];
        mySELECT = document.getElementById("dia");
        for(x=0;x<5;x++)
        {
            var y = document.createElement("OPTION");
            y.setAttribute("value",x);
            y.innerHTML = semana[x];
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
    load_dia();
</script>