@extends('admin.layouts.master')
@section('title')
    Add Exam
@endsection
@section('breadCrumbTitle')
    Add Exam
@endsection
@section('breadCrumbMenu')
    Add Exam
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
                        <form id="quickForm" method="POST" action="{{ route('exam.store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="passing_score">Passing Score</label>
                                    <input type="text" name="passing_score" class="form-control" id="passing_score"
                                        placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="end_date">End Date</label>
                                    <div class="datepicker date input-group">
                                        <input type="text" name="end_date" placeholder="Choose Date" class="form-control"
                                            id="fecha1">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" id="description" class="form-control" rows="3" placeholder="Description ..."></textarea>
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
                alert();
                rules: {
                    name: {
                        required: true
                    },
                    passing_score: {
                        required: true,
                    },
                    date: {
                        required: true,
                    }
                },
                messages: {
                    name: "Please enter your name",
                    passing_score: "Please enter your passing score"
                    date: "Please enter your date"
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
