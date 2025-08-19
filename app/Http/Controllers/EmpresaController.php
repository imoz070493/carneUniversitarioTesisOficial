<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Http\Requests\EmpresaFormRequest;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        $per_page = $request->per_page;

        $empresas = Empresa::listarEmpresas($buscar, $criterio, $per_page);

        return [
            'pagination' => [
                'total' => $empresas->total(),
                'current_page' => $empresas->currentPage(),
                'per_page' => $empresas->perPage(),
                'last_page' => $empresas->lastPage(),
                'from' => $empresas->firstItem(),
                'to' => $empresas->lastItem(),
            ],
            'empresas' => $empresas
        ];
    }

    public function store(EmpresaFormRequest $request)
    {
        if(!$request->ajax()) return redirect('/');

        $data = $request->all();

        return Empresa::guardarDatos($data);
    }

    public function update(EmpresaFormRequest $request)
    {
        if(!$request->ajax()) return redirect('/');

        $data = $request->all();

        return Empresa::guardarDatos($data);
    }
}
