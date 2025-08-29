<!DOCTYPE html>
<html>
<head>
    <title>Lista de Alumnos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <?= $this->include('Formulario/navbar') ?>
    <div class="container">
    <h4>Alumnos</h4>
    <a class="btn waves-effect" href="<?= site_url('alumnos/create') ?>">➕ Nuevo Alumno</a>
    <table class="striped highlight responsive-table">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Dirección</th>
            <th>Móvil</th>
            <th>Email</th>
            <th>Detalle</th>
            <th>Inactivo</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($alumnos as $alumno): ?>
        <tr>
            <td><?= $alumno['alumno'] ?></td>
            <td><?= $alumno['nombre'] ?></td>
            <td><?= $alumno['apellido'] ?></td>
            <td><?= $alumno['direccion'] ?></td>
            <td><?= $alumno['movil'] ?></td>
            <td><?= $alumno['email'] ?></td>
            <td><i class="material-icons">list</i></td>
            <td><?= $alumno['inactivo'] ? 'Sí' : 'No' ?></td>
            <td>
                <a class="btn-small blue" href="<?= site_url('alumnos/edit/' . $alumno['alumno']) ?>">✏️ Editar</a>
                <a class="btn-small red" href="<?= site_url('alumnos/delete/' . $alumno['alumno']) ?>" onclick="return confirm('¿Seguro que quieres eliminar?')">🗑️ Eliminar</a>

                <?php
                $db = \Config\Database::connect();
                $tieneCursos = $db->table('detalle_alumno_curso')
                    ->where('alumno_id', $alumno['alumno'])
                    ->countAllResults() > 0;
                ?>

                <!-- Botón Asignar Cursos (gris si no tiene, verde si ya tiene) -->
                <a class="btn-small <?= $tieneCursos ? 'green' : 'grey' ?> modal-trigger"
                   href="#modalAsignar"
                   data-id="<?= $alumno['alumno'] ?>">
                   📚 Cursos
                </a>

                <!-- Botón Ver Cursos -->
                <a class="btn-small blue modal-trigger" href="#modalVer<?= $alumno['alumno'] ?>">👀 Ver</a>

                <!-- Modal Ver Cursos -->
                <div id="modalVer<?= $alumno['alumno'] ?>" class="modal">
                    <div class="modal-content">
                        <h5>Cursos de <?= $alumno['nombre'] ?> <?= $alumno['apellido'] ?></h5>
                        <ul>
                            <?php
                            $cursosAsignados = $db->query("
                                SELECT c.nombre, c.profesor 
                                FROM cursos c
                                JOIN detalle_alumno_curso d ON d.curso_id = c.curso
                                WHERE d.alumno_id = ?", [$alumno['alumno']])->getResultArray();
                            ?>
                            <?php if (count($cursosAsignados) > 0): ?>
                                <?php foreach ($cursosAsignados as $c): ?>
                                    <li><?= $c['nombre'] ?> (<?= $c['profesor'] ?>)</li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li>No tiene cursos asignados</li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <!-- Modal Asignar Cursos -->
    <div id="modalAsignar" class="modal">
        <div class="modal-content">
            <h5>Asignar Cursos</h5>
            <form action="<?= site_url('alumnos/asignarCursos') ?>" method="post">
                <input type="hidden" name="alumno_id" id="alumno_id">

                <?php foreach ($cursos as $curso): ?>
                    <p>
                        <label>
                            <input type="checkbox" name="cursos[]" value="<?= $curso['curso'] ?>" />
                            <span><?= $curso['nombre'] ?> (<?= $curso['profesor'] ?>)</span>
                        </label>
                    </p>
                <?php endforeach; ?>
                
                <div class="modal-footer">
                    <button type="submit" class="btn waves-effect">Guardar</button>
                </div>
            </form>
        </div>
    </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.modal');
            M.Modal.init(elems);
            document.querySelectorAll('.modal-trigger').forEach(button => {
                button.addEventListener('click', function() {
                    let alumnoId = this.getAttribute('data-id');
                    let inputHidden = document.getElementById('alumno_id');
                    if(inputHidden) {
                        inputHidden.value = alumnoId;
                    }
                });
            });
        });
    </script>
</body>
</html>
