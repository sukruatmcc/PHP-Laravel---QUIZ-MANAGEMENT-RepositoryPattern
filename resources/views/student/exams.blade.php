@extends('student.layouts.master')
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
        <div class="row">
            @include('student.layouts.success')
            <div class="col-md-12">
                @foreach ($exams as $exam)
                    <div class="card" style="width:800px">
                        <div class="card-body">
                            <h4 class="card-title"><strong>{{ ucfirst($exam->name) }}</strong></h4>
                            <p class="card-text">{{ $exam->description }}</p>
                            <p><strong>Number of questions: {{ $exam->question->count() }}</strong></p>
                            <p><strong class="text-info">End Date: {{ $exam->end_date }}</strong></p>
                            @if ($exam->myResult)
                                <p><strong>Point:{{ $exam->myResult->point }} | <span class="text-success">Correct:{{ $exam->myResult->correct }}</span><span class="text-danger"> Wrong:{{ $exam->myResult->wrong }}</span></strong></p> - <p class="{{ $exam->passing_score > $exam->myResult->point ? 'text-danger' : 'text-success' }}">
                                    {{ $exam->passing_score > $exam->myResult->point
                                        ? 'You failed this exam
                                                                    '
                                        : 'You passed this test
                                    ' }}
                                </p>
                            @endif
                            @if ($exam->myResult)
                                <a href="{{ route('student.exam.result',$exam->id) }}" class="btn btn-block btn-warning btn-flat">View Exam</a>
                            @else
                                <a href="{{ route('student.exam.question', $exam->id) }}" type="button"
                                    class="btn btn-block btn-primary btn-flat">Join
                                    the Quiz
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
