<?php

namespace App\Http\Requests;

use App\Models\Company;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class FuncionarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $senha = geraSenha();
        $this->merge([
            'company_id' => $this->company->id,
            'cad_user_id' => Auth::id(),
            'name' => $this->nome,
            'senha' => $senha,
            'password' => bcrypt($senha),
            'data_atribuicao' => date('Y-m-d H:i:s'),
            'active' => true,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => ['required', 'min:3'],
            'matricula' => ['required', 'min:2'],
            'data_admissao' => ['required', 'date']
        ];
    }
}
