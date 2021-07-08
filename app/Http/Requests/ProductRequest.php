<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' =>'required',
            'description' =>'required|min:20',
            'body' =>'required',
            'photos.*' =>'image',
            'price' =>'numeric'


        ];
    }
    public function messages()
    {
        return[
            'required' => 'Este Campo é Obrigatório',
            'min' => 'Campo Deve Conter No Mínimo :min Caracteres',
            'image' => 'Arquivo não é uma imagem Valida',
            'numeric' => 'O Campo deve ser um numero inteiro Ex 1.59',
        ];
    }
}
