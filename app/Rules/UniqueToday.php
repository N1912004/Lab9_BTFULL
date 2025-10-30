<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UniqueToday implements Rule
{
    protected $table;
    protected $column;

    public function __construct($table = 'articles', $column = 'title')
    {
        $this->table = $table;
        $this->column = $column;
    }

    public function passes($attribute, $value)
    {
        $today = Carbon::today();

        $exists = DB::table($this->table)
            ->whereDate('created_at', $today)
            ->where($this->column, $value)
            ->exists();

        return !$exists;
    }

    public function message()
    {
        return 'Tiêu đề đã tồn tại hôm nay, vui lòng chọn tiêu đề khác.';
    }
}
