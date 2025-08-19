<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        dd($request->bearerToken());
        $clientes = \Auth::user()->tokens();
dd($clientes->first()->bearerToken());
        
        // dd($request->user()->tokens());
        // \Log::info(\Auth::user());
        // \Log::info($request->user()->tokens());

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        $per_page = $request->per_page;

        if($buscar){
            $clientes = $clientes->where('name',$buscar);
        }

        $clientes = $clientes->paginate($per_page);
        // $empresas = Empresa::listarEmpresas($buscar, $criterio, $per_page);

        return [
            'pagination' => [
                'total' => $clientes->total(),
                'current_page' => $clientes->currentPage(),
                'per_page' => $clientes->perPage(),
                'last_page' => $clientes->lastPage(),
                'from' => $clientes->firstItem(),
                'to' => $clientes->lastItem(),
            ],
            'clientes' => $clientes
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
