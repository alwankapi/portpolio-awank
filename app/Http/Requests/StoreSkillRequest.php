<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSkillRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'category' => 'required|string|in:frontend,backend,tools,other',
            'proficiency' => 'required|integer|min:0|max:100',
            'sort_order' => 'integer|min:0',
        ];
    }
}
