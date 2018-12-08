<?php include 'quadro.php' ?>
<div class="boxquadro">
<ul>
    <li><button onclick=showhidden() >ALTERAR HORARIO</button></li>
</ul>
<div id="addhorario" hidden>
    <p>
    Disciplina <select name="disc"></select>
    Professor <select name="prof"></select>
    </p>
    <p>
    Sala <select name="sala"></select>
    Horario <select name="hora"></select>
    </p>
    <button onclick=addhora() hidden>+</button>
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
</script>