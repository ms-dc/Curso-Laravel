<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductRequest extends FormRequest
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
        $id = $this->segment(2);

        return [
            'name' => "required|min:3|max:255|unique:products,name,{$id},id",
            'image' => 'nullable|image',
            'price' => "required|regex:/^\d+(\.\d{1,2})?$/",
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nome do produto é obrigatório!',
            'name.min' => 'Nome do produto deve conter no mínimo 3 caracteres!',
            'name.max' => 'Nome do produto deve conter no máximo 255 caracteres!',
            'name.unique' => 'Já existe um produto com este nome!',
            'price.required' => 'Produto deve conter um preço!'
        ];
    }
}
