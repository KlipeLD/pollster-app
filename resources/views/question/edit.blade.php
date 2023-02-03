@extends ('layouts.layout')

@section ('content')
<div class="container">
    <div class="row ">
        <div class="col-md-12p">
            <div class="card mb-5">
                <div class="card-header">{{ __('messages.question_editing') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('survey.question.update',['survey' => $survey_id, 'question' => $question->id]) }}">
                        @csrf
                        @method('put')

                        <div class="form-group row mt-3">
                            <label for="position"
                                    class="col-md-3 col-form-label text-md-right">{{ __('messages.question_position') }}</label>

                            <div class="col-md-8">
                                <input id="position" type="number"
                                        class="form-control boxShadNone @error('position') is-invalid @enderror"
                                        name="position" value="{{ $question->position }}" autocomplete="off"
                                        autofocus>

                                @error('position')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="title"
                                    class="col-md-3 col-form-label text-md-right">{{ __('messages.question_title') }}</label>

                            <div class="col-md-8">
                                <input id="title" type="text"
                                        class="form-control boxShadNone @error('title') is-invalid @enderror"
                                        name="title" value="{{ $question->title }}" autocomplete="off"
                                        autofocus>

                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="type"
                                    class="col-md-3 col-form-label text-md-right">{{ __('messages.question_type') }}</label>

                            <div class="col-md-8">
                                <select id="type" type="text"
                                        class="form-control boxShadNone @error('type') is-invalid @enderror"
                                        name="type"  autocomplete="off">
                                        @if($question->type == '1')
                                            <option selected value="1">{{ __('messages.question_type_1' ) }}</option>
                                            <option value="2">{{ __('messages.question_type_2' ) }}</option>
                                        @else 
                                            <option value="1">{{ __('messages.question_type_1' ) }}</option>
                                            <option selected value="2">{{ __('messages.question_type_2' ) }}</option>
                                        @endif
                                        
                                        
                                </select>

                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0 mt-3">
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-danger">
                                    {{ __('messages.edit') }}
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