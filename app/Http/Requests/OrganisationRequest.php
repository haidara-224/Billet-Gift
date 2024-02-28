<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrganisationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>['string','min:3','required',Rule::unique('organisateurs')],
            'description'=>['string','min:3','required'],
            'adresse'=>['string','min:3','required'],
            'tel'=>['string','min:9','required'],
            'email'=>['email','required',Rule::unique('organisateurs')],
            'image'=>['image','max:2000','required']


        ];
    }
}
