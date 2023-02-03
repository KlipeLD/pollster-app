@extends ('layouts.layout')

@section ('content')
<div class="container">
    <div class="row">
        <div class="col">
            <a href="{{ route('survey.question.option.create',['survey' => $survey_id, 'question' => $question_id]) }}" class="btn btn-dark">{{ __('messages.create') }}</a>
        </div>
    </div>
    @forelse($options as $option)
        <div class="row mt-3">
            <div class="col">
                {{ $option->value }} - {{ $option->title }}
            </div>
        </div>
        <div class="row rowHr">
            <div class="col">
                <a href="{{ route('survey.question.option.index',['survey' =>$survey_id, 'question' => $question_id,'option' => $option->id  ]) }}" class="btn btn-link">{{ __('messages.about') }}</a>
                <a href="{{ route('survey.question.option.edit',['survey' =>$survey_id, 'question' => $question_id,'option' => $option->id ]) }}" class="btn btn-link">{{ __('messages.edit') }}</a>
                <form method="POST" class="mt-1" action="{{ route('survey.question.option.destroy', ['survey' =>$survey_id, 'question' => $question_id, 'option' => $option->id ]) }}">
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