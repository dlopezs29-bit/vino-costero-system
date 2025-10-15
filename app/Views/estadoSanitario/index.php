<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estado Sanitario</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url('css/sanitarioStyle.css')?>">
</head>

<body>
    <h1>Historial de Estados Sanitarios</h1>

    <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
    <?php endif; ?>

    <a href="<?= base_url('estado_sanitario/create') ?>" class="btn btn-success mb-3"><i class="bi bi-plus-circle fs-5"></i> Registrar nuevo estado</a>
    <a href="<?= base_url('dashboard') ?>" class="btn btn-secondary mb-3"><i class="bi bi-arrow-bar-left fs-5"></i>
        Volver al Dashboard</a>

    <table class="table table-bordered table-dark table-striped">
        <thead>
            <tr>
                <th>Parcela</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Observaciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($estados)): ?>
            <?php foreach ($estados as $e): ?>
            <tr>
                <td><?= esc($e['parcela']) ?></td>
                <td><?= esc($e['fecha']) ?></td>
                <td><?= esc($e['estado']) ?></td>
                <td><?= esc($e['observaciones']) ?></td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
            <tr>
                <td colspan="4">No hay registros sanitarios.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>

</html>