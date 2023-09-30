<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'quiz_id',
        'difficulty',
        'question',
        'correct_answer',
        'incorrect_answer_1',
        'incorrect_answer_2',
        'incorrect_answer_3',
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}
