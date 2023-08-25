<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassCreateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'max:50|required',
            'teacher_id' => 'unique:class|required'
        ];
    }

    public function attributes(): array
    {
        return [
            'teacher_id' => 'teacher',
        ];
    }

    public function messages()
    {
        return [
        'name.required' => 'Nama kelas wajib diisi',
        ];
    }
}
