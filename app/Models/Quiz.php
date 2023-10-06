<?php

namespace App\Models;

use App\Models\QuizQuestion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quiz extends Model
{
    use HasFactory;

    public function questions()
    {
        return $this->hasMany(QuizQuestion::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function addQuestion($question)
    {
        return $this->questions()->create($question);
    }

    public function removeQuestion($questionID)
    {
        return $this->questions()->where('id', $questionID)->delete();
    }

    public function getQuestionCountByDifficulty($difficulty)
    {
        return $this->questions()->where('difficulty', $difficulty)->count();
    }
    
}
