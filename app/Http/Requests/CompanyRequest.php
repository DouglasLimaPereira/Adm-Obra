<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompanyRequest extends FormRequest
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
            'cnpj' => $this->cnpj = str_replace(['.','-','/'], '', $this->cnpj),
            'cep' => $this->cep = str_replace(['.','-','/'], '', $this->cep),
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
            'razao_social' => ['string','min:3','required'],
            'nome_fantasia' => ['string','min:3','required'],
            'cnpj' => ['required', 'min:14', 'max:14', Rule::unique('companies', 'cnpj')->ignore($this->company)],
            'logradouro' => ['required','min:3','string'],
            'numero' => ['required','min:1','string'],
            'complemento' => ['nullable','min:3','string'],
            'bairro' => ['required','min:3','string'],
            'cidade' => ['required','min:3','string'],
            'cep' => ['required','min:8','max:8','string'],
            'uf' => ['required','min:2','max:2','string'],
            'logotipo' => ['nullable','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
            'limite_anexo' => ['required', 'numeric']
        ];
    }
}
