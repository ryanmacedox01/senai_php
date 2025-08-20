<?php
    session_start();
    $dados =$_SESSION['pessoas'];
    $conteudo = json_encode($dados, JSON_PRETTY_PRINT);

    echo "<center><h1>seu formulario foi enviado</h1></center>";
?>