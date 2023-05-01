<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CanteiroRequest extends FormRequest
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
        $this->merge([
            'limite_armazenamento' => str_replace(',', '.',$this->limite_armazenamento),
            'cep' => $this->cep = str_replace(['.','-','/'], '', $this->cep),
            'cad_user_id' => auth()->user()->id,
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
            'company_id' => ['required', 'numeric', 'exists:companies,id'],
            'funcionario_id' => ['nullable', 'numeric', 'exists:funcionarios,id'],
            'nome' => ['required', 'string', 'min:3', 'unique:canteiros,company_id,NULL,id,company_id,' . $this->company_id],
            'logradouro' => ['required', 'string', 'min:3'],
            'numero' => ['required', 'string', 'min:1'],
            'complemento' => ['nullable', 'string', 'min:3'],
            'bairro' => ['required', 'string', 'min:3'],
            'cep' => ['required', 'string', 'min:8', 'max:8'],
            'cidade' => ['required', 'string', 'min:2'],
            'uf' => ['required', 'string', 'min:2', 'max:2'],
            'telefone' => ['required', 'string', 'min:13', 'max:14'],
            'email' => ['required', 'email'],
            'limite_armazenamento' => ['required', 'numeric'],
            'total_funcionarios' => ['required', 'numeric'],
            'total_unidades' => ['required', 'numeric'],
            // 'sabado' => ['required', 'boolean'],
            // 'domingo' => ['required', 'boolean'],
            // 'descanso' => ['required', 'boolean'],
            'logotipo' => ['nullable','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
            'data_inicio' => ['nullable', 'date'],
            'data_termino' => ['nullable', 'date'],
            'estado' => ['required', 'numeric'],
            'cad_user_id' => ['required', 'numeric', 'exists:users,id'],
            // 'active' => ['required', 'boolean'],
            // 'indice_produtivo' => ['required', 'numeric', 'min:1', 'max:5'],
            // 'indice_improdutivo' => ['required', 'numeric', 'min:1', 'max:5'],
            // 'indice_feriado' => ['required', 'numeric', 'min:1', 'max:5'],
            // 'data_vigencia' => ['required', 'date'],
        ];
    }
}
