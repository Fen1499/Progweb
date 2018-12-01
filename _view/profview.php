<?php include 'quadro.php' ?>
<div class="boxquadro">
<ul>
    <li><button onclick=showhidden() >ALTERAR HORARIO</button></li>
</ul>
<div id="seila" hidden>
    <p>Disciplina <input name="disc"></p>
    <p>Professor <input name="prof"></p>
    <p>Sala <input name="sala"></p>
    <p id="horap">Horarios <input name="hora" min="7" max="21" size="2"></p>
    <button onclick=addhora()>+</button>
    <p><button onclick="">ADD</button></p>
</div>
<script>
    function showhidden()
    {
        x = document.getElementById("seila");
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
</script>