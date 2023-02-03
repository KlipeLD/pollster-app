@extends ('layouts.layout')

@section ('content')
<div class="container">
    <div class="row">
        <div class="col">
            <a href="{{ route('survey.create') }}" class="btn btn-dark">{{ __('messages.create') }}</a>
        </div>
    </div>
    @forelse($surveys as $survey)
        <div class="row mt-3">
            <div class="col">
                {{ $survey->name }} ({{ __('messages.survey_status_'.$survey->status) }}) - {{ $survey->created}}
            </div>
        </div>
        <div class="row rowHr">
            <div class="col">
                <a href="{{ route('survey.question.index',['survey' => $survey->id ]) }}" class="btn btn-link">{{ __('messages.about') }}</a>
                <a href="{{ route('survey.edit',['survey' => $survey->id ]) }}" class="btn btn-link">{{ __('messages.edit') }}</a>
                <form method="POST" class="mt-1" action="{{ route('survey.destroy', ['survey' => $survey->id ]) }}">
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