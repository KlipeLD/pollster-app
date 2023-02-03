<?php

namespace App\Http\Requests\Survey;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required|max:255',
            'status' => 'required|numeric|min:1|max:3',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'name' => htmlspecialchars($this->name),
            'status' => intval($this->status),
        ]);
    }
}
