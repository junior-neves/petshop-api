<?php

namespace App\Http\Requests;

use Pearl\RequestValidate\RequestAbstract;

class PetRequest extends RequestAbstract
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'age' => 'required|integer',
            'species' => 'required|integer',
            'breed' => 'required',
            'owner_name' => 'required',
            'owner_phone' => 'required',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            //
        ];
    }
}
