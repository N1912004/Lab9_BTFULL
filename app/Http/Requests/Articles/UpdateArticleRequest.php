<?php

namespace App\Http\Requests\Articles;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\NoForbiddenWords;

class UpdateArticleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('articles', 'title')->ignore($this->route('article')),
                new NoForbiddenWords
            ],
            'body' => ['required', 'string', 'min:10'],
            'image' => ['sometimes', 'nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Tiêu đề không được để trống',
            'body.required' => 'Nội dung không được để trống',
            'body.min' => 'Nội dung tối thiểu phải có :min ký tự',
            'image.image' => 'Tệp tải lên phải là hình ảnh.',
            'image.mimes' => 'Ảnh phải có định dạng: jpg, jpeg hoặc png.',
            'image.max' => 'Kích thước ảnh tối đa là :max KB.',
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'Tiêu đề',
            'body' => 'Nội dung',
            'image' => 'Ảnh minh họa',
        ];
    }
}
