<div>
	<div class="title">
		<h1 >Aqui entra Logo do ICT</h1>
		<h2 >QUADRO DE HORARIOS</h2>
		<h3 >
			<button href="#" onclick = prevD() id ="prev" class = "pagination"><</button>
			<span id="dia">DIA DA SEMANA</span>
			<button href="#" onclick = nextD() id="next" class = "pagination">></button>
		</h3>
	</div>
	<div id="teste" class="boxquadro">
		<table id='tabelaspec'>
		<tr><td>A</td><td>B</td></tr>
		</table>
	</div>

	<script>
	var dia = 0;
	var semana =["Segunda","Terça","Quarta"
	,"Quinta","Sexta"];
	
	var start_table = "<table id='tabelaspec'>"+"<tr>"+"<th>HORA</th>"+"<th>Sala 1</th>"+"<th>Sala 2</th>"+"<th>Sala 3</th>"
	+"<th>Sala 4</th>"+"<th>Sala 5</th>"+"<th>Sala 6</th>"+"<th>Sala 7</th>"+"<th>Sala 8</th>"
	+"<th>Lab. Comp.</th>"+"<th>Lab. Eng.</th>"+"</tr>";
	

	function att_table(dia)
	{
		var request = new XMLHttpRequest();
		request.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
				var txt = start_table;
				var myJSON = JSON.parse(this.responseText);
				var sala,hora;
				var x = 0;
				for(hora=9;hora<22;hora++)
				{
					txt += "<tr><td>"+hora+":00</td>";
					for(sala=1;sala<11;sala++)
					{
						if(myJSON[x] != null && myJSON[x].aula_hora == hora && myJSON[x].aula_sala == sala)
						{
							txt += "<td>"+myJSON[x].disc_nome+"<br>"+myJSON[x].prof_nome+"</td>";
							x++;
						}
						else{txt += "<td><br></td>";}

					}
					txt += "</tr>";
				}
			}
			document.getElementById("teste").innerHTML = txt+"</table>";
		};
			request.open("GET","../_controlador/queriecontrol.php?dia="+dia,true);
			request.send();	
	}

	function nextD()
	{
		dia = ((dia+1)%5);
		document.getElementById("dia").innerHTML = semana[dia];
		///
		att_table(dia);
	}

	function prevD()
	{
		if(dia > 0){dia = ((dia-1)%5);}
		else{dia = 4;}
		document.getElementById("dia").innerHTML = semana[dia];
		///
		att_table(dia);
	}

	document.getElementById("dia").innerHTML = semana[dia];
	att_table(dia);
	</script>


</div>
<?php
//TO DO
//OTIMIZAR/REFATORAR
//FAZER UMA TRANSIÇÃO SHOW
//TRATAR O PROBLEMA DOS SLOTS DE HORA
?>