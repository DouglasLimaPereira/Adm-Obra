<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModuloRequest;
use App\Models\Modulo;
use Illuminate\Http\Request;

class ModuloController extends Controller
{
    public function index()
    {
        $rows = Modulo::orderBy('nome')->paginate(20);

        return view('modulos.index', compact('rows'));
    }

    public function create()
    {
        return view('modulos.create');
    }

    public function store(ModuloRequest $request)
    {
        try {

            Modulo::create($request->all());
            
            return redirect()->route('modulos.index')->with('success', 'Registro cadastrado com sucesso.');
        
        } catch (\Exception $e) {
            return $e->getMessage();
            return back()->with('warning', 'Cadastro não realizado.');
        }
    }

    public function edit(Modulo $modulo)
    {
        return view('modulos.edit', compact('modulo'));
    }

    public function update(Modulo $modulo, ModuloRequest $request)
    {
        try {

            $modulo->update($request->all());
            
            return redirect()->route('modulos.index')->with('success', 'Registro atualizado com sucesso.');
        
        } catch (\Exception $e) {
            return back()->with('warning', 'Cadastro não atualizado.');
        }
    }

    public function destroy(Modulo $modulo)
    {
        try {
            $modulo->delete();

            return redirect()->route('modulos.index')->with('success', 'Registro removido com sucesso.');
        } catch (\Exception $e) {
            return back()->with('warning', 'Cadastro não removido.');
        }
    }
}
