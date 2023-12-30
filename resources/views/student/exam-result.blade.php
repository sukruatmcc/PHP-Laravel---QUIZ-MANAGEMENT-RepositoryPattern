@extends('student.layouts.master')
@section('title')
    Exam Result - <strong>{{ Auth::user()->name }}</strong>
@endsection
@section('breadCrumbTitle')
    Exam Result
@endsection
@section('breadCrumbMenu')
    Exam Result
@endsection
@section('content')
    <div class="container">
        @csrf
        @foreach ($questions->question as $question)
            <div class="card border-info mb-4">
                <div class="d-flex justify-content-between align-items-center card-header bg-info text-white" id="h4">
                    <span>Question {{ $loop->iteration }}</span>
                    <button type="button" data-toggle="collapse" data-target="#q4" aria-expanded="false" aria-controls="q4"
                        class="btn btn-outline-light"><svg width="1em" height="1em" viewBox="0 0 16 16"
                            class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </button>
                </div>
                <div id="q4" class="collapse" aria-labelledby="h4">
                    <div class="card-body">
                        <p>{{ $question->question }}</p><p class="{{ $question->myAnswer->answer == $question->answer ? 'text-success' : 'text-danger' }}">{{ $question->myAnswer->answer == $question->answer ? 'Correct' : 'Wrong' }}</p>
                        @if($question->myAnswer->answer !== $question->answer)
                       <span class="text-dark"><strong>Your Answer : {{ $question->answer }}</strong></span> |
                        <span class="text-dark"><strong>   Correct Answer : {{ $question->myAnswer->answer }}</strong></span>
                        @endif
                        <div class="form-check">
                            @if ($question->myAnswer->answer == $question->answer)
                                <input class="form-check-input" value="a" type="radio" name="{{ $question->id }}"
                                    checked id="q4_r1">
                                <label class="form-check-label" for="{{ $question->id }}">
                                    {{ $question->a }}
                                </label>
                            @else
                                <input class="form-check-input" value="a" type="radio" name="{{ $question->id }}"
                                    id="q4_r1">
                                <label class="form-check-label" for="{{ $question->id }}">
                                    {{ $question->a }}
                                </label>
                            @endif
                        </div>

                        <div class="form-check">
                            @if ($question->myAnswer->answer == $question->answer)
                                <input class="form-check-input" value="b" type="radio" name="{{ $question->id }}"
                                    checked id="q2_r2">
                                <label class="form-check-label" for="{{ $question->id }}">
                                    {{ $question->b }}
                                </label>
                            @else
                            <input class="form-check-input" value="b" type="radio" name="{{ $question->id }}"
                             id="q2_r2">
                        <label class="form-check-label" for="{{ $question->id }}">
                            {{ $question->b }}
                        </label>
                            @endif
                        </div>

                        <div class="form-check">
                            @if ($question->myAnswer->answer == $question->answer)
                            <input class="form-check-input" value="c" type="radio" name="{{ $question->id }}"
                                checked id="q4_r3">
                            <label class="form-check-label" for="{{ $question->id }}">
                                {{ $question->c }}
                            </label>
                            @else
                            <input class="form-check-input" value="c" type="radio" name="{{ $question->id }}"
                                 id="q4_r3">
                            <label class="form-check-label" for="{{ $question->id }}">
                                {{ $question->c }}
                            </label>
                            @endif
                        </div>

                        <div class="form-check">
                            @if ($question->myAnswer->answer == $question->answer)
                            <input class="form-check-input" value="d" type="radio" name="{{ $question->id }}"
                                 id="q4_r4">
                            <label class="form-check-label" for="{{ $question->id }}">
                                {{ $question->d }}
                            </label>
                            @else
                            <input class="form-check-input" value="d" type="radio" name="{{ $question->id }}"
                             id="q4_r4">
                        <label class="form-check-label" for="{{ $question->id }}">
                            {{ $question->d }}
                        </label>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <button type="submit" class="btn btn-block btn-danger btn-flat">End Quiz</a>
    </div>
@endsection
