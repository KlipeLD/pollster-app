<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use App\Http\Requests\Survey\StoreRequest;
use App\Http\Requests\Survey\UpdateRequest;
use App\Http\Requests\Survey\DestroyRequest;
use App\Services\SurveyService;
use DB;

class SurveysController extends Controller
{
    protected $survey;
    protected $surveyService;

    public function __construct(Survey $survey, SurveyService $surveyService)
    {
        $this->survey = $survey;
        $this->surveyService = $surveyService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surveys = Survey::all();
        return view('survey.index',['surveys' => $surveys]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('survey.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $survey = $this->survey->create($data);
        return redirect(route('survey.question.index', ['survey' => $survey->id] ));
    }

    public function show($survey)
    {
        $survey = Survey::with('questions','questions.options')->where('id', $survey)->firstOrFail();
        return view('survey.show',
        [
            'survey' => $survey 
        ]);
    }

    public function edit($survey)
    {
        return view('survey.edit',[
            'survey' => $this->survey->getSurveyById($survey)
        ]);
    }

    public function update(Survey $survey, UpdateRequest $request)
    {
        $data = $request->validated();       
        $survey->update($data);
        return redirect(route('survey.question.index',['survey' => $survey->id]));
    }

    public function destroy(Survey $survey, DestroyRequest $request)
    {
        $survey->delete();
        return redirect(route('survey.index'));
    }
}
