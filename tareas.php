<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barra de Navegación Lateral</title>
    <link href="css/styles.css" rel="stylesheet" type="text/css" />

</head>
<body>

<div class="sidebar">
    <img src="img/logos.svg" alt="Logo principal">
    <a href="cursos.php?id=<?php echo $_GET["person"];?>">Cursos</a>
    <a href="perfil.php?id=<?php echo $_GET["person"];?>">Mi perfil</a>
    <a href="ajustes.html">Ajustes</a>
    <a href="index.php">Cerrar sesión</a>
</div>

<div class="content">

    <h2>Tareas por hacer</h2>
    <div class="contenedor-tareas">
        <?php
                require "database.php";
                $userid = $_GET["person"];
                $course = $_GET["course"];
                $sql = 'SELECT * FROM tareas WHERE course_id = '.$course.'';
                $pdo = Database::connect();
                foreach ($pdo->query($sql) as $row) {
                    echo'
                <div class="tarea">
                    <div class="contenido-tarea">
                        <h3 class="titulo-curso">'.$row["title"].'</h3>
                        <p class="precio">'.$row["descrip"].'</p>
                    </div>
                    <div class="boton-tarea">
                        <a href="'.$row["preguntasHTML"].'" class="boton-amarillo-block">
                            Iniciar Tema
                        </a>
                    </div><!--.contenido-anuncio-->
                </div><!--anuncio-->    
                    ';
                }        
        ?>
    </div> <!--.contenedor-anuncios-->

</div>

</body>
</html>