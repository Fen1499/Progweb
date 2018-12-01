<?php include 'quadro.php' ?>
<div class="boxquadro">
<ul>
    <li><button onclick=showhidden() >ALTERAR HORARIO</button></li>
</ul>
<div id="seila" hidden>
    <p>Disciplina <input name="disc"></p>
    <p>Professor <input name="prof"></p>
    <p>Sala <input name="sala"></p>
    <p id="horap">Horarios <input name="hora" min="7" max="21" size="2">
    <button onclick="addhora()">+</button></p>
    <p><input value="Add"></p>
</div>
<script>
    function showhidden()
    {
        x = document.getElementById("seila");
        x.hidden = !x.hidden;
    }

    function addhora()
    {
        document.getElemenyById("horap").write(<input name="hora" min="7" max="21" size="2">);
    }
</script>