<?php

namespace App\Http\Requests\ZipCode;

use Illuminate\Foundation\Http\FormRequest;

class ZipCodeStoreRequest extends FormRequest
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
            'locality' => 'required',
            'zip_code' => 'required|integer|digits:5|unique:zip_codes,zip_code',
            'municipality' => 'required|exists:municipalities,key',
            'federal_entity' => 'required|exists:federal_entities,key',
        ];
    }
}
