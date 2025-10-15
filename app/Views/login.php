<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('css/loginStyle.css') ?>">
     <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
            <section>
                <form action="<?= base_url('auth/intentarLogin') ?>" method="post">
                    <?php if (session()->getFlashdata('error')): ?>
        <p style="color: red;"><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>
                    <strong><h1>Bienvenido a Vino Costero</h1></strong>
                    <h3>Por favor ingrese sus credenciales</h3>
                    <label for="user">Nombre de usuario</label>
                    <input type="email" name="user" id="user" placeholder="Ingresa tu usuario aqui">
                    <label for="password">Contraseña</label>
                    <input type="password" name="pass" id="pass" placeholder="Ingresa tu Contraseña aqui">
                    <button id="btn1" type="submit">Ingresar</button>
                </form>
            </section>
    </div>
</body>

</html>