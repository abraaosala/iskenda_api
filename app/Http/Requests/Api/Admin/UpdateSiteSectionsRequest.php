<?php

namespace App\Http\Requests\Api\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSiteSectionsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        if ($this->has('sections') && is_string($this->input('sections'))) {
            $this->merge([
                'sections' => json_decode($this->input('sections'), true),
            ]);
        }
    }

    public function rules(): array
    {
        return [
            'sections' => ['required', 'array', 'min:1'],
            'sections.*.key' => ['required', 'string', 'exists:site_sections,key'],
            'sections.*.is_visible' => ['required', 'boolean'],
        ];
    }
}
