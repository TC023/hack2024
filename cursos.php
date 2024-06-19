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
    <a href="index.html">Inicio</a>
    <a href="perfil.html">Mi perfil</a>
    <a href="ajustes.html">Ajustes</a>
</div>

<div class="content">

    <h2>Cursos disponibles</h2>
 
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
