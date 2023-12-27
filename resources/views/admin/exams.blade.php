@extends('admin.layouts.master')
@section('title')
    Exams
@endsection
@section('breadCrumbTitle')
    Exams
@endsection
@section('breadCrumbMenu')
    Exams
@endsection

@section('content')
    <div class="container">
        @include('admin.layouts.success')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="width: 200px; border:none">
                      <a href="{{ route('exam.add') }}" class="btn btn-block btn-info btn-flat">Add Exam</a>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Passing Score</th>
                                    <th>End Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($exams as $exam)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $exam->name }}</td>
                                    <td>{{ $exam->passing_score }}</td>
                                    <td>{{ $exam->end_date }}</td>
                                    <td>
                                        <button type="button" style="border:none" class="text-danger destroy" data-action="{{ route('exam.destroy',$exam->id) }}" data-id="{{ $exam->id }}"><i class="fa-solid fa-trash"></i></button>
                                        <a href="{{ route('exam.edit',$exam->id) }}"><i class="fa-regular fa-pen-to-square"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
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
