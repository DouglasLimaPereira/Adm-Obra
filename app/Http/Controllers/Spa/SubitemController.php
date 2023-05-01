<?php

namespace App\Http\Controllers\Spa;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubitemRequest;
use App\Models\Moduloitem;
use App\Models\Modulosubitem;
use Illuminate\Http\Request;

class SubitemController extends Controller
{
    public function index()
    {
        $rows = Modulosubitem::orderBy('nome')->paginate(20);
        
        return view('spa.subitens.index', compact('rows'));
    }

    public function create()
    {
        $itens = Moduloitem::orderBy('nome')->get();
        
        return view('spa.subitens.create', compact('itens'));
    }

    public function store(SubitemRequest $request)
    {
        try {
            
            Modulosubitem::create($request->all());
            return redirect()->route('subitens.index')->with('success', 'Registro cadastrado com sucesso.');
        
        } catch (\Exception $e) {
            return $e->getMessage();
            return back()->with('warning', 'Cadastro não realizado.');
        }
    }

    public function edit(Modulosubitem $subitem)
    {
        $itens = Moduloitem::orderBy('nome')->get();

        return view('spa.subitens.edit', compact('subitem', 'itens'));
    }

    public function update(Modulosubitem $subitem, SubitemRequest $request)
    {
        try {

            $subitem->update($request->all());
            
            return redirect()->route('subitens.index')->with('success', 'Registro atualizado com sucesso.');
        
        } catch (\Exception $e) {
            return back()->with('warning', 'Cadastro não atualizado.');
        }
    }

    public function destroy(Modulosubitem $subitem)
    {
        try {
            $subitem->delete();

            return redirect()->route('subitens.index')->with('success', 'Registro removido com sucesso.');
        } catch (\Exception $e) {
            return back()->with('warning', 'Cadastro não removido.');
        }
    }
}
