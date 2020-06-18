<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PartRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required | max:128 | min:6',
            'part_id' => 'required',
            'description' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'veuillez saisir le titre.',
            'title.max' => 'Le titre doit composer entre 6 et 128 caractères',
            'title.min' => 'Le titre doit composer entre 6 et 128 caractères',
            'part_id.required' => 'Veuillez spécifier le numéro de la partie.',
            'description.required' => 'Veuillez saisir un texte.',
        ];
    }
}
