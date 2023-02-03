<?php

namespace App\Services;

use App\Models\Survey;

class SurveyService
{
    protected Survey $survey;

    public function __construct(Survey $survey)
    {
        $this->survey = $survey;
    }

}