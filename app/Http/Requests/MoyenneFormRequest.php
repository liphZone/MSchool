<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MoyenneFormRequest extends FormRequest
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
            'periode'       => 'required',
            'term'          => 'required|numeric',
            'interrogation' => 'required',
            'devoir'        => 'required',
            'examen'        => 'required',
            'avg_matiere'   => 'required',
        ];
    }
}
