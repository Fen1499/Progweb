<?php //include 'quadro.php'?>
<div id="teste">RESERVADO PRA MENSAGENS DE TESTE</div>
<div class="boxquadro">
    <ul>
        <li><button onclick=showhidden("addhorario") >ADICIONAR HORARIO</button></li>
        <li><button onclick=showhidden("adddisc") >ADICIONAR DISCIPLINA</button></li>
    </ul>
    <div id="addhorario" hidden>
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
    <div id="adddisc" hidden>
        Disciplina <input id="add_disc" class="add_disc" type="text">
        <button onclick=tryADD_disc()>ADD</button>
    </div> 
</div>


<script src="scriptProfview.js"></script>