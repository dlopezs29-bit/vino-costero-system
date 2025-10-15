<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Reporte</title>
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
    <h1>Reporte de Cosechas</h1>
    <p>Desde: <?= esc($fechaInicio) ?> — Hasta: <?= esc($fechaFin) ?></p>

    <table border="1" width="100%" cellspacing="0" cellpadding="5">
        <thead>
            <tr>
                <th>Tipo de Uva</th>
                <th>Total Cosechas</th>
                <th>Total Kg</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datos as $d): ?>
            <tr>
                <td><?= esc($d['tipo_uva']) ?></td>
                <td><?= esc($d['total_cosechas']) ?></td>
                <td><?= esc($d['total_kg']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>