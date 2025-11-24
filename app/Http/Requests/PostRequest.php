<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'author_name' => ['required', 'string', 'alpha', 'min:2'],
            'author_email' => ['required', 'email', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'text' => ['required', 'string'],
            'img' => ['required', 'image','mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
            'existing_tags' => ['required', 'array'],
            'existing_tags.*' => ['required','exists:tags,id'],
            'new_tags' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'author_name.required' => 'Обязательное поле',
            'author_name.alpha' => 'Только буквы',
            'author_name.min' => 'Не менее 2 символов',
            'author_email.required' => 'Обязательное поле',
            'author_email.email' => 'Поле должно содержать E-mail',
            'title.required' => 'Обязательное поле',
            'title.max' => 'Не более 255 символов',
            'text.required' => 'Обязательное поле',
            'img.required' => 'Обязательное поле',
            'existing_tags.required' => 'Обязательное поле',
        ];
    }
}
