<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'short_description' => 'nullable|string|max:500',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'url' => 'nullable|url|max:255',
            'github_url' => 'nullable|url|max:255',
            'tech_stack' => 'nullable|string',
            'category' => 'required|string|in:web,mobile,api,desktop,other',
            'is_featured' => 'boolean',
            'sort_order' => 'integer|min:0',
        ];
    }
}
