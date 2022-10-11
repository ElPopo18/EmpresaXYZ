<?php
require_once("layouts/header.php");
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="./css/registro.css">
    <link rel="icon" href="./css/calendario.png">
</head>
<body>
    <div id="contenedor">
        <h1 id="titulo">&iquest; Que desea registrar ?</h1>
        <div class="caja-borde">
            <div class="rectanguloS">
                <img src="views/img/reunion-de-la-junta.png">
                <a href="index.php?n=registrosoc" class="registro-socio">Un Socio</a>
            </div>
            <div class="rectanguloE">
                <img src="views/img/oficina.png">
                <a href="./registro-empresa.php"class="registro-empresa">Una Empresa</a>
            </div>
        </div>
    </div>

<?php
require_once("layouts/footer.php");
?>