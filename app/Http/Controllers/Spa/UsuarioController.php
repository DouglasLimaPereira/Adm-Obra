<?php

namespace App\Http\Controllers\Spa;

use App\Models\User;
use App\Models\Pessoa;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioRequest;
use App\Models\Companyuser;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::where('superadmin',1)->get();
        return view('spa.index', compact('usuarios'));
    }

    public function show(User $usuario)
    {
        return view('spa.show', compact('usuario'));
    }

    public function create()
    {   
        return view('spa.create');
    }

    public function store( User $usuario, UsuarioRequest $request)
    {
        $is_user = $this->checaEmailExistenteUsuario($request->email);
        try 
        {

            DB::beginTransaction();

            //Registrando na tabela de usuários
            try 
            {
                
                //Verificando se o email informado já está cadastrado na tabela de usuários
                $usuario = $this->checaEmailExistenteUsuario($request->email);
                    
                if(!$usuario){
                    $usuario = User::create($request->all());
                    //Processo de atualização de imagem
                    try {
                        //Processo de atualização de imagem
                        if(isset($request->imagem) && $request->imagem)
                        {
                            //Verificando se o arquivo é válido como imagem
                            if($request->imagem->isValid()){    
                                //Cadastrando a nova imagem
                                $imagem_nome = sha1(date('Y-m-d H:m:s')). '.' . $request->imagem->getClientOriginalExtension();
                                $imagem = $request->imagem->storeAs('SuperAdministradores/' . base64_encode($usuario->id) . '/usuarios/images', $imagem_nome, 'public');
                                
                                //Atualiza o campo imagem
                                $usuario->update([
                                    'imagem' => $imagem,
                                ]);
                            }
                        }
                    } catch (\Throwable $th) {
                        return back()->withInput()->with('error', 'FILE_RROR: O registro da imagem não pode ser realizado.');
                    }
                }

            } catch (\Exception $e) {
                // return back()->with($e->getMessage());
                return back()->withErrors('Error 000012: Erro ao tentar salvar o usuário.');
            }

            DB::commit();
            
            return redirect()->route('usuarios.index', $usuario->id)->with('success', 'Usuário cadastrado com sucesso');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors('Error 000015: Erro ao tentar realizar o cadastro do usuário.');
        }
    }

    public function edit( User $usuario )
    {
        return view('spa.edit', compact('usuario'));
    }

    public function update( User $usuario, UsuarioRequest $request)
    {
        $input = $request->all();
        
        try 
        {
            DB::beginTransaction();
            
            //Verificando se o email informado já está cadastrado na tabela de usuários
            // if ($this->checaEmailExistenteUsuario($request->email)){
            //     return back()->with('info', 'O email informando já está sendo utilizado.');
            // }
            //Atualizando a Tabela usuario 
            
            try {
                //ATUALIZANDO USUARIO.
                
                $usuario->update($request->all());
                
                //Processo de atualização de imagem
                if(isset($request->imagem) && $request->imagem)
                {   
                    $imagem = $usuario->imagem;
                    
                    //Deletando o arquivo caso já exista algum
                    if(Storage::disk('public')->exists($imagem))
                        Storage::disk('public')->delete($imagem);

                    
                            //Verificando se o arquivo é válido como imagem
                            if($request->imagem->isValid()){    
                                //Cadastrando a nova imagem
                                $imagem_nome = sha1(date('Y-m-d H:m:s')). '.' . $request->imagem->getClientOriginalExtension();
                                $imagem = $request->imagem->storeAs('SuperAdministradores/' . base64_encode($usuario->id) . '/usuarios/images', $imagem_nome, 'public');
                                
                                $usuario->update([
                                    'imagem' => $imagem,
                                ]);
                            }
                }

            } catch (\Throwable $th) {
                DB::rollBack();
    
                return back()->with('error', 'Atualização não realizada!');
            }
            
            DB::commit();
            
            //Se der tudo OK!! Redireciona para tela de usuários
            return redirect()->route('usuarios.index', $usuario->id)->with('success', 'Usuário atualizado com sucesso!');
            
        } catch (\Throwable $th) {
            DB::rollBack();

            return back()->with('error', 'Atualização não realizada!');
        }
    }

    public function destroy(User $usuario)
    {
        try {
        
            $usuario->update(['superadmin' => false]);

            return back()->with('success', 'Usuário deletado com Sucesso!!');
        } catch (\Throwable $th) {
            return back()->with($th->getMessage());
            return back()->with('error', 'Erro ao tentar Excluir Usuário!!');
        }
    }

    public function checaEmailExistenteUsuario($email)
    {
        return User::firstWhere('email', $email);
    }

    // public function sendNotification($pessoa, $usuario, $senha, $is_user)
    // {
    //     if(!$is_user){
    //         Notification::route('mail', $usuario->email)
    //         ->notify(new UsuarioCadastroNotification($pessoa, $usuario, $senha));
    //     }else{
    //         Notification::route('mail', $usuario->email)
    //         ->notify(new UsuarioCadastroNovoVinculoNotification($pessoa, $usuario, $senha));
    //     }
    // }
}
