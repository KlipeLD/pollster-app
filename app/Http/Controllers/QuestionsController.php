<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use App\Models\Question;
use App\Http\Requests\Question\StoreRequest;
use App\Http\Requests\Question\UpdateRequest;
use App\Http\Requests\Question\DestroyRequest;
use App\Services\QuestionService;
use DB;

class QuestionsController extends Controller
{
    protected $survey;
    protected $question;
    protected $questionService;

    public function __construct(Survey $survey, Question $question, QuestionService $questionService)
    {
        $this->survey = $survey;
        $this->question = $question;
        $this->questionService = $questionService;
    }

    public function index($survey)
    {
        $questions = DB::table('questions')
            ->where('surveyId',$survey)
            ->orderby('position','asc')
            ->get();
        return view('question.index', [
            'survey_id' => htmlspecialchars($survey),
            'questions' => $questions
        ]);
    }

    public function create($survey)
    {
        return view('question.create',['survey_id' => htmlspecialchars($survey) ]);
    }

    public function store(StoreRequest $request, $survey)
    {
        $data = $request->validated();
        $data['surveyId'] = $survey;
        $question = $this->question->create($data);
        return redirect(route('survey.question.option.index', [
            'survey' => htmlspecialchars($survey), 
            'question' => $question->id
        ]));
    }

    public function edit($survey, $question)
    {
        return view('question.edit',
            [
                'survey_id' => htmlspecialchars($survey),
                'question' => $this->question->getQuestionById($question)
            ]
        );
    }

    public function update(Survey $survey, Question $question, UpdateRequest $request)
    {
        $data = $request->validated();       
        $question->update($data);
        return redirect(route('survey.question.option.index',
            [
                'survey' => $survey->id,
                'question' => $question->id
            ]
        ));
    }

    public function destroy(Survey $survey, Question $question, DestroyRequest $request)
    {
        $question->delete();
        return redirect(route('survey.question.index',
            [
                'survey' => $survey->id, 
            ]
        ));
    }
}
