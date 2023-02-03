<?php

namespace App\Http\Requests\Option;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'value' => ['required','numeric'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'title' => htmlspecialchars($this->title),
            'value' => htmlspecialchars($this->value),
        ]);
    }
}
