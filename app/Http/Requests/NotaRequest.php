<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotaRequest extends FormRequest
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
            'titulo' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'El :attributes es obligatorio'
        ];
    }

    public function attributes()
    {
        return [
            'titulo' => 'El titulo de la nota'
        ];
    }
}
