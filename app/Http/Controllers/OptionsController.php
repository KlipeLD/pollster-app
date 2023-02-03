<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use App\Models\Question;
use App\Models\Option;
use App\Http\Requests\Option\StoreRequest;
use App\Http\Requests\Option\UpdateRequest;
use App\Http\Requests\Option\DestroyRequest;
use App\Services\OptionService;
use DB;

class OptionsController extends Controller
{

    protected $survey;
    protected $question;
    protected $option;
    protected $optionService;

    public function __construct(Survey $survey, Question $question, Option $option, OptionService $optionService)
    {
        $this->survey = $survey;
        $this->question = $question;
        $this->option = $option;
        $this->optionService = $optionService;
    }

    public function index($survey, $question)
    {
        $options = DB::table('options')
            ->where('questionId',htmlspecialchars($question))
            ->orderby('value','asc')
            ->get();
        return view('option.index', [
            'survey_id' => htmlspecialchars($survey),
            'question_id' => htmlspecialchars($question),
            'options' => $options
        ]);
    }

    public function create($survey, $question)
    {
        return view('option.create',[
            'survey_id' => htmlspecialchars($survey),
            'question_id' => htmlspecialchars($question),
        ]);
    }

    public function store(StoreRequest $request, $survey, $question)
    {
        $data = $request->validated();
        $data['questionId'] = htmlspecialchars($question);
        $option = $this->option->create($data);
        return redirect(route('survey.question.option.index', 
        [
            'survey' => htmlspecialchars($survey), 
            'question' => htmlspecialchars($question), 
        ]));
    }

    public function edit($survey, $question, $option)
    {
        return view('option.edit',
            [
                'survey_id' => htmlspecialchars($survey),
                'question_id' => htmlspecialchars($question),
                'option' => $this->option->getOptionById($option)
            ]
        );
    }

    public function update(Survey $survey, Question $question, Option $option, UpdateRequest $request)
    {
        $data = $request->validated();       
        $option->update($data);
        return redirect(route('survey.question.option.index',
            [
                'survey' => $survey->id,
                'question' => $question->id,
            ]
        ));
    }

    public function destroy(Survey $survey, Question $question, Option $option, DestroyRequest $request)
    {
        $option->delete();
        return redirect(route('survey.question.option.index',
            [
                'survey' => $survey->id, 
                'question' => $question->id, 
            ]
        ));
    }

}
