<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="styleLogin.css">
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <img src="logo.svg" alt="Logo de la Plataforma">
        </div>
        <h1>Inicio de Sesión</h1>
        <form action="loginConfirm.php" method="POST">
            <label for="email">Correo Electrónico</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Iniciar Sesión</button>
        </form>
    </div>
</body>

</html>
