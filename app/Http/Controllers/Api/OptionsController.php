<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\OptionResource;
use App\Models\Survey;
use App\Models\Question;
use App\Models\Option;
use DB;

class OptionsController extends Controller
{

    protected $survey;
    protected $question;

    public function __construct(Survey $survey, Question $question)
    {
        $this->survey = $survey;
        $this->question = $question;
    }

    public function index($survey, $question)
    {
        return response()
            ->json(new OptionResource(
                DB::table('options')
                ->select('options.*')
                ->leftjoin('questions','options.questionId','questions.id')
                ->leftjoin('surveys','questions.surveyId','surveys.id')
                ->where('questionId', $question)
                ->where('surveys.id',$survey)
                ->where('surveys.status','3')
                    ->get()
            ));
    }
}
