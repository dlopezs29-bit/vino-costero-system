<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Lote</title>
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
    <h1>Registrar Lote</h1>

    <?php if (session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger">
        <?= implode('<br>', session()->getFlashdata('errors')) ?>
    </div>
    <?php endif; ?>

    <form action="<?= base_url('lotes/store') ?>" method="post">
        <div class="mb-3">
            <label for="id_cosecha" class="form-label">Cosecha:</label>
            <select name="id_cosecha" id="id_cosecha" class="form-control" required>
                <option value="">Seleccione una cosecha</option>
                <?php foreach ($cosechas as $c): ?>
                <option value="<?= $c['id'] ?>" <?= old('id_cosecha') == $c['id'] ? 'selected' : '' ?>>
                    Cosecha #<?= $c['id'] ?> — Fecha: <?= esc($c['fecha_cosecha']) ?> — <?= esc($c['cantidad_kg']) ?> kg
                </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="codigo_lote" class="form-label">Código de Lote:</label>
            <input type="text" name="codigo_lote" id="codigo_lote" class="form-control" required
                value="<?= old('codigo_lote') ?>">
        </div>

        <div class="mb-3">
            <label for="cantidad_botellas" class="form-label">Cantidad de Botellas:</label>
            <input type="number" name="cantidad_botellas" id="cantidad_botellas" class="form-control" required
                value="<?= old('cantidad_botellas') ?>">
        </div>

        <div class="mb-3">
            <label for="volumen_litros" class="form-label">Volumen (litros):</label>
            <input type="number" step="0.01" name="volumen_litros" id="volumen_litros" class="form-control" required
                value="<?= old('volumen_litros') ?>">
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado:</label>
            <select name="estado" id="estado" class="form-control" required>
                <option value="en_proceso" <?= old('estado') == 'en_proceso' ? 'selected' : '' ?>>En Proceso</option>
                <option value="embotellado" <?= old('estado') == 'embotellado' ? 'selected' : '' ?>>Embotellado</option>
                <option value="almacenado" <?= old('estado') == 'almacenado' ? 'selected' : '' ?>>Almacenado</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="<?= base_url('lotes') ?>" class="btn btn-secondary">Cancelar</a>
    </form>

</body>

</html>