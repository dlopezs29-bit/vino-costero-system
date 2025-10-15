<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Nueva Parcela</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/editCreateParcela.css')?>">
</head>

<body class="p-4">
    <h1>Registrar Nueva Parcela</h1>
    <div class="container">
    <form action="<?= base_url('parcelas/guardar') ?>" method="post">
        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Ubicación</label>
            <input type="text" name="ubicacion" class="form-control">
        </div>
        <div class="mb-3">
            <label>Área (en hectáreas)</label>
            <input type="number" step="0.01" name="area" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="<?= base_url('parcelas') ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>

</html>