<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cosechas</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url('css/cosechaStyle.css') ?>">
</head>

<body>
    <h1>Listado de Cosechas</h1>

    <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
    <?php endif; ?>

    <a href="<?= base_url('cosechas/create') ?>" class="btn btn-success mb-3"><i class="bi bi-plus-circle fs-5"></i> Registrar nueva cosecha</a>
    <a href="<?= base_url('dashboard') ?>" class="btn btn-secondary mb-3"><i class="bi bi-arrow-bar-left fs-5"></i> Volver al Dashboard</a>

    <table class="table table-bordered table-dark table-striped">
        <thead>
            <tr>
                <th>Parcela</th>
                <th>Tipo de Uva</th>
                <th>Estado Sanitario</th>
                <th>Fecha de Cosecha</th>
                <th>Cantidad (kg)</th>
                <th>Observaciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($cosechas)): ?>
            <?php foreach ($cosechas as $c): ?>
            <tr>
                <td><?= esc($c['parcela']) ?></td>
                <td><?= esc($c['tipo_uva']) ?></td>
                <td><?= esc($c['estado']) ?></td>
                <td><?= esc($c['fecha_cosecha']) ?></td>
                <td><?= esc($c['cantidad_kg']) ?></td>
                <td><?= esc($c['observaciones']) ?></td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
            <tr>
                <td colspan="6">No hay cosechas registradas.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>

</html>