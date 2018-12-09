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
				for(hora=7;hora<22;hora++)
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
			request.open("GET","../_controlador/quadrocontrol.php?dia="+dia,true);
			request.send();	
	}

	function trocadia(dia)
	{
		x = document.getElementsByTagName("button");
		for(var i=0;i<5;i++)
		{
			if(i == dia){x[i].setAttribute("class","active");}
			else{x[i].setAttribute("class","");}
		}
		att_table(dia);
	}

	att_table(dia);