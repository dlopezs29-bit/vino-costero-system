<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Principal - Vino Costero</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/dashboardStyle.css') ?>">
</head>

<body>

    <nav class="navbar navbar-expand-lg px-4">
        <h2>Vino Costero</h2>
        <div class="ms-auto">
            <span class="text-white me-3">
                Hola, <strong><?= htmlspecialchars($usuario_nombre) ?></strong> (<?= htmlspecialchars($usuario_rol) ?>)
            </span>
            <a href="<?= base_url('logout') ?>" class="btn btn-danger btn-sm">Cerrar sesión<a>
        </div>
    </nav>

    <div class="container dashboard">
        <h1 class="mb-4 text-center">Panel de Control</h1>

        <div class="row g-4">
            <div class="col-md-4">
                <a href="<?= base_url('parcelas') ?>" class="text-decoration-none">
                    <div class="card p-5 text-center ">
                        <h3> Parcelas</h3>
                        <p class="">Gestionar las parcelas registradas</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="<?= base_url('uvas') ?>" class="text-decoration-none">
                    <div class="card p-5 text-center ">
                        <h3> Tipos de Uva</h3>
                        <p class="">Registrar y ver variedades</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="<?= base_url('estadoSanitario') ?>" class="text-decoration-none">
                    <div class="card p-5 text-center ">
                        <h3> Estado Sanitario</h3>
                        <p class="">Control sanitario de las uvas</p>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="<?= base_url('cosechas') ?>" class="text-decoration-none">
                    <div class="card p-5 text-center ">
                        <h3> Cosechas</h3>
                        <p class="">Registrar datos de cosecha</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="<?= base_url('lotes') ?>" class="text-decoration-none">
                    <div class="card p-5 text-center ">
                        <h3> Lotes</h3>
                        <p class="">Gestionar lotes producidos</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="<?= base_url('reportes') ?>" class="text-decoration-none">
                    <div class="card p-5 text-center ">
                        <h3> Reportes</h3>
                        <p class="">Ver reportes de producción</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

</body>

</html>