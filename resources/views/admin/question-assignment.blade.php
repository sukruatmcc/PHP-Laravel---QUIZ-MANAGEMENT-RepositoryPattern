@extends('admin.layouts.master')
@section('assignQuestions')
active
@endsection
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
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Student Name</th>
                                    <th>Assigned Questions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($assignmentList as $studentName => $assignedQuestions)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $studentName }}</td>
                                    <td>{{ join(', ', $assignedQuestions) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Student Name</th>
                                    <th>Assigned Questions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
