<?php include 'quadro.php'?>
<div class="boxquadro">
    <ul>
        <li><button onclick=showhidden("addhorario") >ADICIONAR HORARIO</button></li>
        <li><button onclick=showhidden("adddisc") >ADICIONAR DISCIPLINA</button></li>
        <li><button onclick=showhidden("remvhorario") >REMOVER HORARIO</button></li>
    </ul>
    <div id="opts">
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
        <div id="remvhorario" hidden>
            <p>
            Dia <select id="rmvdia" name="dia"></select>
            Sala <select id="rmvsala" name="sala"></select>
            Horario <select id="rmvhora" name="hora"></select>
            </p>
            <p><button onclick=tryRMV_horario()>REMOVER</button></p>
        </div>
    </div>
</div>


<script src="scriptProfview.js"></script>