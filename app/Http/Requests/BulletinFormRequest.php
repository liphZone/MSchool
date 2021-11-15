<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BulletinFormRequest extends FormRequest
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
            'periode' => 'required|string',
            'term'    => 'required|numeric',
            'nom'     => 'required|string',
            'prenom'  => 'required|string',
            'classe'  => 'required|string',
            'niveau'  => 'required|string',
            'moyenne' => 'required|numeric',
        ];
    }
}
