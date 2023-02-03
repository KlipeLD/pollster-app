<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\SurveyResource;
use App\Models\Survey;

class SurveysController extends Controller
{
    protected $survey;

    public function __construct(Survey $survey)
    {
        $this->survey = $survey;
    }

    public function index($survey)
    {
        return response()
            ->json(new SurveyResource(Survey::where('status','3')->findOrFail($survey)));
    }
}
