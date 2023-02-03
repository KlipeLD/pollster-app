<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['title','type','position','surveyId'];

    public function options()
    {
        return $this->hasMany(Option::class, 'questionId');
    }

    public function survey()
    {
        return $this->belongsTo(Survey::class, 'surveyId');
    }

    public function getQuestionById($question_id): Question
    {
        $question = $this->where('id',$question_id)->firstorfail();
        return $question;
    }
}
