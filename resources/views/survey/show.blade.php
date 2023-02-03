@extends ('layouts.layout')

@section ('content')
<div class="container">
    @forelse($survey->questions as $question)
        <div class="row mt-3 rowHr">
            <div class="col">
                {{ $question->position }}. {{ $question->title}}
                @forelse($question->options as $key => $option)
                    <div class="row mt-3 px-5">
                        <div class="col ">
                            @if($question->type == '1')
                            <div class="form-check">
                                <input class="form-check-input" value="{{ $option->value }}" type="radio" name="flexRadioDefault" id="flexRadioDefault{{ $key}}">
                                <label class="form-check-label" for="flexRadioDefault{{ $key}}">
                                  {{ $option->title}}
                                </label>
                              </div>
                            @else
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $option->value }}" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    {{ $option->title}}
                                </label>
                              </div>
                            @endif
                        </div>
                    </div>
                @empty
           
                @endforelse    
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