<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonneFormRequest extends FormRequest
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
            'nom'     => 'required',
            'prenom'  => 'required',
            'sexe'    => 'required',
            'email'   => 'required|unique:personnes',
            'adresse' => 'required',
            'statut'  => 'required',
            'profil'  => 'file|image|mimes:png,jpg|max:500000',

            'username'      => 'required',
            'password'      => 'required|confirmed|min:5',
            'password.min'  => 'Aumoins :min caractères.',
        ];
    }
}
