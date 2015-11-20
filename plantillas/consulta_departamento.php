<?php  

////session_start(); 
//include("plantilla/php/conexion.php");
//include("/php/conexion.php");
//conectar();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Vuelos</title>
    <link href="../css/estilos.css" rel="stylesheet" type="text/css">
</head>
<body>

    <header>
        <section class="contenedor">
            <h1>Agencia De Vuelos</h1>
            <p>Gestion De Reservas</p>
        </section>
    </header>
    <?php include"menu.php"; ?>
    <section class="contenedor">
        <aside>
            <ul>
                <iframe width="100%" height="250px" frameborder="0" src="http://www.creatupropiaweb.com/Recursos_Flash/reloj1.swf"></iframe>
            </ul>
            <ul>
                <iframe width="100%" height="250px" frameborder="0" src="http://abowman.com/projects/gadgets/fish/fish.swf"></iframe>
            </ul>
        </aside>
        <section class="contenido">
            <iframe width="100%" height="550px" frameborder="0" src="contenido/Departamento/Consultar.php"></iframe>
        </section>
    </section>
    <footer>
        <section class="contenedor">
            <p> <a> Footer </a></p>
        </section>
    </footer>
</body>
</html>

