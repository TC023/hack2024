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
    <a href="index.php">Cerrar sesión</a>
    <a href="#">Cursos</a>
    <a href="perfil.php?id=<?php echo $_GET["id"];?>">Mi perfil</a>
    <a href="ajustes.html">Ajustes</a>
</div>

<div class="content">
    <h2>Cursos disponibles</h2>
    <div class="contenedor-anuncios">
        <?php
        require "database.php";
        $userid = $_GET["id"];
        $sql = "SELECT * FROM inscriptions
        INNER JOIN courses
        ON inscriptions.course_id = courses.course_id
        WHERE user_id = ".$userid."";
        $pdo = Database::connect();
        foreach ($pdo->query($sql) as $row) {
        echo '
        <div class="anuncio">
            <picture>
                <img src="img/'.$row["img"].'" alt="Logo principal">
            </picture>

            <div class="contenido-anuncio">
                <h3 class="titulo-curso">'.$row["title"].'</h3>
                <p class="precio">'.$row["instructor"].'</p>


                <a href="tareas.php?course='.$row["course_id"].'&person='.$_GET["id"].'" class="boton-amarillo-block">
                    Ver Curso
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
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barra de Navegación Lateral</title>
    <link href="css/styles.css" rel="stylesheet" type="text/css" />

</head>
<body>

    <button id="chatbot-toggle-btn"><img src="img/bot.svg" alt="buttonpng" /></button>
    <div class="chatbot-popup" id="chatbot-popup">
        <div class="chat-header">
            <span>Chatbot | Aprende sin limites</span>
            <button id="close-btn">&times;</button>
        </div>
        <div class="chat-box" id="chat-box"></div>
        <div class="chat-input">
            <input type="text" id="user-input" placeholder="Escribe un mensaje">
            <button id="send-btn">Enviar</button>
        </div>
        
    </div>
</div>
<script src="script.js"></script>
</body>
</html>
