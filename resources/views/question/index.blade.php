@extends ('layouts.layout')

@section ('content')
<div class="container">
    <div class="row">
        <div class="col">
            <a href="{{ route('survey.question.create',['survey' => $survey_id]) }}" class="btn btn-dark">{{ __('messages.create') }}</a>
        </div>
    </div>
    @forelse($questions as $question)
        <div class="row mt-3">
            <div class="col">
                {{ $question->position }}. {{ $question->title }} ({{ __('messages.question_type_'.$question->type) }})
            </div>
        </div>
        <div class="row rowHr">
            <div class="col">
                <a href="{{ route('survey.question.option.index',['survey' =>$survey_id, 'question' => $question->id ]) }}" class="btn btn-link">{{ __('messages.about') }}</a>
                <a href="{{ route('survey.question.edit',['survey' =>$survey_id, 'question' => $question->id ]) }}" class="btn btn-link">{{ __('messages.edit') }}</a>
                <form method="POST" class="mt-1" action="{{ route('survey.question.destroy', ['survey' =>$survey_id, 'question' => $question->id ]) }}">
                    @csrf
                    @method('delete') 
                        <button type="submit" class="btn btn-link">{{ __('messages.delete') }}</button>
                </form>
            </div>
        </div>
    @empty
        <div class="row">
            <div class="col">
                {{ __('messages.no_data_available') }}
            </div>
        </div>            
    @endforelse
</div>
@endsection