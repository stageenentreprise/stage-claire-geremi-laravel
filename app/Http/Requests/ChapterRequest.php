<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ChapterRequest extends FormRequest
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
            'title' => 'required | min:3 | max:128',
            'numero' => 'required | max:2',
        ];
    }
    public function messages() {
        return [
            'title.required' => 'veuillez saisir le titre.',
            'title.min' => 'Le titre doit composer entre 3 et 128 caractères.',
            'title.max' => 'Le titre doit composer entre 3 et 128 caractères.',
            'numero.required' => 'Veuillez spécifier le numéro du chapitre.',
        ];
    }
}
