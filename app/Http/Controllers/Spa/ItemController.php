<?php

namespace App\Http\Controllers\Spa;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;
use App\Models\Modulo;
use App\Models\Moduloitem;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $rows = Moduloitem::with('modulo')->orderBy('nome')->paginate(15);
        
        return view('spa.itens.index', compact('rows')); 
    }

    public function create()
    {
        $modulos = Modulo::orderBy('nome')->get();
        
        return view('spa.itens.create', compact('modulos'));
    }

    public function store(ItemRequest $request)
    {
        try {

            Moduloitem::create($request->all());
            
            return redirect()->route('itens.index')->with('success', 'Registro cadastrado com sucesso.');
        
        } catch (\Exception $e) {
            return $e->getMessage();
            return back()->with('warning', 'Cadastro não realizado.');
        }
    }

    public function edit(Moduloitem $item)
    {
        $modulos = Modulo::orderBy('nome')->get();
        
        return view('spa.itens.edit', compact('modulos', 'item'));
    }

    public function update(Moduloitem $item, ItemRequest $request)
    {
        try {

            $item->update($request->all());
            
            return redirect()->route('itens.index')->with('success', 'Registro atualizado com sucesso.');
        
        } catch (\Exception $e) {
            return back()->with('warning', 'Cadastro não atualizado.');
        }
    }

    public function destroy(Moduloitem $item)
    {
        return $item;
    }
}
