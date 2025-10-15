<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Parcela</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/editCreateParcela.css')?>">
</head>

<body class="p-4">
    <div class="container">
        <h1 class="mb-4">Editar Parcela</h1>

        <form action="<?= base_url('parcelas/actualizar/' . $parcela['id']) ?>" method="post">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control"
                    value="<?= esc($parcela['nombre']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="ubicacion" class="form-label">Ubicación</label>
                <input type="text" name="ubicacion" id="ubicacion" class="form-control"
                    value="<?= esc($parcela['ubicacion']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="area" class="form-label">Área</label>
                <input type="text" name="area" id="area" class="form-control"
                    value="<?= esc($parcela['area']) ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="<?= base_url('parcelas') ?>" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>

</html>
