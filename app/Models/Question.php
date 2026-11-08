<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['question', 'options', 'correct_answer', 'category', 'level'];

    protected function casts(): array
    {
        return ['options' => 'array'];
    }
}