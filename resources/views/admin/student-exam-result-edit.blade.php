@extends('admin.layouts.master')
@section('title')
    Edit Exam Results
@endsection
@section('breadCrumbTitle')
    Edit Exam Result
@endsection
@section('breadCrumbMenu')
    Edit Exam Result
@endsection

@section('content')
    <div class="container">
        @include('admin.layouts.success')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="width: 200px; border:none">
                        <a href="{{ route('examResults') }}" type="button" class="btn btn-block btn-info btn-flat">Exam Result
                            Index</a>
                    </div>
                    <div class="card-body">
                        <form id="quickForm" method="POST" action="{{ route('examResult.update',$examResult->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleSelectRounded0">Students</label>
                                    <select name="user_id" class="custom-select rounded-0" id="exampleSelectRounded0">
                                    <option value="">Student Select</option>
                                     @foreach ($users as $user)
                                     <option {{ $user->id === $examResult->user_id ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->name }}</option>
                                     @endforeach
                                    </select>
                                  </div>
                                <div class="form-group">
                                    <label for="point">Score</label>
                                    <input value="{{ $examResult->point }}" type="text" name="point" class="form-control" id="point" placeholder="Enter Point">
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
    <script>
        $(document).ready(function() {
            $('#quickForm').validate({
                rules: {
                    user_id: {
                        required: true,
                    },
                    point: {
                        required: true
                    },
                },
                messages: {
                    user_id: {
                        required: "Please enter your user_id",
                    },
                    point: "Please enter your point",
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
