@extends ('layouts.layout')

@section ('content')
<div class="container">
    <div class="row ">
        <div class="col-md-12p">
            <div class="card mb-5">
                <div class="card-header">{{ __('messages.survey_editing') }} </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('survey.update',['survey' => $survey->id]) }}">
                        @csrf
                        @method('put')

                        <div class="form-group row mt-3">
                            <label for="name"
                                    class="col-md-3 col-form-label text-md-right">{{ __('messages.survey_name') }}</label>

                            <div class="col-md-8">
                                <input id="name" type="text"
                                        class="form-control boxShadNone @error('name') is-invalid @enderror"
                                        name="name" value="{{ $survey->name }}" autocomplete="off"
                                        autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="status"
                                    class="col-md-3 col-form-label text-md-right">{{ __('messages.survey_status') }}</label>

                            <div class="col-md-8">
                                <select id="status" type="text"
                                        class="form-control boxShadNone @error('status') is-invalid @enderror"
                                        name="status" autocomplete="off">
                                        @if( $survey->status == '1')
                                        <option selected value="1">{{ __('messages.survey_status_1' ) }}</option>
                                        <option value="2">{{ __('messages.survey_status_2' ) }}</option>
                                        <option value="3">{{ __('messages.survey_status_3' ) }}</option>
                                        @elseif( $survey->status == '2')
                                        <option value="1">{{ __('messages.survey_status_1' ) }}</option>
                                        <option selected value="2">{{ __('messages.survey_status_2' ) }}</option>
                                        <option value="3">{{ __('messages.survey_status_3' ) }}</option>
                                        @else
                                        <option value="1">{{ __('messages.qsurvey_status_1' ) }}</option>
                                        <option value="2">{{ __('messages.survey_status_2' ) }}</option>
                                        <option selected value="3">{{ __('messages.survey_status_3' ) }}</option>
                                        @endif
                                </select>

                                @error('status')
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
</div>
@endsection