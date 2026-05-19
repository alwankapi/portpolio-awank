<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExperienceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'company' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'description' => 'nullable|string',
            'company_logo' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:1024',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'is_current' => 'boolean',
            'location' => 'nullable|string|max:255',
            'type' => 'required|string|in:full-time,part-time,freelance,internship,contract',
            'sort_order' => 'integer|min:0',
        ];
    }
}
