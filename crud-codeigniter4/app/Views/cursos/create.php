<h2><?= $titulo ?></h2>
<a href="<?= base_url('cursos/create') ?>">+ Nuevo Curso</a>
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($cursos as $curso): ?>
        <tr>
            <td><?= $curso['id'] ?></td>
            <td><?= $curso['nombre'] ?></td>
            <td><?= $curso['descripcion'] ?></td>
            <td>
                <a href="<?= base_url('cursos/edit/'.$curso['id']) ?>">Editar</a>
                <a href="<?= base_url('cursos/delete/'.$curso['id']) ?>" onclick="return confirm('¿Seguro que deseas eliminar este curso?')">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>