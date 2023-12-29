@extends('admin.layouts.master')
@section('title')
    Edit Question
@endsection
@section('breadCrumbTitle')
    Edit Question
@endsection
@section('breadCrumbMenu')
    Edit Question
@endsection
@section('css')
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.min.css">
@endsection
@section('content')
    <div class="container">
        @include('admin.layouts.success')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form id="quickForm" method="POST" action="{{ route('question.update',$question->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="question">Question</label>
                                    <input value="{{ $question->question }}" type="text" name="question" class="form-control" id="question"
                                        placeholder="Enter Question">
                                </div>
                                <div class="form-group">
                                    <label for="a">A</label>
                                    <input value="{{ $question->a }}" type="text" name="a" class="form-control" id="a"
                                        placeholder="Enter A">
                                </div>
                                <div class="form-group">
                                    <label for="b">B</label>
                                    <input value="{{ $question->b }}" type="text" name="b" class="form-control" id="b"
                                        placeholder="Enter B">
                                </div>
                                <div class="form-group">
                                    <label for="c">C</label>
                                    <input value="{{ $question->c }}" type="text" name="c" class="form-control" id="c"
                                        placeholder="Enter C">
                                </div>
                                <div class="form-group">
                                    <label for="d">D</label>
                                    <input value="{{ $question->d }}" type="text" name="d" class="form-control" id="d"
                                        placeholder="Enter D">
                                </div>
                                <div class="form-group">
                                    <label for="answer">Answer</label>
                                    <input value="{{ $question->answer }}" type="text" name="answer" class="form-control" id="answer"
                                        placeholder="Enter Passing Score">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#quickForm').validate({
                rules: {
                    question: {
                        required: true
                    },
                    a: {
                        required: true,
                    },
                    b: {
                        required: true,
                    },
                    c: {
                        required: true,
                    },
                    d: {
                        required: true,
                    },
                    answer:{
                        required: true
                    }
                },
                messages: {
                    question: "Please enter your question",
                    a: {
                        required: "Please enter your a",
                    },
                    b: {
                        required: "Please enter your b",
                    },
                    c: {
                        required: "Please enter your c",
                    },
                    d: {
                        required: "Please enter your d",
                    },
                    answer: {
                        required: "Please enter your answer",
                    }
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
    <script>
        $(document).ready(function() {
            $('.datepicker').datepicker({
                language: "es",
                autoclose: true,
                format: "yyyy-mm-dd"
            });
        });
    </script>
@endsection
