<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
       // return Auth::check();
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
            'name' => 'required|min:2|max:200',
          //  'category_id' => 
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Veuillez entrer un nom',
            'name.min' => "Pas assez long",
            'name.max' => 'trop long',
        ];
    }
}
