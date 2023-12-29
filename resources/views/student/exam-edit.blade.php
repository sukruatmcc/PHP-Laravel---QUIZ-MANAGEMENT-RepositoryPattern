@extends('admin.layouts.master')
@section('title')
    Edit Exam
@endsection
@section('breadCrumbTitle')
    Edit Exam
@endsection
@section('breadCrumbMenu')
    Edit Exam
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
                        <a href="{{ route('exams') }}" type="button" class="btn btn-block btn-info btn-flat">Exam
                            Index</a>
                    </div>
                    <div class="card-body">
                        <form id="quickForm" method="POST" action="{{ route('exam.update',$exam->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input value="{{ $exam->name }}" type="text" name="name" class="form-control" id="name"
                                        placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="passing_score">Passing Score</label>
                                    <input value="{{ $exam->passing_score }}" type="text" name="passing_score" class="form-control" id="passing_score"
                                        placeholder="Enter Passing Score">
                                </div>
                                <div class="form-group">
                                    <label for="end_date">End Date</label>
                                    <div class="datepicker date input-group">
                                        <input value="{{ $exam->end_date }}" type="text" name="end_date" placeholder="Choose Date" class="form-control"
                                            id="end_date">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" id="description" class="form-control" rows="3" placeholder="Enter Description ...">{{ $exam->description }}</textarea>
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
                    name: {
                        required: true
                    },
                    passing_score: {
                        required: true,
                    },
                },
                messages: {
                    name: "Please enter your name",
                    passing_score: {
                        required: "Please enter your passing score",
                    },
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
