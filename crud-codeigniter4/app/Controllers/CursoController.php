<?php

namespace App\Controllers;

use App\Models\CursoModel;
use CodeIgniter\Controller;

class CursoController extends Controller
{
    protected $cursoModel;

    public function __construct()
    {
        $this->cursoModel = new CursoModel();
    }

    public function index()
    {
        $data['cursos'] = $this->cursoModel->findAll();
        $data['titulo'] = "Listado de cursos";
        return view('cursos/index', $data);
    }

    public function create()
    {
        $data['titulo'] = "Crear Curso";
        return view('cursos/create', $data);
    }

    public function store()
    {
        $this->cursoModel->save([
            'nombre' => $this->request->getPost('nombre'),
            'profesor' => $this->request->getPost('profesor')
        ]);

        return redirect()->to('/cursos');
    }

    public function edit($id)
    {
        $data['curso'] = $this->cursoModel->find($id);
        $data['titulo'] = "Editar curso";
        return view('cursos/edit', $data);
    }

    public function update($id)
    {
        $this->cursoModel->update($id, [
            'nombre' => $this->request->getPost('nombre'),
            'profesor' => $this->request->getPost('profesor')
        ]);

        return redirect()->to('/cursos');
    }

    public function delete($id)
    {
        $this->cursoModel->delete($id);
        return redirect()->to('/cursos');
    }
}

?>