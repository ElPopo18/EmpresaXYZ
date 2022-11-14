<?php 
    session_start();
    session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesion Cerrada</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div>
        <h3>Se ha cerrado la sesion por inactividad</h3>
        <a href="index.php?n=paginaLogin">Volver al inicio de sesion</a>
    </div>
</body>
</html>