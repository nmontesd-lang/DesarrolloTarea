<!DOCTYPE html>
<html>
<head>
    <title><?= $titulo ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
</head>
<body>
    <?= $this->include('Formulario/navbar') ?>

    <div class="container">
        <h4><?= $titulo ?></h4>
        <a class="btn waves-effect" href="<?= base_url('cursos/create') ?>">➕ Nuevo Curso</a>

        <table class="striped highlight responsive-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Profesor</th>
                    <th>Inactivo</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cursos as $row): ?>
                <tr>
                    <td><?= $row['curso'] ?></td>
                    <td><?= $row['nombre'] ?></td>
                    <td><?= $row['profesor'] ?></td>
                    <td><?= $row['inactivo'] ? 'Sí' : 'No' ?></td>
                    <td>
                        <a class="btn-small blue" href="<?= base_url('cursos/edit/' . $row['curso']) ?>">✏️ Editar</a>
                        <a class="btn-small red" href="<?= base_url('cursos/delete/' . $row['curso']) ?>" onclick="return confirm('¿Seguro que quieres eliminar?')">🗑️ Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
