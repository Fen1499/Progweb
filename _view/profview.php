<?php include 'quadro.php' ?>
<div class="boxquadro">
<ul>
    <li><button onclick=showhidden() >ALTERAR HORARIO</button></li>
</ul>
<div id="seila" hidden>
    AAAA
</div>
<script>
    function showhidden()
    {
        x = document.getElementById("seila");
        x.hidden = !x.hidden;
    }
</script>