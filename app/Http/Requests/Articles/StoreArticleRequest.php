<?php

namespace App\Http\Requests\Articles;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\NoForbiddenWords;

class StoreArticleRequest extends FormRequest
{
public function authorize(): bool
{
return true; // Cho phép tất cả (có thể thêm logic phân quyền sau)
}
public function rules(): array
{
return [
'title' =>

['required','string','max:255','unique:articles,title'],
'body' => ['required','string','min:10', new NoForbiddenWords()],
'tags' => ['sometimes','nullable','string'],
];
}
public function messages(): array
{
return [
'title.required' => 'Tiêu đề không được để trống',
'title.unique' => 'Tiêu đề đã tồn tại, vui lòng chọn tiêu đề

khác',

'body.required' => 'Nội dung không được để trống',
'body.min' => 'Nội dung tối thiểu phải có :min ký tự',
];
}

public function attributes(): array
{
return [
'title' => 'Tiêu đề',
'body' => 'Nội dung',
];
}
}
