@extends ('layouts.layout')

@section ('content')
<div class="container">
    <div class="row ">
        <div class="col-md-12p">
            <div class="card mb-5">
                <div class="card-header">{{ __('messages.option_adding') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('survey.question.option.store',['survey' => $survey_id, 'question' => $question_id]) }}">
                        @csrf

                        <div class="form-group row mt-3">
                            <label for="value"
                                    class="col-md-3 col-form-label text-md-right">{{ __('messages.option_value') }}</label>

                            <div class="col-md-8">
                                <input id="value" type="number"
                                        class="form-control boxShadNone @error('value') is-invalid @enderror"
                                        name="value" value="{{ old('value') }}" autocomplete="off"
                                        autofocus>

                                @error('value')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="title"
                                    class="col-md-3 col-form-label text-md-right">{{ __('messages.option_title') }}</label>

                            <div class="col-md-8">
                                <input id="title" type="text"
                                        class="form-control boxShadNone @error('title') is-invalid @enderror"
                                        name="title" value="{{ old('title') }}" autocomplete="off"
                                        autofocus>

                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0 mt-3">
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-danger">
                                    {{ __('messages.create') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>                
</div>
@endsection