<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatiereFormRequest extends FormRequest
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
            'code'         => 'required',
            'libelle'      => 'required',
            'coefficient'  => 'required',
            'type_matiere' => 'required',
            'classe'       => 'required',
            'professeur'   => 'required',
            'nbre_interro' => 'required|numeric|min:1|max:3',
            'nbre_devoir'  => 'required|numeric|min:1|max:2',
        ];
    }
}
