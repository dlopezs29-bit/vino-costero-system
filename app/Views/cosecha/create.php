<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cosecha</title>
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
    <h1>Registrar Cosecha</h1>

    <?php if (session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger">
        <?= implode('<br>', session()->getFlashdata('errors')) ?>
    </div>
    <?php endif; ?>

    <form action="<?= base_url('cosechas/store') ?>" method="post">

        <div class="mb-3">
            <label for="id_parcela" class="form-label">Parcela:</label>
            <select name="id_parcela" id="id_parcela" class="form-control" required>
                <option value="">Seleccione una parcela</option>
                <?php foreach ($parcelas as $p): ?>
                <option value="<?= $p['id'] ?>" <?= old('id_parcela') == $p['id'] ? 'selected' : '' ?>>
                    <?= esc($p['nombre']) ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="id_tipo_uva" class="form-label">Tipo de Uva:</label>
            <select name="id_tipo_uva" id="id_tipo_uva" class="form-control" required>
                <option value="">Seleccione un tipo</option>
                <?php foreach ($uvas as $u): ?>
                <option value="<?= $u['id'] ?>" <?= old('id_tipo_uva') == $u['id'] ? 'selected' : '' ?>>
                    <?= esc($u['nombre']) ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="id_estado_sanitario" class="form-label">Estado Sanitario:</label>
            <select name="id_estado_sanitario" id="id_estado_sanitario" class="form-control" required>
                <option value="">Seleccione un estado</option>
                <?php foreach ($estados as $e): ?>
                <option value="<?= $e['id'] ?>" <?= old('id_estado_sanitario') == $e['id'] ? 'selected' : '' ?>>
                    <?= esc($e['estado']) ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha_cosecha" class="form-label">Fecha de Cosecha:</label>
            <input type="date" name="fecha_cosecha" id="fecha_cosecha" class="form-control"
                value="<?= old('fecha_cosecha') ?>" required>
        </div>

        <div class="mb-3">
            <label for="cantidad_kg" class="form-label">Cantidad (kg):</label>
            <input type="number" step="0.01" name="cantidad_kg" id="cantidad_kg" class="form-control"
                value="<?= old('cantidad_kg') ?>" required>
        </div>

        <div class="mb-3">
            <label for="observaciones" class="form-label">Observaciones:</label>
            <textarea name="observaciones" id="observaciones"
                class="form-control"><?= old('observaciones') ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="<?= base_url('cosechas') ?>" class="btn btn-secondary">Cancelar</a>
    </form>

</body>

</html>