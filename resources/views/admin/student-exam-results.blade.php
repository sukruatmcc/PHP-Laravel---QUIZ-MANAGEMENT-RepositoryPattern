@extends('admin.layouts.master')
@section('studentExamResult')
active
@endsection
@section('title')
    Student Exam Results
@endsection
@section('breadCrumbTitle')
    Student Exam Results
@endsection
@section('breadCrumbMenu')
    Student Exam Results
@endsection

@section('content')
    <div class="container">
        @include('admin.layouts.success')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="width: 200px; border:none">
                        <a href="{{ route('examResult.add') }}" class="btn btn-block btn-info btn-flat">Add Exam Result
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Score</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($examResults as $examResult)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $examResult->users[0]->name }}</td>
                                        <td>{{ $examResult->point }}</td>
                                        <td>
                                            <button type="button" style="border:none" class="text-danger destroy"
                                                data-action="{{ route('examResult.destroy',$examResult->id) }}" data-id="{{ $examResult->id }}"><i class="fa-solid fa-trash"></i></button>
                                            <a href="{{ route('examResult.edit',$examResult->id) }}"><i class="fa-regular fa-pen-to-square"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Score</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
