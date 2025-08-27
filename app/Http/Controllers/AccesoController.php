<?php

namespace App\Http\Controllers;

use App\Acceso;
use Illuminate\Http\Request;

class AccesoController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        $per_page = $request->per_page;

        $accesos = Acceso::listarAccesos($buscar, $criterio, $per_page);

        return [
            'pagination' => [
                'total' => $accesos->total(),
                'current_page' => $accesos->currentPage(),
                'per_page' => $accesos->perPage(),
                'last_page' => $accesos->lastPage(),
                'from' => $accesos->firstItem(),
                'to' => $accesos->lastItem(),
            ],
            'accesos' => $accesos
        ];
    }

    public function store(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $data = $request->all();

        return Acceso::guardarDatos($data);
    }

    public function update(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $data = $request->all();

        return Acceso::guardarDatos($data);
    }
}
