<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class StoreRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required', 'string', 'regex:/^[0-9]{10}$/', 'max:15'],
            'roll_no' => ['required', 'string', 'unique:users,roll_no'],
            'department_id' => ['required', 'integer', 'exists:departments,id'],
            'year' => ['required', 'integer', 'between:1,4'],
            'semester' => ['required', 'integer', 'between:1,8'],
            'batch' => ['required', 'string', 'max:50'],
        ];
    }

    /**
     * Get custom error messages for validation rules.
     */
    public function messages(): array
    {
        return [
            'phone.regex' => 'The phone number must be exactly 10 digits.',
            'phone.required' => 'Phone number is required.',
            'roll_no.required' => 'Roll number is required.',
            'roll_no.unique' => 'This roll number is already registered.',
            'department_id.required' => 'Please select a department.',
            'department_id.exists' => 'The selected department is invalid.',
            'year.required' => 'Academic year is required.',
            'year.between' => 'Academic year must be between 1 and 4.',
            'semester.required' => 'Semester is required.',
            'semester.between' => 'Semester must be between 1 and 8.',
            'batch.required' => 'Batch is required.',
        ];
    }
}
