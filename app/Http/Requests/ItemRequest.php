<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class ItemRequest extends FormRequest
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
        // if(request()->method() == 'POST'){
        //     $this->merge([
        //         'slug' => Str::slug($this->nome)
        //     ]);
        // }
        $this->merge([
            'slug' => Str::slug($this->nome)
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
            "nome" => ['required', 'min:3', Rule::unique('moduloitens')->ignore($this->item)],
            "active" => ['required', 'boolean']
        ];
    }
}
