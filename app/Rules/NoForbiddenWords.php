<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;

class NoForbiddenWords implements Rule
{
    protected $forbiddenWord;

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Danh sách từ cấm
        $forbidden = ['test', 'spam', 'xxx'];

        // Chuyển giá trị về chữ thường để kiểm tra
        $lower = mb_strtolower((string) $value, 'UTF-8');

        foreach ($forbidden as $word) {
            if (str_contains($lower, $word)) {
                $this->forbiddenWord = $word;
                return false;
            }
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Lỗi: Trường :attribute chứa từ không được phép: "' . $this->forbiddenWord . '".';
    }
}
