<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Estado Sanitario</title>
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
    <h1>Registrar Estado Sanitario</h1>

    <?php if (session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger">
        <?= implode('<br>', session()->getFlashdata('errors')) ?>
    </div>
    <?php endif; ?>

    <form action="<?= base_url('estado_sanitario/store') ?>" method="post">

        <div class="mb-3">
            <label for="parcela_id" class="form-label">Parcela:</label>
            <select name="parcela_id" id="parcela_id" class="form-control" required>
                <option value="">Seleccione...</option>
                <?php foreach ($parcelas as $p): ?>
                <option value="<?= $p['id'] ?>" <?= old('parcela_id') == $p['id'] ? 'selected' : '' ?>>
                    <?= esc($p['nombre']) ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha:</label>
            <input type="date" name="fecha" id="fecha" class="form-control" required value="<?= old('fecha') ?>">
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado:</label>
            <select name="estado" id="estado" class="form-control" required>
                <option value="">Seleccione...</option>
                <option value="Sano" <?= old('estado') == 'Sano' ? 'selected' : '' ?>>Sano</option>
                <option value="Plaga" <?= old('estado') == 'Plaga' ? 'selected' : '' ?>>Plaga</option>
                <option value="Tratamiento" <?= old('estado') == 'Tratamiento' ? 'selected' : '' ?>>Tratamiento</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="observaciones" class="form-label">Observaciones:</label>
            <textarea name="observaciones" id="observaciones"
                class="form-control"><?= old('observaciones') ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="<?= base_url('estado_sanitario') ?>" class="btn btn-secondary">Cancelar</a>
    </form>

</body>

</html>