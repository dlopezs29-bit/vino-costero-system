<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Reporte</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url('css/reporteStyle.css')?>">
</head>

<body>
    <h1>Generar Reporte de Cosechas</h1>
    <?php if (session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger">
        <?= implode('<br>', session()->getFlashdata('errors')) ?>
    </div>
    <?php endif; ?>
    <a href="<?= base_url('dashboard') ?>" class="btn btn-secondary mb-3"><i class="bi bi-arrow-bar-left fs-5"></i>
        Volver al Dashboard</a>

    <form action="<?= base_url('reportes/generar') ?>" method="post" class="mb-4">
        <div class="row">
            <div class="col">
                <label>Desde:</label>
                <input type="date" name="fecha_inicio" class="form-control" required>
            </div>
            <div class="col">
                <label>Hasta:</label>
                <input type="date" name="fecha_fin" class="form-control" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Generar</button>
    </form>

</body>

</html>