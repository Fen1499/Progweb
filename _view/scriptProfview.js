function showhidden(str)
    {
        x = document.getElementById(str);
        x.hidden = !x.hidden;
    }

    function tryADD()
    {  
        var x = document.getElementsByTagName("SELECT");
        var vet = [];
        for(aux=0;aux<5;aux++)//Disc Prof Dia Sala Hora
        {
            vet.push(x[aux].value);
        }
        console.log(vet);

        var request = new XMLHttpRequest();
		request.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
               alert(this.responseText);
            }
        };
        request.open("GET", "../_controlador/horariocontrol.php?auladata="+vet+"&controleid=1", true);
        request.send();

    }

    function tryADD_disc()
    {
        var x = document.getElementById("add_disc").value;
        console.log(x);
        var request = new XMLHttpRequest();
		request.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
               alert(this.responseText);
            }
        };
        request.open("GET", "../_controlador/horariocontrol.php?newdisc="+x+"&controleid=2", true);
        request.send(); 
    }

    function tryRMV_horario()
    {
        var x = document.getElementById("remvhorario");
        x = x.getElementsByTagName("SELECT");
        var vet = [];
        for(aux=0;aux<3;aux++)//Dia Sala Hora
        {
            vet.push(x[aux].value);
        }
        console.log(vet);

        var request = new XMLHttpRequest();
		request.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
               alert(this.responseText);
            }
        };
        request.open("GET", "../_controlador/horariocontrol.php?aulahora="+vet+"&controleid=3", true);
        request.send();
    }

    function load_hora()
    {
        mySELECT = document.getElementById("hora");
        mySELECT2 = document.getElementById("rmvhora");
        for(x=7;x<22;x++)
        {
            var y = document.createElement("OPTION");
            var z = document.createElement("OPTION");
             y.setAttribute("value",x);
             y.innerHTML = x+":00";
             z.setAttribute("value",x);
             z.innerHTML = x+":00";
             mySELECT.appendChild(y);
             mySELECT2.appendChild(z);
        }
    }

    function load_sala()
    {
        mySELECT = document.getElementById("sala");
        mySELECT2 = document.getElementById("rmvsala");
        for(x=1;x<11;x++)
        {
            var y = document.createElement("OPTION");
            var z = document.createElement("OPTION");
            y.setAttribute("value",x);
            y.innerHTML = "Sala"+x;
            z.setAttribute("value",x);
            z.innerHTML = "Sala"+x;
            mySELECT.appendChild(y);
            mySELECT2.appendChild(z);
        }
    }

    function load_dia()
    {
        var semana =["Segunda","Terça","Quarta"
	    ,"Quinta","Sexta"];
        mySELECT = document.getElementById("dia");
        mySELECT2 = document.getElementById("rmvdia");

        for(x=0;x<5;x++)
        {
            var y = document.createElement("OPTION");
            var z = document.createElement("OPTION");
            y.setAttribute("value",x);
            y.innerHTML = semana[x];
            z.setAttribute("value",x);
            z.innerHTML = semana[x];
            mySELECT.appendChild(y);
            mySELECT2.appendChild(z);
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