<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\QuestionResource;
use App\Models\Question;
use App\Models\Survey;
Use DB;

class QuestionsController extends Controller
{
    protected $survey;

    public function __construct(Survey $survey)
    {
        $this->survey = $survey;
    }

    public function index($survey)
    {
        return response()
            ->json(new QuestionResource(
                DB::table('questions')
                    ->select('questions.*')
                    ->leftjoin('surveys','questions.surveyId','surveys.id')
                    ->where('surveyId', $survey)
                    ->where('surveys.status','3')
                    ->get()
            ));
    }
}
