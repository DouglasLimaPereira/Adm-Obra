<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    CanteiroController,
    CompanyController,
    FuncaoController,
    FuncionarioController,
    PainelController,
    ResetaSenhaController,
    UsuarioController,
    ModuloController,
    ModuloItemController,
    ModuloSubitensController,
    ModuloPermissaoController
};

//use App\Http\Controllers\Api\FatorController;
use App\Http\Controllers\FatorController;
use App\Http\Controllers\Spa\UsuarioController as SpaUsuarioController;
use App\Http\Controllers\Spa\ItemController;
use App\Http\Controllers\Spa\SubitemController;
use App\Http\Controllers\Authentication\LoginController;

Route::get('eh-teste', function(){
    return storage_path();
    $e = url('/') . ' - ' . env('APP_URL_CLIENTE') . ' - ' . env('APP_DEV_URL_CLIENTE');
    return $e;
});

Route::get('/', function () {
    if(auth()->user()) return redirect()->route('painel.index');
    return view('authentication.login');
});
Route::get('/login', function () {
    if(auth()->user()) return redirect()->route('painel.index');
    return view('authentication.login');
})->name('login');

// Rotas para Redefinição de Senha 
Route::group(['prefix'=>'reseta-senha'], function(){
    Route::post('/send-mail', [ResetaSenhaController::class, 'sendMail'])->name('resetasenha.sendmail');
    Route::get('/{token}', [ResetaSenhaController::class, 'resetView'])->middleware('guest')->middleware('guest')->name('password.reset');
    Route::post('/update', [ResetaSenhaController::class, 'update'])->name('password.update');
});


Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->get('painel', [PainelController::class, 'index'])->name('painel.index');

//COMPANIES
Route::group(['prefix'=>'construtoras', 'as'=>'construtoras.', 'middleware'=>['auth']], function(){
    Route::get('/', [CompanyController::class, 'index'])->name('index');
    Route::get('/create', [CompanyController::class, 'create'])->name('create');
    Route::post('/', [CompanyController::class, 'store'])->name('store');
    Route::get('/{company}/edit', [CompanyController::class, 'edit'])->name('edit');
    Route::put('/{company}/update', [CompanyController::class, 'update'])->name('update');
    Route::get('/{company}/destroy', [CompanyController::class, 'destroy'])->name('destroy');
    Route::get('/{company}/gerenciar', [CompanyController::class, 'gerenciar'])->name('gerenciar');
    Route::get('/{company}/atualiza-estado', [CompanyController::class, 'atualizaEstado'])->name('atualiza-estado');
});

//COMPANIES - FUNCIONÁRIOS
Route::group(['prefix'=>'construtoras', 'as'=>'construtoras.', 'middleware'=>['auth']], function(){
    Route::get('/{company}/funcionarios', [FuncionarioController::class, 'index'])->name('funcionarios.index');
    Route::get('/{company}/funcionarios/create', [FuncionarioController::class, 'create'])->name('funcionarios.create');
    Route::post('/{company}/funcionarios/store', [FuncionarioController::class, 'store'])->name('funcionarios.store');
    Route::get('/{company}/funcionarios/{funcionario}/edit', [FuncionarioController::class, 'edit'])->name('funcionarios.edit');
    Route::put('/{company}/funcionarios/{funcionario}/update', [FuncionarioController::class, 'update'])->name('funcionarios.update');
    Route::get('/{company}/funcionarios/{funcionario}/destroy', [FuncionarioController::class, 'destroy'])->name('funcionarios.destroy');
});

//COMPANIES - FUNÇÕES
Route::group(['prefix'=>'construtoras', 'as'=>'construtoras.', 'middleware'=>['auth']], function(){
    Route::get('/{company}/funcoes', [FuncaoController::class, 'index'])->name('funcoes.index');
    Route::get('/{company}/funcoes/create', [FuncaoController::class, 'create'])->name('funcoes.create');
    Route::post('/{company}/funcoes/store', [FuncaoController::class, 'store'])->name('funcoes.store');
    Route::get('/{company}/funcoes/{funcao}/edit', [FuncaoController::class, 'edit'])->name('funcoes.edit');
    Route::put('/{company}/funcoes/{funcao}/update', [FuncaoController::class, 'update'])->name('funcoes.update');
    Route::get('/{company}/funcoes/{funcao}/destroy', [FuncaoController::class, 'destroy'])->name('funcoes.destroy');
});

