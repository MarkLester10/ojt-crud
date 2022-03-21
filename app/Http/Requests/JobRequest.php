<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
            'title' => ['required','string','max:50'],
            'description' => ['required','string','max:300'],
            'category'=>['required'],
            'email' => ['required', 'email', 'string','max:50'],
            'company' => ['required', 'string', 'max:50'],
            'address'=> ['string', 'nullable', 'max:100'],
            'website'=> ['url','nullable']
        ];
    }
}
