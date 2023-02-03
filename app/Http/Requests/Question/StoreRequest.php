<?php

namespace App\Http\Requests\Question;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'type' => ['required','numeric','min:1','max:2'],
            'position' => 'required|numeric',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'title' => htmlspecialchars($this->title),
            'type' => htmlspecialchars($this->type),
            'position' => htmlspecialchars($this->position),
        ]);
    }
}
