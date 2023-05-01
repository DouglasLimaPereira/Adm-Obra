<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuncaoRequest extends FormRequest
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
            'salario' => $this->salario = str_replace(['.'], '', $this->salario),
            'salario' => $this->salario = str_replace([','], '.', $this->salario),
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
            'tipo' => ['required', 'numeric'],
            'descricao' => ['nullable', 'string', 'min:3']
        ];
    }
}
