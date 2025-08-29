<?php

namespace App\Controllers;

use App\Models\AlumnoModel;
use App\Models\CursoModel;
use CodeIgniter\Controller;

class AlumnoController extends Controller
{
    protected $alumnoModel;
    protected $cursoModel;

    public function __construct()
    {
        $this->alumnoModel = new AlumnoModel();
        $this->cursoModel  = new CursoModel();
    }

    // 📌 Listar alumnos
    public function index()
    {
        $data['alumnos'] = $this->alumnoModel->findAll();
        $data['cursos']  = $this->cursoModel->findAll();

        return view('alumnos/index', $data);
    }

    // 📌 Formulario para crear alumno
    public function create()
    {
        return view('alumnos/create');
    }

    // 📌 Guardar alumno nuevo
    public function store()
    {
        $this->alumnoModel->save([
            'nombre'   => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'direccion'=> $this->request->getPost('direccion'),
            'movil'    => $this->request->getPost('movil'),
            'email'    => $this->request->getPost('email'),
            'inactivo' => 0,
        ]);

        return redirect()->to('/alumnos');
    }

    // 📌 Formulario para editar alumno
    public function edit($id)
    {
        $data['alumno'] = $this->alumnoModel->find($id);
        return view('alumnos/edit', $data);
    }

    // 📌 Actualizar alumno
    public function update($id)
    {
        $this->alumnoModel->update($id, [
            'nombre'   => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'direccion'=> $this->request->getPost('direccion'),
            'movil'    => $this->request->getPost('movil'),
            'email'    => $this->request->getPost('email'),
            'inactivo' => $this->request->getPost('inactivo') ?? 0,
        ]);

        return redirect()->to('/alumnos');
    }

    // 📌 Eliminar alumno
    public function delete($id)
    {
        $this->alumnoModel->delete($id);
        return redirect()->to('/alumnos');
    }

    // 📌 Asignar cursos a alumno
    public function asignarCursos()
    {
        $idAlumno = $this->request->getPost('alumno_id');
        $cursos   = $this->request->getPost('cursos') ?? [];

        $db = \Config\Database::connect();
        $builder = $db->table('detalle_alumno_curso');

        // Eliminar cursos previos del alumno
        $builder->where('alumno_id', $idAlumno)->delete();

        // Insertar nuevas asignaciones
        foreach ($cursos as $cursoId) {
            $builder->insert([
                'alumno_id'        => $idAlumno,
                'curso_id'         => $cursoId,
                'fecha_inscripcion'=> date('Y-m-d'),
            ]);
        }

        return redirect()->to('/alumnos');
    }
}
