<?php
namespace App\Controllers;

use App\Models\CursoModel;
use App\Models\DetalleAlumnoCursoModel;
use CodeIgniter\Controller;

class CursoController extends Controller
{
    protected $cursoModel;
    
    public function __construct()
    {
        $this->cursoModel = new CursoModel();
    }


    public function asignarCursos()
    {
        $detalleModel = new DetalleAlumnoCursoModel();

        $alumno_id = $this->request->getPost('alumno_id');
        $cursos = $this->request->getPost('cursos'); 


        $detalleModel->where('alumno_id', $alumno_id)->delete();


        if (!empty($cursos)) {
            foreach ($cursos as $curso_id) {
                $detalleModel->insert([
                    'alumno_id' => $alumno_id,
                    'curso_id' => $curso_id,
                    'fecha_inscripcion' => date('Y-m-d')
                ]);
            }
        }

        return redirect()->to('/alumnos');
    }
}

?>