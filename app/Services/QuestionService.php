<?php

namespace App\Services;

use App\Models\Question;

class QuestionService
{
    protected Question $question;

    public function __construct(Question $question)
    {
        $this->question = $question;
    }

}