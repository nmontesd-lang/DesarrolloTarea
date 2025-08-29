<h2><?= $titulo ?></h2>
<form action="<?= base_url('cursos/update/'.$curso['id']) ?>" method="post">
    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?= $curso['nombre'] ?>" required>
    <br>
    <label>Descripción:</label>
    <textarea name="descripcion"><?= $curso['descripcion'] ?></textarea>
    <br>
    <button type="submit">Actualizar</button>
</form>
