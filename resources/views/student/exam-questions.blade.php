@extends('student.layouts.master')
@section('title')
    My Exam
@endsection
@section('breadCrumbTitle')
    My Exam
@endsection
@section('breadCrumbMenu')
    My Exam
@endsection

@section('content')
    <div class="container">
        <form action="{{ route('student.exam.question.answer',$exam->id) }}" method="POST">
            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
            @csrf
            @foreach ($questions[0]->question as $question)
                <input type="hidden" value="{{ $exam->id }}" name="exam_id">
                <div class="card border-info mb-4">
                    <div class="d-flex justify-content-between align-items-center card-header bg-info text-white"
                        id="h4">
                        <span>Question {{ $loop->iteration }}</span>
                        <button type="button" data-toggle="collapse" data-target="#q4" aria-expanded="false"
                            aria-controls="q4" class="btn btn-outline-light"><svg width="1em" height="1em"
                                viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </button>
                    </div>
                    <div id="q4" class="collapse" aria-labelledby="h4">
                        <div class="card-body">
                            <p>{{ $question->question }}</p>
                            <input type="hidden" value="{{ $question->id }}" name="question_id">

                            <div class="form-check">
                                <input class="form-check-input" value="a" type="radio" name="{{ $question->id }}" id="q4_r1">
                                <label class="form-check-label" for="{{ $question->id }}">
                                    {{ $question->a }}
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" value="b" type="radio" name="{{ $question->id }}" id="q2_r2">
                                <label class="form-check-label" for="{{ $question->id }}">
                                    {{ $question->b }}
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" value="c" type="radio" name="{{ $question->id }}" id="q4_r3">
                                <label class="form-check-label" for="{{ $question->id }}">
                                    {{ $question->c }}
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" value="d" type="radio" name="{{ $question->id }}" id="q4_r4">
                                <label class="form-check-label" for="{{ $question->id }}">
                                    {{ $question->d }}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <button type="submit" class="btn btn-block btn-danger btn-flat">End Quiz</a>
        </form>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#quickForm').validate({
                rules: {
                    name: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                    }
                },
                messages: {
                    name: "Please enter your name",
                    email: {
                        required: "Please enter your email",
                        email: "Please enter a valid email address"
                    },
                    password: "Please enter your password"
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>
@endsection