//COMPANIES - CANTEIROS
Route::group(['prefix'=>'construtoras', 'as'=>'construtoras.', 'middleware'=>['auth']], function(){
    Route::get('/{company}/canteiros', [CanteiroController::class, 'index'])->name('canteiros.index');
    Route::get('/{company}/canteiros/create', [CanteiroController::class, 'create'])->name('canteiros.create');
    Route::post('/{company}/canteiros/store', [CanteiroController::class, 'store'])->name('canteiros.store');
    Route::get('/{company}/canteiros/{canteiro}/edit', [CanteiroController::class, 'edit'])->name('canteiros.edit');
    Route::put('/{company}/canteiros/{canteiro}/update', [CanteiroController::class, 'update'])->name('canteiros.update');
    Route::get('/{company}/canteiros/{canteiro}/destroy', [CanteiroController::class, 'destroy'])->name('canteiros.destroy');
    
    // CANTEIROS - ÍNDICES
    Route::group(['prefix'=>'{company}/canteiros/{canteiro}/indices', 'as'=>'indices.', 'middleware'=>['auth']], function(){
        Route::get('/', [FatorController::class, 'index'])->name('index');
        Route::post('/', [FatorController::class, 'store'])->name('store');
        Route::put('/update', [FatorController::class, 'update'])->name('update');
        Route::get('/{fator}/destroy', [FatorController::class, 'destroy'])->name('destroy');
    });
});

// COMPANIES - FATORES
Route::get('/fatores/{fator}/destroy', [FatorController::class, 'destroy'])->middleware('auth')->name('fator.destroy');

