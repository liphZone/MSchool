<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DescriptionFormRequest extends FormRequest
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
            'nom_directeur'  => 'required',
            'nom_ecole'      => 'required',
            'adresse_ecole'  => 'required',
            'image_ecole'    => 'required|file|image|mimes:png,jpg|size:5000',
        ];
    }
}
