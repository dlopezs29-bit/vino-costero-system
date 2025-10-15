<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte</title>
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
    <h3>Reporte de Cosechas del <?= esc($fechaInicio) ?> al <?= esc($fechaFin) ?></h3>

    <a href="<?= base_url("reportes/pdf/$fechaInicio/$fechaFin") ?>" class="btn btn-danger mb-3">Descargar PDF</a>

    <canvas id="grafico"></canvas>

    <table class="table table-bordered mt-3">
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

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    const ctx = document.getElementById('grafico');
    const labels = <?= json_encode(array_column($datos, 'tipo_uva')) ?>;
    const dataKg = <?= json_encode(array_column($datos, 'total_kg')) ?>;

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Total Kg por Tipo de Uva',
                data: dataKg,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>

</body>

</html>