<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class StoreAchievementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->role === 'student';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'organization' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
            'achievement_date' => ['required', 'date', 'before_or_equal:today'],
            'certificate' => [
                'required',
                File::types(['pdf', 'png', 'jpg', 'jpeg'])
                    ->max(5 * 1024), // 5 MB in KB
            ],
        ];
    }

    /**
     * Get custom error messages for validation rules.
     */
    public function messages(): array
    {
        return [
            'category_id.required' => 'Please select a category.',
            'category_id.exists' => 'The selected category is invalid.',
            'title.required' => 'Achievement title is required.',
            'title.max' => 'Achievement title must not exceed 255 characters.',
            'organization.required' => 'Issuing organization is required.',
            'organization.max' => 'Organization name must not exceed 255 characters.',
            'description.max' => 'Description must not exceed 2000 characters.',
            'achievement_date.required' => 'Date of achievement is required.',
            'achievement_date.date' => 'Please enter a valid date.',
            'achievement_date.before_or_equal' => 'Achievement date must not be in the future.',
            'certificate.required' => 'Please upload a proof document.',
            'certificate.file' => 'The certificate must be a valid file.',
            'certificate.mimes' => 'Certificate must be a PDF, PNG, JPG, or JPEG file.',
            'certificate.max' => 'Certificate file size must not exceed 5 MB.',
        ];
    }
}
