<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lotes</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url('css/loteStyle.css')?>">
</head>
<body>
    <h1>Listado de Lotes</h1>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<a href="<?= base_url('lotes/create') ?>" class="btn btn-success mb-3"><i class="bi bi-plus-circle fs-5"></i>Registrar nuevo lote</a>
<a href="<?= base_url('dashboard') ?>" class="btn btn-secondary mb-3"><i class="bi bi-arrow-bar-left fs-5"></i> Volver al Dashboard</a>

<table class="table table-bordered table-dark table-striped">
    <thead>
        <tr>
            <th>Código</th>
            <th>Cosecha</th>
            <th>Cantidad Botellas</th>
            <th>Volumen (L)</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($lotes)): ?>
            <?php foreach ($lotes as $l): ?>
                <tr>
                    <td><?= esc($l['codigo_lote']) ?></td>
                    <td>Cosecha #<?= esc($l['id_cosecha']) ?> (<?= esc($l['fecha_cosecha']) ?>)</td>
                    <td><?= esc($l['cantidad_botellas']) ?></td>
                    <td><?= esc($l['volumen_litros']) ?></td>
                    <td><?= ucfirst(esc($l['estado'])) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="5">No hay lotes registrados.</td></tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>