@extends('admin.layouts.master')
@section('title')
    Add Question
@endsection
@section('breadCrumbTitle')
    Add Question
@endsection
@section('breadCrumbMenu')
    Add Question
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
                    <div class="card-header" style="width: 200px; border:none">
                        <a href="{{ route('exam.questions',$exam->id) }}" type="button" class="btn btn-block btn-info btn-flat">Question
                            Index</a>
                    </div>
                    <div class="card-body">
                        <form id="quickForm" method="POST" action="{{ route('question.store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="hidden" name="exam_id" value="{{ $exam->id }}">
                                    <label for="question">Question</label>
                                    <input type="text" name="question" class="form-control" id="question"
                                        placeholder="Enter Question">
                                </div>
                                <div class="form-group">
                                    <label for="a">A</label>
                                    <input type="text" name="a" class="form-control" id="a"
                                        placeholder="Enter A">
                                </div>
                                <div class="form-group">
                                    <label for="b">B</label>
                                    <input type="text" name="b" class="form-control" id="b"
                                        placeholder="Enter B">
                                </div>
                                <div class="form-group">
                                    <label for="c">C</label>
                                    <input type="text" name="c" class="form-control" id="c"
                                        placeholder="Enter C">
                                </div>
                                <div class="form-group">
                                    <label for="d">D</label>
                                    <input type="text" name="d" class="form-control" id="d"
                                        placeholder="Enter D">
                                </div>
                                <div class="form-group">
                                    <label for="answer">Answer</label>
                                    <input type="text" name="answer" class="form-control" id="answer"
                                        placeholder="Enter Passing Score">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info">Add</button>
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
