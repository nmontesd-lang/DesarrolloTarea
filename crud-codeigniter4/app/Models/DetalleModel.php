<?php

namespace App\Models;

use CodeIgniter\Model;

class DetalleAlumnoCursoModel extends Model
{
    protected $table      = 'detalle_alumno_curso';
    protected $primaryKey = 'id';

    protected $allowedFields = ['alumno_id', 'curso_id', 'fecha_inscripcion'];
}
