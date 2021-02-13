<?php

namespace App\Http\Requests\Municipality;

use Illuminate\Foundation\Http\FormRequest;

class MunicipalityyRequest extends FormRequest
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
            'name' => 'required',
            'federal_entity' => 'required|exists:federal_entities,key'
        ];
    }
}