//COMPANIES - USUÁRIOS
Route::group(['prefix'=>'construtoras', 'as'=>'construtoras.', 'middleware'=>['auth']], function(){
    Route::get('/{company}/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
    Route::get('/{company}/usuarios/{usuario}/show/', [UsuarioController::class, 'show'])->name('usuarios.show');
    Route::get('/{company}/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
    Route::post('/{company}/usuarios/store', [UsuarioController::class, 'store'])->name('usuarios.store');
    Route::get('/{company}/usuarios/{usuario}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
    Route::put('/{company}/usuarios/{usuario}/update', [UsuarioController::class, 'update'])->name('usuarios.update');
    Route::get('/{company}/usuarios/{usuario}/destroy', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');
});

// SUPERADMIN USUÁRIOS
Route::group(['prefix' => 'usuarios'], function(){
    Route::get('/', [SpaUsuarioController::class, 'index'])->name('usuarios.index');
    Route::get('/{usuario}/show', [SpaUsuarioController::class, 'show'])->name('usuarios.show');
    Route::get('/create', [SpaUsuarioController::class, 'create'])->name('usuarios.create');
    Route::get('/{usuario}/edit', [SpaUsuarioController::class, 'edit'])->name('usuarios.edit');
    Route::put('/{usuario}/update', [SpaUsuarioController::class, 'update'])->name('usuarios.update');
    Route::get('/{usuario}/destroy', [SpaUsuarioController::class, "destroy"])->name('usuarios.destroy');
    Route::post('/store', [SpaUsuarioController::class, 'store'])->name('usuarios.store');
});

// SUPERADMIN
Route::group(['prefix'=>'modulos', 'middleware'=>['auth']], function(){
    // MÓDULOS
    Route::get('/', [ModuloController::class, 'index'])->name('modulos.index');
    Route::get('/create', [ModuloController::class, 'create'])->name('modulos.create');
    Route::post('/store', [ModuloController::class, 'store'])->name('modulos.store');
    Route::get('/{modulo}/edit', [ModuloController::class, 'edit'])->name('modulos.edit');
    Route::put('/{modulo}/update', [ModuloController::class, 'update'])->name('modulos.update');
    Route::get('/{modulo}/destroy', [ModuloController::class, 'destroy'])->name('modulos.destroy');

    // ITENS
    Route::get('{modulo}/itens', [ModuloItemController::class, 'index'])->name('modulos.itens.index');
    Route::get('{modulo}/itens/create', [ModuloItemController::class, 'create'])->name('modulos.itens.create');
    Route::post('{modulo}/itens/store', [ModuloItemController::class, 'store'])->name('modulos.itens.store');
    Route::get('{modulo}/itens/{item}/edit', [ModuloItemController::class, 'edit'])->name('modulos.itens.edit');
    Route::put('{modulo}/itens/{item}/update', [ModuloItemController::class, 'update'])->name('modulos.itens.update');
    Route::get('{modulo}/itens/{item}/destroy', [ModuloItemController::class, 'destroy'])->name('modulos.itens.destroy');
    
    // SUBITENS
    Route::get('{modulo}/itens/{item}/subitens', [ModuloSubitensController::class, 'index'])->name('modulos.itens.subitens.index');
    Route::get('{modulo}/itens/{item}/subitens/create', [ModuloSubitensController::class, 'create'])->name('modulos.itens.subitens.create');
    Route::post('{modulo}/itens/{item}/subitens/store', [ModuloSubitensController::class, 'store'])->name('modulos.itens.subitens.store');
    Route::get('{modulo}/itens/{item}/subitens/{subitem}/edit', [ModuloSubitensController::class, 'edit'])->name('modulos.itens.subitens.edit');
    Route::put('{modulo}/itens/{item}/subitens/{subitem}/update', [ModuloSubitensController::class, 'update'])->name('modulos.itens.subitens.update');
    Route::get('{modulo}/itens/{item}/subitens/{subitem}/destroy', [ModuloSubitensController::class, 'destroy'])->name('modulos.itens.subitens.destroy');

    // PERMISSÕES
    // VINCULADOS AO ITEM
    Route::get('{modulo}/itens/{item}/permissoes', [ModuloPermissaoController::class, 'index'])->name('modulos.itens.permissoes.index');
    Route::post('{modulo}/itens/{item}/permissoes/store', [ModuloPermissaoController::class, 'store'])->name('modulos.itens.permissoes.store');
    
    //VINCULADOS AO SUBITEM
    Route::get('{modulo}/itens/{item}/subitens/{subitem}/permissoes', [ModuloPermissaoController::class, 'index'])->name('modulos.itens.subitens.permissoes.index');
    Route::post('{modulo}/itens/{item}/subitens/{subitem}/permissoes/store', [ModuloPermissaoController::class, 'store'])->name('modulos.itens.subitens.permissoes.store');
});


// Route::group(['prefix'=>'itens'], function(){
//     Route::get('/', [ItemController::class, 'index'])->name('itens.index');
//     Route::get('/create', [ItemController::class, 'create'])->name('itens.create');
//     Route::post('/store', [ItemController::class, 'store'])->name('itens.store');
//     Route::get('/{item}/edit', [ItemController::class, 'edit'])->name('itens.edit');
//     Route::put('/{item}/update', [ItemController::class, 'update'])->name('itens.update');
// });

// SUPERADMIN SUBITENS
Route::group(['prefix'=>'subitens', 'middleware'=>['auth']], function(){
    Route::get('/', [SubitemController::class, 'index'])->name('subitens.index');
    Route::get('/create', [SubitemController::class, 'create'])->name('subitens.create');
    Route::post('/store', [SubitemController::class, 'store'])->name('subitens.store');
    Route::get('/{subitem}/edit', [SubitemController::class, 'edit'])->name('subitens.edit');
    Route::put('/{subitem}/update', [SubitemController::class, 'update'])->name('subitens.update');
    Route::get('/{subitem}/destroy', [SubitemController::class, 'destroy'])->name('subitens.destroy');
});

// Route::group(['prefix'=>'canteiros', 'as'=>'canteiros.', 'middleware'=>['auth']], function(){
//     Route::get('/', [CanteiroController::class, 'index'])->name('index');
//     Route::get('/create', [CanteiroController::class, 'create'])->name('create');
//     Route::post('/', [CanteiroController::class, 'store'])->name('store');
//     Route::get('/{canteiro}', [CanteiroController::class, 'edit'])->name('edit');
//     Route::put('/{canteiro}/update', [CanteiroController::class, 'update'])->name('update');
//     Route::get('/{canteiro}/destroy', [CanteiroController::class, 'destroy'])->name('destroy');
// });