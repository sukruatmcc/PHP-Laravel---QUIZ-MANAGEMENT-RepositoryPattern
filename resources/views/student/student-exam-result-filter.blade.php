@extends('student.layouts.master')
@section('students')
    active
@endsection
@section('title')
    Students
@endsection
@section('breadCrumbTitle')
    Students
@endsection
@section('breadCrumbMenu')
    Students
@endsection

@section('content')
    <div class="container">
        @include('student.layouts.success')
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('student.resultAnalysis') }}" method="GET">
                    <select  name="exam_id">
                        @foreach ($exams as $exam)
                            <option value="{{ $exam->id }}">{{ $exam->name }}</option>
                        @endforeach
                    </select>

                    <select name="success_status">
                        <option value="all">Students Index</option>
                        <option value="pass">Pass students</option>
                        <option value="fail">Fail Student</option>
                    </select>

                    <button type="submit">Search</button>
                </form><br>
                <div class="card">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
