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
                                    <th>Status</th>
                                    <th>End Date</th>
                                    <th>Questions</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($exams as $exam)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $exam->name }}</td>
                                        <td>{{ $exam->passing_score }}</td>
                                        <td>
                                            @if ($exam->status == 'Active')
                                                <button data-action="{{ route('exam.status', $exam->id) }}"
                                                    type="button" data-id="{{ $exam->id }}"
                                                    class="btn btn-block btn-success btn-flat status">Active</button>
                                            @elseif($exam->status == 'Pending')
                                                <button data-action="{{ route('exam.status', $exam->id) }}"
                                                    type="button" data-id="{{ $exam->id }}"
                                                    class="btn btn-block btn-warning btn-flat status">Pending</button>
                                            @elseif($exam->status == 'Passive')
                                                <button data-action="{{ route('exam.status', $exam->id) }}"
                                                    type="button" data-id="{{ $exam->id }}"
                                                    class="btn btn-block btn-danger btn-flat status">Passive</button>
                                            @endif
                                        </td>
                                        <td>{{ $exam->end_date }}</td>
                                        <td><a href="{{ route('exam.questions',$exam->id) }}" class="btn btn-block btn-info btn-flat">Go to Questions</a></td>
                                        <td>
                                            <button type="button" style="border:none" class="text-danger destroy"
                                                data-action="{{ route('exam.destroy', $exam->id) }}"
                                                data-id="{{ $exam->id }}"><i class="fa-solid fa-trash"></i></button>
                                            <a href="{{ route('exam.edit', $exam->id) }}"><i
                                                    class="fa-regular fa-pen-to-square"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Passing Score</th>
                                    <th>End Date</th>
                                    <th>Questions</th>
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
